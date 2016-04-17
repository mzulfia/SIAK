<?php
/* @var $this JadwalController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Jadwals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
