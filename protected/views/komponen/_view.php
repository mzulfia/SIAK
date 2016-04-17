<?php
/* @var $this KomponenController */
/* @var $data Komponen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_komponen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_komponen), array('view', 'id'=>$data->id_komponen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::encode($data->id_jadwal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bobot')); ?>:</b>
	<?php echo CHtml::encode($data->bobot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_maks')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_maks); ?>
	<br />


</div>