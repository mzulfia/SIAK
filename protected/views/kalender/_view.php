<?php
/* @var $this KalenderController */
/* @var $data Kalender */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kalender')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kalender), array('view', 'id'=>$data->id_kalender)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_ajaran')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_ajaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_event')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_event); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_awal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_awal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_akhir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_akhir); ?>
	<br />


</div>