<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
/* @var $form CActiveForm */
?>

<div class="form left">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-form',
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
		<?php echo $form->dropDownList($model, 'tahun_ajaran', CHtml::listData(Kalender::model()->findAll(), 'tahun_ajaran', 'tahun_ajaran'), array('empty' => '-Pilih Tahun-', 'class' => 'form-control input'))?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<span class='colon'>:</span>
		<?php echo $form->dropDownList($model, 'semester', CHtml::listData(Kalender::model()->findAll(), 'semester', 'semester'), array('empty' => '-Pilih Tahun-', 'class' => 'form-control input'))?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hari_1'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'hari_1', array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'), array('empty' => '-Pilih Hari-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'hari_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_awal_1'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_awal_1',
	            'model'=>$model,
	            'name'=>'waktu_awal_1',
	            'select'=> 'time',
	            'options' => array(
		            	'showSecond'=>false,
		            	'showOn'=>'focus',
		                'timeFormat'=>'hh:mm:ss',
		                'hourMax' => 24,
	                	'minuteMax' => 60,

	            ),
	        )
		); 
        ?>
		<?php echo $form->error($model,'waktu_awal_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_akhir_1'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_akhir_1',
	            'model'=>$model,
	            'name'=>'waktu_akhir_1',
	            'select'=> 'time',
	            'options' => array(
	            	'htmlOptions' => array(
	            		'class' => 'form-control input',
					),
	            	'showSecond'=>false,
	            	'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                'hourMax' => 24,
	                'minuteMax' => 60,
	            ),
	         )
		); 
        ?>
		<?php echo $form->error($model,'waktu_akhir_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hari_2'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'hari_2', array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'), array('empty' => '-Pilih Hari-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'hari_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_awal_2'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_awal_2',
	            'model'=>$model,
	            'name'=>'waktu_awal_2',
	            'select'=> 'time',
	            'options' => array(
	            	'htmlOptions' => array(
	            		'class' => 'form-control input',
					),
	            	'showSecond'=>false,
	            	'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                'hourMax' => 24,
	                'minuteMax' => 60,
	            ),
	            )
		); 
        ?>
		<?php echo $form->error($model,'waktu_awal_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_akhir_2'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_akhir_2',
	            'model'=>$model,
	            'name'=>'waktu_akhir_2',
	            'select'=> 'time',
	            'options' => array(
	            	'htmlOptions' => array(
	            		'class' => 'form-control input',
					),
	            	'showSecond'=>false,
	            	'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                'hourMax' => 24,
	                'minuteMax' => 60,
	            ),
	        )
		); 
        ?>
		<?php echo $form->error($model,'waktu_akhir_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hari_3'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'hari_3', array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'), array('empty' => '-Pilih Hari-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'hari_3'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'waktu_awal_3'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_awal_3',
	            'model'=>$model,
	            'name'=>'waktu_awal_3',
	            'select'=> 'time',
	              'options' => array(
	            	'htmlOptions' => array(
	            		'class' => 'form-control input !important',
					),
	            	'showSecond'=>false,
	            	'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                'hourMax' => 24,
	                'minuteMax' => 60,
	            ),
	        )
		); 
        ?>
		<?php echo $form->error($model,'waktu_awal_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_akhir_3'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_akhir_3',
	            'model'=>$model,
	            'name'=>'waktu_akhir_3',
	            'select'=> 'time',
	              'options' => array(
	            	'htmlOptions' => array(
	            		'class' => 'form-control input',
					),
	            	'showSecond'=>false,
	            	'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                'hourMax' => 24,
	                'minuteMax' => 60,
	            ),
	        )
		); 
        ?>
		<?php echo $form->error($model,'waktu_akhir_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hari_4'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'hari_4', array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', 'Minggu' => 'Minggu'), array('empty' => '-Pilih Hari-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'hari_4'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'waktu_awal_4'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_awal_4',
	            'model'=>$model,
	            'name'=>'waktu_awal_4',
	            'select'=> 'time',
	              'options' => array(
	            	
	            	'showSecond'=>false,
	            	'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                'hourMax' => 24,
	                'minuteMax' => 60,
	            ),
	        )
		); 
        ?>
		<?php echo $form->error($model,'waktu_awal_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'waktu_akhir_4'); ?>
		<span class='colon'>:</span>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
	            'id'=>'waktu_akhir_4',
	            'model'=>$model,
	            'name'=>'waktu_akhir_4',
	            'select'=> 'time',
	              'options' => array(
	            	'htmlOptions' => array(
	            		'class' => 'form-control input',
					),
	            	'showSecond'=>false,
	            	'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                'hourMax' => 24,
	                'minuteMax' => 60,
	            ),
	        )
		); 
        ?>
		<?php echo $form->error($model,'waktu_akhir_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kelas'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'kelas', array('A' => 'A', 'B' => 'B','C' => 'C', 'D' => 'D', 'E' => 'E'), array('empty' => '-Pilih Kelas-', 'class'=>'form-control input'));
		?>		
		<?php echo $form->error($model,'kelas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kapasitas'); ?>
		<span class='colon'>:</span>
		<?php echo $form->textField($model,'kapasitas', array('class'=>'form-control input')); ?>
		<?php echo $form->error($model,'kapasitas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mk'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'id_mk', MataKuliah::model()->getMKOption(), array('empty' => '-Pilih Mata Kuliah-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'id_mk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_ruang_1'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'id_ruang_1', Ruang::model()->getRuangOption(), array('empty' => '-Pilih Ruang-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'id_ruang_1'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'id_ruang_2'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'id_ruang_2', Ruang::model()->getRuangOption(), array('empty' => '-Pilih Ruang-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'id_ruang_2'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'id_ruang_3'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'id_ruang_3', Ruang::model()->getRuangOption(), array('empty' => '-Pilih Ruang-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'id_ruang_3'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'id_ruang_4'); ?>
		<span class='colon'>:</span>
		<?php
			echo $form->dropDownList($model, 'id_ruang_4', Ruang::model()->getRuangOption(), array('empty' => '-Pilih Ruang-', 'class'=>'form-control input'));
		?>
		<?php echo $form->error($model,'id_ruang_4'); ?>
	</div>
	<div class="row submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php echo "<div class='form left'><br>" . CHtml::link('Back', array('/Jadwal/admin'), array('class' => 'btn btn-default')) . "</div>"; ?>