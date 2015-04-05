<?php
/* @var $this AdminController */
/* @var $data Admin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nip), array('view', 'id'=>$data->nip)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />


</div>