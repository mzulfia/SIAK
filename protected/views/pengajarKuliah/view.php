<?php
/* @var $this PengajarController */
/* @var $model Pengajar */
?>

<h2><strong>Lihat Pengajar</strong></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pengajar',
		'id_dosen',
		'id_jadwal',
	),
)); ?>
