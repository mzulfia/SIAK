<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Role', 'url'=>array('index')),
	array('label'=>'Manage Role', 'url'=>array('admin')),
);
?>

<h2><strong>Buat Role</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>