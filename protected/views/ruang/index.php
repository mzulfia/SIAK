<?php
/* @var $this RuangController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ruangs',
);

$this->menu=array(
	array('label'=>'Create Ruang', 'url'=>array('create')),
	array('label'=>'Manage Ruang', 'url'=>array('admin')),
);
?>

<h1>Ruangs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
