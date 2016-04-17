<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
?>

<h2><strong>Jadwal Kuliah</strong></h2>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jadwal-grid',
	'dataProvider'=>$model->searchJadwal($id, $sms),
	'columns'=>array(
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
		array(
			'header' => 'Periode',
			'type' => 'raw',
			'value' => '$data->idJadwal->tahun_ajaran . " " . $data->idJadwal->semester',
			'htmlOptions'=>array('width'=>'700px'),
		), 
        array(
        	'header' => 'Waktu',
        	'type' => 'raw',
        	'value' => '(empty($data->idJadwal->hari_1) ? "" : ($data->idJadwal->hari_1 . ", ")) . (($data->idJadwal->waktu_awal_1 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_1)) . "-") . (($data->idJadwal->waktu_akhir_1 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_1)) . "<br>")) . (empty($data->idJadwal->hari_2) ? "" : ($data->idJadwal->hari_2 . ", ")) . (($data->idJadwal->waktu_awal_2 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_2)) . "-") . (($data->idJadwal->waktu_akhir_2 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_2)) . "<br>")) . (empty($data->idJadwal->hari_3) ? "" : ($data->idJadwal->hari_3 . ", ")) . (($data->idJadwal->waktu_awal_3 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_3)) . "-") . (($data->idJadwal->waktu_akhir_3 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_3)) . "<br>")) . (empty($data->idJadwal->hari_4) ? "" : ($data->idJadwal->hari_4 . ", ")) . (($data->idJadwal->waktu_awal_4 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_4)) . "-") . (($data->idJadwal->waktu_akhir_4 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_4)) . "<br>"))', 
        	'htmlOptions'=>array('width'=>'700px'),
        ),
      	array(
			'header' => 'Mata Kuliah',
			'value' => '$data->idJadwal->idMk->nama_mk',
			'htmlOptions'=>array('width'=>'400px'),
		),
		array(
        	'header' => 'Kelas',
        	'value' => '$data->idJadwal->kelas'
        ),
        array(
        	'header' => 'Pengajar',
        	'type' => 'raw',
        	'value' => 'empty($data->id_jadwal) ? "" : PengajarKuliah::model()->getPengajarKuliah($data->id_jadwal)',
        	'htmlOptions'=>array('width'=>'300px'),
        ),
        array(
			'name' => 'Ruang',
			'type' => 'raw',
			'value' => '(empty($data->idJadwal->id_ruang_1) ? "" : $data->idJadwal->idRuang1->no_ruang) . (empty($data->idJadwal->id_ruang_2) ? "" : "<br>" . $data->idJadwal->idRuang2->no_ruang) . (empty($data->idJadwal->id_ruang_3) ? "" : "<br>" . $data->idJadwal->idRuang3->no_ruang) . (empty($data->idJadwal->id_ruang_4) ? "" : "<br>" . $data->idJadwal->idRuang4->no_ruang)',
		),
		// array(
		// 	'class'=>'CButtonColumn',
		// ),
	),
)); ?>