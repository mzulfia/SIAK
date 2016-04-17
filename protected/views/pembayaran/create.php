<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */

$this->menu=array(
	array('label'=>'List Pembayaran', 'url'=>array('index')),
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h2><strong>Buat Pembayaran</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>