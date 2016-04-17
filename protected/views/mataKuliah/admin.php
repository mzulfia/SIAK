<?php
/* @var $this MataKuliahController */
/* @var $model MataKuliah */

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
                <li class="active">
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
<h2><strong>Kelola Mata Kuliah</strong></h2>
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

<div class="left buat">
	<a class="btn btn-default green" href="<?php echo $url ?>/MataKuliah/create" role="button">Buat Mata Kuliah Baru</a>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mata-kuliah-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
        'name'=>'kode_mk',
        'type'=>'raw',
        'value'=>'CHtml::link($data->kode_mk, array("/PengajarMK/listPengajar/" . $data->id_mk))'
    ),
    'nama_mk',
		'sks',
		'semester',
    array(
      'header'=>'Daftar Pengajar',
      'type'=>'raw',
      'value'=>'PengajarMK::model()->getPengajarMK($data->id_mk)',
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
