<?php
/* @var $this KomponenController */
/* @var $model Komponen */

$this->menu=array(
	array('label'=>'List Komponen', 'url'=>array('index')),
	array('label'=>'Manage Komponen', 'url'=>array('admin')),
);
?>

<h1>Create Komponen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>