<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nim'); ?>
		<?php echo $form->textField($model,'nim'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nip_dosen'); ?>
		<?php echo $form->textField($model,'nip_dosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jurusan'); ?>
		<?php echo $form->textField($model,'jurusan',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fakultas'); ?>
		<?php echo $form->textField($model,'fakultas',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenjang'); ?>
		<?php echo $form->textField($model,'jenjang',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_akademis'); ?>
		<?php echo $form->textField($model,'status_akademis',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_nikah'); ?>
		<?php echo $form->textField($model,'status_nikah',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_telp'); ?>
		<?php echo $form->textField($model,'no_telp',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_masuk'); ?>
		<?php echo $form->textField($model,'tanggal_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_kelamin'); ?>
		<?php echo $form->textField($model,'jenis_kelamin',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kewarganegaraan'); ?>
		<?php echo $form->textField($model,'kewarganegaraan',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agama'); ?>
		<?php echo $form->textField($model,'agama',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_rumah'); ?>
		<?php echo $form->textField($model,'alamat_rumah',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_tinggal'); ?>
		<?php echo $form->textField($model,'alamat_tinggal',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_pos'); ?>
		<?php echo $form->textField($model,'kode_pos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun_ayah'); ?>
		<?php echo $form->textField($model,'tahun_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun_ibu'); ?>
		<?php echo $form->textField($model,'tahun_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_ortu'); ?>
		<?php echo $form->textField($model,'alamat_ortu',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kode_pos_ortu'); ?>
		<?php echo $form->textField($model,'kode_pos_ortu',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pddkan_ayah'); ?>
		<?php echo $form->textField($model,'pddkan_ayah',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pddkan_ibu'); ?>
		<?php echo $form->textField($model,'pddkan_ibu',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'penghasilan'); ?>
		<?php echo $form->textField($model,'penghasilan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asal_sma'); ?>
		<?php echo $form->textField($model,'asal_sma',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jurusan_sma'); ?>
		<?php echo $form->textField($model,'jurusan_sma',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kota_kab'); ?>
		<?php echo $form->textField($model,'kota_kab',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provinsi'); ?>
		<?php echo $form->textField($model,'provinsi',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->