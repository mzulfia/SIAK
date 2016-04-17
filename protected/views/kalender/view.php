<?php
/* @var $this KalenderController */
/* @var $model Kalender */

?>

<h2><strong>Lihat Kalender</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tahun_ajaran',
		'jenis_event',
		'keterangan',
		'tanggal_awal',
		'tanggal_akhir',
	),
)); ?>
<?php $url = Yii::app()->request->baseUrl; ?>
<div class='operasi'>
	<a href='<?php echo $url ?>/Kalender/update/<?php echo $model->id_kalender ;?>' class="btn btn-warning">Edit</a>
</div>