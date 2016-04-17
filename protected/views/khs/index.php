<?php
/* @var $this KhsController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Create Khs', 'url'=>array('create')),
	array('label'=>'Manage Khs', 'url'=>array('admin')),
);
?>

<h2><strong>KHS</strong></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
