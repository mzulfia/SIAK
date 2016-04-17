<?php
/* @var $this JadwalController */
/* @var $data Jadwal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jadwal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jadwal), array('view', 'id'=>$data->id_jadwal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_ajaran')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_ajaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_awal_1')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_awal_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_akhir_1')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_akhir_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari_1')); ?>:</b>
	<?php echo CHtml::encode($data->hari_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_awal_2')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_awal_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_akhir_2')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_akhir_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari_2')); ?>:</b>
	<?php echo CHtml::encode($data->hari_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_awal_3')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_awal_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_akhir_3')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_akhir_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari_3')); ?>:</b>
	<?php echo CHtml::encode($data->hari_3); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_awal_4')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_awal_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu_akhir_4')); ?>:</b>
	<?php echo CHtml::encode($data->waktu_akhir_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari_4')); ?>:</b>
	<?php echo CHtml::encode($data->hari_4); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?>:</b>
	<?php echo CHtml::encode($data->kelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kapasitas')); ?>:</b>
	<?php echo CHtml::encode($data->kapasitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mk')); ?>:</b>
	<?php echo CHtml::encode($data->idMk->nama_mk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ruang')); ?>:</b>
	<?php echo CHtml::encode($data->idRuang->no_ruang); ?>
	<br />
</div>