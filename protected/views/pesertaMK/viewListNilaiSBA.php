<h2><strong>Daftar Nilai</strong></h2>
<?php 

	$sql = 'SELECT nama_mk, kelas, tahun_ajaran, j.semester FROM mata_kuliah m, jadwal j WHERE m.id_mk = j.id_mk AND id_jadwal = :id';
	$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id_jadwal));
	$nama_kelas = $result[0]['nama_mk'] . "-" . $result[0]['kelas'];
	$periode = $result[0]['tahun_ajaran'] . " " . $result[0]['semester'];
	$nama_pengajar = PengajarKuliah::model()->getPengajarKuliah($id_jadwal);
	$nama_koordinator = '';

	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'listNilai-grid',
	'dataProvider'=>$model->searchListMhs($id_jadwal),
	'columns'=>array(
		array(
			'header'=>'No.',
	        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
			'htmlOptions' => array('width'=>'25px'),
		),
		array(
			'header' => 'NIM',
			'value' => '$data->idMhs->nim'
		),
		array(
			'header' => 'Nama',
			'value' => '$data->idMhs->nama'
		),
		array(
			'header' => 'Nilai Komponen',
			'type' => 'raw',
			'value' => 'Komponen::model()->getListKomponen($data->id_mhs, $data->id_jadwal)'
		),
		array(
			'header' => 'Nilai Akhir',
			'type' => 'raw',
			'value' => 'Khs::model()->getNilaiAngka($data->id_mhs, $data->id_jadwal)'
		),
		array(
			'header' => 'Nilai Huruf',
			'type' => 'raw',
			'value' => 'Khs::model()->getNilaiHuruf($data->id_mhs, $data->id_jadwal)'
		),

	),
)); 

?>

<?php
 $this->widget('application.components.tlbExcelView', array(
                'id'                   => 'listNilai-grid',
                'dataProvider'         => $model->searchListMhs($id_jadwal),
                // 'filter'               => $model,
                'grid_mode'            => $production, // Same usage as EExcelView v0.33
                'template'           => "{exportbuttons}",
                'title'                => 'Daftar Nilai ' . $nama_kelas . " " . $periode,
                'creator'              => 'Akademi Keperawatan Islamic Village',
                'lastModifiedBy'       => 'Akademi Keperawatan Islamic Village',
                'sheetTitle'           => date('d-m-Y'),
                'keywords'             => '',
                'category'             => '',
                'landscapeDisplay'     => true, // Default: false
                'A4'                   => true, // Default: false - ie : Letter (PHPExcel default)
                'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
                'automaticSum'         => false, // Default: false
                'decimalSeparator'     => ',', // Default: '.'
                'thousandsSeparator'   => '.', // Default: ','
                //'displayZeros'       => false,
                //'zeroPlaceholder'    => '-',
                'sumLabel'             => 'Column totals:', // Default: 'Totals'
                'borderColor'          => '000000', // Default: '000000'
                'bgColor'              => 'FFFFFF', // Default: 'FFFFFF'
                'textColor'            => '000000', // Default: '000000'
                'rowHeight'            => 45, // Default: 15
                'headerBorderColor'    => '000000', // Default: '000000'
                'headerBgColor'        => 'CCCCCC', // Default: 'CCCCCC'
                'headerTextColor'      => '000000', // Default: '000000'
                'headerHeight'         => 10, // Default: 20
                'footerBorderColor'    => '000000', // Default: '000000'
                'footerBgColor'        => 'FFFFCC', // Default: 'FFFFCC'
                'footerTextColor'      => '0000FF', // Default: '0000FF'
                'footerHeight'         => 50, // Default: 20
                'columns'			   =>array(
				array(
					'header' => 'NIM',
					'value' => '$data->idMhs->nim'
				),
				array(
					'header' => 'Nama',
					'value' => '$data->idMhs->nama'
				),
				array(
					'header' => 'Nilai Komponen',
					'type' => 'raw',
					'value' => 'Komponen::model()->getListKomponen($data->id_mhs, $data->id_jadwal)'
				),
				array(
					'header' => 'Nilai Akhir',
					'type' => 'raw',
					'value' => 'Khs::model()->getNilaiAngka($data->id_mhs, $data->id_jadwal)'
				),
				array(
					'header' => 'Nilai Huruf',
					'type' => 'raw',
					'value' => 'Khs::model()->getNilaiHuruf($data->id_mhs, $data->id_jadwal)'
				),
			), // an array of your CGridColumns
        )); 

	echo "<div class='form left'>" . CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class' => 'btn btn-default')) . "</div>";  
?>