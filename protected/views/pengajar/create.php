<?php
/* @var $this PengajarController */
/* @var $model Pengajar */

$this->breadcrumbs=array(
	'Pengajars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pengajar', 'url'=>array('index')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h2><strong>Buat Pengajar</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>