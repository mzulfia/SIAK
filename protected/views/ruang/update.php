<?php
/* @var $this RuangController */
/* @var $model Ruang */
?>

<h2><strong>Ubah Ruangan</strong></h2>

<?php if(Yii::app()->user->hasFlash('error')):?>
	    <div class="alert-danger">
	        <?php echo "<h4 style= 'color: red'>" . Yii::app()->user->getFlash('error') . "</h4>"; ?>
	    </div>
<?php endif; ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>