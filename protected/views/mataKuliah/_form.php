<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */
/* @var $form CActiveForm */
?>

<div class="form left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mata-kuliah-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan <span class="required">*</span> harus diisi.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_mk'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'kode_mk', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'kode_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_mk'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'nama_mk',array('size'=>25,'maxlength'=>25, 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'nama_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sks'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'sks', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'sks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'semester', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php 
	echo "<div class='form left'><br>" . CHtml::link('Back', array('/MataKuliah/admin'), array('class' => 'btn btn-default')) . "</div>";  
?>
