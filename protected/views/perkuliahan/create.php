<?php
/* @var $this PerkuliahanController */
/* @var $model Perkuliahan */

$this->breadcrumbs=array(
	'Perkuliahans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Perkuliahan', 'url'=>array('index')),
	array('label'=>'Manage Perkuliahan', 'url'=>array('admin')),
);
?>

<h1>Create Perkuliahan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>