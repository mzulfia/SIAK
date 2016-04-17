<?php
/* @var $this PengajarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengajars',
);

$this->menu=array(
	array('label'=>'Create Pengajar', 'url'=>array('create')),
	array('label'=>'Manage Pengajar', 'url'=>array('admin')),
);
?>

<h2><strong>Pengajar</strong></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
