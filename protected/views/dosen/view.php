<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosens'=>array('index'),
	$model->id_dosen,
);

$this->menu=array(
	array('label'=>'List Dosen', 'url'=>array('index')),
	array('label'=>'Create Dosen', 'url'=>array('create')),
	array('label'=>'Update Dosen', 'url'=>array('update', 'id'=>$model->id_dosen)),
	array('label'=>'Delete Dosen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dosen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dosen', 'url'=>array('admin')),
);
?>

<h1>View Dosen #<?php echo $model->id_dosen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dosen',
		'nip',
		'nama',
		'id_user',
	),
)); ?>
