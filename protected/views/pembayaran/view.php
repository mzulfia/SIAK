<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */
?>

<h2><strong>Lihat Pembayaran</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label'=>'Nama',
			'value'=> $model->idMhs->nama
		),
		'tahun_ajaran',
		'semester',
		'status',
	),
)); ?>
<?php $url = Yii::app()->request->baseUrl; ?>
<div class='operasi'>
	<a href='<?php echo $url ?>/Pembayaran/update/<?php echo $model->id_pembayaran ;?>' class="btn btn-warning">Edit</a>
</div>

