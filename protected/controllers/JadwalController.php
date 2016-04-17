<?php

class JadwalController extends Controller
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
             $arr =array('admin','create','update','delete','view', 'index');
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('admin', 'create', 'update', 'delete','view', 'index'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('viewJadwalD');      
        }
        else
        {
        	$arr = array('viewJadwalM', 'ajaxSave', 'dropMK', 'update','view', 'index');
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
		$model=new Jadwal;

		$model->tahun_ajaran = Kalender::model()->getLastYear();
		$model->semester = Kalender::model()->getLastTerm();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Jadwal']))
		{
			$model->attributes=$_POST['Jadwal'];
					
			if($model->save())
			{
				Yii::app()->user->setFlash('success', "Berhasil disimpan!");	
				$this->redirect(array('admin'));
			}
			else
			{
				Yii::app()->user->setFlash('error', "Gagal disimpan!");
			}	
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

		if(isset($_POST['Jadwal']))
		{
			$model->attributes=$_POST['Jadwal'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', "Berhasil disimpan!");	
				$this->redirect(array('admin'));
			}
			else
			{
				Yii::app()->user->setFlash('error', "Gagal disimpan!");
			}	
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
		$dataProvider=new CActiveDataProvider('Jadwal');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Jadwal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Jadwal']))
			$model->attributes=$_GET['Jadwal'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Jadwal the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Jadwal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Jadwal $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='jadwal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionViewJadwalM()
	{
		$id = Mahasiswa::model()->getId(Yii::app()->user->getId());
		$sms = Mahasiswa::model()->getSms($id);

		$model=new PengajarKuliah('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PengajarKuliah']))
			$model->attributes=$_GET['PengajarKuliah'];

		$this->render('viewJadwalM',array(
			'model'=>$model, 'id' => $id, 'sms' => $sms
		));
	}

	public function actionViewJadwalD()
	{
		$id = Dosen::model()->getId(Yii::app()->user->getId());

		$model=new PengajarKuliah('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PengajarKuliah']))
			$model->attributes=$_GET['PengajarKuliah'];

		$this->render('viewJadwalD',array(
			'model'=>$model, 'id' => $id
		));	
	}

	public function actionDropMK($id_jadwal)
	{
		$id_mhs = Mahasiswa::getId(Yii::app()->user->getId());
		$mhs = Mahasiswa::model()->findByPk($id_mhs);
		$jadwal = $this->loadModel($id_jadwal);
		$year = Kalender::model()->getLastYear();
		$term = Kalender::model()->getLastTerm();

		$krs = Krs::model()->findByAttributes(array('tahun_ajaran' => $year, 'term' => $term, 'semester' => $mhs->semester, 'id_jadwal' => $id_jadwal, 'id_mhs' => $id_mhs));
		$khs = Khs::model()->findByAttributes(array('tahun_ajaran' => $year, 'term' => $term, 'semester' => $mhs->semester, 'id_jadwal' => $id_jadwal, 'id_mhs' => $id_mhs));
		$peserta = PesertaMK::model()->findByAttributes(array('tahun_ajaran' => $year, 'semester' => $term, 'id_mhs' => $id_mhs, 'id_jadwal' => $id_jadwal));
		
		if(!empty($krs))
		{	
			$krs->delete();
			$khs->delete();	
			$peserta->delete();
		}

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('createKrs'));
	}

	public function actionAjaxSave()
	{
		$autoIdAll = $_POST['autoId'];
		$id_mhs = Mahasiswa::getId(Yii::app()->user->getId());
		$year = Kalender::model()->getLastYear();
		$term = Kalender::model()->getLastTerm();
		
		foreach($autoIdAll as $autoId)
		{
			$jadwal = $this->loadModel($autoId);
			$mhs = Mahasiswa::model()->findByPK($id_mhs);
			$krs = new Krs;
			$khs = new Khs;
			$peserta = new PesertaMK;
			
			if(Jadwal::getKrsRecord($jadwal->id_jadwal))
			{
				$krs->id_mhs = (int) $id_mhs;
			 	$krs->semester = (int) $mhs->semester;
			 	$krs->id_jadwal = (int) $jadwal->id_jadwal;
			 	$krs->tahun_ajaran = $year;
			 	$krs->term = $term;
			 	$khs->id_mhs = (int) $id_mhs;
			 	$khs->semester = (int) $mhs->semester;
			 	$khs->id_jadwal = (int) $jadwal->id_jadwal;
			 	$khs->nilai_akhir = '-';
			 	$khs->tahun_ajaran = $year;
			 	$khs->term = $term;
			 	if(PesertaMK::model()->getJumlahMhs($jadwal->id_jadwal) < $jadwal->kapasitas)
				{
					$peserta->id_mhs = (int) $id_mhs;
				 	$peserta->id_jadwal = (int) $jadwal->id_jadwal;
					$peserta->tahun_ajaran = Kalender::model()->getLastYear();
					$peserta->semester = Kalender::model()->getLastTerm();
					$peserta->save();
					$krs->save();
			 		$khs->save();
				}	
			}
 		}	
	}
}
	