<?php
/* @var $this NilaiController */
/* @var $model Nilai */

$this->breadcrumbs=array(
	'Nilais'=>array('index'),
	$model->id_nilai,
);

$this->menu=array(
	array('label'=>'List Nilai', 'url'=>array('index')),
	array('label'=>'Create Nilai', 'url'=>array('create')),
	array('label'=>'Update Nilai', 'url'=>array('update', 'id'=>$model->id_nilai)),
	array('label'=>'Delete Nilai', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nilai),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nilai', 'url'=>array('admin')),
);
?>

<h1>View Nilai #<?php echo $model->id_nilai; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_nilai',
		'id_mhs',
		'id_jadwal',
		'id_komponen',
		'nilai_po',
	),
)); ?>
