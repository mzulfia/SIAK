<?php
/* @var $this MataKuliahController */
/* @var $dataProvider CActiveDataProvider */
?>

<h2><strong>Mata Kuliah</strong></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
