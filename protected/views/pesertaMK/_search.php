<?php
/* @var $this peserta_mkKelasController */
/* @var $model peserta_mkKelas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_peserta_mk'); ?>
		<?php echo $form->textField($model,'id_peserta_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_mhs'); ?>
		<?php echo $form->textField($model,'id_mhs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_jadwal'); ?>
		<?php echo $form->textField($model,'id_jadwal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->