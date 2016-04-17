<?php
/* @var $this Peserta MKController */
/* @var $model Peserta MK */

$this->breadcrumbs=array(
	'Daftar Kelases'=>array('index'),
	$model->id_daftar,
);

$this->menu=array(
	array('label'=>'List Peserta MK', 'url'=>array('index')),
	array('label'=>'Create Peserta MK', 'url'=>array('create')),
	array('label'=>'Update Peserta MK', 'url'=>array('update', 'id'=>$model->id_daftar)),
	array('label'=>'Delete Peserta MK', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_peserta_mk),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Peserta MK', 'url'=>array('admin')),
);
?>

<h2><strong>Lihat Peserta</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_peserta_mk',
		'id_mhs',
		'id_jadwal',
	),
)); ?>
