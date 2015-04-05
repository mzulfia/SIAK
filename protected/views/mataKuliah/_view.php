<?php
/* @var $this MataKuliahController */
/* @var $data MataKuliah */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mk), array('view', 'id'=>$data->id_mk)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_mk')); ?>:</b>
	<?php echo CHtml::encode($data->kode_mk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_mk')); ?>:</b>
	<?php echo CHtml::encode($data->nama_mk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sks')); ?>:</b>
	<?php echo CHtml::encode($data->sks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kapasitas')); ?>:</b>
	<?php echo CHtml::encode($data->kapasitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dosen')); ?>:</b>
	<?php echo CHtml::encode($data->id_dosen); ?>
	<br />


</div>