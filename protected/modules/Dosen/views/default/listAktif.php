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
                <li class="active">
                	<a href="<?php echo $url.'/Dosen/default/listAktif'?>">Aktif</a>
                </li>
                <li>
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
<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>


<h2><strong>Daftar Mahasiswa Aktif</strong></h2>

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

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bimbinganD-grid',
	'dataProvider'=>$model->searchMhsAktif(Dosen::model()->getId(Yii::app()->user->getId())),
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
			'header' => 'Status KRS',
			'type' => 'raw',
			'value'=> 'CHtml::dropDownlist("status_krs[$data->id_mhs]", $data->status_krs, array("Belum Disetujui" => "Belum Disetujui", "Disetujui" => "Disetujui", "Ditolak" => "Ditolak"), array("style" => "width: 150px"))',
			'htmlOptions' => array('width' => '150px')
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
			'htmlOptions' => array('width' => '200px'),
		),
	),
)); 
?>
<script>
function successGrid(data) {
    $.fn.yiiGridView.update('bimbinganD-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('bimbinganD-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>

<div class="update-nilai center">
<?php 
	echo CHtml::ajaxSubmitButton('Save',array('ajaxStatusKRSSave'), array('success'=>'successGrid', 'error'=>'dangerGrid'), array('class' => 'btn btn-primary'));
?>
</div>
<?php $this->endWidget(); ?>

