<?php
/* @var $this SekretariatController */
/* @var $data Sekretariat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip_sekretariat')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nip_sekretariat), array('view', 'id'=>$data->nip_sekretariat)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />


</div>