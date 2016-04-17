<?php

class NilaiController extends Controller
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
          	$arr = array('update', 'delete', 'tableNilai', 'ajaxSave');      
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
		$model=new Nilai;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Nilai']))
		{
			$model->attributes=$_POST['Nilai'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_nilai));
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

		if(isset($_POST['Nilai']))
		{
			$model->attributes=$_POST['Nilai'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_nilai));
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
		$dataProvider=new CActiveDataProvider('Nilai');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Nilai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilai']))
			$model->attributes=$_GET['Nilai'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Nilai the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Nilai::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Nilai $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='nilai-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTableNilai($komponen, $jadwal)
	{
		$model=new Nilai('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nilai']))
			$model->attributes=$_GET['Nilai'];

		$this->render('tableNilai',array(
			'model'=>$model, 'id_komponen' => $komponen, 'id_jadwal' => $jadwal 
		));
	}

	public function actionAjaxSave()
	{
		$id_jadwal = $_GET['id_jadwal'];
		$id_komponen = $_GET['id_komponen'];
		$komponen = Komponen::model()->findByPk($id_komponen);

		$setAll = $_POST['nilai_po'];
		if(count($setAll) > 0)
		{
			foreach($setAll as $id_mhs => $nilai_po)
			{
				if(Nilai::model()->getNilaiRecord($id_mhs, $id_jadwal, $id_komponen))
				{
					$model = new Nilai;
					$model->id_mhs = $id_mhs;
					$model->id_jadwal = $id_jadwal;
					$model->id_komponen = $id_komponen;
					if($nilai_po <= $komponen->nilai_maks)
					{
						$model->nilai_po = $nilai_po;
						$model->save();
					}
				}
				else
				{
					$model = Nilai::model()->findByPk(Nilai::model()->getId($id_mhs, $id_jadwal, $id_komponen));
					if($nilai_po > $komponen->nilai_maks)
					{
						throw new ExceptionClass('Error');
					}
					else
					{
						$model->nilai_po = $nilai_po;
						$model->save();
					}
				}
			}
		}
	}
}
