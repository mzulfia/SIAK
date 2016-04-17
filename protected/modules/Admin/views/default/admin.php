<?php
/* @var $this AdminController */
/* @var $model Admin */

Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);

?>
<?php $url = Yii::app()->request->baseUrl; ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
		<li class="active">
                	<a href="<?php echo $url ?>/Admin/default/admin">Admin</a>
                </li>
                <li>
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

<h2><strong>Kelola Admin</strong></h2>
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
        <label class="search-label">Nama</label>
        <?php echo $form->textField($model,'nama', array('class'=>'form-control search-input')); ?>
      </div>
      <div class="form-group">
        <label class="search-label">Jenis</label>
        <?php echo $form->dropDownList($model,'jenis', array("Internal" => "Internal", "Eksternal" => "Eksternal"), array('empty' => '-Pilih Jenis-','class'=>'form-control search-input')); ?>
      </div>
      <?php echo CHtml::submitButton('Search', array('class'=>'search-btn btn-primary')); ?>
    </div>
  </div>
  <br>
<?php $this->endWidget(); ?>
</div>
<br>
<br>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert-success">
        <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
    </div>
<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'header'=>'No.',
	        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
			'htmlOptions' => array('width'=>'25px'),
		),
		array(
			'header'=>'Username',
			'value'=>'$data->idUser->username'
		),
		array(
			'header'=>'Nama',
			'value'=>'$data->nama',
		),
		array(
			'header'=>'Jenis',
			'value'=>'$data->jenis',
		),
		array(
			'template'=>'{view}',
			'class'=>'CButtonColumn',
      'htmlOptions'=>array('width'=>'75px'),
		),
	),
)); ?>