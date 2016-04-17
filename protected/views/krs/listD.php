<h2><strong>KRS</strong></h2>
<?php echo "<h3>" . Mahasiswa::model()->getNama($id_mhs) . "</h3>"; ?>

<?php 
 	$this->widget('zii.widgets.grid.CGridView', array(
 	'id'=>'krs-grid',
	'dataProvider'=>$model->searchKrsMhs($id_mhs),
	'columns'=>array(
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
		array(
			'name' => 'id_mk',
			'header' => 'Nama Mata Kuliah',
			'value' => '$data->idMk->nama_mk',
		),
		array(
			'header' => 'Jumlah SKS',
			'value' => '$data->idMk->sks',
		),
		array(
			'name' => 'semester',
			'value' => '$data->semester',
		),
		array(
			'header' => 'Kapasitas',
			'value' => '$data->idMk->kapasitas',
		),
		array(
			'header' => 'Pengajar',
			'value' => '$data->idMk->idDosen->nama',
		),
		array(
			'header' => 'Pengajar',
			'value' => '$data->idMk->idDosen->nama',
		),
	),
)); 

echo CHtml::link('Back', Yii::app()->createUrl('Dosen/default/listAktif'));
?>