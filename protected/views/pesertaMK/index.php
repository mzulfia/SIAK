<?php
/* @var $this Peserta MKController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Daftar Kelases',
);

$this->menu=array(
	array('label'=>'Create Peserta MK', 'url'=>array('create')),
	array('label'=>'Manage Peserta MK', 'url'=>array('admin')),
);
?>

<h2><strong>Daftar Kelas</strong></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
