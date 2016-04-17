<?php
/* @var $this DosenController */
/* @var $model Dosen */

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

<?php 
$url = Yii::app()->request->baseUrl;
if(!Yii::app()->user->isAdmin()) {
?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url ?>/Mahasiswa/default/admin">Mahasiswa</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url ?>/Dosen/default/admin">Dosen</a>
                </li>
                <li>
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
<?php } else { ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
		<li>
                	<a href="<?php echo $url ?>/Admin/default/admin">Admin</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Mahasiswa/default/admin">Mahasiswa</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url ?>/Dosen/default/admin">Dosen</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Sekretariat/default/admin">Sekretariat</a>
                </li>
		<li>
                	<a href="<?php echo $url ?>/Sekretariat/default/viewLulusan">Lulusan</a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
<?php } ?>
<h2><strong>Kelola Dosen</strong></h2>
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
        <label class="search-label">NIP</label>
        <?php echo $form->textField($model,'nip_dosen', array('class'=>'form-control search-input')); ?>
      </div>
      <div class="form-group">
        <label class="search-label">Nama</label>
        <?php echo $form->textField($model,'nama', array('class'=>'form-control search-input')); ?>
      </div>
      <?php echo CHtml::submitButton('Search', array('class'=>'search-btn btn-primary')); ?>
    </div>
  </div>
  <br>
<?php $this->endWidget(); ?>
</div>
<br>
<br>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dosen-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
          'header'=>'No.',
          'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
          'htmlOptions'=>array('width'=>'25px')
    ),
    array(
      'header'=>'NIP',
      'value'=>'$data->nip_dosen',
      'htmlOptions'=>array('width'=>'125px'),
    ),
    array(
          'header' => 'Username',
          'value' => '$data->idUser->username',
          'htmlOptions'=>array('width'=>'100px')
    ),
		array(
			'header' => 'Nama',
			'value' => '$data->nama',

		),
		array(
			'header' => 'Status Pembimbing',
			'value' => 'Dosen::model()->getStatus($data->id_dosen)',
		),
    array(
      'header' => 'Nama Mata Kuliah',
      'type' => 'raw',
      'value' => 'MataKuliah::model()->getMK($data->id_dosen)',
    ),
		array(
			'template'=>'{view}',
			'class'=>'CButtonColumn',
		),
	),	
)); ?>
