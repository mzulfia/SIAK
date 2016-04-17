<?php $url = Yii::app()->request->baseUrl; 
$id= Dosen::model()->getId(Yii::app()->user->getId());?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url.'/Dosen/default/bimbinganD'?>">Daftar Bimbingan</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/Dosen/default/listAktif'?>">Aktif</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url.'/Dosen/default/listKosong'?>">Kosong</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/Dosen/default/listCuti'?>">Cuti</a>
                </li>
                <li>
                  <a href="<?php echo $url.'/Dosen/default/listLulus'?>">Lulus</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

<h2><strong>Daftar Mahasiswa Kosong</strong></h2>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bimbinganD-grid',
	'dataProvider'=>$model->searchMhsKosong(Dosen::model()->getId(Yii::app()->user->getId())),
	'columns'=>array(
		array(
			'header'=>'No.',
        		'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        	),
		array(
			'header' => 'NIM',
			'value' => '$data->nim'
		),
		array(
			'header' => 'Nama',
			'value' => '$data->nama'
		),
		array(
			'header' => 'IP',
			'value'=> '($data->semester == 1) ? Yii::app()->format->formatNumber((float)(Khs::model()->calculateIP($data->id_mhs, $data->semester))) : Yii::app()->format->formatNumber((float)(Khs::model()->calculateIP($data->id_mhs, $data->semester-1)))',
		),
		array(
			'header' => 'IPK',
			'value'=> 'Khs::model()->getIPK($data->id_mhs)',
		),
		array(
			'header' => 'JSKSPO',
			'value' => 'Khs::model()->getTotalSKSLulus($data->id_mhs)',
		),
		array(
			'header' => 'Operasi',
			'class'=>'CButtonColumn',
			'template' => '{idm} | {ipk} | {krs}',
			'buttons' => array(
				'idm' => array(
					'label' => 'Lihat IDM',
					'url'=>'Yii::app()->createUrl("Mahasiswa/default/view", array("id" => $data->id_mhs))',
				),
				'ipk' => array(
					'label' => 'Lihat IPK',
					'url'=>'Yii::app()->createUrl("Khs/viewRingkasan", array("id" => $data->id_mhs))',
				),
				'krs' => array(
					'label'=>'Lihat KRS',
            		'url'=>'Yii::app()->createUrl("Krs/viewKrs", array("id" => $data->id_mhs))',
            	),
			),
			'htmlOptions' => array('width' => '200px')
		),
	),
)); 

?>
<?php $this->endWidget(); ?>

