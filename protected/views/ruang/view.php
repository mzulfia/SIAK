<?php
/* @var $this RuangController */
/* @var $model Ruang */

$this->breadcrumbs=array(
	'Ruangs'=>array('index'),
	$model->id_ruang,
);

$this->menu=array(
	array('label'=>'List Ruang', 'url'=>array('index')),
	array('label'=>'Create Ruang', 'url'=>array('create')),
	array('label'=>'Update Ruang', 'url'=>array('update', 'id'=>$model->id_ruang)),
	array('label'=>'Delete Ruang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ruang),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ruang', 'url'=>array('admin')),
);
?>

<h1>View Ruang #<?php echo $model->id_ruang; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ruang',
		'no_ruang',
	),
)); ?>
