<?php

$filename="Transkrip-" . Mahasiswa::model()->getNIM($mhs) . ".pdf";
$head = ob_get_clean ();
$content = ob_get_clean ();
$head =
'
<html>
<body>
<div class="header">
		<div class="row">
			<div class="col-md-1" style= "text-align: center">
				<img src="'. Yii::app()->request->baseUrl . '/images/Head.png">
			</div>
		<div style="background-color: #00923F; height: 4px"></div>
        <div style="background-color: #FFF500; height: 2px"></div>
        <div style="background-color: #00923F; height: 2px"></div>
	</div>
</body>
</html>
';
$content = 
'
	<div id="krs" class="container">
		<div class="row" style= "text-align: center">
			<h3>KARTU HASIL STUDI (KHS)</h3><br>
		</div>		
		<div class="col-md-6">
			<table class="table data">
				<tbody>
					<tr class = "tr data">
						<td class = "td data">Nama</td>
						<td class = "td data">: ' . Mahasiswa::model()->getNama($mhs) . '</td>
					</tr>
					<tr class = "tr data">
						<td class = "td data">NIM</td>
						<td class = "td data">: ' . Mahasiswa::model()->getNIM($mhs) . '</td>
					</tr>
					<tr class = "tr data">
						<td class = "td data"class = "tr data">Semester</td>
						<td class = "td data">: ' . Mahasiswa::model()->getSms($mhs) . '</td>
					</tr>
					<tr class = "tr data">
						<td class = "td data">Tahun Akademik</td>
						<td class = "td data">: '. Kalender::model()->getTahun() . '</td>
					</tr>
					<tr class = "tr data">
						<td class = "td data">IPK</td>
						<td class = "td data">: ' . Khs::model()->getIPK($mhs) . '</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<br>
';
$ip = 0.0;
	$q1 = 'SELECT semester FROM khs WHERE id_mhs = :mhs ORDER BY semester DESC LIMIT 1';
	$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $mhs));

	if(!empty($arr))
		{
			$size = (int) $arr[0]['semester'];
			for($i = 1; $i <= $size; $i++)
			{
				$content .=
				'<table class="table nilai">
					<tr class = "tr nilai">
						<th class = "th nilai">NO</th>
						<th class = "th nilai">KODE</th>
						<th class = "th nilai">MATA AJARAN</th>
						<th class = "th nilai">JUMLAH SKS </th>
						<th class = "th nilai">NILAI ANGKA </th>
						<th class = "th nilai">NILAI HURUF</th>
					</tr>
				';
				$total_sks = 0;
				$q2 = 'SELECT * FROM khs WHERE id_mhs = :mhs AND semester = :sms';
				$ar = Yii::app()->db->createCommand($q2)->queryAll(true, array(':mhs' => $mhs, ':sms' => $i));
				for($ii = 0; $ii < sizeof($ar); $ii++)
				{
					$total_sks += Khs::model()->getSKSMK($ar[$ii]['id_jadwal']);
					$content .=
					'	
					<tr class = "tr nilai">
						<td class = "td nilai">'. ($ii+1) .'</td>
						<td class = "td nilai">'. Khs::model()->getKodeMK($ar[$ii]['id_jadwal']) .'</td>
						<td class = "td nilai">'. Khs::model()->getNamaMK($ar[$ii]['id_jadwal']) .'</td>
						<td class = "td nilai">'. Khs::model()->getSKSMK($ar[$ii]['id_jadwal']) .'</td>
						<td class = "td nilai">'. Khs::model()->getNilaiAngka($mhs, $ar[$ii]['id_jadwal']) .'</td>
						<td class = "td nilai">'. Nilai::model()->calculateGrade($mhs, $ar[$ii]['id_jadwal']) .'</td>
					</tr>
					';
				}	
				$content .= 
				'
					<tr class = "tr nilai">
						<td class = "td nilai" colspan="3">Jumlah</td>
						<td class = "td nilai"><b>'. $total_sks .'</b></td>
						<td class = "td nilai"></td>
						<td class = "td nilai"></td>
					</tr>
					<tr class = "tr nilai">
						<td class = "td nilai" colspan="3">Indeks Prestasi</td>
						<td class = "td nilai"></td>
						<td class = "th nilai" colspan="3"><b>'. Yii::app()->format->formatNumber((float)(Khs::model()->calculateIP($mhs, $i))) .'</b></td>
					</tr>
				</table>
				<br>
				';
			}	
		}
		else
		{
			$content .= '<b>Kosong</b><br>';
		}

		$content .= 
		'
		<div class="row">
			<div class="col-md-3">
				<table class="table font12">
	                <thead class="thead font12">
	                  <tr class="tr success">
	                    <th>
	                      Nilai
	                    </th>
	                    <th>
	                      Min
	                    </th>
	                    <th>
	                      Maks
	                    </th>
	                  </tr>
	                </thead>
	                <tbody class="tbody font12">
	                  <tr class="tr font12">
	                    <td class="td font12">A</td>
	                    <td class="td font12">86</td>
	                    <td class="td font12">100</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">A-</td>
	                    <td class="td font12">81</td>
	                    <td class="td font12">85</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">B+</td>
	                    <td class="td font12">76</td>
	                    <td class="td font12">80</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">B</td>
	                    <td class="td font12">71</td>
	                    <td class="td font12">75</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">B-</td>
	                    <td class="td font12">66</td>
	                    <td class="td font12">70</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">C+</td>
	                    <td class="td font12">61</td>
	                    <td class="td font12">65</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">C</td>
	                    <td class="td font12">56</td>
	                    <td class="td font12">60</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">D</td>
	                    <td class="td font12">46</td>
	                    <td class="td font12">55</td>
	                  </tr>
	                  <tr class="tr font12">
	                    <td class="td font12">E</td>
	                    <td class="td font12">0</td>
	                    <td class="td font12">45</td>
	                  </tr>
	                </tbody>
	              </table>
	        </div>
			
			<div class="col-md-4">
	        	<br><br><br><br><br><br>
	            <p><b>Tangerang,'. Kalender::model()->getDate() .' <br><br> Program DIII Keperawatan <br> Akademi Keperawatan Islamic Village</b></p>
	            <br><br><br><br><br><br>
	            <p><b><u>Sri Wahyuni Purwaningsih, S.Kep.</u> <br> Wadir I Bidang Akademik </b></p>
	        </div>
	    </div>    
	</div>
';



$mpdf = Yii::app()->ePdf->mpdf();

$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/css/siak3.css');
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->setAutoBottomMargin = 'stretch';
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->SetHTMLHeader($head);
$mpdf->WriteHTML($content, 2);
$mpdf->Output($filename, "I");
exit;
?>

