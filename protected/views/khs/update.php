<?php
/* @var $this KhsController */
/* @var $model Khs */

$this->menu=array(
	array('label'=>'List Khs', 'url'=>array('index')),
	array('label'=>'Create Khs', 'url'=>array('create')),
	array('label'=>'View Khs', 'url'=>array('view', 'id'=>$model->id_khs)),
	array('label'=>'Manage Khs', 'url'=>array('admin')),
);
?>

<h2><strong>Perbaharui KHS</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>