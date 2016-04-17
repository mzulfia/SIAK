<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<div class="username">
		<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
		<?php echo CHtml::encode($data->username); ?>
		<br />
	</div>
	<div class="role">
		<b><?php echo CHtml::encode($data->getAttributeLabel('id_role')); ?>:</b>
		<?php echo CHtml::encode($data->id_role); ?>
		<br />
	</div>

</div>