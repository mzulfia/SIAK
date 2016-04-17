<?php
/* @var $this PengajarMKController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengajar Mks',
);

$this->menu=array(
	array('label'=>'Create PengajarMK', 'url'=>array('create')),
	array('label'=>'Manage PengajarMK', 'url'=>array('admin')),
);
?>

<h1>Pengajar Mks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
