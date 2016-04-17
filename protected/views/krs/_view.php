<?php
/* @var $this KrsController */
/* @var $data Krs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_krs')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_krs), array('view', 'id'=>$data->id_krs)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mhs')); ?>:</b>
	<?php echo CHtml::encode($data->id_mhs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::encode($data->id_jadwal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />


</div>