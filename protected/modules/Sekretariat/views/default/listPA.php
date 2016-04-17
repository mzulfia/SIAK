<?php $url = Yii::app()->request->baseUrl; ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url ?>/Mahasiswa/default/admin">Mahasiswa</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Dosen/default/admin">Dosen</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url ?>/Sekretariat/default/listPA">Pembimbing</a>
                </li>
		<li>
                	<a href="<?php echo $url ?>/Sekretariat/default/viewLulusan">Lulusan</a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
<h2><strong>Kelola Pembimbing Akademis</strong></h2>
<div class="left buat">
	<a class="btn btn-default green" href="<?php echo $url ?>/Sekretariat/default/updatePA" role="button">Ubah PA</a>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>

<?php 

//$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
$this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'pembimbing-grid',
  'dataProvider'=>$model->search(),
  'columns'=>array(
    array(
      'header'=>'No.',
          'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
      'htmlOptions' => array('width'=>'25px'),
    ),
    array(
      'header' => 'Nama Dosen',
      'value' => '$data->nama',
    ),
    array(
            'header' => 'Nama Mahasiswa',
            'type' => 'raw',
            'value'=> 'Mahasiswa::getMahasiswa($data->id_dosen)',
            'htmlOptions'=>array('width'=>'200px'),
        ),
        // array(
        //     'header'=>CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,50=>50,100=>100),array(
        //               'onchange'=>"$.fn.yiiGridView.update('pembimbing-grid',{ data:{pageSize: $(this).val() }})",
        //  )),
        //  'value' => '',
        // ),
  ),
)); ?>
<?php $this->endWidget(); ?>

