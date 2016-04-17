<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */
/* @var $form CActiveForm */
?>

<div class="form left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pembayaran-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_ajaran'); ?>
		<span class='colon'>:</span>
		<?php echo $form->dropDownList($model, 'tahun_ajaran', CHtml::listData(Kalender::model()->findAll(), 'tahun_ajaran', 'tahun_ajaran'), array('empty' => '-Pilih Tahun-', 'class' => 'form-control input'))?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<span class='colon'>:</span>
		<?php echo $form->dropDownList($model, 'semester', CHtml::listData(Kalender::model()->findAll(), 'semester', 'semester'), array('empty' => '-Pilih Tahun-', 'class' => 'form-control input'))?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pembayaran'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'pembayaran', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'pembayaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tagihan'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'tagihan', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<span class='colon'>:</span>
		<?php echo $model->status; ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
