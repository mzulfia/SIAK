<?php
/* @var $this peserta_mkKelasController */
/* @var $data peserta_mkKelas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_peserta_mk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_peserta_mk), array('view', 'id'=>$data->id_peserta_mk)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mhs')); ?>:</b>
	<?php echo CHtml::encode($data->id_mhs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::encode($data->id_jadwal); ?>
	<br />


</div>