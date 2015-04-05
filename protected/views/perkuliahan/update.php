<?php
/* @var $this PerkuliahanController */
/* @var $model Perkuliahan */

$this->breadcrumbs=array(
	'Perkuliahans'=>array('index'),
	$model->id_perkuliahan=>array('view','id'=>$model->id_perkuliahan),
	'Update',
);

$this->menu=array(
	array('label'=>'List Perkuliahan', 'url'=>array('index')),
	array('label'=>'Create Perkuliahan', 'url'=>array('create')),
	array('label'=>'View Perkuliahan', 'url'=>array('view', 'id'=>$model->id_perkuliahan)),
	array('label'=>'Manage Perkuliahan', 'url'=>array('admin')),
);
?>

<h1>Update Perkuliahan <?php echo $model->id_perkuliahan; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>