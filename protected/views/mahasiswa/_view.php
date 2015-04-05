<?php
/* @var $this MahasiswaController */
/* @var $data Mahasiswa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nim')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nim), array('view', 'id'=>$data->nim)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip_dosen')); ?>:</b>
	<?php echo CHtml::encode($data->nip_dosen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jurusan')); ?>:</b>
	<?php echo CHtml::encode($data->jurusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fakultas')); ?>:</b>
	<?php echo CHtml::encode($data->fakultas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenjang')); ?>:</b>
	<?php echo CHtml::encode($data->jenjang); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status_akademis')); ?>:</b>
	<?php echo CHtml::encode($data->status_akademis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_nikah')); ?>:</b>
	<?php echo CHtml::encode($data->status_nikah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_telp')); ?>:</b>
	<?php echo CHtml::encode($data->no_telp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_hp')); ?>:</b>
	<?php echo CHtml::encode($data->no_hp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kewarganegaraan')); ?>:</b>
	<?php echo CHtml::encode($data->kewarganegaraan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agama')); ?>:</b>
	<?php echo CHtml::encode($data->agama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_rumah')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_rumah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_tinggal')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_tinggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_pos')); ?>:</b>
	<?php echo CHtml::encode($data->kode_pos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_ortu')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_ortu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_pos_ortu')); ?>:</b>
	<?php echo CHtml::encode($data->kode_pos_ortu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pddkan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->pddkan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pddkan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->pddkan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penghasilan')); ?>:</b>
	<?php echo CHtml::encode($data->penghasilan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asal_sma')); ?>:</b>
	<?php echo CHtml::encode($data->asal_sma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jurusan_sma')); ?>:</b>
	<?php echo CHtml::encode($data->jurusan_sma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kota_kab')); ?>:</b>
	<?php echo CHtml::encode($data->kota_kab); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->provinsi); ?>
	<br />

	*/ ?>

</div>