<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);

?>

<script type="text/javascript">
    $("#success").hide();
</script>

<?php $url = Yii::app()->request->baseUrl; ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                	<a href="<?php echo $url ?>/Kalender/admin">Kalender</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/MataKuliah/admin">Mata Kuliah</a>
                </li>
                <li class="active">
                	<a href="<?php echo $url ?>/Jadwal/admin">Jadwal</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/Ruang/admin">Ruangan</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/PesertaMK/viewListMKSBA">Perkuliahan</a>
                </li>
              </ul>
            </div>
          </div>
    </div>
</div>
<h2><strong>Kelola Jadwal</strong></h2>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert-success">
        <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
    </div>
<?php endif; ?>

<div class="alert-success" id='success'>
          <?php echo "<h4 style= 'color: #00923f'> Berhasil dihapus! </h4>"; ?>
</div>

<script type="text/javascript">
    $("#success").hide();
</script>
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

<div class="left buat">
	<a class="btn btn-default green" href="<?php echo $url ?>/Jadwal/create" role="button">Buat Jadwal Baru</a>
</div>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jadwal-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'header' => 'Periode',
			'value' => '$data->tahun_ajaran . " " . $data->semester',
			'htmlOptions'=>array('width'=>'155px'),
		), 
		array(
			'header' => 'Waktu',
			'type' => 'raw',
			'value' => '(empty($data->hari_1) ? "" : ($data->hari_1 . ", ")) . (($data->waktu_awal_1 == "00:00:00") ? "" : date("H:i", strtotime($data->waktu_awal_1)) . "-") . (($data->waktu_akhir_1 == "00:00:00") ? "" : (date("H:i", strtotime($data->waktu_akhir_1)) . "<br>")) . (empty($data->hari_2) ? "" : ($data->hari_2 . ", ")) . (($data->waktu_awal_2 == "00:00:00") ? "" : date("H:i", strtotime($data->waktu_awal_2)) . "-") . (($data->waktu_akhir_2 == "00:00:00") ? "" : (date("H:i", strtotime($data->waktu_akhir_2)) . "<br>")) . (empty($data->hari_3) ? "" : ($data->hari_3 . ", ")) . (($data->waktu_awal_3 == "00:00:00") ? "" : date("H:i", strtotime($data->waktu_awal_3)) . "-") . (($data->waktu_akhir_3 == "00:00:00") ? "" : (date("H:i", strtotime($data->waktu_akhir_3)) . "<br>")) . (empty($data->hari_4) ? "" : ($data->hari_4 . ", ")) . (($data->waktu_awal_4 == "00:00:00") ? "" : date("H:i", strtotime($data->waktu_awal_4)) . "-") . (($data->waktu_akhir_4 == "00:00:00") ? "" : (date("H:i", strtotime($data->waktu_akhir_4)) . "<br>"))', 
			'htmlOptions'=>array('width'=>'150px'),
		),
		array(
			'header' => 'Mata Kuliah',
			'type' => 'raw',
			'value' => 'CHtml::link($data->idMk->nama_mk, array("PengajarKuliah/addPengajarKuliah/" . $data->id_jadwal))',
		),
		array(
			'header' => 'Kelas',
			'value' => '$data->kelas',
		),
		array(
			'header' => 'Kapasitas',
			'value' => '$data->kapasitas',
		),
		array(
			'name' => 'Ruang',
			'type' => 'raw',
			'value' => '(empty($data->id_ruang_1) ? "" : $data->idRuang1->no_ruang) . (empty($data->id_ruang_2) ? "" : "<br>" . $data->idRuang2->no_ruang) . (empty($data->id_ruang_3) ? "" : "<br>" . $data->idRuang3->no_ruang) . (empty($data->id_ruang_4) ? "" : "<br>" . $data->idRuang4->no_ruang)',
		),
		array(
			'header'=>'Pengajar',
			'type'=> 'raw',
			'value'=>'PengajarKuliah::model()->getPengajarKuliah($data->id_jadwal)'
		),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'75px'),
		      'afterDelete'=>'function(link,success,data){ 
		        if(success){  
		          $("html, body").animate({ scrollTop: 0 }, 0);
		            document.getElementById("success").style.display = "block";
		            $(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow"); 
		          }
		        };',
		),
	),
)); ?>
