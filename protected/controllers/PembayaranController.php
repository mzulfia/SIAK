<?php

class PembayaranController extends Controller
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
             $arr =array('admin','create','update','delete','view', 'viewPembayaranMahasiswa', 'index', 'ajaxupdate');
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('admin', 'create', 'update', 'delete','view', 'viewPembayaranMahasiswa', 'index', 'ajaxupdate'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('');      
        }
        else
        {
        	$arr = array('viewSPP');
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
		$model=new Pembayaran;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pembayaran']))
		{
			$model->attributes=$_POST['Pembayaran'];
			if($model->pembayaran >= '5500000' && $model->pembayaran < $model->tagihan)
				$model->status = 'LUNAS BERSYARAT';
			elseif ($model->pembayaran == $model->tagihan)
				$model->status = 'LUNAS';
			if($model->save())
				$this->redirect(array('viewPembayaranMahasiswa','id'=>$model->id_mhs));
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

		if(isset($_POST['Pembayaran']))
		{
			$model->attributes=$_POST['Pembayaran'];
			if($model->pembayaran >= '5500000' && $model->pembayaran < $model->tagihan)
				$model->status = 'LUNAS BERSYARAT';
			elseif ($model->pembayaran != null && $model->tagihan != null && $model->pembayaran == $model->tagihan)
				$model->status = 'LUNAS';
			if($model->save()){
				Yii::app()->user->setFlash('success','Berhasil disimpan!');
				$this->redirect(array('viewPembayaranMahasiswa','id'=>$model->id_mhs));
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
		try
		{
		    $this->loadModel($id)->delete();
		    if(!isset($_GET['ajax']))
		    {
		    	Yii::app()->user->setFlash('success','Normal - Deleted Successfully');
		    	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		    }
		    else
		    {
		    	echo "<div class='flash-success'>Ajax - Deleted Successfully</div>";
		    }
		}
		catch(CDbException $e)
		{
		    if(!isset($_GET['ajax']))
		        Yii::app()->user->setFlash('error','Normal - error message');
		    else
		        echo "<div class='flash-error'>Ajax - error message</div>"; //for ajax}
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pembayaran');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pembayaran('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pembayaran']))
			$model->attributes=$_GET['Pembayaran'];

		if (isset($_GET['export'])) {
                $production = 'export';
        } else {
                $production = 'grid';
        }
		
		$this->render('admin',array(
			'model'=>$model, 'production' => $production
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pembayaran the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pembayaran::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pembayaran $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pembayaran-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionViewPembayaranMahasiswa($id)
	{
		$this->layout ='//layouts/column1';
		$model=new Pembayaran('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pembayaran']))
			$model->attributes=$_GET['Pembayaran'];

		$this->render('viewPembayaranMahasiswa',array(
			'model'=>$model, 'id_mhs' => $id
		));
	}

	public function actionViewSPP()
	{
		$model=new Pembayaran('search');
		$model->unsetAttributes();  // clear any default values
		
		$this->render('viewSPP',array(
			'model'=>$model,
		));
	}

	public function actionAjaxupdate()
	{
		$act = $_GET['act'];
		
		if($act == 'setPembayaran')
	    {	
	    	$setAll = $_POST['pembayaran'];
	    	if(count($setAll) > 0)
	    	{
	    	 	foreach($setAll as $id_pembayaran => $pembayaran)
	    		{
	    			$model = $this->loadModel($id_pembayaran);
	    			$model->pembayaran = $pembayaran;
	    			
					if($model->pembayaran >= '5500000' && $model->pembayaran < $model->tagihan)
	    			{
	    				$mhs = Mahasiswa::model()->findByPk($model->id_mhs);
	    				$model->status = 'LUNAS BERSYARAT';
	    				$model->update();
	    				$mhs->status_akademis = 'Aktif';
	    				$mhs->update();
	    			}	
					if ($model->pembayaran != null && $model->tagihan != null && $model->pembayaran == $model->tagihan)
					{
						$mhs = Mahasiswa::model()->findByPk($model->id_mhs);
	    				$model->status = 'LUNAS';
	    				$model->update();
	    				$mhs->status_akademis = 'Aktif';
	    				$mhs->update();
					}
				}
	    	}
	    }
	    else
	    { 
	    	$id_mhs = $_GET['id_mhs'];  
			$model = Mahasiswa::model()->findByPk($id_mhs);
			if($model->semester == 6)
			{
				$model->semester += 0;
				$model->update();
			}
			else
			{
				$model->semester += 1;
				$model->status_krs = 'Belum Disetujui';	
				$model->update();
			}
		}
	}
}
