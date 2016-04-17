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
		<?php echo $form->textField($model,'id_dosen'); ?>
		<?php echo $form->error($model,'id_dosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_jadwal'); ?>
		<?php echo $form->textField($model,'id_jadwal'); ?>
		<?php echo $form->error($model,'id_jadwal'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->