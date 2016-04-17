<?php
/* @var $this pengajarController */
/* @var $data pengajar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pengajar_kuliah')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pengajar_kuliah), array('view', 'id'=>$data->id_pengajar_kuliah)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dosen')); ?>:</b>
	<?php echo CHtml::encode($data->id_dosen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_ajaran')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_ajaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />


</div>