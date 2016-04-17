<?php
/* @var $this pengajarController */
/* @var $model pengajar */
?>

<h2><strong>Tambah Pengajar</strong></h2>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pengajar-grid',
	'dataProvider'=>$model->searchJadwalSBA2($id_jadwal),
	//'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'Periode',
			'value' => 'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->idJadwal->tanggal_awal)) . " - " . Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->idJadwal->tanggal_akhir))',
			'htmlOptions'=>array('width'=>'150px'),
		), 
		array(
			'header' => 'Waktu',
			'value' => '$data->idJadwal->hari_1 . ", " . $data->idJadwal->waktu_awal_1 . "-" . $data->idJadwal->waktu_akhir_1', 
			'htmlOptions'=>array('width'=>'150px'),
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
			'name' => 'Ruang',
			'value' => '(empty($data->idJadwal->id_ruang_1) ? "" : $data->idJadwal->idRuang1->no_ruang) . (empty($data->idJadwal->id_ruang_2) ? "" : "<br>" . $data->idJadwal->idRuang2->no_ruang) . (empty($data->idJadwal->id_ruang_3) ? "" : "<br>" . $data->idJadwal->idRuang3->no_ruang) . (empty($data->idJadwal->id_ruang_4) ? "" : "<br>" . $data->idJadwal->idRuang4->no_ruang)',
		),	
		array(
			'header' => 'Pengajar',
			'type' => 'raw',
			'value' => 'CHtml::dropDownlist("id_dosen[$data->id_jadwal]", $data->id_dosen, Dosen::model()->getListDosen(), array("empty" => "-Pilih Dosen-"))'
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
			'deleteConfirmation' => 'Apakah Anda yakin?',
			'afterDelete'=>'function(link,success,data){ 
				if(success) 
					alert("Delete telah berhasil");
			}',
			'buttons' => array(
				'delete' => array(
					'label' => 'Delete tambahan',
					'url' => 'Yii::app()->createUrl("pengajar/delete", array("id" => $data->id_pengajar))'
				),
			),
		),
	),
)); ?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('pengajar-grid');
}
</script>
<?php echo CHtml::ajaxSubmitButton('Add', Yii::app()->createUrl('pengajar/ajaxAdd', array('id_jadwal' => $id_jadwal)), array('success' => 'reloadGrid'), array('class' => 'btn-success'));?>
<?php echo '&nbsp'; ?>
<?php echo CHtml::ajaxSubmitButton('Save',array('ajaxPengajarSave'), array('success'=>'reloadGrid')); ?>
<?php echo '&nbsp'; ?>
<?php $this->endWidget(); ?>
<br>
<br>
<?php echo CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;'));  ?>


