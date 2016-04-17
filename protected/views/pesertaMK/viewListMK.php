<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#listMK-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");


$url = Yii::app()->request->baseUrl; 
$id= Dosen::model()->getId(Yii::app()->user->getId());?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url ?>/Kalender">Kalender</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Jadwal/viewJadwalD">Jadwal</a>
                </li>
                <li  class="active">
                	<a href="<?php echo $url.'/PesertaMK/viewListMK/'.$id?>">Perkuliahan</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h2><strong>Daftar Mata Kuliah</strong></h2>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route . "/" . $id_dosen),
		'method'=>'get',
	)); ?>

	  <br>
	  <div class="col-md-6 search-form">
	    <div class="form-inline">
	      <div class="form-group">
	        <label class="search-label">Tahun Ajaran</label>
	        <?php echo $form->dropDownList($model,'tahun_ajaran', CHtml::listData(Kalender::model()->findAll(), 'tahun_ajaran', 'tahun_ajaran'), array('empty' => '-Pilih Tahun-','class'=>'form-control search-input')); ?>
	      </div>
	      <div class="form-group">
	        <label class="search-label">Semester</label>    
	        <?php echo $form->dropDownList($model,'semester', array('Gasal' => 'Gasal', 'Genap' => 'Genap'), array('empty' => '-Pilih Semester-','class'=>'form-control search-input')); ?>
	      </div>  
	      <?php echo CHtml::submitButton('Search', array('class'=>'search-btn btn-primary')); ?>
	    </div>
	  </div>
	  <br>
	<?php $this->endWidget(); ?>
	</div>
	<br>
	<br>


<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'listMK-grid',
	'dataProvider'=>$model->searchListMK($id_dosen),
	'columns'=>array(
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
			'header' => 'Kode MK',
			'type' => 'raw',
			'value' => '(PengajarMK::model()->getStatusKoordinator(Dosen::model()->getId(Yii::app()->user->getId()), $data->idJadwal->id_mk)) ? CHtml::link($data->idJadwal->idMk->kode_mk, array("Komponen/listKomponen", "id" => $data->id_jadwal)) : $data->idJadwal->idMk->kode_mk'
		),
		array(
			'header' => 'Mata Kuliah',
			'type' => 'raw',
			'value' => '$data->idJadwal->idMk->nama_mk',
		),
		array(
			'header' => 'SKS',
			'value' => '$data->idJadwal->idMk->sks'
		),
		array(
			'header' => 'Semester',
			'value' => '$data->idJadwal->idMk->semester'
		),
		array(
			'header' => 'Kelas',
			'value' => '$data->idJadwal->kelas'	
		),
		array(
			'header' => 'Kapasitas',
			'value' => '$data->idJadwal->kapasitas'	
		),
		array(
			'type' => 'raw',
			'header' => 'Jumlah Mahasiswa',	
			'value' => 'CHtml::link(PesertaMK::model()->getJumlahMhs($data->id_jadwal), array("Khs/viewListMhs", "id" => $data->id_jadwal))',
		),
	),
)); 
?>
