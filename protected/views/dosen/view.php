<?php
/* @var $this DosenController */
/* @var $model Dosen */

$this->breadcrumbs=array(
	'Dosens'=>array('index'),
	$model->nip_dosen,
);

$this->menu=array(
	array('label'=>'Update Dosen', 'url'=>array('update', 'id'=>$model->nip_dosen)),
);
?>

<h1>View Dosen #<?php echo $model->nip_dosen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nip_dosen',
		'nama',
		'status_pembimbing',
		'id_user',
	),
)); ?>
