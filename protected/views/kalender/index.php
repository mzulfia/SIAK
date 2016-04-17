<?php
/* @var $this KalenderController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kalender-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php 

$url = Yii::app()->request->baseUrl; 

$dosen = Dosen::model()->getId(Yii::app()->user->getId());
$mhs = Mahasiswa::model()->getId(Yii::app()->user->getId());
if(Yii::app()->user->isAdmin())
{
	echo "<div class='container tab-kalender'>
        <div class='row clearfix'>
          <div class='col-md-12 column'>
            <div class='tabbable' id='tabs-59303'>
              <ul class='nav nav-tabs'>
                <li class='active'>
                	<a href=" . $url . "/Kalender>Kalender</a>
                </li>
                <li>
                	<a href=" . $url . "/Jadwal/viewJadwalD>Jadwal</a>
                </li>
                <li>
                	<a href=" . $url . "/PesertaMK/viewListMK/". $dosen .">Perkuliahan</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
</div>";
}
else if(Yii::app()->user->isDosen())
{
	echo "<div class='container tab-kalender'>
        <div class='row clearfix'>
          <div class='col-md-12 column'>
            <div class='tabbable' id='tabs-59303'>
              <ul class='nav nav-tabs'>
                <li class='active'>
                	<a href=" . $url . "/Kalender>Kalender</a>
                </li>
                <li>
                	<a href=" . $url . "/Jadwal/viewJadwalD>Jadwal</a>
                </li>
                <li>
                	<a href=" . $url . "/PesertaMK/viewListMK/". $dosen .">Perkuliahan</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
</div>";

}
else
{
	echo "<div class='container tab-kalender'>
        <div class='row clearfix'>
          <div class='col-md-12 column'>
            <div class='tabbable' id='tabs-59303'>
              <ul class='nav nav-tabs'>
                <li class='active'>
                	<a href=" . $url . "/Kalender>Kalender</a>
                </li>
                <li>
                	<a href=" . $url . "/Khs/viewRingkasan/" . $mhs . ">Ringkasan</a>
                </li>
                <li>
                	<a href=" . $url . "/Khs/viewRiwayat/". $mhs .">Riwayat</a>
                </li>
                <li>
                	<a href=" . $url . "/Pembayaran/viewSPP/>Pembayaran</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
</div>";
}
?>
<h2><strong>Kalender</strong></h2>
<hr>

<?php
/* @var $this KalenderController */
/* @var $model Kalender */
/* @var $form CActiveForm */
?>

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
          <?php echo $form->dropDownList($model,'tahun_ajaran', CHtml::listData(Kalender::model()->findAll(), 'tahun_ajaran', 'tahun_ajaran'), array('empty' => '-Pilih Tahun-','class'=>'form-control search-input')); ?>
        </div>
        <div class="form-group">
          <label class="search-label">Semester</label>    
          <?php echo $form->dropDownList($model,'semester', array('Gasal' => 'Gasal', 'Genap' => 'Genap'), array('empty' => '-Pilih Semester-','class'=>'form-control search-input')); ?>
        </div>  
        <?php echo CHtml::submitButton('Search', array('class'=>'search-btn btn-primary')); ?>
      </div>
    </div>
    <br>
  <?php $this->endWidget(); ?>
  </div>
  <br>
  <br>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kalender-grid',
	'dataProvider'=>$model->searchIndex(),
	'columns'=>array(
		array(
			'header' => 'Periode',
			'value' => 'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->tanggal_awal)) . " - " . Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->tanggal_akhir))',
			'htmlOptions'=>array('width'=>'150px'),
		),
		array(
			'header' => '# Hari',
			'value' => '((int)((strtotime($data->tanggal_akhir) - strtotime($data->tanggal_awal))/60/60/24))+1 . " hari"',
			'htmlOptions'=>array('width'=>'50px'),
		),
		array(
			'header' => 'Tahun Ajaran',
			'value' => '$data->tahun_ajaran',
		),
		array(
			'header' => 'Semester',
			'value' => '$data->semester',
		),
		array(
			'header' => 'Jenis Event',
			'value' => '$data->jenis_event',
			'htmlOptions'=>array('width'=>'150px'),
		),
		array(
			'header' => 'Keterangan',
			'value' => '$data->keterangan',
			'htmlOptions'=>array('width'=>'180px'),
		),
	),
)); ?>