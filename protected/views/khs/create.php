<?php
/* @var $this KhsController */
/* @var $model Khs */

$this->menu=array(
	array('label'=>'List Khs', 'url'=>array('index')),
	array('label'=>'Manage Khs', 'url'=>array('admin')),
);
?>

<h2><strong>Buat KHS</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>