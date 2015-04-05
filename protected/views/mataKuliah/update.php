<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliahs'=>array('index'),
	$model->id_mk=>array('view','id'=>$model->id_mk),
	'Update',
);

$this->menu=array(
	array('label'=>'List MataKuliah', 'url'=>array('index')),
	array('label'=>'Create MataKuliah', 'url'=>array('create')),
	array('label'=>'View MataKuliah', 'url'=>array('view', 'id'=>$model->id_mk)),
	array('label'=>'Manage MataKuliah', 'url'=>array('admin')),
);
?>

<h1>Update MataKuliah <?php echo $model->id_mk; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>