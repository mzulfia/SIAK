<?php
/* @var $this peserta_mkKelasController */
/* @var $model peserta_mkKelas */

?>

<h2><strong>Daftar Mahasiswa</strong></h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peserta-mk-grid',
	'dataProvider'=>$model->searchListMhs($id_jadwal),
	'columns'=>array(
		array(
			'header'=>'No.',
	        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
			'htmlOptions' => array('width'=>'25px'),
		),
		array(
			'header' => 'NIM',
			'value' => '$data->idMhs->nim'
		),
		array(
			'header' => 'Nama',
			'value' => '$data->idMhs->nama'
		),
	),
)); 

echo "<div class='row buttons'><br>" . CHtml::link('Cetak Absensi', Yii::app()->createUrl('PesertaMK/printAbsensi/', array('id' => $id_jadwal)), array('class'=>'btn btn-default', 'style' => 'width: 500px;')) . "</div>";   
echo "<div class='form left'>" . CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class' => 'btn btn-default')) . "</div>";  
?>