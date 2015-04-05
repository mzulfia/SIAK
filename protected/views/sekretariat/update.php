<?php
/* @var $this SekretariatController */
/* @var $model Sekretariat */

$this->breadcrumbs=array(
	'Sekretariats'=>array('index'),
	$model->nip_sekretariat=>array('view','id'=>$model->nip_sekretariat),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sekretariat', 'url'=>array('index')),
	array('label'=>'Create Sekretariat', 'url'=>array('create')),
	array('label'=>'View Sekretariat', 'url'=>array('view', 'id'=>$model->nip_sekretariat)),
	array('label'=>'Manage Sekretariat', 'url'=>array('admin')),
);
?>

<h1>Update Sekretariat <?php echo $model->nip_sekretariat; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>