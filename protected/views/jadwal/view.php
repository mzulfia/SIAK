<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	$model->id_jadwal,
);

$this->menu=array(
	array('label'=>'List Jadwal', 'url'=>array('index')),
	array('label'=>'Create Jadwal', 'url'=>array('create')),
	array('label'=>'Update Jadwal', 'url'=>array('update', 'id'=>$model->id_jadwal)),
	array('label'=>'Delete Jadwal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jadwal),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jadwal', 'url'=>array('admin')),
);
?>

<h1>View Jadwal #<?php echo $model->id_jadwal; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_jadwal',
		'waktu',
		'periode_awal',
		'periode_akhir',
		'id_mk',
		'id_ruang',
	),
)); ?>
