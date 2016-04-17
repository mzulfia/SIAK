<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>
<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>

<h2><strong>Ubah Pembayaran</strong></h2>
<?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="alert-success">
            <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
        </div>
    <?php endif; ?>

<div class="alert-success" id='success'>
          <?php echo "<h4 style= 'color: #00923f'> Berhasil disimpan! </h4>"; ?>
</div>
<div class="alert-danger" id='danger'>
          <?php echo "<h4 style= 'color: red'> Gagal disimpan! </h4>"; ?>
</div>
<hr>

<script type="text/javascript">
    $("#success").hide();
    $("#danger").hide();
</script>


<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'pembayaran-grid',
    'dataProvider'=>$model->searchMhs($id_mhs),
    'columns'=>array(
        array(
            'header'=>'No.',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions'=>array('width'=>'25px'),
        ),
        array(
            'header' => 'Periode',
            'type' => 'raw',
            'value' => '$data->tahun_ajaran . "-" . $data->semester' ,
            'htmlOptions'=>array('width'=>'150px'),
        ),
        array(
            'header' => 'Nama',
            'value' => '$data->idMhs->nama',
            'htmlOptions'=>array('width'=>'150px'),
        ),
        array(
            'header' => 'Semester',
            'value' => '$data->idMhs->semester',
            'htmlOptions'=>array('width'=>'50px'),
        ),
        array(
            'name'=>'pembayaran',
            'header'=>'Pembayaran',
            'type'=>'raw',
            'value'=> '($data->status == "LUNAS") ? $data->pembayaran : (CHtml::textField("pembayaran[$data->id_pembayaran]", $data->pembayaran))',
            'htmlOptions'=>array('width'=>'100px'),
        ),
        array(
            'name'=> 'tagihan',
            'header'=>'Tagihan',
            'value'=>'$data->tagihan',
            'htmlOptions'=>array('width'=>'150px'),
        ), 
        array(
            'header' => 'Status',
            'type' => 'raw',
            'value'=> '$data->status',
            'htmlOptions'=>array('width'=>'100px'),
        ),
        array(
            'class' => 'CButtonColumn',
            'htmlOptions'=>array('width'=>'75px'),
        ),
    ),
)); ?>

<script>
function successGrid(data) {
    $.fn.yiiGridView.update('pembayaran-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("success").style.display = "block";
    $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function dangerGrid(data){
    $.fn.yiiGridView.update('pembayaran-grid');
    $('html, body').animate({ scrollTop: 0 }, 0);
    document.getElementById("danger").style.display = "block";
    $(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");
}
function reloadGrid(data){
    $.fn.yiiGridView.update('pembayaran-grid');
}
</script>



<?php 
    echo CHtml::ajaxSubmitButton('Update Semester', array('pembayaran/ajaxupdate', 'act' => 'setStatus', 'id_mhs'=>$id_mhs), 
         array(
            'success'=>'successGrid',
         ),
          array(
            'class'=>'btn btn-info', 
            'confirm'=>"Apakah Anda yakin?\r\nPerubahan bersifat permanen dan tidak bisa diperbaiki."
         )
    ); 
    echo "&nbsp";
    echo CHtml::ajaxSubmitButton('Save', array('pembayaran/ajaxupdate','act'=>'setPembayaran'), array('success'=>'successGrid', 'error' => 'dangerGrid'), array('class' => 'btn btn-primary')); 
    $this->endWidget(); 
    echo "<div class='form left'><br>" . CHtml::link('Back', array('/Pembayaran/admin'), array('class' => 'btn btn-default')) . "</div>"; 
?>