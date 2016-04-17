<?php
/* @var $this PengajarMKController */
/* @var $model PengajarMK */

$this->breadcrumbs=array(
	'Pengajar Mks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PengajarMK', 'url'=>array('index')),
	array('label'=>'Manage PengajarMK', 'url'=>array('admin')),
);
?>

<h1>Create PengajarMK</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>