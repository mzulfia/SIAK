<?php
/* @var $this NilaiController */
/* @var $model Nilai */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_nilai'); ?>
		<?php echo $form->textField($model,'id_nilai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_mhs'); ?>
		<?php echo $form->textField($model,'id_mhs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_jadwal'); ?>
		<?php echo $form->textField($model,'id_jadwal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_komponen'); ?>
		<?php echo $form->textField($model,'id_komponen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nilai_po'); ?>
		<?php echo $form->textField($model,'nilai_po'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->