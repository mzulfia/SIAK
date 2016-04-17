<?php
	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$('#listMk-grid').yiiGridView('update', {
			data: $(this).serialize()
		});
		return false;
	});
	");

	$url = Yii::app()->request->baseUrl; 
	$id = Sekretariat::model()->getId(Yii::app()->user->getId());
?>

<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url ?>/Kalender/admin">Kalender</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/MataKuliah/admin">Mata Kuliah</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Jadwal/admin">Jadwal</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Ruang/admin">Ruangan</a>
                </li>
                <li  class="active">
                	<a href="<?php echo $url ?>/PesertaMK/viewListMKSBA">Perkuliahan</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

<h2><strong>Daftar Mata Kuliah</strong></h2>
<hr>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
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
	'dataProvider'=>$model->searchListMKSBA(),
	'columns'=>array(
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
			'header' => 'Kode MK',
			'value' => '$data->idMk->kode_mk'
		),
		array(
			'header' => 'Mata Kuliah',
			'type' => 'raw',
			'value' => '$data->idMk->nama_mk',
		),
		array(
			'header' => 'SKS',
			'value' => '$data->idMk->sks'
		),
		array(
			'header' => 'Semester',
			'value' => '$data->idMk->semester'
		),
		array(
			'header' => 'Kelas',
			'value' => '$data->kelas'	
		),
		array(
			'header' => 'Kapasitas',
			'value' => '$data->kapasitas'	
		),
		array(
			'type' => 'raw',
			'header' => 'Jumlah Mahasiswa',	
			'value' => 'CHtml::link(PesertaMK::model()->getJumlahMhs($data->id_jadwal), array("PesertaMK/viewListMhsSBA", "id" => $data->id_jadwal))',
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
			'buttons' => array(
                'view' => array(
                	'label' => 'Lihat Daftar Nilai',
                    'url'=>'Yii::app()->createUrl("PesertaMK/viewListNilaiSBA", array("id" => $data->id_jadwal))',
                ),
            ),
			'htmlOptions'=>array('width'=>'75px'),
		),
	),
)); 
?>
