<?php

class PesertaMKController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		if( Yii::app()->user->getState('role') == "1")
        {
             $arr =array('admin','create', 'update', 'view', 'delete', 'index', 'viewListMKSBA', 'viewListMhsSBA', 'printAbsensi'); 
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('admin','create', 'update', 'view', 'delete', 'index', 'viewListMKSBA', 'viewListMhsSBA', 'viewListNilaiSBA', 'printAbsensi'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('viewListMK', 'viewListMhs');      
        }
        else
        {
        	$arr = array('');
        }        
        return array(                   
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                                'actions'=>$arr,
                                'users'=>array('@'),
                        ),
                                                
                        array('deny',  // deny all users
                                'users'=>array('*'),
                        ),
                );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PesertaMK;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PesertaMK']))
		{
			$model->attributes=$_POST['PesertaMK'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_daftar));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PesertaMK']))
		{
			$model->attributes=$_POST['PesertaMK'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_daftar));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PesertaMK');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PesertaMK('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PesertaMK']))
			$model->attributes=$_GET['PesertaMK'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PesertaMK the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PesertaMK::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PesertaMK $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='daftar-kelas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionViewListMK($id)
	{
		if($id == Dosen::model()->getId(Yii::app()->user->getId()))
		{
			$model=new PengajarKuliah('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['PengajarKuliah']))
				$model->attributes=$_GET['PengajarKuliah'];

			$this->render('viewListMK',array(
				'model'=>$model, 'id_dosen' => $id
			));
		}
		else
		{
			throw new CHttpException(401,'Anda tidak memiliki akses.');
		}
	}

	public function actionViewListMKSBA()
	{
		$model=new Jadwal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Jadwal']))
			$model->attributes=$_GET['Jadwal'];

		$this->render('viewListMKSBA',array(
			'model'=>$model
		));
	}

	public function actionViewListMhs($id)
	{
		$model=new PesertaMK('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PesertaMK']))
			$model->attributes=$_GET['PesertaMK'];

		$this->render('viewListMhs',array(
			'model'=>$model, 'id_jadwal' => $id
		));
	}

	public function actionViewListMhsSBA($id)
	{
		$model=new PesertaMK('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PesertaMK']))
			$model->attributes=$_GET['PesertaMK'];

		$this->render('viewListMhsSBA',array(
			'model'=>$model, 'id_jadwal' => $id
		));
	}

	public function actionViewListNilaiSBA($id)
	{
		$model=new PesertaMK('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PesertaMK']))
			$model->attributes=$_GET['PesertaMK'];

		if (isset($_GET['export'])) {
                $production = 'export';
        } else {
                $production = 'grid';
        }
		
		$this->render('viewListNilaiSBA',array(
			'model'=>$model, 'production' => $production, 'id_jadwal' => $id
		));
	}


	public function actionPrintAbsensi($id)
	{
		$year = Kalender::model()->getLastYear();
		$term = Kalender::model()->getLastTerm();
		$jadwal = Jadwal::model()->findByPk($id);
		$filename="Absensi-" . $jadwal->id_mk . ".pdf";

		$head = ob_get_clean ();
		$content = ob_get_clean ();
		
		$sql = 'SELECT * from peserta_mk a, pengajar_kuliah b, dosen c, mata_kuliah d, jadwal e, mahasiswa f WHERE a.id_jadwal = b.id_jadwal AND b.id_jadwal = e.id_jadwal AND b.id_dosen = c.id_dosen AND e.id_mk = d.id_mk AND a.id_mhs = f.id_mhs AND e.id_jadwal = :id ORDER BY nim';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id'=>$id));

		$item = Yii::app()->db->createCommand($sql)->queryRow(true, array(':id'=>$id));			
		
		$kode_mk = '';
		$nama_mk = '';
		$kelas = '';
		$sks = '';
		$jadwal_kuliah = '';
		$ruang = '';
		$kapasitas = '';
		$pengajar = '';
		$semester = '';
		$tahun_ajaran = '';
		$term = '';

		$kode_mk = $item['kode_mk'];
		$nama_mk = $item['nama_mk'];
		$kelas = $item['kelas'];
		$sks = $item['sks'];
		$kapasitas = $item['kapasitas'];
		$semester = $item['semester'];
		$tahun_ajaran = Jadwal::model()->getTahun($item['id_jadwal']);
		$term = Jadwal::model()->getSms($item['id_jadwal']);
		$pengajar = PengajarKuliah::model()->getPengajarKuliah($item['id_pengajar_kuliah']);
		$head =
		'
		<html>
		<body>
			<h2 style= "text-align: center"><strong>DAFTAR PESERTA MATA KULIAH</strong></h2>
			<div class="col-md-6">
			<table class="box" width="100%">
			<tbody>
			<tr>
				<td class="head" width="30%"><b>Mata Kuliah - Nama Kelas</b></td>
				<td width="30%">'. $nama_mk	. " - " . $kelas .'</td>
				<td class="head" width="20%"><b>Kode MK - Kredit</b></td>
				<td width="30%">'. $kode_mk . " - " . $sks . " SKS" . '</td>
			</tr>
			<tr>
				<td class="head" width="30%"><b>Tahun Ajaran</b></td>
				<td width="30%">'. $tahun_ajaran . " " . $term .'</td>
				<td class="head" width="20%"><b>Nama Dosen</b></td>
				<td width="30%">'. $pengajar .'</td>
			</tr>
			</tbody>
			</table>
		</body>
		</html>
		';
		$content = '
		<div id="absen">
		<table>
			<thead>
				<tr>
					<th class="no">NO</th>
					<th class="nim">NIM</th>
					<th class="nama">NAMA MAHASISWA</th>
					<th class="paraf" colspan="16">PARAF</th>
				</tr>	
			</thead>
			<tbody>
		';

		if(!empty($result))
		{
			for($i=0;$i<sizeof($result);$i++)
			{
				$content .= '
					<tr>
						<td>'. ($i+1) .'.</td>
						<td>'. $result[$i]['nim'] .'</td>
						<td>'. $result[$i]['nama'] .'</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				';
				
			}
			$content .= '</tbody></table></div>';	
		}
	

		$mpdf = Yii::app()->ePdf->mpdf('utf-8', 'A4-L');
		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/css/siak3.css');
		$mpdf->setAutoTopMargin = 'stretch';
		$mpdf->setAutoBottomMargin = 'stretch';
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->SetHTMLHeader($head);
		$mpdf->WriteHTML($content);
		
		// $mpdf->WriteHTML($signature, 2);
		$mpdf->Output($filename, 'I');
		exit;
	}
}
