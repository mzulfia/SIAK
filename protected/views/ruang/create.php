<?php
/* @var $this RuangController */
/* @var $model Ruang */

$this->breadcrumbs=array(
	'Ruangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ruang', 'url'=>array('index')),
	array('label'=>'Manage Ruang', 'url'=>array('admin')),
);
?>

<h1>Create Ruang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>