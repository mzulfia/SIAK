<?php
/* @var $this PengajarController */
/* @var $model Pengajar */

$this->breadcrumbs=array(
	'Pengajars'=>array('index'),
	$model->id_Pengajar=>array('view','id'=>$model->id_Pengajar),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pengajar', 'url'=>array('index')),
	array('label'=>'Create Pengajar', 'url'=>array('create')),
	array('label'=>'View Pengajar', 'url'=>array('view', 'id'=>$model->id_Pengajar)),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h2><strong>Perbaharui Pengajar</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>