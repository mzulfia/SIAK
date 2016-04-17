

<?php
/* @var $this PembayaranController */
/* @var $model Pembayaran */
    

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#pembayaran-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");


?>
<?php $url = Yii::app()->request->baseUrl; ?>

<h2><strong>Kelola Pembayaran Mahasiswa</strong></h2>
<hr>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

  <br>
  <div class="col-md-6 search-form">
    <div class="form-inline">
        <div class="form-group">
            <label class="search-label">Tahun Ajaran</label>
            <?php echo $form->dropDownList($model, 'tahun_ajaran', CHtml::listData(Kalender::model()->findAll(), 'tahun_ajaran', 'tahun_ajaran'), array('empty' => '-Pilih Tahun-','class'=>'form-control search-input')); ?>
        </div>
        <div class="form-group">
           <label class="search-label">Semester</label>    
           <?php echo $form->dropDownList($model, 'semester', array('Gasal' => 'Gasal', 'Genap' => 'Genap'), array('empty' => '-Pilih Semester-','class'=>'form-control search-input')); ?>
        </div>  
      <div class="form-group">
        <label class="search-label">NIM</label>
        <?php echo $form->textField($model, 'mhs_nim', array('class'=>'form-control search-input')); ?>
      </div>
      <?php echo CHtml::submitButton('Search', array('class'=>'search-btn btn-primary')); ?>
    </div>
  </div>
  <br>
<?php $this->endWidget(); ?>
</div>
<br>
<br>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'pembayaran-grid',
    'dataProvider'=>$model->search(),
    'columns'=>array(
        array(
            'header'=>'No.',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions'=>array('width'=>'25px'),
        ),
        array(
            'name' => 'mhs_nim',
            'header' => 'NIM',
            'value' => '$data->idMhs->nim',
        ), 
        array(
            'header' => 'Nama',
            'value' => '$data->idMhs->nama',
        ), 
        array(
            'header' => 'Periode',
            'type' => 'raw',
            'value' => '$data->tahun_ajaran . " " . $data->semester' ,
            'htmlOptions'=>array('width'=>'150px'),
        ),
        array(
            'header' => 'Pembayaran',
            'value' => '$data->pembayaran',
        ), 
        array(
            'header' => 'Tagihan',
            'value' => '$data->tagihan',
        ),
        array(
            'header' => 'Status',
            'value' => '$data->status',
        ),  
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',   
            'buttons' => array(
                'update' => array(
                    'url'=>'Yii::app()->createUrl("Pembayaran/viewPembayaranMahasiswa", array("id" => $data->id_mhs))',
                ),
            ),
        ),
    ),
)); ?>

<?php
 $this->widget('application.components.tlbExcelView', array(
                'id'                   => 'pembayaran-grid',
                'dataProvider'         => $model->search(),
                'filter'               => $model,
                'grid_mode'            => $production, // Same usage as EExcelView v0.33
                'template'           => "{exportbuttons}",
                'title'                => 'Daftar Pembayaran ' . $model->tahun_ajaran . " " . $model->semester ,
                'creator'              => 'Akademi Keperawatan Islamic Village',
                'lastModifiedBy'       => 'Akademi Keperawatan Islamic Village',
                'sheetTitle'           => date('d-m-Y'),
                'keywords'             => '',
                'category'             => '',
                'landscapeDisplay'     => true, // Default: false
                'A4'                   => true, // Default: false - ie : Letter (PHPExcel default)
                'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
                'automaticSum'         => false, // Default: false
                'decimalSeparator'     => ',', // Default: '.'
                'thousandsSeparator'   => '.', // Default: ','
                //'displayZeros'       => false,
                //'zeroPlaceholder'    => '-',
                'sumLabel'             => 'Column totals:', // Default: 'Totals'
                'borderColor'          => '000000', // Default: '000000'
                'bgColor'              => 'FFFFFF', // Default: 'FFFFFF'
                'textColor'            => '000000', // Default: '000000'
                'rowHeight'            => 45, // Default: 15
                'headerBorderColor'    => '000000', // Default: '000000'
                'headerBgColor'        => 'CCCCCC', // Default: 'CCCCCC'
                'headerTextColor'      => '000000', // Default: '000000'
                'headerHeight'         => 10, // Default: 20
                'footerBorderColor'    => '000000', // Default: '000000'
                'footerBgColor'        => 'FFFFCC', // Default: 'FFFFCC'
                'footerTextColor'      => '0000FF', // Default: '0000FF'
                'footerHeight'         => 50, // Default: 20
                'columns'              => array(
                array(
                    'name' => 'mhs_nim',
                    'header' => 'NIM',
                    'value' => '$data->idMhs->nim',
                ), 
                array(
                    'header' => 'Nama',
                    'value' => '$data->idMhs->nama',
                ), 
                array(
                    'header' => 'Periode',
                    'type' => 'raw',
                    'value' => '$data->tahun_ajaran . " " . $data->semester' ,
                    'htmlOptions'=>array('width'=>'150px'),
                ),
                array(
                    'header' => 'Pembayaran',
                    'value' => '$data->pembayaran',
                ), 
                array(
                    'header' => 'Tagihan',
                    'value' => '$data->tagihan',
                ),
                array(
                    'header' => 'Status',
                    'value' => '$data->status',
                ),  
            ), // an array of your CGridColumns
        )); 
?>