<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_jadwal'); ?>
		<?php echo $form->textField($model,'id_jadwal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waktu'); ?>
		<?php echo $form->textField($model,'waktu',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periode_awal'); ?>
		<?php echo $form->textField($model,'periode_awal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periode_akhir'); ?>
		<?php echo $form->textField($model,'periode_akhir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_mk'); ?>
		<?php echo $form->textField($model,'id_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_ruang'); ?>
		<?php echo $form->textField($model,'id_ruang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->