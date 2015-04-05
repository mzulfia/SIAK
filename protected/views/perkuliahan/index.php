<?php
/* @var $this PerkuliahanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Perkuliahans',
);

$this->menu=array(
	array('label'=>'Create Perkuliahan', 'url'=>array('create')),
	array('label'=>'Manage Perkuliahan', 'url'=>array('admin')),
);
?>

<h1>Perkuliahans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
