<?php
/* @var $this KalenderController */
/* @var $model Kalender */
/* @var $form CActiveForm */
?>

<div class="form left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kalender-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan <span class="required">*</span> harus diisi.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_ajaran'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'tahun_ajaran', array('placeholder'=>'xxxx/yyyy', 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'tahun_ajaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<span class='colon'>:</span>
		<?php echo $form->dropDownList($model,'semester', array('Gasal'=>'Gasal', 'Genap'=>'Genap'), array('empty' => '-Pilih Semester-', 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_event'); ?>
		<span class='colon'>:</span>
		<?php echo $form->dropDownList($model,'jenis_event', array('Registrasi Administrasi' => 'Registrasi Administrasi', 'Registrasi Akademik' => 'Registrasi Akademik', 'Masa Perkuliahan' => 'Masa Perkuliahan', 'Ujian Tengah Semester (UTS)' => 'Ujian Tengah Semester (UTS)', 'Ujian Akhir Semester (UAS)' => 'Ujian Akhir Semester (UAS)', 'Uji Pencapaian Kompetensi' => 'Uji Pencapaian Kompetensi', 'Uji Kompetensi' => 'Uji Kompetensi', 'Yudisium' => 'Yudisium', 'Libur' => 'Libur'), array('empty' => '-Pilih Event-', 'class' => 'form-control input')); ?>
		<?php echo $form->error($model,'jenis_event'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50, 'class'=>'form-control input')); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_awal'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'Kalender[tanggal_awal]',
                                'id'=>'kalender_tanggalAwal',
                            	'value'=>$model->tanggal_awal,
                                'options'=>array(
                                'dateFormat' => 'yy-mm-dd',	
                                'showAnim'=>'fold',
                                ),
                                'htmlOptions'=>array(
                                	'class' => 'form-control input',
                                	'style'=>'height:30px;'
                                ),
                        )); 
        ?>
		<?php echo $form->error($model,'tanggal_awal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_akhir'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'Kalender[tanggal_akhir]',
                                'id'=>'kalender_tanggalAkhir',
                            	'value'=>$model->tanggal_akhir,
                                'options'=>array(
                                'dateFormat' => 'yy-mm-dd',	
                                'showAnim'=>'fold',
                                ),
                                'htmlOptions'=>array(
                                	'class' => 'form-control input',
                                	'style'=>'height:30px;'
                                ),
                        )); 
        ?>
		<?php echo $form->error($model,'tanggal_akhir'); ?>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php echo "<div class='form left'><br>" . CHtml::link('Back', array('/Kalender/admin'), array('class' => 'btn btn-default')) . "</div>"; ?>