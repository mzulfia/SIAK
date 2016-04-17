<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
?>
<?php $url = Yii::app()->request->baseUrl; 
$id= Dosen::model()->getId(Yii::app()->user->getId());?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url ?>/Kalender">Kalender</a>
                </li>
                <li  class="active">
                	<a href="<?php echo $url ?>/Jadwal/viewJadwalD">Jadwal</a>
                </li>
                <li>
                	<a href="<?php echo $url.'/PesertaMK/viewListMK/'.$id?>">Perkuliahan</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<h2><strong>Jadwal Mengajar</strong></h2>
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

<?php 
  $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'jadwal-grid',
  'dataProvider'=>$model->searchJadwalD($id),
  'columns'=>array(
    array(
      'header'=>'No.',
      'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
    ),
    array(
      'header' => 'Periode',
      'type' => 'raw',
      'value' => '$data->idJadwal->tahun_ajaran . " " . $data->idJadwal->semester',
      'htmlOptions'=>array('width'=>'175px'),
    ), 
    array(
      'header' => 'Mata Kuliah',
      'value' => '$data->idJadwal->idMk->nama_mk',
    ),
    array(
      'header' => 'Kelas',
      'value' => '$data->idJadwal->kelas',
    ),
    array(
      'header' => 'SKS',
      'value' => '$data->idJadwal->idMk->sks',
    ),
    array(
      'header' => 'Waktu',
      'type' => 'raw',
      'value' => '(empty($data->idJadwal->hari_1) ? "" : ($data->idJadwal->hari_1 . ", ")) . (($data->idJadwal->waktu_awal_1 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_1)) . "-") . (($data->idJadwal->waktu_akhir_1 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_1)) . "<br>")) . (empty($data->idJadwal->hari_2) ? "" : ($data->idJadwal->hari_2 . ", ")) . (($data->idJadwal->waktu_awal_2 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_2)) . "-") . (($data->idJadwal->waktu_akhir_2 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_2)) . "<br>")) . (empty($data->idJadwal->hari_3) ? "" : ($data->idJadwal->hari_3 . ", ")) . (($data->idJadwal->waktu_awal_3 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_3)) . "-") . (($data->idJadwal->waktu_akhir_3 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_3)) . "<br>")) . (empty($data->idJadwal->hari_4) ? "" : ($data->idJadwal->hari_4 . ", ")) . (($data->idJadwal->waktu_awal_4 == "00:00:00") ? "" : date("H:i", strtotime($data->idJadwal->waktu_awal_4)) . "-") . (($data->idJadwal->waktu_akhir_4 == "00:00:00") ? "" : (date("H:i", strtotime($data->idJadwal->waktu_akhir_4)) . "<br>"))', 
    ),
    array(
      'header' => 'Ruang',
      'type' => 'raw',
      'value' => '(empty($data->idJadwal->id_ruang_1) ? "" : $data->idJadwal->idRuang1->no_ruang) . (empty($data->idJadwal->id_ruang_2) ? "" : "<br>" . $data->idJadwal->idRuang2->no_ruang) . (empty($data->idJadwal->id_ruang_3) ? "" : "<br>" . $data->idJadwal->idRuang3->no_ruang) . (empty($data->idJadwal->id_ruang_4) ? "" : "<br>" . $data->idJadwal->idRuang4->no_ruang)',
    ),
  ),
)); ?>