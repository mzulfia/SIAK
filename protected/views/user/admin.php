<?php
/* @var $this UserController */
/* @var $model User */

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
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");


?>

<script type="text/javascript">
    $("#success").hide();
</script>

<?php $url = Yii::app()->request->baseUrl; ?>
<h2 class="title"><strong>Kelola User</strong></h2>
<hr>

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

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<br>
	<div class="col-md-6 search-form">
		<div class="form-inline">
			<div class="form-group">
				<label class="search-label">Username</label>
				<?php echo $form->textField($model,'username', array('class'=>'form-control search-input')); ?>
			</div>
			<div class="form-group">
				<label class="search-label">Role</label>		
				<?php echo $form->dropDownList($model,'id_role', User::model()->getRoleOption(), array('empty' => '-Pilih Role-', 'class'=>'form-control input')); ?>
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
	<a class="btn btn-default green" href="<?php echo $url ?>/user/create" role="button">Buat User Baru</a>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'header' => 'Username',
			'value' => '$data->username'
		),	
		array(
			'header' => 'Role',
			'value' => '$data->idRole->nama'
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
