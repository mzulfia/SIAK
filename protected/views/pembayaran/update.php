<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */

$this->breadcrumbs=array(
	'Pembayarans'=>array('index'),
	$model->id_pembayaran=>array('view','id'=>$model->id_pembayaran),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pembayaran', 'url'=>array('index')),
	array('label'=>'Create Pembayaran', 'url'=>array('create')),
	array('label'=>'View Pembayaran', 'url'=>array('view', 'id'=>$model->id_pembayaran)),
	array('label'=>'Manage Pembayaran', 'url'=>array('admin')),
);
?>

<h1>Update Pembayaran <?php echo $model->id_pembayaran; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>