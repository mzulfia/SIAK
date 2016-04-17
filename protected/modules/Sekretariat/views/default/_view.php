<?php
/* @var $this SekretariatController */
/* @var $data Sekretariat */
?>

<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('nip_sekretariat')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nip_sekretariat), array('view', 'id'=>$data->id_sekretariat)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />
</div>