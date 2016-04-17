<?php
/* @var $this RuangController */
/* @var $model Ruang */
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
                <li>
                  <a href="<?php echo $url ?>/Jadwal/admin">Jadwal</a>
                </li>
                <li class="active">
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

<h2><strong>Kelola Ruangan</strong></h2>
<?php 
  if(Yii::app()->user->hasFlash('success')):?>
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


<div class="left buat">
	<a class="btn btn-default green" href="<?php echo $url ?>/ruang/create" role="button">Buat Ruangan Baru</a>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ruang-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
            'header'=>'No.',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions'=>array('width'=>'25px'),
        ),
        array(
        	'header' => 'No Ruangan',
        	'value'=>'$data->no_ruang',
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
