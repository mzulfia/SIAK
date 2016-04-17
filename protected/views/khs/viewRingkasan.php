
<?php $url = Yii::app()->request->baseUrl;
?>
<?php if(Yii::app()->user->isMahasiswa()):?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
              	<li>
                	<a href="<?php echo $url.'/Kalender'?>">Kalender</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url.'/Khs/ViewRingkasan/'.$id_mhs ?>">Ringkasan</a>
                </li>
                <li>
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
<?php endif; ?>     
<h2><strong>Ringkasan Akademis</strong></h2>
<div class="container khs">
	<div class="row left">

<table class='table table-hover ringkasan'>
    <?php echo "<h3><strong>" . Mahasiswa::model()->getNama($id_mhs) . "</strong></h3>"; ?>
	  <tr>
	    <th>NIM</th>
	    <td>:</td>
	    <td><?php echo Mahasiswa::model()->getNIM($id_mhs); ?></td>
	  </tr>
	  <tr>
	    <th>Angkatan</th>
	    <td>:</td>
		    <td>
		    	<?php 
		    		$time = strtotime(Mahasiswa::model()->getTglMsk($id_mhs)); 
		    		if(empty($time))
		    			echo '-';
		    		else
		    			echo date('Y', $time); 
		    	?>
			</td>
	  </tr>
	  <tr>
	    <th>Pembimbing Akademis</th>
	    <td>:</td>
	    <td><?php echo Mahasiswa::model()->getNamaPembimbing($id_mhs);?></td>
	  </tr>
	  <tr>
	    <th>Status Akademis</th>
	    <td>:</td>
	    <td><?php echo Mahasiswa::model()->getStatusAkademis($id_mhs);?></td>
	  </tr>
	  <tr>
	    <th>Total SKS Lulus</th>
	    <td>:</td>
	    <td><?php echo Khs::model()->getTotalSKSLulus($id_mhs); ?></td>
	  </tr>
	  <tr>
	    <th>IPK</th>
	    <td>:</td>
	    <td>
	    	<?php 
				echo Khs::model()->getIPK($id_mhs); 
			?>
		</td>
	  </tr>
</table>	
	</div>
	<div class="row">
		<div class="rangkuman">
			<table class='table table-hover'>
				<thead>
					<tr>
						<th>
							Nilai
						</th>
						<th>
							Jumlah
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$q1 = 'SELECT DISTINCT nilai_huruf, count(nilai_huruf) AS jumlah FROM khs WHERE id_mhs = :mhs GROUP BY nilai_huruf';
						$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $id_mhs));
						$kosong = '';
						$jumlah_kosong = 0;
						if(!empty($arr))
						{
							foreach($arr as $ar)
							{
								if($ar['nilai_huruf'] == '-')
								{
									$kosong = $ar['nilai_huruf'];
									$jumlah_kosong = $ar['jumlah'];
								}
								else
								{
									echo "<tr> <td>" . $ar['nilai_huruf'] . "</td>";
									echo "<td>" . $ar['jumlah'] . "</td></tr>";
								}
							}
							if($kosong != '' && $jumlah_kosong != 0)
							{
								echo "<tr> <td>" . $kosong . "</td>";
								echo "<td>" . $jumlah_kosong . "</td></tr>";
							}
						}	
					?>	
				</tbody>
			</table>
		</div>
		<div class="grafik">
			<?php
				$max_sms = 6;
				$ip1 = 0.0;
				$ip2 = 0.0;
				$ip3 = 0.0;
				$ip4 = 0.0;
				$ip5 = 0.0;
				$ip6 = 0.0;

				$ipk1 = 0.0;
				$ipk2 = 0.0;
				$ipk3 = 0.0;
				$ipk4 = 0.0;
				$ipk5 = 0.0;
				$ipk6 = 0.0;

				for($i = 0; $i < $max_sms; $i++)
				{
					if($i == 0)
					{
						if(Khs::model()->calculateIP($id_mhs,$i+1) != 0.0)
							$ip1 = Khs::model()->calculateIP($id_mhs,$i+1);
						if(Khs::model()->getIPKSms($id_mhs,$i+1) != 0.0)
							$ipk1 = Khs::model()->getIPKSms($id_mhs,$i+1);
					}	
					elseif($i==1)
					{	
						if(Khs::model()->calculateIP($id_mhs,$i+1) != 0.0)
							$ip2 = Khs::model()->calculateIP($id_mhs,$i+1);
						if(Khs::model()->getIPKSms($id_mhs,$i+1) != 0.0)
							$ipk2 = Khs::model()->getIPKSms($id_mhs,$i+1);
					}
					elseif($i==2)
					{
						if(Khs::model()->calculateIP($id_mhs,$i+1) != 0.0)
							$ip3 = Khs::model()->calculateIP($id_mhs,$i+1);
						if(Khs::model()->getIPKSms($id_mhs,$i+1) != 0.0)
							$ipk3 = Khs::model()->getIPKSms($id_mhs,$i+1);
					}
					elseif($i==3)
					{
						if(Khs::model()->calculateIP($id_mhs,$i+1) != 0.0)
							$ip4 = Khs::model()->calculateIP($id_mhs,$i+1);
						if(Khs::model()->getIPKSms($id_mhs,$i+1) != 0.0)
							$ipk4 = Khs::model()->getIPKSms($id_mhs,$i+1);
					}
					elseif($i==4)
					{
						if(Khs::model()->calculateIP($id_mhs,$i+1) != 0.0)
							$ip5 = Khs::model()->calculateIP($id_mhs,$i+1);
						if(Khs::model()->getIPKSms($id_mhs,$i+1) != 0.0)
							$ipk5 = Khs::model()->getIPKSms($id_mhs,$i+1);
					}
					else
					{
						if(Khs::model()->calculateIP($id_mhs,$i+1) != 0.0)
							$ip6 = Khs::model()->calculateIP($id_mhs,$i+1);
						if(Khs::model()->getIPKSms($id_mhs,$i+1) != 0.0)
							$ipk6 = Khs::model()->getIPKSms($id_mhs,$i+1);
					}
				}
				$this->widget('application.extensions.yii-highcharts.highcharts.HighchartsWidget', array(
			   'options'=>array(
			     'chart'=> array('defaultSeriesType'=>'column',),
			      'title' => array('text' => 'Grafik IP/IPK'),
			      'legend'=>array('enabled'=>true),
			      'xAxis'=>array('categories'=>array('Semester 1','Semester 2','Semester 3', 'Semester 4', 'Semester 5', 'Semester 6'),),
			      'yAxis'=> array(
			      		'min' => 0,
			            'allowDecimals' => true,
			           	'tickInterval' => 1,
			            'title'=> array(
			            	'text'=>'Jumlah'
			            ),
			        ),
			      'series' => array(
			         array(
			         	'name' => 'IP',
			         	'data' => array($ip1, $ip2, $ip3, $ip4, $ip5, $ip6),
					'color' => '#5A82B5'
					),
			        array(
			         	'name' => 'IPK',
			         	'data' => array($ipk1, $ipk2, $ipk3, $ipk4, $ipk5, $ipk6),
					'color' => '#693'
					)
				),
			      'tooltip' => array(
			      	'formatter' => 'js:function() {
			      		return "<b>" + Highcharts.numberFormat(this.y, 2) + "</b>"; 
			      	}'

			      	//return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
			      ),
			      'plotOptions'=>array('pie'=>(array(
			                    'allowPointSelect'=>true,
			                    'showInLegend'=>true,
			                    'cursor'=>'pointer',
			                )
			            )                       
			        ),
			      'credits'=>array('enabled'=>false),
			   )
			));
		?>
		</div>
	</div>
</div>
<?php
	if(!Yii::app()->user->isMahasiswa())
		echo "<div class='form left'>" . CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class' => 'btn btn-default')) . "</div>";  
?>


