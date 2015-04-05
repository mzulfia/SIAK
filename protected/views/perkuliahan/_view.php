<?php
/* @var $this PerkuliahanController */
/* @var $data Perkuliahan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_perkuliahan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_perkuliahan), array('view', 'id'=>$data->id_perkuliahan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mk')); ?>:</b>
	<?php echo CHtml::encode($data->id_mk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nim')); ?>:</b>
	<?php echo CHtml::encode($data->nim); ?>
	<br />


</div>