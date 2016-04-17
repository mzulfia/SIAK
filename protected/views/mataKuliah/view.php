<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

$this->breadcrumbs=array(
	'Mata Kuliah'=>array('index'),
	$model->id_mk,
);

?>

<h2><strong>Lihat Mata Kuliah</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_mk',
		'kode_mk',
		'nama_mk',
		'sks',
		'semester',
	),
)); ?>
<?php $url = Yii::app()->request->baseUrl; ?>
<div class='operasi'>
	<a href='<?php echo $url ?>/MataKuliah/update/<?php echo $model->id_mk ;?>' class="btn btn-warning">Edit</a>
</div>
