<?php
/* @var $this MahasiswaController */
/* @var $model Mahasiswa */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'mahasiswa-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>
<?php $url = Yii::app()->request->baseUrl; ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li>
                    <a href=<?php echo '"'.$url.'/Mahasiswa/default/view/id/'.$model->id_mhs.'"'?>>Lihat Profil</a>
                </li>
                <li  class="active">
                    <a href=<?php echo '"'.$url.'/Mahasiswa/default/update/id/'.$model->id_mhs.'"'?>>Ubah Profil</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<div class="container-fluid">   
    <!-- Title -->
    <h2><strong>Ubah Profil</strong></h2>
    <HR>
        
        <div class="row profil">
            <!-- Profile Information Main Column 1 -->
        <h4><strong>Identitas Mahasiswa</strong></h4>
<hr>
        <div class="col-md-8 col-md-offset-2 idm">
            <div class="col-md-6">
                <table class='field'>
                    <tr>
                        <th>NIM</th>
                        <td>:</td>
                        <td><?php 
            if(Yii::app()->user->isMahasiswa())
                echo $model->nim; 
            else
                echo $form->textField($model,'nim', array('class'=>'form-control input'));
        ?><?php echo $form->error($model,'nim'); ?></td>
                    </tr>
                    <tr>
                        <th>Status Akademis</th>
                        <td>:</td>
                        <td><?php 
            if(Yii::app()->user->isMahasiswa())
                echo $model->status_akademis; 
            else
                echo $form->dropDownList($model,'status_akademis', array('Kosong' => 'Kosong', 'Aktif' => 'Aktif', 'Cuti' => 'Cuti', 'Lulus' => 'Lulus'), array('class'=>'form-control input'));
        ?><?php echo $form->error($model,'nim'); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="field">
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'nama',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'nama'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    

    <div class="row profil">
        <h4><strong>Data Mahasiswa</strong></h4>
        <hr>
            <div class="col-md-8 col-md-offset-2 idm">
            <div class="col-md-6">
                <table class='field'>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model, 'tempat_lahir', array('class'=>'form-control input')) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>:</td>
                        <td><?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'Mahasiswa[tanggal_lahir]',
                                'id'=>'mahasiswa_tanggalLahir',
                                'value'=>$model->tanggal_lahir,
                                'options'=>array(
                                'dateFormat' => 'yy-mm-dd', 
                                'showAnim'=>'fold',
                                'changeMonth'=>true,
                                'changeYear'=>true,
                                'yearRange'=>'1980:2099',
                                'minDate' => '1980-01-01',      // minimum date
                                'maxDate' => '2099-12-31',
                                ),
                                'htmlOptions' => array(
                                    'class'=>'form-control input',
                                ),
                        )); 
        ?>
        <?php echo $form->error($model,'tanggal_lahir'); ?></td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>:</td>
                        <td><?php echo $form->dropDownList($model,'status_nikah',array('Belum Menikah' => 'Belum Menikah', 'Sudah Menikah' => 'Sudah Menikah'), array('class'=>'form-control input', 'style' => 'height: 35px')); ?>
        <?php echo $form->error($model,'status_nikah'); ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>:</td>
                        <td>
        <?php echo $form->textField($model,'no_telp',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'no_telp'); ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Handphone</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'no_hp',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'no_hp'); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'email',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'email'); ?></td>
                    </tr>
                    <?php if(!Yii::app()->user->isMahasiswa()) {
                        echo 
                        "<tr>
                        <th>Tanggal Masuk</th>
                        <td>:</td>
                        <td>";
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model' => $model,
                                'attribute' => 'tanggal_masuk',
                                'name'=>'Mahasiswa[tanggal_masuk]',
                                'id'=>'mahasiswa_tanggalMasuk',
                                'options'=>array(
                                'dateFormat' => 'yy-mm-dd', 
                                'showAnim'=>'fold',
                                'changeMonth'=>true,
                                'changeYear'=>true,
                                'yearRange'=>'2010:2099',
                                'minDate' => '2010-01-01',      // minimum date
                                'maxDate' => '2099-12-31',
                                ),
                                'htmlOptions' => array(
                                    'class'=>'form-control input',
                                ),
                        )); 
                        echo $form->error($model,'tanggal_masuk');
                        echo "</td></tr>";
                    } 
                    ?>
                    
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td><?php echo $form->dropDownList($model,'jenis_kelamin', array('' => '-', 'L' => 'L', 'P' => 'P'), array('class'=>'form-control input', 'style' => 'height: 35px')); ?>
        <?php echo $form->error($model,'jenis_kelamin'); ?></td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'kewarganegaraan',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'kewarganegaraan'); ?></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'agama',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'agama'); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class='field'>
                    <tr>
                        <th>Alamat Rumah</th>
                        <td>:</td>
                        <td><?php echo $form->textArea($model,'alamat_rumah',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'alamat_rumah'); ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Tinggal</th>
                        <td>:</td>
                        <td><?php echo $form->textArea($model,'alamat_tinggal',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'alamat_tinggal'); ?></td>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'kode_pos', array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'kode_pos'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    

    <div class="row profil">
        <h4><strong>Orang Tua</strong></h4>
        <hr>
            <div class="col-md-8 col-md-offset-2 idm">
            <div class="col-md-6">
                <table class='field'>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'nama_ayah',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'nama_ayah'); ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Lahir Ayah</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'tahun_ayah', array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'tahun_ayah'); ?></td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'nama_ibu',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'nama_ibu'); ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Lahir Ibu</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'tahun_ibu', array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'tahun_ibu'); ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan Ayah</th>
                        <td>:</td>
                        <td><?php echo $form->dropDownList($model,'pddkan_ayah', 
                            array(
                                'Kosong' => 'Kosong', 
                                'Tidak Tamat SD' => 'Tidak Tamat SD', 
                                'Tamat SD' => 'Tamat SD',
                                'Tamat SMP' => 'Tamat SMP',
                                'Tamat SMA' => 'Tamat SMA',
                                'Sarjana Muda' => 'Sarjana Muda',
                                'Sarjana' => 'Sarjana',
                                'Magister' => 'Magister',
                                'Doktor' => 'Doktor',
                                'Lain-Lain' => 'Lain-Lain',
                            ), array('class'=>'form-control input', 'style' => 'height: 35px')); ?>
                            
        <?php echo $form->error($model,'pddkan_ayah'); ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan Ibu</th>
                        <td>:</td>
                        <td><?php echo $form->dropDownList($model,'pddkan_ibu', 
                            array(
                                'Kosong' => 'Kosong', 
                                'Tidak Tamat SD' => 'Tidak Tamat SD', 
                                'Tamat SD' => 'Tamat SD',
                                'Tamat SMP' => 'Tamat SMP',
                                'Tamat SMA' => 'Tamat SMA',
                                'Sarjana Muda' => 'Sarjana Muda',
                                'Sarjana' => 'Sarjana',
                                'Magister' => 'Magister',
                                'Doktor' => 'Doktor',
                                'Lain-Lain' => 'Lain-Lain',
                            ), array('class'=>'form-control input', 'style' => 'height: 35px')); ?>
        <?php echo $form->error($model,'pddkan_ibu'); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class='field'>
                                        <tr>
                        <th>Alamat Orang Tua</th>
                        <td>:</td>
                        <td><?php echo $form->textArea($model,'alamat_ortu',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'alamat_ortu'); ?></td>
                    </tr>
                    <tr>
                        <th>Kode Pos Orang Tua</th>
                        <td>:</td>
                        <td><?php echo $form->textField($model,'kode_pos_ortu',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'kode_pos_ortu'); ?></td>
                    </tr>
                    
                    <tr>
                        <th>Penghasilan Orang Tua</th>
                        <td>:</td>
                        <td><?php echo $form->dropDownList($model,'penghasilan', 
                            array(
                                'Kosong' => 'Kosong', 
                                '< 25 ribu' => '< 25 ribu', 
                                '25 -- 50 ribu' => '25 -- 50 ribu',
                                '50 -- 100 ribu' => '50 -- 100 ribu',
                                '100 -- 500 ribu' => '100 -- 500 ribu',
                                '0,5 -- 1 juta' => '0,5 -- 1 juta',
                                '1 -- 2 juta' => '1 -- 2 juta',
                                '2 -- 3,5 juta' => '2 -- 3,5 juta',
                                '3,5 -- 6 juta' => '3,5 -- 6 juta',
                                '6 -- 10 juta' => '6 -- 10 juta',
                                '10 -- 20 juta' => '10 -- 20 juta',
                                '> 20 juta' => '> 20 juta', 
                            ), array('class'=>'form-control input', 'style' => 'height: 35px')); ?>
        <?php echo $form->error($model,'penghasilan'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    

    <div class="row profil">
        <h4><strong>Asal SMA</strong></h4>
        <hr>
        <div class="col-md-8 col-md-offset-2 idm">
        <div class="col-md-6">
            <table class="field">    
                <tr>
                    <th>Asal SMA</th>
                    <td>:</td>
                    <td><?php echo $form->textField($model,'asal_sma',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'asal_sma'); ?></td>
                </tr>
                <tr>
                    <th>Jurusan SMA</th>
                    <td>:</td>
                    <td><?php echo $form->textField($model,'jurusan_sma',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'jurusan_sma'); ?></td>
                </tr>

            </table>
            </div>

            <div class="col-md-6">
            <table class="field"> 
                <tr>
                    <th>Kota/Kab</th>
                    <td>:</td>
                    <td><?php echo $form->textField($model,'kota_kab',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'kota_kab'); ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><?php echo $form->textField($model,'provinsi',array('class'=>'form-control input')); ?>
        <?php echo $form->error($model,'provinsi'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary down')); ?>
    </div>
</div>
    

<?php $this->endWidget(); ?>