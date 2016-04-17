<?php
/* @var $this KrsController */
/* @var $model Krs */

$this->breadcrumbs=array(
	'Krs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Krs', 'url'=>array('index')),
	array('label'=>'Manage Krs', 'url'=>array('admin')),
);
?>

<h2><strong>Buat KRS</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>