<?php
/* @var $this KalenderController */
/* @var $model Kalender */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lulusan-grid').yiiGridView('update', {
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
                <li>
                	<a href="<?php echo $url ?>/Dosen/default/admin">Dosen</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Sekretariat/default/listPA">Pembimbing</a>
                </li>
		<li class="active">
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
                <li>
                	<a href="<?php echo $url ?>/Dosen/default/admin">Dosen</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Sekretariat/default/admin">Sekretariat</a>
                </li>
		<li class="active">
                	<a href="<?php echo $url ?>/Sekretariat/default/viewLulusan">Lulusan</a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
<?php } ?>
<h2><strong>Daftar Lulusan</strong></h2>


<?php
/* @var $this KalenderController */
/* @var $model Kalender */
/* @var $form CActiveForm */
?>
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
        <label class="search-label">Angkatan</label>
        <?php echo $form->dropDownList($model,'tanggal_masuk', Mahasiswa::model()->getYearOption(), array('empty' => '-Pilih Angkatan-','class'=>'form-control search-input')); ?>
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
	'id'=>'lulusan-grid',
	'dataProvider'=>$model->searchLulusan(),
	//'filter'=>$model,
	 'columns'=>array(
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

echo "<div class='row buttons'><br>" . CHtml::link('Cetak Daftar Lulusan', Yii::app()->createUrl('Sekretariat/default/printLulusan/'), array('class'=>'btn btn-default', 'style' => 'width: 500px;')) . "</div>";   
?>

