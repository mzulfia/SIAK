<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mata-kuliah-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_mk'); ?>
		<?php echo $form->textField($model,'kode_mk'); ?>
		<?php echo $form->error($model,'kode_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_mk'); ?>
		<?php echo $form->textField($model,'nama_mk',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nama_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sks'); ?>
		<?php echo $form->textField($model,'sks'); ?>
		<?php echo $form->error($model,'sks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo $form->textField($model,'semester'); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kapasitas'); ?>
		<?php echo $form->textField($model,'kapasitas'); ?>
		<?php echo $form->error($model,'kapasitas'); ?>
	</div>

	<div class="row">
<<<<<<< HEAD
		<?php echo $form->labelEx($model,'nip_dosen'); ?>
		<?php echo $form->textField($model,'nip_dosen'); ?>
		<?php echo $form->error($model,'nip_dosen'); ?>
=======
		<?php echo $form->labelEx($model,'id_dosen'); ?>
		<?php echo $form->textField($model,'id_dosen'); ?>
		<?php echo $form->error($model,'id_dosen'); ?>
>>>>>>> origin/master
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->