<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pembayaran'); ?>
		<?php echo $form->textField($model,'id_pembayaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nim'); ?>
		<?php echo $form->textField($model,'nim'); ?>
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
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->