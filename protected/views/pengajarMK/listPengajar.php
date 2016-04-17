<?php $url = Yii::app()->request->baseUrl; 
$id= Dosen::model()->getId(Yii::app()->user->getId());?>

<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>

<h2><strong>Daftar Pengajar</strong></h2>
<h4><?php echo MataKuliah::model()->getNama($id_mk); ?></h4>

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
	'id'=>'PengajarMK-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'PengajarMK-grid',
	'dataProvider'=>$model->searchPengajarMK($id_mk),
	'columns'=>array(
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
  		array(
			'name' => 'id_dosen',
			'header' => 'Nama Dosen',
			'type' => 'raw',
			'value' => 'CHtml::dropDownlist("id_dosen[$data->id_pengajar_mk]", $data->id_dosen, CHtml::listData(Dosen::model()->findAll(), "id_dosen", "nama"), array("empty"=>"-Pilih Dosen-"))'
		),
		array(
			'name' => 'status_koordinator',
			'header' => 'Status Koordinator',
			'type' => 'raw',
			'value' => 'CHtml::dropDownlist("status_koordinator[$data->id_pengajar_mk]", $data->status_koordinator , array("Kosong" => "Kosong", "Aktif" => "Aktif"))'
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('PengajarMK-grid');
}
function successGrid(data) {
    $.fn.yiiGridView.update('PengajarMK-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('PengajarMK-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>
<div class="update-nilai">
<?php 
	echo CHtml::ajaxSubmitButton('Add', Yii::app()->createUrl('PengajarMK/ajaxAdd', array('id_mk' => $id_mk)), array('success' => 'reloadGrid'), array('class' => 'btn btn-success'));
	echo "&nbsp";
	echo CHtml::ajaxSubmitButton('Save', Yii::app()->createUrl('PengajarMK/ajaxSave', array('id_mk' => $id_mk)), array('success' => 'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-primary'));
	echo "<br><br>";
?>
<?php echo "<div class='left'><br>" . CHtml::link('Back', array('/MataKuliah/admin'), array('class' => 'btn btn-default')) . "</div>"; ?>
<?php $this->endWidget(); ?>
