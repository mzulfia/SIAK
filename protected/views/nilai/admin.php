<?php
/* @var $this NilaiController */
/* @var $model Nilai */

$this->menu=array(
	array('label'=>'List Nilai', 'url'=>array('index')),
	array('label'=>'Create Nilai', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#nilai-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><strong>Kelola Nilai</strong></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'nilai-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_nilai',
		'id_mhs',
		'id_jadwal',
		'id_komponen',
		'nilai_po',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
