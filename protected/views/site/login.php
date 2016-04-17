<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/siak1.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/siak2.css">
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png">
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body class="login">
    	<!-- lama -->
    	<div class="container">
            <div class="row clearfix">
			<div class="col-md-12 login">
		                        <?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'login-form',
										'enableClientValidation'=>true,
										'clientOptions'=>array(
											'validateOnSubmit'=>true,
										),
										'htmlOptions'=>array(
									        'class'=>'form-signin',
									    ),
									)); ?>
		                            <!--Disini akan ada action onclick-->
		                            <img style="width: inherit; max-width: 100%; height: auto" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"></img> 
		                            <br><br><br>
		                            <?php echo $form->textField($model,'username', array('class' => 'form-control', 'placeholder'=>'Username')); ?>
									<?php echo $form->error($model,'username', array('style'=>'height: 0px;')); ?>
									<br>
									<br>
									<?php echo $form->passwordField($model,'password', array('class' => 'form-control', 'placeholder'=>'Password')); ?>
									<?php echo $form->error($model,'password', array('style'=>'height: 20px;')); ?>

		                        <?php echo CHtml::submitButton('Sign In', array('class'=>'button-label')); ?>
		                           
								<?php $this->endWidget(); ?>
							<span class="clearfix"></span>	
		                   <div class="siak-akper"><a href="http://www.akperisvill.ac.id">www.akperisvill.ac.id</a> </div>
		                    </div>
		                    <div class="col-md-3">
		                        <!--empty-->
		                    </div>
		                </div>	 
		       
		       </div> 
		   </div>
	</body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</html>