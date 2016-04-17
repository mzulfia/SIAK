<?php $url = Yii::app()->request->baseUrl; 
?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url.'/Kalender'?>">Kalender</a>
                </li>
                <li>
                	<a href="<?php echo $url. '/Khs/ViewRingkasan/'.$id_mhs ?>">Ringkasan</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url.'/Khs/viewRiwayat/'.$id_mhs ?>">Riwayat</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Pembayaran/viewSPP">Pembayaran</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h2><strong>Riwayat Akademis</strong></h2>

<?php
	$ip = 0.0;
	$q1 = 'SELECT semester FROM khs WHERE id_mhs = :mhs ORDER BY semester DESC LIMIT 1';
	$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $id_mhs));
	if(!empty($arr))
	{
		$size = (int) $arr[0]['semester'];
		for($i = 1; $i <= $size; $i++)
		{
			echo "<b>Semester " . $i . "</b>";
			echo "<br>";

			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'viewSummary-grid',
				'dataProvider'=>$model->searchViewSummary($id_mhs, $i),
				'columns'=>array(
					array(
			            'header'=>'No.',
			        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)'
			        ),
			        array(
						'header' => 'Kode MK',
						'value'=> '$data->idJadwal->idMk->kode_mk'
					),
			        array(
						'header' => 'Mata Kuliah',
						'value'=> '$data->idJadwal->idMk->nama_mk'
					),
					array(
						'header' => 'Kelas',
						'value'=> '$data->idJadwal->kelas'
					),
					array(
						'header' => 'SKS',
						'value'=> '$data->idJadwal->idMk->sks'
					),
					 array(
						'header' => 'Nilai Akhir',
						'value'=> '$data->nilai_angka',
					),
					array(
						'header' => 'Nilai Huruf',
						'value'=> '$data->nilai_huruf'
					),
				),
			));
			echo "<br>";
			echo "<br>";
		}	
	}
	else
	{
		echo "Kosong";
	}
?>

