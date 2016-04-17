<?php $url = Yii::app()->request->baseUrl; 
$id= Dosen::model()->getId(Yii::app()->user->getId());?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url.'/PesertaMK/viewListMK/'.$id?>">List Mata Kuliah</a>
                </li>
                <li class="active">
                	<a href="#">Komponen</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h1><strong>Komponen</strong></h1>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'komponen-grid',
	'dataProvider'=>$model->searchUpdate($id_jadwal),
	'columns'=>array(
		array(
            'header'=>'No.',
        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
  		array(
			'name' => 'nama',
			'header' => 'Nama Komponen',
		),
		array(
			'name' => 'bobot',
			'header' => 'Bobot Komponen',
			'value' => '$data->bobot*100 . "%"'
		),
		array(
			'name' => 'nilai_maks',
			'header' => 'Nilai Maksimum',
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view} {update} {delete}',
			'deleteConfirmation' => 'Apakah Anda yakin?',
			'afterDelete'=>'function(link,success,data){ 
				if(success) 
					alert("Drop telah berhasil");
			}',
			'buttons' => array(
				'view' => array(
					'label' => 'Lihat Komponen',
					'url' => 'Yii::app()->createUrl("komponen/update", array("id" => $data->id_komponen))',
				),
				'update' => array(
					'label' => 'Isi Nilai',
					'url' => 'Yii::app()->createUrl("nilai/TableNilai", array("komponen" => $data->id_komponen, "jadwal" => $data->id_jadwal))'
				),
				'delete' => array(
					'label' => 'Drop Komponen',
					'url' => 'Yii::app()->createUrl("komponen/delete", array("id" => $data->id_komponen))'
				),
			),
		),
	),
)); 
?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('komponen-grid');
}
</script>
<div class="center">
<?php echo CHtml::ajaxSubmitButton('Add', Yii::app()->createUrl('komponen/ajaxAdd', array('id_jadwal' => $id_jadwal)), array('success' => 'reloadGrid'), array('class' => 'btn btn-success'));?>
</div>
<?php echo "<div class='form left'>" . CHtml::link('Back', array('/PesertaMK/viewListMK/' . $id), array('class' => 'btn btn-default')) . "</div>"; ?>
