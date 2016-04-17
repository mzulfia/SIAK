<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

?>


<h2><strong>Lihat Jadwal</strong></h2>

<?php
 $mk = $model->idMk->nama_mk;
 $ruang = (empty($model->id_ruang_1) ? "" : $model->idRuang1->no_ruang) . (empty($model->id_ruang_2) ? "" : "<br>" . $model->idRuang2->no_ruang) . (empty($model->id_ruang_3) ? "" : "<br>" . $model->idRuang3->no_ruang) . (empty($model->id_ruang_4) ? "" : "<br>" . $model->idRuang4->no_ruang);

 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tahun_ajaran',
		'semester',
		'hari_1',
		'waktu_awal_1',
		'waktu_akhir_1',
		'hari_2',
		'waktu_awal_2',
		'waktu_akhir_2',
		'hari_3',
		'waktu_awal_3',
		'waktu_akhir_3',
		'hari_4',
		'waktu_awal_4',
		'waktu_akhir_4',
		array(
			'label' => 'Mata Kuliah',
			'value' => $mk,
		),
		'kelas',
		'kapasitas',
		array(
			'label' => 'Ruangan',
			'value' => str_replace("<br>", ", " , $ruang),
		),
	),
)); ?>

<?php $url = Yii::app()->request->baseUrl; ?>
<div class='operasi'>
	<a href='<?php echo $url ?>/Jadwal/update/<?php echo $model->id_jadwal ;?>' class="btn btn-warning">Edit</a>
</div>