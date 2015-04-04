<?php
/* @var $this RuangController */
/* @var $model Ruang */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_ruang'); ?>
		<?php echo $form->textField($model,'id_ruang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_ruang'); ?>
		<?php echo $form->textField($model,'no_ruang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->