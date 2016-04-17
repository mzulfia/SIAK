<?php
/* @var $this MahasiswaController */
/* @var ($model Mahasiswa */

Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
    CClientScript::POS_READY
);

?>
<?php $url = Yii::app()->request->baseUrl; ?>
<div class="container tab-kalender">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div class="tabbable" id="tabs-59303">
              <ul class="nav nav-tabs">
                <li class="active">
                    <a href=<?php echo '"'.$url.'/Mahasiswa/default/view/id/'.$model->id_mhs.'"'?>>Lihat Profil</a>
                </li>
                <li>
                    <a href=<?php echo '"'.$url.'/Mahasiswa/default/update/id/'.$model->id_mhs.'"'?>>Ubah Profil</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<div class="container-fluid">   
    <!-- Title -->
    <h2><strong>Profil Mahasiswa</strong></h2>
        
        <?php if(Yii::app()->user->hasFlash('success')):?>
            <div class="alert-success">
                <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
            </div>
        <?php endif; ?>

    <HR>
        
        <div class="row">
            <!-- Profile Information Main Column 1 -->
        <h4><strong>Identitas Mahasiswa</strong></h4>
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <div class="sedang">
                    <table class="table kiri">
                        <tr>
                            <th>NIM</th>
                            <td>:</td>
                            <td><?php echo ($model->nim == null) ? "Not Set" : ($model->nim) ?></td>
                        </tr>
                        <tr>
                            <th>Status Akademis</th>
                            <td>:</td>
                            <td><?php echo ($model->status_akademis == null) ? "Kosong" : ($model->status_akademis) ?></td>
                        </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>
            </div>
            <div class="sedang">
                <table class='table kiri'>
                                            <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?php echo ($model->nama == null) ? "Not Set" : ($model->nama) ?></td>
                       </tr>
                    <tr><td colspan="3"></td></tr>
                </table>
            </div>
        </div>
    </div>

    <h4 class='profil'><strong>Data Mahasiswa</strong></h4>

    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-9">
            <div class="sedang">
                <table class='table kiri'>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>:</td>
                        <td><?php echo ($model->tempat_lahir == null) ? "Not Set" : ($model->tempat_lahir) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>:</td>
                        <td><?php echo ($model->tanggal_lahir === "0000-00-00") ? "Not Set" : Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->tanggal_lahir)) ?></td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>:</td>
                        <td><?php echo ($model->status_nikah == null) ? "Not Set" : ($model->status_akademis) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>:</td>
                        <td><?php echo ($model->no_telp == null) ? "Not Set" : ($model->no_telp) ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Handphone</th>
                        <td>:</td>
                        <td><?php echo ($model->no_hp == null) ? "Not Set" : ($model->no_hp) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td><?php echo ($model->email == null) ? "Not Set" : ($model->email) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>:</td>
                        <td><?php echo ($model->tanggal_masuk === "0000-00-00") ? "Not Set" : Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->tanggal_masuk)) ?></td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                </table>
            </div>
            <div class="sedang">
                <table class='table kiri'>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>:</td>
                        <td><?php echo ($model->jenis_kelamin == null) ? "Not Set" : ($model->jenis_kelamin == "L") ? "Laki-laki" : "Perempuan" ?></td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>:</td>
                        <td><?php echo ($model->kewarganegaraan == null) ? "Not Set" : ($model->kewarganegaraan) ?></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>:</td>
                        <td><?php echo ($model->agama == null) ? "Not Set" : ($model->agama) ?></td>
                    </tr>
  <!--                   <tr>
                        <th>Golongan Darah</th>
                        <td>:</td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <th>Alamat Rumah</th>
                        <td>:</td>
                        <td><?php echo ($model->alamat_rumah == null) ? "Not Set" : ($model->alamat_rumah) ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Tinggal</th>
                        <td>:</td>
                        <td><?php echo ($model->alamat_tinggal == null) ? "Not Set" : ($model->alamat_tinggal) ?></td>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <td>:</td>
                        <td><?php echo ($model->kode_pos == null) ? "Not Set" : ($model->kode_pos) ?></td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                </table>
            </div>
        </div>
    </div>

    <h4 class='profil'><strong>Orang Tua</strong></h4>

    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-9">
            <div class="sedang">
                <table class='table kiri'>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>:</td>
                        <td><?php echo ($model->nama_ayah == null) ? "Not Set" : ($model->nama_ayah) ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Lahir Ayah</th>
                        <td>:</td>
                        <td><?php echo ($model->tahun_ayah == null) ? "Not Set" : ($model->tahun_ayah) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>:</td>
                        <td><?php echo ($model->nama_ibu == null) ? "Not Set" : ($model->nama_ibu) ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Lahir Ibu</th>
                        <td>:</td>
                        <td><?php echo ($model->tahun_ibu == null) ? "Not Set" : ($model->tahun_ibu) ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Orang Tua</th>
                        <td>:</td>
                        <td><?php echo ($model->alamat_ortu == null) ? "Not Set" : ($model->alamat_ortu) ?></td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                </table>
            </div>
            <div class="sedang">
                <table class='table kiri'>
                    <tr>
                        <th>Pendidikan Ayah</th>
                        <td>:</td>
                        <td><?php echo ($model->pddkan_ayah == null) ? "Not Set" : ($model->pddkan_ayah) ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan Ibu</th>
                        <td>:</td>
                        <td><?php echo ($model->pddkan_ibu == null) ? "Not Set" : ($model->pddkan_ibu) ?></td>
                    </tr>
                    <tr>
                        <th>Penghasilan Orang Tua</th>
                        <td>:</td>
                        <td><?php echo ($model->penghasilan == null) ? "Not Set" : ($model->penghasilan) ?></td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                </table>
            </div>
        </div>
    </div>

    <h4 class='profil'><strong>Asal SMA</strong></h4>

    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-9">
        <div class="sedang">
            <table class="table kiri">    
                <tr>
                    <th>Asal SMA</th>
                    <td>:</td>
                    <td><?php echo ($model->asal_sma == null) ? "Not Set" : ($model->asal_sma) ?></td>
                </tr>
                <tr>
                    <th>Jurusan SMA</th>
                    <td>:</td>
                    <td><?php echo ($model->jurusan_sma == null) ? "Not Set" : ($model->jurusan_sma) ?></td>
                </tr>
                <tr><td colspan="3"></td></tr>
            </table>
            </div>

            <div class="sedang">
            <table class="table kiri"> 
                <tr>
                    <th>Kota/Kab</th>
                    <td>:</td>
                    <td><?php echo ($model->kota_kab == null) ? "Not Set" : ($model->kota_kab) ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><?php echo ($model->provinsi == null) ? "Not Set" : ($model->provinsi) ?></td>
                </tr>
                <tr><td colspan="3"></td></tr>
            </table>
        </div>
    </div>
</div>
</div>
<?php 
//echo CHtml::ajaxSubmitButton('Add', Yii::app()->createUrl('PengajarKuliah/ajaxAdd', array('id_jadwal' => $id_jadwal)), array('success' => 'reloadGrid'), array('class' => 'btn btn-success'));
    echo "<div class='row buttons'><br>" . CHtml::link('Cetak IDM', Yii::app()->createUrl('Mahasiswa/default/printIDM/', array('id' => $model->id_mhs)), array('class'=>'btn btn-default', 'style' => 'width: 500px;')) . "</div>";   
	if(!Yii::app()->user->isMahasiswa())
	{
        echo "<div class='form left'><br>" . CHtml::link('Back', array('/Mahasiswa/default/admin'), array('class' => 'btn btn-default')) . "</div>";  
		// echo "<div class='form left'><br>" . CHtml::button('Back',array('onclick'=>'js:history.go(-1);returnFalse;', 'class'=>'btn btn-default')) . "</div>";	
	}	
?>
