<?php $this->widget('application.vendors.mpdf.*', array(
    'id'            => 'weeklyservicereport-grid',
    'dataProvider'  => $dataProvider,
    'columns'       => array( 
    	array(
	      'header'=>'No.',
	      'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
	      'htmlOptions'=>array('width'=>'25px'),
	    ),
	    array(
	      'header'=>'NIM',
	      'value'=>'$data->nim',
	      'htmlOptions'=>array('width'=>'125px'),
	    ),
		array(
			'header' => 'Nama',
			'value' => '$data->nama',
		),
		array(
			'header' => 'Angkatan',
			'value' => '($data->tanggal_masuk == NULL) ? "" : date("Y", strtotime($data->tanggal_masuk))',
		),
		array(
			'header' => 'Kredit',
			'value' => 'Khs::model()->getTotalSKSLulus($data->id_mhs)',
		),
		array(
			'header' => 'IPK',
			'value' => 'Khs::model()->getIPK($data->id_mhs)',	
		),
    ),
));
?>