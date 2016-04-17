<?php
/* @var $this AdminController */
/* @var $model Admin */

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
                    <a href=<?php echo '"'.$url.'/Admin/default/view/id/'.$model->id_admin.'"'?>>Lihat Profil</a>
                </li>
                <li>
                    <a href=<?php echo '"'.$url.'/Admin/default/update/id/'.$model->id_admin.'"'?>>Ubah Profil</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

<div class="container-fluid">   
    <!-- Title -->
    <h2><strong>Profil Admin</strong></h2>

        <?php if(Yii::app()->user->hasFlash('success')):?>
            <div class="alert-success">
                <?php echo "<h4 style= 'color: #00923f'>" . Yii::app()->user->getFlash('success') . "</h4>"; ?>
            </div>
        <?php endif; ?>

    <HR>
      <div class="left">
        <div class="row">
           <div class="col-md-1"></div>
            <div class="col-md-9">
                <div class="sedang">
                    <table class="table kiri">
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?php echo ($model->nama == null) ? "Not Set" : ($model->nama) ?></td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>:</td>
                            <td><?php echo ($model->jenis == null) ? "Not Set" : ($model->jenis) ?></td>
                       </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>
<div class='form left'>
<?php 
	echo CHtml::link('Back', array('/Admin/default/admin'), array('class' => 'btn btn-default'));
?>
