<?php
/* @var $this NilaiController */
/* @var $data Nilai */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nilai')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nilai), array('view', 'id'=>$data->id_nilai)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mhs')); ?>:</b>
	<?php echo CHtml::encode($data->id_mhs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::encode($data->id_jadwal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_komponen')); ?>:</b>
	<?php echo CHtml::encode($data->id_komponen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_po')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_po); ?>
	<br />


</div>