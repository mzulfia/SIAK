<?php

class KrsController extends Controller
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
            $arr =array('admin', 'create','update','delete','view', 'index'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('view', 'listKrsMhs', 'viewKrs');      
        }
        else
        {
        	$arr = array('createKrs', 'viewKrs');
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
		$model=new Krs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Krs']))
		{
			$model->attributes=$_POST['Krs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_krs));
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

		if(isset($_POST['Krs']))
		{
			$model->attributes=$_POST['Krs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_krs));
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
		$dataProvider=new CActiveDataProvider('Krs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Krs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Krs']))
			$model->attributes=$_GET['Krs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Krs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Krs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Krs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='krs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionCreateKrs()
	{
		$sql = 'SELECT tanggal_awal, tanggal_akhir FROM kalender WHERE jenis_event = "Registrasi Akademik" ORDER BY id_kalender DESC LIMIT 1';
		
		$result = Yii::app()->db->createCommand($sql)->queryAll();
		$awal = '';
		$akhir = '';
		
		foreach($result as $arr)
		{
			$awal = $arr['tanggal_awal'];
			$akhir = $arr['tanggal_akhir'];
		}

		$model=new PengajarKuliah('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PengajarKuliah']))
			$model->attributes=$_GET['PengajarKuliah'];

		$this->render('createKrs',array(
			'model'=>$model, 'awal' => $awal, 'akhir' => $akhir
		));
	}

	public function actionViewKrs($id)
	{
		$model=new PengajarKuliah('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PengajarKuliah']))
			$model->attributes=$_GET['PengajarKuliah'];

		if((Mahasiswa::model()->getId(Yii::app()->user->getId()) != $id) && Yii::app()->user->isMahasiswa()) 
		{
			$this->redirect(array('viewKrs', 'id' => Mahasiswa::model()->getId(Yii::app()->user->getId())));
		}
		elseif((Mahasiswa::model()->getPembimbing($id) != Dosen::model()->getId(Yii::app()->user->getId())) && Yii::app()->user->isDosen())
		{
			$this->redirect(array('/Dosen/default/listAktif'));
		}	
		else
		{
			$this->render('viewKrs',array(
				'model'=>$model, 'id_mhs' => $id
			));
		}	
	}

	public function actionListKrsMhs($id)
	{
		$model=new Krs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Krs']))
			$model->attributes=$_GET['Krs'];

		$this->render('listD',array(
			'model'=>$model, 'id_mhs' => $id,
		));
	}
}
