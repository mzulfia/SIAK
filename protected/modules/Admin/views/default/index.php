<?php
$q1 = 'SELECT tahun_ajaran, semester FROM kalender GROUP BY tahun_ajaran, semester ORDER BY id_kalender DESC LIMIT 1';
$arr = Yii::app()->db->createCommand($q1)->queryAll();
$q2 = 'SELECT jenis_event, tanggal_awal, tanggal_akhir FROM kalender WHERE tahun_ajaran = :tahun_ajaran AND semester = :semester GROUP BY jenis_event, tanggal_awal, tanggal_akhir';
$arr2 = Yii::app()->db->createCommand($q2)->queryAll(true, array(':tahun_ajaran' => $arr[0]['tahun_ajaran'], ':semester' => $arr[0]['semester']));
$res = "";

echo '<h1><strong>Selamat datang di Sistem Informasi Akademik</strong></h1>';


if(!empty($arr2))
{
	foreach($arr2 as $ar)
	{
		$tanggal = Yii::app()->dateFormatter->format("dd/MM/y",strtotime($ar['tanggal_awal'])) . " - " . Yii::app()->dateFormatter->format("dd/MM/y",strtotime($ar['tanggal_akhir']));
		$res .= $ar['jenis_event'] . ": " . $tanggal . "<br>"; 
	}	
}
echo "<br> <br> <br>
		<div class='container'>
			<div class='row'>
				<div class='informasi'>
					<h4>Informasi Penting</h4>
					<p>".$res."</p>
				</div>
			</div>
		</div>";
?>