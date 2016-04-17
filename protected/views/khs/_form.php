<?php
/* @var $this KhsController */
/* @var $model Khs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'khs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'id_khs'); ?>
		<?php echo $form->textField($model,'id_khs'); ?>
		<?php echo $form->error($model,'id_khs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mhs'); ?>
		<?php echo $form->textField($model,'id_mhs'); ?>
		<?php echo $form->error($model,'id_mhs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_jadwal'); ?>
		<?php echo $form->textField($model,'id_jadwal'); ?>
		<?php echo $form->error($model,'id_jadwal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo $form->textField($model,'semester'); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_angka'); ?>
		<?php echo $form->textField($model,'nilai_angka',array('size'=>2); ?>
		<?php echo $form->error($model,'nilai_angka'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_huruf'); ?>
		<?php echo $form->textField($model,'nilai_huruf',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'nilai_huruf'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->