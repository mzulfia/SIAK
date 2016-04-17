<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#pembayaran-grid').yiiGridView('update', {
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
                <li class="active">
                	<a href="<?php echo $url.'/Dosen/default/bimbinganD'?>">Daftar Bimbingan</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/Dosen/default/listAktif'?>">Aktif</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/Dosen/default/listKosong'?>">Kosong</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/Dosen/default/listCuti'?>">Cuti</a>
                </li>
                <li>
                  <a href="<?php echo $url.'/Dosen/default/listLulus'?>">Lulus</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h2><strong>Daftar Mahasiswa Bimbingan</strong></h2>
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
        <label class="search-label">NIM</label>
        <?php echo $form->textField($model,'nim', array('class'=>'form-control search-input')); ?>
      </div>
      <div class="form-group">
        <label class="search-label">Nama</label>
        <?php echo $form->textField($model,'nama', array('class'=>'form-control search-input')); ?>
      </div>
      <div class="form-group">
        <label class="search-label">Status Akademis</label>
        <?php echo $form->dropDownList($model,'status_akademis', array("Kosong" => "Kosong", "Aktif" => "Aktif", "Cuti" => "Cuti", "Lulus" => "Lulus"), array('empty' => '-Pilih Status-', 'class'=>'form-control search-input')); ?>
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
	'id'=>'bimbinganD-grid',
	'dataProvider'=>$model->searchUpdateMhsBimbingan(Dosen::model()->getId(Yii::app()->user->getId())),
	'columns'=>array(
		array(
			'header'=>'No.',
        		'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        	),
		array(
			'header' => 'NIM',
			'value' => '$data->nim'
		),
		array(
			'header' => 'Nama',
			'value' => '$data->nama'
		),
		array(
			'header' => 'Status',
			'value' => '$data->status_akademis'
		),
		array(
			'header' => 'KRS?',
			'value' => '(Krs::model()->getKRS($data->id_mhs, $data->semester)) ? "Belum Mengisi" : "Sudah Mengisi"',
		),
	),
)); 

?>