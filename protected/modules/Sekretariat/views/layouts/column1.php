<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5">
	<div id="sidebar-left">
	<?php
		if(Yii::app()->user->isAdmin())
		{
			$id = Admin::model()->getId(Yii::app()->user->getId());
			$nama = Admin::model()->getNama($id);
			$jenis = Admin::model()->getJenis($id);
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Identitas Diri',
			));
			echo "
				<table>
					<tr>
						<td> Nama </td>
						<td><b>" . $nama . "</b></td>
					</tr>
					<tr>
						<td> Jenis </td>
						<td><b>" . $jenis . "</b>  </td>
					</tr>
				</table>";
			$this->endWidget(); 
		}
		elseif(Yii::app()->user->isSekretariat())
		{
			$id = Sekretariat::model()->getId(Yii::app()->user->getId());
			$nama = Sekretariat::model()->getNama($id);
			$nip = Sekretariat::model()->getNIP($id);
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Identitas Diri',
			));
			echo "
				<table>
					<tr>
						<td> NIP </td>
						<td><b>" . $nip . "</b>  </td>
					</tr>
					<tr>
						<td> Nama </td>
						<td><b>" . $nama . "</b></td>
					</tr>
				</table>";
			$this->endWidget(); 
		}
		elseif(Yii::app()->user->isDosen())
		{
			$id = Dosen::model()->getId(Yii::app()->user->getId());
			$nama = Dosen::model()->getNama($id);
			$nip = Dosen::model()->getNIP($id);
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Identitas Diri',
			));
			echo "
				<table>
					<tr>
						<td> NIP </td>
						<td><b>" . $nip . "</b>  </td>
					</tr>
					<tr>
						<td> Nama </td>
						<td><b>" . $nama . "</b></td>
					</tr>
				</table>";
			$this->endWidget(); 
		}
		else
		{
			$id = Mahasiswa::model()->getId(Yii::app()->user->getId());
			$nama = Mahasiswa::model()->getNama($id);
			$nim = Mahasiswa::model()->getNIM($id);
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Identitas Diri',
			));
			echo "
				<table>
					<tr>
						<td> NIM </td>
						<td><b>" . $nim . "</b>  </td>
					</tr>
					<tr>
						<td> Nama </td>
						<td><b>" . $nama . "</b></td>
					</tr>
				</table>";
			$this->endWidget(); 
		}
	?>
	</div><!-- sidebar -->
</div>
<div class="span-18 last">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>