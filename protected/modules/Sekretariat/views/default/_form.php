<?php
/* @var $this SekretariatController */
/* @var $model Sekretariat */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ekretariat-form',
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
                    <a href=<?php echo '"'.$url.'/Sekretariat/default/view/id/'.$model->id_sekretariat.'"'?>>Lihat Profil</a>
                </li>
                <li  class="active">
                    <a href=<?php echo '"'.$url.'/Sekretariat/default/update/id/'.$model->id_sekretariat.'"'?>>Ubah Profil</a>
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
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <div class="sedang">
                    <table class="table kiri">
                        <tr>
                            <th>NIP</th>
                            <td>:</td>
                            <td>
                                <?php 
                                    echo $form->textField($model,'nip_sekretariat', array('class'=>'form-control input'));
                                ?>
                                <?php echo $form->error($model,'nip_sekretariat'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>
                                <?php echo $form->textField($model,'nama',array('class'=>'form-control input')); ?>
                                <?php echo $form->error($model,'nama'); ?></td>
                       </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
