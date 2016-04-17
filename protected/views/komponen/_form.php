<?php
/* @var $this KomponenController */
/* @var $model Komponen */
/* @var $form CActiveForm */
?>

<div class="form left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'komponen-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"></p>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30, 'class' => 'form-control input')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bobot'); ?>
		<?php echo $form->textField($model,'bobot', array('class' => 'form-control input')); ?>
		<?php echo $form->error($model,'bobot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_maks'); ?>
		<?php echo $form->textField($model,'nilai_maks', array('class' => 'form-control input')); ?>
		<?php echo $form->error($model,'nilai_maks'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo "<div class='form left'>" . CHtml::link('Back', array('/Komponen/listKomponen/' . $model->id_komponen), array('class' => 'btn btn-default')) . "</div>"; ?>