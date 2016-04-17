<?php

class KomponenController extends Controller
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
            $arr =array('admin','create','update','delete','view', 'index'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('update', 'delete', 'listKomponen', 'ajaxAdd');      
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
		$model=new Komponen;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Komponen']))
		{
			$model->attributes=$_POST['Komponen'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_komponen));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$model->bobot = $model->bobot*100 . '%';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Komponen']))
		{
			$model->attributes=$_POST['Komponen'];
			$angka = substr($model->bobot, 0, -1);
			$model->bobot = $angka/100;
			
			if($model->save())
				$this->redirect(array('listKomponen', 'id' => $model->id_jadwal));
			
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionListKomponen($id)
	{
		$model = new Komponen('search');
		
		$this->render('listKomponen',array(
			'model'=>$model, 'id_jadwal' => $id
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
		$dataProvider=new CActiveDataProvider('Komponen');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Komponen('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Komponen']))
			$model->attributes=$_GET['Komponen'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Komponen the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Komponen::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Komponen $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='komponen-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxAdd($id_jadwal)
	{
		$model = new Komponen;
		$model->id_jadwal = $id_jadwal;
		$model->save();
	}
}
