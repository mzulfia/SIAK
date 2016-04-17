<?php
/* @var $this PengajarMKController */
/* @var $model PengajarMK */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengajar-mk-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dosen'); ?>
		<?php echo $form->textField($model,'id_dosen'); ?>
		<?php echo $form->error($model,'id_dosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mk'); ?>
		<?php echo $form->textField($model,'id_mk'); ?>
		<?php echo $form->error($model,'id_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_koordinator'); ?>
		<?php echo $form->textField($model,'status_koordinator'); ?>
		<?php echo $form->error($model,'status_koordinator'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->