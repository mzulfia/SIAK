<?php
/* @var $this Peserta MKController */
/* @var $model Peserta MK */

$this->breadcrumbs=array(
	'Daftar Kelases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Peserta MK', 'url'=>array('index')),
	array('label'=>'Manage Peserta MK', 'url'=>array('admin')),
);
?>

<h2><strong>Buat Peserta</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>