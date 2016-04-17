<?php
/* @var $this pengajarController */
/* @var $data pengajar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pengajar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pengajar), array('view', 'id'=>$data->id_pengajar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minggu')); ?>:</b>
	<?php echo CHtml::encode($data->minggu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mk')); ?>:</b>
	<?php echo CHtml::encode($data->id_mk); ?>
	<br />


</div>