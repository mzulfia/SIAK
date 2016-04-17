<?php
/* @var $this PerkuliahanController */
/* @var $model Perkuliahan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengajar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dosen'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'id_dosen', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'id_dosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_jadwal'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'id_jadwal', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'id_jadwal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_ajaran'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'tahun_ajaran', array('placeholder'=>'Cth: 2014/2015', 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'tahun_ajaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<span class='colon'>:</span>
		<?php echo $form->dropDownList($model,'semester', array('Ganjil'=>'Ganjil', 'Genap'=>'Genap'), array('empty' => '-Pilih Semester-', 'class'=>'form-control input', 'style'=>'height:30px')); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->