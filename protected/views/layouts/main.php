<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"> -->
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

<body class="bg">
	<?php $url = Yii::app()->request->baseUrl; ?>
	<div>
		<div class="header">
			<nav role="navigation" class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>                          
					<h1>
						<?php 
						if(Yii::app()->user->isAdmin()){
							echo '<a class="brand" href="'.$url.'/Admin"></a>';
						}
						elseif (Yii::app()->user->isSekretariat()){
							echo '<a class="brand" href="'.$url.'/Sekretariat"></a>';
						}
						elseif(Yii::app()->user->isMahasiswa()){
							echo '<a class="brand" href="'.$url.'/Mahasiswa"></a>';
						}
						elseif(Yii::app()->user->isDosen()){
							echo '<a class="brand" href="'.$url.'/Dosen"></a>';
						}
						 ?>
					</h1>
				</div>
				<div class="navbar-collapse collapse" style="height: auto;">
					<ul class="nav navbar-nav pull-right">
						<?php 
						$id= Admin::model()->getId(Yii::app()->user->getId());
						if(Yii::app()->user->isAdmin()){
							echo 
							'<li>
							<a href="'.$url.'/Admin"><i class="icon-home"></i><br />Home</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-book"></i>
								<br>Akademis
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Kalender/admin">Kalender</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/MataKuliah/admin">Mata Kuliah</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Jadwal/admin">Jadwal</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Ruang/admin">Ruangan</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/PesertaMK/viewListMKSBA">Perkuliahan</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-briefcase"></i>
								<br>User
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/user/create">Buat User</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/user/admin">Kelola User</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-list-alt"></i>
								<br>Peserta
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Admin/default/admin">Admin</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Mahasiswa/default/admin">Mahasiswa</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Dosen/default/admin">Dosen</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Sekretariat/default/admin/">Sekretariat</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Sekretariat/default/viewLulusan">Lulusan</a></li>

								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-heart"></i><br/>'.Yii::app()->user->name.'<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<li><a href="'.$url.'/Admin/default/view/id/'.$id.'">Lihat Profil</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/Admin/default/update/id/'.$id.'">Ubah Profil</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/User/changePassword">Ubah Password</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/site/logout">Logout</a></li>
								</ul>
							</li>';
						}
						elseif(Yii::app()->user->isSekretariat()){
							$id= Sekretariat::model()->getId(Yii::app()->user->getId());
							echo 
							'<li>
							<a href="'.$url.'/Sekretariat"><i class="icon-home"></i><br />Home</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-book"></i>
								<br>Akademis
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Kalender/admin">Kalender</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/MataKuliah/admin">Mata Kuliah</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Jadwal/admin">Jadwal</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Ruang/admin">Ruangan</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/PesertaMK/viewListMKSBA">Perkuliahan</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-list-alt"></i>
								<br>Peserta
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Mahasiswa/default/admin">Mahasiswa</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Dosen/default/admin">Dosen</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Sekretariat/default/listPA">Pembimbing</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Sekretariat/default/viewLulusan">Lulusan</a></li>

								</ul>
							</li>
							<li>
							<a href="'.$url.'/Pembayaran/admin"><i class="icon-briefcase"></i><br />Pembayaran</a>
							</li>
							<li>
							<a href="'.$url.'/site/faq"><i class="icon-question-sign"></i><br />FAQ</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-heart"></i><br/>'.Yii::app()->user->name.'<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<li><a href="'.$url.'/Sekretariat/default/view/id/'.$id.'">Lihat Profil</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/Sekretariat/default/update/id/'.$id.'">Ubah Profil</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/User/changePassword">Ubah Password</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/site/logout">Logout</a></li>
								</ul>
							</li>';
						}
						elseif(Yii::app()->user->isMahasiswa()){
							$id= Mahasiswa::model()->getId(Yii::app()->user->getId());
							echo 
							'<li>
							<a href="'.$url.'/Mahasiswa"><i class="icon-home"></i><br />Home</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-briefcase"></i>
								<br>Akademis
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Kalender">Kalender</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Khs/viewRingkasan/'.$id.'">Ringkasan</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Khs/viewRiwayat/'.$id.'">Riwayat</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Pembayaran/viewSPP">Pembayaran</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-briefcase"></i>
								<br>KRS
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Krs/viewKrs/'.$id.'">Lihat KRS</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Krs/createKrs">Isi KRS</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-briefcase"></i>
								<br>Mahasiswa
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Mahasiswa/default/view/id/'.$id.'">Lihat IDM</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Mahasiswa/default/update/id/'.$id.'">Ubah IDM</a></li>
								</ul>
							</li>
							<li>
								<a href="'.$url.'/Jadwal/viewJadwalM/"><i class="icon-home"></i><br />Jadwal</a>
							</li>
							<li>
							<a href="'.$url.'/site/faq"><i class="icon-question-sign"></i><br />FAQ</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<i class="icon-heart"></i>
									<br/>'.Yii::app()->user->name.'<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/User/changePassword">Ubah Password</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/site/logout">Logout</a></li>
								<ul>
							</li>';
						}
						elseif(Yii::app()->user->isDosen()){
							$id= Dosen::model()->getId(Yii::app()->user->getId());
							echo 
							'<li>
							<a href="'.$url.'/Dosen"><i class="icon-home"></i><br />Home</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="icon-briefcase"></i>
								<br>Akademis
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="'.$url.'/Kalender">Kalender</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/Jadwal/viewJadwalD">Jadwal</a></li>
									<li class="divider"></li>
									<li><a href="'.$url.'/PesertaMK/viewListMK/'.$id.'">Perkuliahan</a></li>
								</ul>
							</li>
							<li>
								<a href="'.$url.'/Dosen/default/bimbinganD"><i class="icon-home"></i><br />Bimbingan</a>
							</li>
							<li>
							<a href="'.$url.'/site/faq"><i class="icon-question-sign"></i><br />FAQ</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-heart"></i><br/>'.Yii::app()->user->name.'<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<li><a href="'.$url.'/Dosen/default/view/id/'.$id.'">Lihat Profil</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/Dosen/default/update/id/'.$id.'">Ubah Profil</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/User/changePassword">Ubah Password</a></li>
								<li class="divider"></li>
								<li><a href="'.$url.'/site/logout">Logout</a></li>
								</ul>
							</li>';
						}
						?>

					</ul>
				</div>
			</nav>
		</div><!-- header -->

		<div style="background-color: #00923F; height: 10px"></div>
		<div style="background-color: #FFF500; height: 2px"></div>
		<div style="background-color: #00923F; height: 2px"></div>

		<div class="container tinggi">
		<div class="info-user">
			<div class="row">
					<?php
						if(Yii::app()->user->isAdmin())
						{
							echo "<p class='info'>" . date('d-m-Y') . " " . Kalender::model()->getTahun() . "<br>";
							echo "<b>" . Admin::model()->getNama(Admin::model()->getId(Yii::app()->user->getId())) . "-" . (Admin::model()->getJenis(Admin::model()->getId(Yii::app()->user->getId()))) . "</b></p>";
						}
						elseif(Yii::app()->user->isSekretariat())
						{
							echo "<p class='info'>" . date('d-m-Y') . " " . Kalender::model()->getTahun() . "<br>";
							echo "<b>" . Sekretariat::model()->getNama(Sekretariat::model()->getId(Yii::app()->user->getId())) . "-" . Sekretariat::model()->getNIP(Sekretariat::model()->getId(Yii::app()->user->getId())) . "</b></p>";
						}
						elseif(Yii::app()->user->isDosen())
						{
							echo "<p class='info'>" . date('d-m-Y') . " " . Kalender::model()->getTahun() . "<br>";
							echo "<b>" . Dosen::model()->getNama(Dosen::model()->getId(Yii::app()->user->getId())) . "-" . Dosen::model()->getNIP(Dosen::model()->getId(Yii::app()->user->getId())) . "</b></p>";
						}
						elseif(Yii::app()->user->isMahasiswa())
						{
							echo "<p class='info'>" . date('d-m-Y') . " " . Kalender::model()->getTahun() . "<br>";
							echo "<b>" . Mahasiswa::model()->getNama(Mahasiswa::model()->getId(Yii::app()->user->getId())) . "-" . Mahasiswa::model()->getNIM(Mahasiswa::model()->getId(Yii::app()->user->getId())) . "</b></p>";
						}
						else
						{

						}
					?>
			</div>
		</div>
		<?php echo $content; ?>
	</div>
		

	<div class="clear"></div>

	<footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 copyright">
                        <p>Copyright &copy; <?php echo date('Y'); ?> by Akademi Keperawatan Islamic Village.<br/>
						All Rights Reserved.<br/>
                    </div>
                </div>
            </div>
    </footer>
	</div><!-- page -->
	<script language="javascript">
	$('.dropdown-toggle').dropdown();
	$('.dropdown-menu').find('form').click(function (e) {
		e.stopPropagation();
	});
	</script>
</body>
</html>
