<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mahasiswa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
    CClientScript::POS_READY
);

?>

<?php 
$url = Yii::app()->request->baseUrl; 
if(!Yii::app()->user->isAdmin()){	
?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li class="active">
                	<a href="<?php echo $url ?>/Mahasiswa/default/admin">Mahasiswa</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Dosen/default/admin">Dosen</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Sekretariat/default/listPA">Pembimbing</a>
                </li>
		<li>
                	<a href="<?php echo $url ?>/Sekretariat/default/viewLulusan">Lulusan</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<?php } else { ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
		<li>
                	<a href="<?php echo $url ?>/Admin/default/admin">Admin</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url ?>/Mahasiswa/default/admin">Mahasiswa</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Dosen/default/admin">Dosen</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Sekretariat/default/admin">Sekretariat</a>
                </li>
		<li>
                	<a href="<?php echo $url ?>/Sekretariat/default/viewLulusan">Lulusan</a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
<?php } ?>

<h2><strong>Kelola Mahasiswa</strong></h2>
<hr>

<?php if(Yii::app()->user->hasFlash('success')):?>
	    <div class="alert-success">
	        <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
	    </div>
	<?php endif; ?>

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
        <label class="search-label">Angkatan</label>
        <?php echo $form->dropDownList($model,'tanggal_masuk', Mahasiswa::model()->getYearOption(), array('empty' => '-Pilih Angkatan-','class'=>'form-control search-input')); ?>
      </div>
      <div class="form-group">
        <label class="search-label">Status</label>    
        <?php echo $form->dropDownList($model,'status_akademis', Mahasiswa::model()->getStatusOption(), array('empty' => '-Pilih Status-', 'class'=>'form-control search-input')); ?>
      </div>  
      <?php echo CHtml::submitButton('Search', array('class'=>'search-btn btn-primary')); ?>
    </div>
  </div>
  <br>
<?php $this->endWidget(); ?>
</div>
<br>
<br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mahasiswa-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		    array(
          'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        	'htmlOptions'=>array('width'=>'25px')
        ),
        array(
        	'header' => 'NIM',
        	'type' => 'raw',
        	'value' => 'CHtml::link($data->nim, array("/Khs/viewRingkasan/" . $data->id_mhs))',
        	'htmlOptions'=>array('width'=>'100px')
        ),
        array(
        	'header' => 'Username',
        	'value' => '$data->idUser->username',
        	'htmlOptions'=>array('width'=>'100px')
        ),
        array(
        	'header' => 'Nama',
        	'value' => '$data->nama',
        	'htmlOptions'=>array('width'=>'150px')
        ),
		array(
			'header' => 'Angkatan',
			'value' => '($data->tanggal_masuk == NULL || $data->tanggal_masuk == "0000-00-00") ? "" : date("Y", strtotime($data->tanggal_masuk))'
		),
		array(
			'header' => 'Semester',
			'value' => '$data->semester'
		),
		array(
			'header' => 'Status',
			'value' => '$data->status_akademis',
			'htmlOptions' => array('width' => '80px'),
		),
		array(
			'header' => 'Operasi',
			'class'=>'CButtonColumn',
			'template' => '{idm} | {ipk} | {krs}',
			'buttons' => array(
				'idm' => array(
					'label' => 'Lihat Profil',
					'url'=>'Yii::app()->createUrl("Mahasiswa/default/view", array("id" => $data->id_mhs))',
				),
				'ipk' => array(
					'label' => 'Ubah Profil',
					'url'=>'Yii::app()->createUrl("Mahasiswa/default/update", array("id" => $data->id_mhs))',
				),
				'krs' => array(
					'label'=>'Cetak Transkrip',
            		'url'=>'Yii::app()->createUrl("Khs/printKhs", array("id" => $data->id_mhs))',
            	),
			),
			'htmlOptions' => array('width' => '300px'),
		),
	),
)); ?>
