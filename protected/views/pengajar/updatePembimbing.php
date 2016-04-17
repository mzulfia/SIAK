<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */

$this->menu=array(
	array('label'=>'List Pembimbing', 'url'=>array('index')),
	array('label'=>'Manage Pembimbing', 'url'=>array('admin')),
);
?>
<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>

<h2><strong>Ubah Pembimbing</strong></h2>
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

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pembimbing-grid',
	'dataProvider'=>$model->searchUpdate($id),
	'columns'=>array(
		array(
			'header'=>'No.',
	        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
			'htmlOptions' => array('width'=>'25px'),
		),
		array(
			'name' => 'id_mhs',
            'header' => 'Nama Mahasiswa',
            'type' => 'raw',
            //'value'=> 'CHtml::checkBoxlist("id_mhs[$data->id_pembimbing]", $data->id_mhs, CHtml::listData(Mahasiswa::model()->findAll(), "id_mhs", "nama"), array("checkAll"=>"Pilih Semua Mahasiswa", "checkAllLast"=>true))',
          	//'value' => 'CHtml::checkBoxList(Pembimbing::getMahasiswa($data->id_dosen), array("disable" => true))',
            //'value'=> 'Pembimbing::getMahasiswa($data->id_dosen)',
            'value' => 'CHtml::dropDownlist("id_mhs[$data->id_pembimbing]", $data->id_mhs, Pembimbing::getListMhs())',
            'htmlOptions' => array('width'=>'200px'),
        ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
			'buttons' => array(
				'delete' => array(
					'label' => 'Drop Mahasiswa',
					'url' => 'Yii::app()->createUrl("pembimbing/delete", array("id" => $data->id_pembimbing))',
				),
			),
		),
	),
)); 
?>

<script>
function successGrid(data) {
    $.fn.yiiGridView.update('pembimbing-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('pembimbing-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>up
<?php//echo CHtml::button('Add', Yii::app()->createUrl('pembimbing/addMhs'), array('id' => $id)); echo '&nbsp';?>
<?php echo CHtml::ajaxSubmitButton('Save',Yii::app()->createUrl('pembimbing/ajaxSave'), array('success' => 'succesGrid', 'error' => 'dangerGrid'), array('class' => 'btn-success'));?>
<?php $this->endWidget(); ?>
