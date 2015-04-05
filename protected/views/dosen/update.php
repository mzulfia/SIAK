<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosens'=>array('index'),
	$model->nip_dosen=>array('view','id'=>$model->nip_dosen),
	'Update',
);

$this->menu=array(
	array('label'=>'View Dosen', 'url'=>array('view', 'id'=>$model->nip_dosen)),
);
?>

<h1>Update Dosen <?php echo $model->nip_dosen; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>