<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan <span class="required">*</span> harus diisi.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20, 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<span class='colon'>:</span>
		<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>50, 'placeholder' => 'Minimal 6 karakter', 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'confirmation_password'); ?>
		<span class='colon'>:</span>
		<?php echo $form->passwordField($model,'confirmation_password',array('size'=>20,'maxlength'=>50, 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'confirmation_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_role'); ?>
		<span class='colon'>:</span>
		<?php
			if(Yii::app()->user->isAdmin())
			{
				echo $form->dropDownList($model, 'id_role', $model->getRoleOption(), array('empty' => '-Pilih Role-','class'=>'form-control input'));
			}
		?>
		<?php echo $form->error($model,'id_role'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
<?php echo "<div class='form left'><br>" . CHtml::link('Back', array('/User/admin'), array('class' => 'btn btn-default')) . "</div>";  ?>