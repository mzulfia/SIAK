<?php
/* @var $this RuangController */
/* @var $model Ruang */
/* @var $form CActiveForm */
?>

<div class="form left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ruang-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan <span class="required">*</span> harus diisi.</p>
		
	<div class="row">
		<?php echo $form->labelEx($model,'no_ruang'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'no_ruang', array('size'=>20,'maxlength'=>20, 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'no_ruang'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php echo "<div class='form left'><br>" . CHtml::link('Back', array('/Ruang/admin'), array('class' => 'btn btn-default')) . "</div>"; ?>
