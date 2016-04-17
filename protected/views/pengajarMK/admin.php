<?php
/* @var $this PengajarMKController */
/* @var $model PengajarMK */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pengajar-mk-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><strong>Kelola Pengajar</strong></h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengajar-mk-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'Nama Dosen',
			'value'=>'$data->idDosen->nama'
		),
		'id_dosen',
		'id_mk',
		'status_koordinator',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
