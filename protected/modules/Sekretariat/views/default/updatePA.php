<?php
/* @var $this PembimbingController */
/* @var $model Pembimbing */

?>
<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>


<?php $url = Yii::app()->request->baseUrl; ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url ?>/Sekretariat/default/listPA">Daftar Pembimbing</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url ?>/Sekretariat/default/updatePA">Ubah Pembimbing</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h1><strong>Ubah Pembimbing Akademis</strong></h1>


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
  'id'=>'updatePA-grid',
  'dataProvider'=>$model->search(),
  'columns'=>array(
    array(
      'header'=>'No.',
          'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
      'htmlOptions' => array('width'=>'25px'),
    ),
    'nim',
    'nama',
    array(
      'name' => 'id_dosen_pa',
      'header' => 'Nama Dosen',
      'type' => 'raw',
      'value' => 'CHtml::dropDownlist("id_dosen_pa[$data->id_mhs]", $data->id_dosen_pa, Dosen::getListDosen(), array("empty" => "-Pilih-", "style" => "Width: 150px"))',
      'htmlOptions' => array('width'=>'150px'),
  ),
  ),
)); 


?>
<script>
function successGrid(data) {
    $.fn.yiiGridView.update('updatePA-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('updatePA-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
</script>
<?php echo CHtml::ajaxSubmitButton('Save',Yii::app()->createUrl('Sekretariat/default/ajaxSave'), array('success' => 'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-success')); ?>

<?php $this->endWidget(); ?>

