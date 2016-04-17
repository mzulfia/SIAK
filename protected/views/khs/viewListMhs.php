<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>

<h1><strong>Daftar Mahasiswa</strong></h1>

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


<?php 
	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'listMhs-form',
			'enableAjaxValidation'=>true,
			)); 
?>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'listMhs-grid',
	'dataProvider'=>$model->searchListMhs($id_jadwal),
	'columns'=>array(
		array(
			'id'=>'autoId',
			'class'=>'CCheckBoxColumn',
            'selectableRows' => 50,
            'value' => '$data->id_khs',
        ),
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)'
        ),
		array(
			'header' => 'NIM',
			'value'=> '$data->idMhs->nim'
		),
        array(
			'header' => 'Nama',
			'value'=> '$data->idMhs->nama',
		),
		array(
			'header' => 'Semester',
			'value'=> '$data->semester'
		),
		array(
			'header' => 'Nilai Angka',
			'value'=> '$data->nilai_angka'
		),
		array(
			'header' => 'Nilai Huruf',
			'value'=> '$data->nilai_huruf'
		),
	),
)); 
?>

<script>
function successGrid(data) {
    $.fn.yiiGridView.update('listMhs-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('listMhs-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>

<div class="update-nilai center">
<?php 
	echo CHtml::ajaxSubmitButton('Update Nilai',array('khs/ajaxUpdateNilai'), array('success' => 'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-primary green'));
	$this->endWidget();
?>
</div>

<?php 
//echo "<div class='form left'>" . CHtml::link('Back', array('/PesertaMK/viewListMK/' . $id_jadwal), array('class' => 'btn btn-default')) . "</div>"; 
echo "<div class='form left'>" . CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class' => 'btn btn-default')) . "</div>";  
?>
