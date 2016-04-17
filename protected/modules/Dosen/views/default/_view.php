<?php
/* @var $this DosenController */
/* @var $data Dosen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip_dosen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nip_dosen), array('view', 'id'=>$data->id_dosen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />
</div>