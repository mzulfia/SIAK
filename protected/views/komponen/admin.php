<?php
/* @var $this KomponenController */
/* @var $model Komponen */

$this->menu=array(
	array('label'=>'List Komponen', 'url'=>array('index')),
	array('label'=>'Create Komponen', 'url'=>array('create')),
);
?>

<h1>Manage Komponens</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'komponen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_komponen',
		'id_jadwal',
		'nama',
		'bobot',
		'nilai_maks',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

