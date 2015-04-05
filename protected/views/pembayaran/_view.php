<?php
/* @var $this PembayaranController */
/* @var $data Pembayaran */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pembayaran')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pembayaran), array('view', 'id'=>$data->id_pembayaran)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nim')); ?>:</b>
	<?php echo CHtml::encode($data->nim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_awal')); ?>:</b>
	<?php echo CHtml::encode($data->periode_awal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_akhir')); ?>:</b>
	<?php echo CHtml::encode($data->periode_akhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>