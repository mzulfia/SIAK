<?php
/* @var $this UserController */
/* @var $model User */

?>

<h2><strong><?php echo $model->username; ?></strong></h2>
<?php $url = Yii::app()->request->baseUrl.'/index.php'; ?>
<div class='table-responsive'>
	<?php 
	$role = $model->idRole->nama;
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'username',
			array(
				'label' => 'Role',
				'value' => $role,
			),
		),
	)); ?>
</div>
<div class='operasi'>
	<a href='<?php echo $url ?>/user/update/<?php echo $model->id_user ;?>' class="btn btn-warning">Edit</a>
</div>