<?php
/* @var $this peserta_mkKelasController */
/* @var $model peserta_mkKelas */

$this->menu=array(
	array('label'=>'List Peserta MK', 'url'=>array('index')),
	array('label'=>'Create Peserta MK', 'url'=>array('create')),
);
?>

<h2><strong>Kelola Peserta</strong></h2>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peserta-mk-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_peserta_mk',
		'id_mhs',
		'id_jadwal',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 

?>
