<?php
/* @var $this DosenController */
/* @var $model Dosen */

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
                    <a href=<?php echo '"'.$url.'/Dosen/default/view/id/'.$model->id_dosen.'"'?>>Lihat Profil</a>
                </li>
                <li>
                    <a href=<?php echo '"'.$url.'/Dosen/default/update/id/'.$model->id_dosen.'"'?>>Ubah Profil</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<div class="container-fluid">   
    <!-- Title -->
    <h2><strong>Profil Dosen</strong></h2>

        <?php if(Yii::app()->user->hasFlash('success')):?>
            <div class="alert-success">
                <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
            </div>
        <?php endif; ?>

    <HR>
        
        <div class="row">
           <div class="col-md-1"></div>
            <div class="col-md-9">
                <div class="sedang">
                    <table class="table kiri">
                        <tr>
                            <th>NIP</th>
                            <td>:</td>
                            <td><?php echo ($model->nip_dosen == null) ? "Not Set" : ($model->nip_dosen) ?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?php echo ($model->nama == null) ? "Not Set" : ($model->nama) ?></td>
                       </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>
<div class='form left'>
<?php 
	if(!Yii::app()->user->isDosen())
	{
		echo CHtml::link('Back', array('/Dosen/default/admin'), array('class' => 'btn btn-default'));  
	}	
?>

