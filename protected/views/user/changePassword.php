<?php
/* @var $this UserController */
/* @var $model User */

Yii::app()->clientScript->registerScript(
   'myHideEffectError',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);

Yii::app()->clientScript->registerScript(
   'myHideEffectSuccess',
   '$(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");', 
   CClientScript::POS_READY
);


?>

<h2><strong>Ubah Password</strong></h2>

<?php if(Yii::app()->user->hasFlash('error')):?>
	    <div class="alert-danger">
	        <?php echo "<h4 style= 'color: red'>" . Yii::app()->user->getFlash('error') . "</h4>"; ?>
	    </div>
	<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('success')):?>
	    <div class="alert-success">
	        <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
	    </div>
	<?php endif; ?>


<?php $this->renderPartial('_formChangePassword', array('model'=>$model)); ?>