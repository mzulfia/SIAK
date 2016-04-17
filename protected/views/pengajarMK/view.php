<?php
/* @var $this PengajarMKController */
/* @var $model PengajarMK */

$this->breadcrumbs=array(
	'Pengajar Mks'=>array('index'),
	$model->id_pengajar_mk,
);

$this->menu=array(
	array('label'=>'List PengajarMK', 'url'=>array('index')),
	array('label'=>'Create PengajarMK', 'url'=>array('create')),
	array('label'=>'Update PengajarMK', 'url'=>array('update', 'id'=>$model->id_pengajar_mk)),
	array('label'=>'Delete PengajarMK', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pengajar_mk),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PengajarMK', 'url'=>array('admin')),
);
?>

<h1>View PengajarMK #<?php echo $model->id_pengajar_mk; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pengajar_mk',
		'id_dosen',
		'id_mk',
		'status_koordinator',
	),
)); ?>
