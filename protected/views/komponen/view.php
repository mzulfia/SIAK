<?php
/* @var $this KomponenController */
/* @var $model Komponen */

$this->breadcrumbs=array(
	'Komponens'=>array('index'),
	$model->id_komponen,
);

$this->menu=array(
	array('label'=>'List Komponen', 'url'=>array('index')),
	array('label'=>'Create Komponen', 'url'=>array('create')),
	array('label'=>'Update Komponen', 'url'=>array('update', 'id'=>$model->id_komponen)),
	array('label'=>'Delete Komponen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_komponen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Komponen', 'url'=>array('admin')),
);
?>

<h1>View Komponen #<?php echo $model->id_komponen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_komponen',
		'id_jadwal',
		'nama',
		'bobot',
		'nilai_maks',
	),
)); ?>
