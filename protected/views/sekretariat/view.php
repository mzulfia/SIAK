<?php
/* @var $this SekretariatController */
/* @var $model Sekretariat */

$this->breadcrumbs=array(
	'Sekretariats'=>array('index'),
	$model->nip_sekretariat,
);

$this->menu=array(
	array('label'=>'List Sekretariat', 'url'=>array('index')),
	array('label'=>'Create Sekretariat', 'url'=>array('create')),
	array('label'=>'Update Sekretariat', 'url'=>array('update', 'id'=>$model->nip_sekretariat)),
	array('label'=>'Delete Sekretariat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nip_sekretariat),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sekretariat', 'url'=>array('admin')),
);
?>

<h1>View Sekretariat #<?php echo $model->nip_sekretariat; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nip_sekretariat',
		'nama',
		'id_user',
	),
)); ?>
