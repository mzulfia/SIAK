<?php $url = Yii::app()->request->baseUrl; 
$id = Mahasiswa::model()->getId(Yii::app()->user->getId());
?>
<?php 
	if(Yii::app()->user->isMahasiswa()):
?>
	<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li class="active">
                	<a href="<?php echo $url.'/Krs/viewKrs/'.$id?>">Lihat KRS</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/Krs/createKrs/'?>">Isi KRS</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<?php
	endif;
?>      
<?php 
	$sql = 'SELECT * FROM krs WHERE id_mhs = :id AND semester = :sms';
	$res = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id_mhs, ':sms' => Mahasiswa::model()->getSms($id_mhs)));

	echo "<h2><strong>Kartu Rencana Studi</strong></h2>";
	echo '<hr>';
	echo "
	<div class='row'>
		<div class='col-md-4'>
			<div class='table-responsive'>
				<table id='kiri' class='table viewkrs'>
						<th id='headtable' class='success' colspan='3'>KRS</th>
						<tr>
							<td><b> Status KRS </b></td>
							<td>:</td>
							<td>" . Mahasiswa::model()->getStatus($id_mhs) . "</td>
						</tr>
						<tr>
							<td><b> Persetujuan KRS </b></td>
							<td>:</td>
							<td> Harus dengan persetujuan pembimbing akademis </td>
						</tr>
						<tr>
							<td><b> IP Terakhir </b></td>
							<td>:</td>
							<td>". Yii::app()->format->formatNumber((float) Khs::model()->calculateIP($id_mhs, Mahasiswa::model()->getSms($id_mhs)-1)) ."</td>
						</tr>
				</table>
			</div>
		</div>
		<div class='col-md-8'>";
		echo "<h3> Semester " . Mahasiswa::model()->getSms($id_mhs) . "</h3>"; 
		


		echo "<hr>";
			if(!empty($res))
			{
				$this->widget('zii.widgets.grid.CGridView', array(
			 	'id'=>'krs-grid',
				'dataProvider'=>$model->searchKrs($id_mhs, Krs::model()->getSms(Mahasiswa::model()->getId(Yii::app()->user->getId()))),
				'columns'=>array(
						array(
				            'header'=>'No.',
				        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
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
							'header' => 'Jumlah SKS',
							'value' => '$data->idJadwal->idMk->sks',
						),
						array(
							'header' => 'Pengajar',
							'type' => 'raw',
							'value' => 'PengajarKuliah::model()->getPengajarKuliah($data->id_jadwal)',
						),
					),
				));	
			}
			else
			{
				echo "<h4><strong>Belum mengisi KRS</strong></h4>";
			}
			echo "
		</div>
	</div>
	";
	
	if(!Yii::app()->user->isMahasiswa())
	{
		echo "<div class='form left'> <br>" . CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class'=>'btn btn-default')) . "</div>";
	}
?>