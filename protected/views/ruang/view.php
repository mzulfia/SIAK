<?php
/* @var $this RuangController */
/* @var $model Ruang */
?>

<h2><strong>Lihat Ruang</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ruang',
		'no_ruang',
	),
)); ?>

<?php $url = Yii::app()->request->baseUrl; ?>
<div class='operasi'>
  <a href='<?php echo $url ?>/Ruang/update/<?php echo $model->id_ruang ;?>' class="btn btn-warning">Edit</a>
</div>
