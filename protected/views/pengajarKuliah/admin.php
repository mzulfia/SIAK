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
			'value' => '$data',
			'htmlOptions'=>array('width'=>'150px'),
		), 
		array(
			'header' => 'Waktu',
        	'type' => 'raw',
        	'value' => '(empty($data->idJadwal->hari_1) ? "" : ($data->idJadwal->hari_1 . ", ")) . (($data->idJadwal->waktu_awal_1 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_1)) . "-") . (($data->idJadwal->waktu_akhir_1 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_1)) . "<br>")) . (empty($data->idJadwal->hari_2) ? "" : ($data->idJadwal->hari_2 . ", ")) . (($data->idJadwal->waktu_awal_2 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_2)) . "-") . (($data->idJadwal->waktu_akhir_2 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_2)) . "<br>")) . (empty($data->idJadwal->hari_3) ? "" : ($data->idJadwal->hari_3 . ", ")) . (($data->idJadwal->waktu_awal_3 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_3)) . "-") . (($data->idJadwal->waktu_akhir_3 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_3)) . "<br>")) . (empty($data->idJadwal->hari_4) ? "" : ($data->idJadwal->hari_4 . ", ")) . (($data->idJadwal->waktu_awal_4 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_4)) . "-") . (($data->idJadwal->waktu_akhir_4 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_4)) . "<br>"))', 
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
			'type' => 'raw',
			'value' => '(empty($data->idJadwal->id_ruang_1) ? "" : $data->idJadwal->idRuang1->no_ruang) . (empty($data->idJadwal->id_ruang_2) ? "" : "<br>" . $data->idJadwal->idRuang2->no_ruang) . (empty($data->idJadwal->id_ruang_3) ? "" : "<br>" . $data->idJadwal->idRuang3->no_ruang) . (empty($data->idJadwal->id_ruang_4) ? "" : "<br>" . $data->idJadwal->idRuang4->no_ruang)',
		),	
		array(
			'header' => 'Pengajar',
			'type' => 'raw',
			'value' => 'PengajarMK::model()->getPengajarMK($data->idJadwal->id_mk)'
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}',
			'buttons' => array(
				'update' => array(
					'label' => 'Edit Pengajar',
					'url' => 'Yii::app()->createUrl("PengajarKuliah/addPengajarKuliah", array("id" => $data->id_jadwal))',
				),
			),
		),
	),
)); ?>


