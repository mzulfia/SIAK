<?php
/* @var $this KrsController */
/* @var $model Krs */

$this->menu=array(
	array('label'=>'List Krs', 'url'=>array('index')),
	array('label'=>'Create Krs', 'url'=>array('create')),
	array('label'=>'Update Krs', 'url'=>array('update', 'id'=>$model->id_krs)),
	array('label'=>'Delete Krs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_krs),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Krs', 'url'=>array('admin')),
);
?>

<h2><strong>Lihat KRS</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_krs',
		'id_mhs',
		'id_jadwal',
		'semester',
	),
)); ?>
