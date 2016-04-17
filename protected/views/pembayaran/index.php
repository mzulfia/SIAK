<?php
/* @var $this PembayaranController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Create Pembayaran', 'url'=>array('create')),
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h2><strong>Pembayaran</strong></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
