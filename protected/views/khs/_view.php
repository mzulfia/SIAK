<?php
/* @var $this KhsController */
/* @var $data Khs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_khs')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_khs), array('view', 'id'=>$data->id_khs)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_angka')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_angka); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_huruf')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_huruf); ?>
	<br />


</div>