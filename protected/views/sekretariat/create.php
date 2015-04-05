<?php
/* @var $this SekretariatController */
/* @var $model Sekretariat */

$this->breadcrumbs=array(
	'Sekretariats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sekretariat', 'url'=>array('index')),
	array('label'=>'Manage Sekretariat', 'url'=>array('admin')),
);
?>

<h1>Create Sekretariat</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>