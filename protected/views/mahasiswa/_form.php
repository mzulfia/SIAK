<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mahasiswa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nip_dosen'); ?>
		<?php echo $form->textField($model,'nip_dosen'); ?>
		<?php echo $form->error($model,'nip_dosen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jurusan'); ?>
		<?php echo $form->textField($model,'jurusan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'jurusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fakultas'); ?>
		<?php echo $form->textField($model,'fakultas',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fakultas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenjang'); ?>
		<?php echo $form->textField($model,'jenjang',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'jenjang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_akademis'); ?>
		<?php echo $form->textField($model,'status_akademis',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'status_akademis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir'); ?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_nikah'); ?>
		<?php echo $form->textField($model,'status_nikah',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'status_nikah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_telp'); ?>
		<?php echo $form->textField($model,'no_telp',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'no_telp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_hp'); ?>
		<?php echo $form->textField($model,'no_hp',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'no_hp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_masuk'); ?>
		<?php echo $form->textField($model,'tanggal_masuk'); ?>
		<?php echo $form->error($model,'tanggal_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php echo $form->textField($model,'jenis_kelamin',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'jenis_kelamin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kewarganegaraan'); ?>
		<?php echo $form->textField($model,'kewarganegaraan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'kewarganegaraan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agama'); ?>
		<?php echo $form->textField($model,'agama',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'agama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_rumah'); ?>
		<?php echo $form->textField($model,'alamat_rumah',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat_rumah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_tinggal'); ?>
		<?php echo $form->textField($model,'alamat_tinggal',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat_tinggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_pos'); ?>
		<?php echo $form->textField($model,'kode_pos'); ?>
		<?php echo $form->error($model,'kode_pos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_ayah'); ?>
		<?php echo $form->textField($model,'tahun_ayah'); ?>
		<?php echo $form->error($model,'tahun_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_ibu'); ?>
		<?php echo $form->textField($model,'tahun_ibu'); ?>
		<?php echo $form->error($model,'tahun_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat_ortu'); ?>
		<?php echo $form->textField($model,'alamat_ortu',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alamat_ortu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_pos_ortu'); ?>
		<?php echo $form->textField($model,'kode_pos_ortu',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'kode_pos_ortu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pddkan_ayah'); ?>
		<?php echo $form->textField($model,'pddkan_ayah',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'pddkan_ayah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pddkan_ibu'); ?>
		<?php echo $form->textField($model,'pddkan_ibu',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'pddkan_ibu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'penghasilan'); ?>
		<?php echo $form->textField($model,'penghasilan'); ?>
		<?php echo $form->error($model,'penghasilan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asal_sma'); ?>
		<?php echo $form->textField($model,'asal_sma',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'asal_sma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jurusan_sma'); ?>
		<?php echo $form->textField($model,'jurusan_sma',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'jurusan_sma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kota_kab'); ?>
		<?php echo $form->textField($model,'kota_kab',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'kota_kab'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provinsi'); ?>
		<?php echo $form->textField($model,'provinsi',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'provinsi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->