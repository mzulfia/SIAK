<?php
/* @var $this PengajarMKController */
/* @var $model PengajarMK */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pengajar_mk'); ?>
		<?php echo $form->textField($model,'id_pengajar_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_dosen'); ?>
		<?php echo $form->textField($model,'id_dosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_mk'); ?>
		<?php echo $form->textField($model,'id_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_koordinator'); ?>
		<?php echo $form->textField($model,'status_koordinator'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->