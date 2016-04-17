<?php
/* @var $this KhsController */
/* @var $model Khs */

$this->menu=array(
	array('label'=>'List Khs', 'url'=>array('index')),
	array('label'=>'Create Khs', 'url'=>array('create')),
);

?>

<h2><strong>Kelola KHS</strong></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'khs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_khs',
		'id_mhs',
		'id_jadwal',
		'semester',
		'nilai_angka',
		'nilai_huruf',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

