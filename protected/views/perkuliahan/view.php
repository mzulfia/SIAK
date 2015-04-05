<?php
/* @var $this PerkuliahanController */
/* @var $model Perkuliahan */

$this->breadcrumbs=array(
	'Perkuliahans'=>array('index'),
	$model->id_perkuliahan,
);

$this->menu=array(
	array('label'=>'List Perkuliahan', 'url'=>array('index')),
	array('label'=>'Create Perkuliahan', 'url'=>array('create')),
	array('label'=>'Update Perkuliahan', 'url'=>array('update', 'id'=>$model->id_perkuliahan)),
	array('label'=>'Delete Perkuliahan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_perkuliahan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Perkuliahan', 'url'=>array('admin')),
);
?>

<h1>View Perkuliahan #<?php echo $model->id_perkuliahan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_perkuliahan',
		'id_mk',
		'nim',
	),
)); ?>
