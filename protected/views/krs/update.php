<?php
/* @var $this KrsController */
/* @var $model Krs */

$this->menu=array(
	array('label'=>'List Krs', 'url'=>array('index')),
	array('label'=>'Create Krs', 'url'=>array('create')),
	array('label'=>'View Krs', 'url'=>array('view', 'id'=>$model->id_krs)),
	array('label'=>'Manage Krs', 'url'=>array('admin')),
);
?>

<h2><strong>Ubah KRS</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>