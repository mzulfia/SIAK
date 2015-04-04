<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */

$this->breadcrumbs=array(
	'Mahasiswas'=>array('index'),
	$model->id_mhs,
);

$this->menu=array(
	array('label'=>'List Mahasiswa', 'url'=>array('index')),
	array('label'=>'Create Mahasiswa', 'url'=>array('create')),
	array('label'=>'Update Mahasiswa', 'url'=>array('update', 'id'=>$model->id_mhs)),
	array('label'=>'Delete Mahasiswa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mhs),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mahasiswa', 'url'=>array('admin')),
);
?>

<h1>View Mahasiswa #<?php echo $model->id_mhs; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_mhs',
		'nim',
		'nama',
		'id_user',
		'id_dosen',
		'jurusan',
		'fakultas',
		'jenjang',
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
