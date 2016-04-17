<?php
$this->menu=array(
	array('label'=>'List Pembimbing', 'url'=>array('index')),
);
?>

<h1>Manage Pembimbings</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bimbinganS-grid',
	'dataProvider'=>$model->searchPembimbing(),
	'columns'=>array(
		array(
			'header' => 'Nama Dosen',
			'value' => '$data->idDosen->nama',
		),
		array(
            'header' => 'Nama Mahasiswa',
            'type' => 'raw',
            //'value'=> 'Pembimbing::getMahasiswa($data->id_dosen)',
            'htmlOptions'=>array('width'=>'200px'),
        ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}',
			'buttons' => array(
				'update' => array(
					'label' => 'Edit Pembimbing',
					'url' => 'Yii::app()->createUrl("pembimbing/update", array("id" => $data->id_dosen))',
				),
			),
		),
	),
)); ?>
<?php $this->endWidget(); ?>
