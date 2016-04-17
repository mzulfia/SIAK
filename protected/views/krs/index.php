<?php
/* @var $this KrsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Krs',
);

$this->menu=array(
	array('label'=>'Create Krs', 'url'=>array('create')),
	array('label'=>'Manage Krs', 'url'=>array('admin')),
);
?>

<h2><strong>KRS</strong></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
