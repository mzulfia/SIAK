<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>

<h2><strong>Isi Nilai</strong></h2>

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
	'id'=>'isiNilai-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'nilai-grid',
	'dataProvider'=>$model->searchMhs($id_komponen, $id_jadwal),
	'columns'=>array(
		array(
			'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
		array(
			'header' => 'NIM',
			'value'=> '$data->idMhs->nim'
		),
        array(
			'header' => 'Nama',
			'value'=> '$data->idMhs->nama'
		),
		array(
			'header' => 'Nilai',
			'type' => 'raw',
			'value'=>'CHtml::textField("nilai_po[$data->id_mhs]", $data->nilai_po)',
			'htmlOptions'=>array('width'=>'25px')
		),
		array(
			'header' => 'Nilai Maksimal',
			'value' => '$data->idKomponen->nilai_maks',
		),
	),
)); 
?>
<script>
function successGrid(data) {
    $.fn.yiiGridView.update('nilai-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('nilai-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>
<div class='center'>
<?php 
echo CHtml::ajaxSubmitButton('Save',array('nilai/ajaxSave','id_jadwal'=>$id_jadwal, 'id_komponen' => $id_komponen), 
			array('success'=>'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-primary')); ?>
<?php $this->endWidget(); ?>
</div>
<div class='form left'>
	<?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class'=>'btn btn-default')); ?>
</div>