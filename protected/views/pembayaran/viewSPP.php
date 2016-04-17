<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */
?>
<?php $url = Yii::app()->request->baseUrl; 
	$id= Mahasiswa::model()->getId(Yii::app()->user->getId());
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
                	<a href="<?php echo $url.'/Khs/ViewRingkasan/'.$id ?>">Ringkasan</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/Khs/viewRiwayat/'.$id ?>">Riwayat</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url ?>/pembayaran/viewSPP">Pembayaran</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h2><strong>Lihat Pembayaran</strong></h2>


<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pembayaran-grid',
	'dataProvider'=>$model->searchSPP(),
	'columns'=>array(
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        	'htmlOptions'=>array('width'=>'25px')
        ),
        array(
            'header' => 'Tahun Ajaran',
            'value' => '$data->tahun_ajaran . " " . $data->semester'
        ),
		array(
			'header' => 'Pembayaran',
			'value' => '$data->pembayaran'
		),
		array(
			'header' => 'Tagihan',
			'value' => '$data->tagihan'
		),
		array(
            'header'=>'Status',
            'value'=> '$data->status'
        ),
	),
)); ?>