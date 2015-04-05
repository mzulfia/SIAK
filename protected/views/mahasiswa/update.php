<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswas'=>array('index'),
<<<<<<< HEAD
	$model->nim=>array('view','id'=>$model->nim),
=======
	$model->id_mhs=>array('view','id'=>$model->id_mhs),
>>>>>>> origin/master
	'Update',
);

$this->menu=array(
	array('label'=>'List Mahasiswa', 'url'=>array('index')),
	array('label'=>'Create Mahasiswa', 'url'=>array('create')),
<<<<<<< HEAD
	array('label'=>'View Mahasiswa', 'url'=>array('view', 'id'=>$model->nim)),
=======
	array('label'=>'View Mahasiswa', 'url'=>array('view', 'id'=>$model->id_mhs)),
>>>>>>> origin/master
	array('label'=>'Manage Mahasiswa', 'url'=>array('admin')),
);
?>

<<<<<<< HEAD
<h1>Update Mahasiswa <?php echo $model->nim; ?></h1>
=======
<h1>Update Mahasiswa <?php echo $model->id_mhs; ?></h1>
>>>>>>> origin/master

<?php $this->renderPartial('_form', array('model'=>$model)); ?>