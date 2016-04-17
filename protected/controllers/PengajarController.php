<?php

class PengajarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
             $arr =array('admin','create', 'update', 'view', 'delete', 'index', 'addPengajar', 'ajaxPengajarSave', 'ajaxAdd'); 
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('admin','create', 'update', 'view', 'delete', 'index', 'addPengajar', 'ajaxPengajarSave', 'ajaxAdd'); 
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
		$model=new Pengajar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pengajar']))
		{
			$model->attributes=$_POST['Pengajar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_Pengajar));
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

		if(isset($_POST['Pengajar']))
		{
			$model->attributes=$_POST['Pengajar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_Pengajar));
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
		$dataProvider=new CActiveDataProvider('Pengajar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$sql = 'SELECT tanggal_awal, tanggal_akhir FROM kalender WHERE jenis_event = "Masa Perkuliahan" ORDER BY id_kalender DESC LIMIT 1';
		$result = Yii::app()->db->createCommand($sql)->queryAll();
		
		$model=new Pengajar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pengajar']))
			$model->attributes=$_GET['Pengajar'];

		$this->render('admin',array(
			'model'=>$model, 'awal' => $result[0]['tanggal_awal'], 'akhir' => $result[0]['tanggal_akhir'],
		));	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pengajar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pengajar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pengajar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Pengajar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAddPengajar($id)
	{
		$model=new Pengajar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pengajar']))
			$model->attributes=$_GET['Pengajar'];

		$this->render('add',array(
			'model'=>$model, 'id_jadwal' => $id
		));		
	}

	public function actionAjaxPengajarSave()
	{
		$setAll = $_POST['id_dosen'];
		if(count($setAll) > 0)
		{
			foreach($setAll as $id_jadwal => $id_dosen)
			{
				if($id_dosen != NULL)
				{	
					$check = Pengajar::model()->findByAttributes(array('id_dosen' => $id_dosen, 'id_jadwal' => $id_jadwal));
					if(!empty($check))
					{
						$model = Pengajar::model()->findByPk((int)$check['id_Pengajar']);
						$model->id_dosen = $id_dosen;
						$model->id_jadwal = $id_jadwal; 
					}
					else
					{
						$model= new Pengajar;
						$model->id_dosen = $id_dosen;
						$model->id_jadwal = $id_jadwal;
						$model->save();	
					}
				}	
			}
		}
	}
	public function actionAjaxAdd($id_jadwal)
	{
		$model = new Pengajar;
		$model->id_jadwal = $id_jadwal;
		$model->save();
	}
}
