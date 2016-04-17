<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
?>

<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>

<?php $url = Yii::app()->request->baseUrl; 
	$id= Mahasiswa::model()->getId(Yii::app()->user->getId());
?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url.'/Krs/viewKrs/'. $id ?>">Lihat KRS</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url.'/Krs/createKrs/'?>">Isi KRS</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h1><strong>Isi KRS</strong></h1>


<div class="alert-success" id='success'>
          <?php echo "<h4 style= 'color: #00923f'> Berhasil disimpan! </h4>"; ?>
</div>
<div class="alert-danger" id='danger'>
          <?php echo "<h4 style= 'color: red'> Gagal disimpan! </h4>"; ?>
</div>
<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>


<?php 
	$today = date('Y-m-d');
	$year = Kalender::model()->getLastYear();
	$term = Kalender::model()->getLastTerm();

	$q1 = 'SELECT tanggal_awal, tanggal_akhir FROM kalender WHERE jenis_event = "Masa Perkuliahan" ORDER BY id_kalender DESC LIMIT 1';
	$arr = Yii::app()->db->createCommand($q1)->queryAll();
		
	// if(($today >= $awal && $today <= $akhir) AND Mahasiswa::model()->getStatusAkademis($mhs) == 'Aktif') 
	// {
	if(Mahasiswa::model()->getStatusAkademis(Mahasiswa::getId(Yii::app()->user->getId())) == 'Aktif')
	{
		$form=$this->beginWidget('CActiveForm', array(
		'id'=>'createKrs-form',
		'enableAjaxValidation'=>true,
		)); 
 
		$result[] = '0';
		$mhs = Mahasiswa::getId(Yii::app()->user->getId());
		$arr = Krs::model()->findAllByAttributes(array('id_mhs' => $mhs, 'tahun_ajaran' => $year, 'term' => $term));
		
		foreach($arr as $ar)
		{
			$result[] = $ar['id_jadwal'];
		}
		

		$bool = (Mahasiswa::model()->getStatus($mhs) != "Disetujui");
		$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'createKrs-grid',
		'dataProvider'=>$model->searchMK(Mahasiswa::model()->getSms($mhs)),
		'columns'=>array(
			array(
				'id'=>'autoId',
				'class'=>'CCheckBoxColumn',
	            'selectableRows' => 10,
	            'value' => '$data->id_jadwal',
	            'disabled' => function ($data) use ($result) {
	             	return in_array($data->id_jadwal, $result);
	            },
	            'visible' => $bool  
	        ),
	        array(
			'header' => 'Periode',
			'type' => 'raw',
			'value' => '$data->tahun_ajaran . " " . $data->semester',
			'htmlOptions'=>array('width'=>'150px'),
			), 
	        array(
	        	'header' => 'Waktu',
	        	'type' => 'raw',
				'value' => '(empty($data->idJadwal->hari_1) ? "" : ($data->idJadwal->hari_1 . ", ")) . (($data->idJadwal->waktu_awal_1 == "00:00:00") ? "" : ($data->idJadwal->waktu_awal_1 . "-")) . (($data->idJadwal->waktu_akhir_1 == "00:00:00") ? "" : ($data->idJadwal->waktu_akhir_1 . "<br>")) . (empty($data->idJadwal->hari_2) ? "" : ($data->idJadwal->hari_2 . ", ")) . (($data->idJadwal->waktu_awal_2 == "00:00:00") ? "" : ($data->idJadwal->waktu_awal_2 . "-")) . (($data->idJadwal->waktu_akhir_2 == "00:00:00") ? "" : ($data->idJadwal->waktu_akhir_2 . "<br>")) . (empty($data->idJadwal->hari_3) ? "" : ($data->idJadwal->hari_3 . ", ")) . (($data->idJadwal->waktu_awal_3 == "00:00:00") ? "" : ($data->idJadwal->waktu_awal_3 . "-")) . (($data->idJadwal->waktu_akhir_3 == "00:00:00") ? "" : ($data->idJadwal->waktu_akhir_3 . "<br>")) . (empty($data->idJadwal->hari_4) ? "" : ($data->idJadwal->hari_4 . ", ")) . (($data->idJadwal->waktu_awal_4 == "00:00:00") ? "" : ($data->idJadwal->waktu_awal_4 . "-")) . (($data->idJadwal->waktu_akhir_4 == "00:00:00") ? "" : ($data->idJadwal->waktu_akhir_4 . "<br>"))', 
	        	'htmlOptions'=>array('width'=>'150px'),
	        ),
			array(
				'header' => 'Mata Kuliah',
				'value' => '$data->idJadwal->idMk->nama_mk',
			),
			array(
	        	'header' => 'Kelas',
	        	'value' => '$data->idJadwal->kelas'
	        ),
	        array(
	        	'header' => 'Pengajar',
	        	'type' => 'raw',
	        	'value' => 'empty($data->id_dosen) ? "" : PengajarKuliah::getPengajarKuliah($data->id_jadwal)'
	        ),
	        array(
	        	'header' => 'Kapasitas',
	        	'value' => '$data->idJadwal->kapasitas'
	        ),
	        array(
	        	'header' => 'Pemilih',
	        	'value' => 'PesertaMK::model()->getJumlahMhs($data->id_jadwal)',
	        ),
			array(
				'name' => 'Ruang',
				'type'=>'raw',
				'value' => '(empty($data->idJadwal->id_ruang_1) ? "" : $data->idJadwal->idRuang1->no_ruang) . (empty($data->idJadwal->id_ruang_2) ? "" : "<br>" . $data->idJadwal->idRuang2->no_ruang) . (empty($data->idJadwal->id_ruang_3) ? "" : "<br>" . $data->idJadwal->idRuang3->no_ruang) . (empty($data->idJadwal->id_ruang_4) ? "" : "<br>" . $data->idJadwal->idRuang4->no_ruang)',
			),
			array(
				'class' => 'CButtonColumn',
				'visible' => $bool,
				'template' => '{delete}',
				'deleteConfirmation' => 'Apakah Anda yakin?',
				'afterDelete'=>'function(link,success,data){ 
					if(success) 
						alert("Berhasil dihapus!");
					else
						alert("Anda harus memilih mata kuliah tersebut terlebih dahulu!");
				}',
				'buttons' => array(
					'delete' => array(
						'label'=>'Drop Mata Kuliah',
	            		'url'=>'Yii::app()->createUrl("jadwal/dropMK", array("id_jadwal" => $data->id_jadwal))',
	            	),
				),
			),
		),
	)); 
?>

<script>
function successGrid(data) {
    $.fn.yiiGridView.update('createKrs-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('createKrs-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>

<?php 

		if($bool)
		{
			echo "<div class='form-center'>" . CHtml::ajaxSubmitButton('Save',array('jadwal/ajaxSave'), array('success' => 'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-success')) . "</div>";
		}
		$this->endWidget(); 
	}
	else
	{
		echo "
		<div class='container'>
			<div class='row'>
				<div class='informasikrs'>
					<p><b>Keterangan</b></p>
					<p>Anda tidak dapat mengisi KRS karena periode registrasi akademik belum dimulai atau sudah berakhir.</p>
					<br>
					<p><b>Solusi</b></p>
					<p>Hubungi bagian akademik</p>
				</div>
			</div>
		</div>";
		//$returnUri = Yii::app()->createUrl('Mahasiswa');
		//Yii::app()->clientScript->registerMetaTag("5;url={$returnUri}", null, 'refresh');
	}
?>
