<?php
/* @var $this DosenController */
/* @var $model Dosen */

Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-danger").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);

?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="alert-danger">
        <?php echo "<h4 style= 'color: red'>" . Yii::app()->user->getFlash('error') . "</h4>"; ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>