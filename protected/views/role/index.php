<?php
/* @var $this RoleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Roles',
);

$this->menu=array(
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'Manage Role', 'url'=>array('admin')),
);
?>

<h2><strong>Role</strong></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
