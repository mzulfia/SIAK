<?php
/* @var $this SekretariatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sekretariats',
);

$this->menu=array(
	array('label'=>'Create Sekretariat', 'url'=>array('create')),
	array('label'=>'Manage Sekretariat', 'url'=>array('admin')),
);
?>

<h1>Sekretariats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
