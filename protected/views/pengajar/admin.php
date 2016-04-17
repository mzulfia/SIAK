<?php
/* @var $this pengajarController */
/* @var $model pengajar */
?>

<h2><strong>Kelola Pengajar</strong></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengajar-grid',
	'dataProvider'=>$model->searchJadwalSBA($awal, $akhir),
	'columns'=>array(
		array(
			'header' => 'Periode',
			'value' => 'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->idJadwal->tanggal_awal)) . " - " . Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->idJadwal->tanggal_akhir))',
			'htmlOptions'=>array('width'=>'150px'),
		), 
		array(
			'header' => 'Waktu',
			'value' => '$data->idJadwal->hari_1 . ", " . $data->idJadwal->waktu_awal_1 . "-" . $data->idJadwal->waktu_akhir_1', 
			'htmlOptions'=>array('width'=>'150px'),
		),
		array(
			'header' => 'Mata Kuliah',
			'value' => '$data->idJadwal->idMk->nama_mk',
		),
		array(
			'header' => 'Kelas',
			'value' => '$data->idJadwal->kelas',
		),
		array(
			'name' => 'Ruang',
			'value' => '(empty($data->idJadwal->id_ruang_1) ? "" : $data->idJadwal->idRuang1->no_ruang) . (empty($data->idJadwal->id_ruang_2) ? "" : "<br>" . $data->idJadwal->idRuang2->no_ruang) . (empty($data->idJadwal->id_ruang_3) ? "" : "<br>" . $data->idJadwal->idRuang3->no_ruang) . (empty($data->idJadwal->id_ruang_4) ? "" : "<br>" . $data->idJadwal->idRuang4->no_ruang)',
		),	
		array(
			'header' => 'Pengajar',
			'type' => 'raw',
			'value' => 'Pengajar::model()->getPengajar(4)'
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}',
			'buttons' => array(
				'update' => array(
					'label' => 'Edit Pengajar',
					'url' => 'Yii::app()->createUrl("pengajar/addPengajar", array("id" => $data->id_jadwal))',
				),
			),
		),
	),
)); ?>


