<?php
/* @var $this pengajarController */
/* @var $model pengajar */
?>

<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>

<h2><strong>Tambah Pengajar Kuliah</strong></h2>
<h4><?php echo Jadwal::model()->getMataKuliah($id_jadwal);?></h4> 

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


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengajar-grid',
	'dataProvider'=>$model->searchJadwalSBA2($id_jadwal),
	//'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'Pengajar',
			'type' => 'raw',
			'value' => 'CHtml::dropDownlist("id_dosen[$data->id_pengajar_kuliah]", $data->id_dosen, PengajarMK::model()->getListPengajarMK($data->idJadwal->id_mk), array("empty" => "-Pilih Dosen-"))'
		),
		array(
			'header' => 'Operation',
			'class'=>'CButtonColumn',
			'template' => '{delete}',
			'deleteConfirmation' => 'Apakah Anda yakin?',
			'afterDelete'=>'function(link,success,data){ 
				if(success) 
					alert("Delete telah berhasil");
			}',
			'buttons' => array(
				'delete' => array(
					'label' => 'Hapus tambahan',
					'url' => 'Yii::app()->createUrl("PengajarKuliah/delete", array("id" => $data->id_pengajar_kuliah))'
				),
			),
		),
	),
)); ?>
<script>
function successGrid(data) {
    $.fn.yiiGridView.update('pengajar-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('pengajar-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>
<div class='form-center'>

<?php echo CHtml::ajaxSubmitButton('Add', Yii::app()->createUrl('PengajarKuliah/ajaxAdd', array('id_jadwal' => $id_jadwal)), array('success' => 'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-success'));?>
<?php echo '&nbsp'; ?>
<?php echo CHtml::ajaxSubmitButton('Save', array('PengajarKuliah/ajaxPengajarKuliahSave'), array('success' => 'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-primary')); ?>
<?php echo '&nbsp'; ?>
<?php $this->endWidget(); ?>
<br>
<br>
</div>
<div class='form left'>
	<?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class' => 'btn btn-default'));  ?>
</div>	