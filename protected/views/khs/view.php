<?php
/* @var $this KhsController */
/* @var $model Khs */


$this->menu=array(
	array('label'=>'List Khs', 'url'=>array('index')),
	array('label'=>'Create Khs', 'url'=>array('create')),
	array('label'=>'Update Khs', 'url'=>array('update', 'id'=>$model->id_khs)),
	array('label'=>'Delete Khs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_khs),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Khs', 'url'=>array('admin')),
);
?>

<h2><strong>Lihat KHS</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_khs',
		'id_mhs',
		'id_jadwal',
		'semester',
		'nilai_angka',
		'nilai_huruf',
	),
)); ?>

