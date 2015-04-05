<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswas'=>array('index'),
<<<<<<< HEAD
	$model->nim,
=======
	$model->id_mhs,
>>>>>>> origin/master
);

$this->menu=array(
	array('label'=>'List Mahasiswa', 'url'=>array('index')),
	array('label'=>'Create Mahasiswa', 'url'=>array('create')),
<<<<<<< HEAD
	array('label'=>'Update Mahasiswa', 'url'=>array('update', 'id'=>$model->nim)),
	array('label'=>'Delete Mahasiswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nim),'confirm'=>'Are you sure you want to delete this item?')),
=======
	array('label'=>'Update Mahasiswa', 'url'=>array('update', 'id'=>$model->id_mhs)),
	array('label'=>'Delete Mahasiswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mhs),'confirm'=>'Are you sure you want to delete this item?')),
>>>>>>> origin/master
	array('label'=>'Manage Mahasiswa', 'url'=>array('admin')),
);
?>

<<<<<<< HEAD
<h1>View Mahasiswa #<?php echo $model->nim; ?></h1>
=======
<h1>View Mahasiswa #<?php echo $model->id_mhs; ?></h1>
>>>>>>> origin/master

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<<<<<<< HEAD
		'nim',
		'nama',
		'id_user',
		'nip_dosen',
		'jurusan',
		'fakultas',
		'jenjang',
		'status_akademis',
=======
		'id_mhs',
		'nim',
		'nama',
		'id_user',
		'id_dosen',
		'jurusan',
		'fakultas',
		'jenjang',
>>>>>>> origin/master
		'tanggal_lahir',
		'tempat_lahir',
		'status_nikah',
		'no_telp',
		'no_hp',
		'email',
		'tanggal_masuk',
		'jenis_kelamin',
		'kewarganegaraan',
		'agama',
		'alamat_rumah',
		'alamat_tinggal',
		'kode_pos',
		'nama_ayah',
		'tahun_ayah',
		'nama_ibu',
		'tahun_ibu',
		'alamat_ortu',
		'kode_pos_ortu',
		'pddkan_ayah',
		'pddkan_ibu',
		'penghasilan',
		'asal_sma',
		'jurusan_sma',
		'kota_kab',
		'provinsi',
	),
)); ?>
