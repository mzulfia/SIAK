<?php

class KalenderController extends Controller
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
             $arr =array('admin', 'create','update', 'view', 'delete', 'index');
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('admin','create', 'update', 'view', 'delete', 'index'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('index');      
        }
        else
        {
        	$arr = array('index');
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
		$model=new Kalender;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kalender']))
		{
			$model->attributes=$_POST['Kalender'];
			if($model->save())
			{
				$q1 = 'SELECT id_mhs FROM mahasiswa WHERE status_akademis != "Lulus"';
				$res = Yii::app()->db->createCommand($q1)->queryAll();
				if($model->jenis_event == 'Registrasi Administrasi')
				{
					for($i = 0; $i < sizeof($res); $i++)
					{
						$pembayaran = new Pembayaran;
						$pembayaran->id_mhs = $res[$i]['id_mhs'];
						$pembayaran->tahun_ajaran = $model->tahun_ajaran;
						$pembayaran->semester = $model->semester;
						$pembayaran->save();
					} 

					for($i = 0; $i < sizeof($res); $i++)
					{
						$mhs = Mahasiswa::model()->findByPk($res[$i]['id_mhs']);
						if($mhs->status_akademis != "Cuti")
						{
							$mhs->status_akademis = 'Kosong';
							$mhs->update();
						}
					} 
				}
				Yii::app()->user->setFlash('success', "Berhasil dibuat!");	
				$this->redirect(array('admin'));
			}
			else
			{
				Yii::app()->user->setFlash('error', "Gagal dibuat!");
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

		if(isset($_POST['Kalender']))
		{
			$model->attributes=$_POST['Kalender'];

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
		{
			Yii::app()->user->setFlash('success', "Berhasil dihapus!");	
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));	
		}	
			
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Kalender('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kalender']))
			$model->attributes=$_GET['Kalender'];

		$this->render('index',array(
			'model'=>$model,
		));	
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Kalender('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kalender']))
			$model->attributes=$_GET['Kalender'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Kalender the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Kalender::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Kalender $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kalender-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
