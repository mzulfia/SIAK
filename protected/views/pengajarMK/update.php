<?php
/* @var $this PengajarMKController */
/* @var $model PengajarMK */

$this->breadcrumbs=array(
	'Pengajar Mks'=>array('index'),
	$model->id_pengajar_mk=>array('view','id'=>$model->id_pengajar_mk),
	'Update',
);

$this->menu=array(
	array('label'=>'List PengajarMK', 'url'=>array('index')),
	array('label'=>'Create PengajarMK', 'url'=>array('create')),
	array('label'=>'View PengajarMK', 'url'=>array('view', 'id'=>$model->id_pengajar_mk)),
	array('label'=>'Manage PengajarMK', 'url'=>array('admin')),
);
?>

<h1>Update PengajarMK <?php echo $model->id_pengajar_mk; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>