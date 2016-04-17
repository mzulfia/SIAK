<?php
/* @var $this KrsController */
/* @var $model Krs */

$this->breadcrumbs=array(
	'Krs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Krs', 'url'=>array('index')),
	array('label'=>'Create Krs', 'url'=>array('create')),
);

?>

<h2><strong>Kelola KRS</strong></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'krs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_krs',
		'id_mhs',
		'id_jadwal',
		'semester',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

