<?php
/* @var $this PengajarMKController */
/* @var $data PengajarMK */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pengajar_mk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pengajar_mk), array('view', 'id'=>$data->id_pengajar_mk)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dosen')); ?>:</b>
	<?php echo CHtml::encode($data->id_dosen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mk')); ?>:</b>
	<?php echo CHtml::encode($data->id_mk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_koordinator')); ?>:</b>
	<?php echo CHtml::encode($data->status_koordinator); ?>
	<br />


</div>