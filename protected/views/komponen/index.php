<?php
/* @var $this KomponenController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Create Komponen', 'url'=>array('create')),
	array('label'=>'Manage Komponen', 'url'=>array('admin')),
);
?>

<h1>Komponens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
