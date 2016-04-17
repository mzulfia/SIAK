<?php
/* @var $this KalenderController */
/* @var $model Kalender */

Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);

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
	$id = Sekretariat::model()->getId(Yii::app()->user->getId());
?>


	<script type="text/javascript">
	    $("#success").hide();
	</script>

<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li class="active">
                	<a href="<?php echo $url ?>/Kalender/admin">Kalender</a>
                </li>
                <li>
                	<a href="<?php echo $url ?>/MataKuliah/admin">Mata Kuliah</a>
                </li>
                <li>
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
     <h2><strong>Kelola Kalender</strong></h2>
     <?php if(Yii::app()->user->hasFlash('success')):?>
	    <div class="alert-success">
	        <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
	    </div>
	<?php endif; ?>
	<div class="alert-success" id='success'>
          <?php echo "<h4 style= 'color: #00923f'> Berhasil dihapus! </h4>"; ?>
	</div>

     <hr>

     
	<script type="text/javascript">
	    $("#success").hide();
	</script>

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
     
<?php $url = Yii::app()->request->baseUrl; ?>
<div class="left buat">
	<a class="btn btn-default green" href="<?php echo $url ?>/kalender/create" role="button">Buat Kalender Baru</a>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kalender-grid',
	'dataProvider'=>$model->search(),
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
		array(
			'class'=>'CButtonColumn',
			'afterDelete'=>'function(link,success,data){ 
				if(success){  
					$("html, body").animate({ scrollTop: 0 }, 0);
    				document.getElementById("success").style.display = "block";
   					$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow"); 
   				}
   			};',
   			'htmlOptions'=>array('width'=>'180px'),
		),
	),
)); ?>
