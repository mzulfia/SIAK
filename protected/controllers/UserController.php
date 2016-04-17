<?php

class UserController extends Controller
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
             $arr =array('admin','create','update','delete','view', 'index', 'changePassword');
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('admin','create','update','delete','view', 'index', 'changePassword'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('changePassword');      
        }
        else
        {
        	$arr = array('changePassword');
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
		$model=new User;
		$model1 = new Admin;
		$model2 = new Sekretariat;
		$model3 = new Dosen;
		$model4 = new Mahasiswa;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password_temp = $model->password;
			$model->validate();
			if(!empty($model->password) && $model->validate())
			{
				$model->saltPassword = $model->generateSalt();
				$model->password = $model->hashPassword($model->password, $model->saltPassword);
				if($model->save())
				{
					if($model->id_role == '1')
					{
						$model1->id_user = $model->id_user;
						if($model1->save())
						{
							Yii::app()->user->setFlash('success', "Berhasil dibuat!");	
							$this->redirect(array('admin'));
						}
						else
						{
							Yii::app()->user->setFlash('error', "Gagal dibuat!");
						}
							
					}
					else if($model->id_role == '2')
					{
						$model2->id_user = $model->id_user;
						if($model2->save())
						{
							Yii::app()->user->setFlash('success', "Berhasil dibuat!");	
							$this->redirect(array('admin'));
						}
						else
						{
							Yii::app()->user->setFlash('error', "Gagal dibuat!");
						}
					}
					else if($model->id_role == '3')
					{
						$model3->id_user = $model->id_user;
						if($model3->save())
						{
							Yii::app()->user->setFlash('success', "Berhasil dibuat!");	
							$this->redirect(array('admin'));
						}
						else
						{
							Yii::app()->user->setFlash('error', "Gagal dibuat!");
						}
					}
					else
					{
						$model4->id_user = $model->id_user; 
						if($model4->save())
						{
							Yii::app()->user->setFlash('success', "Berhasil dibuat!");	
							$this->redirect(array('admin'));
						}
						else
						{
							Yii::app()->user->setFlash('error', "Gagal dibuat!");
						}
					}
				}	
				else
				{
					Yii::app()->user->setFlash('error', "Gagal dibuat!");
					$model->password = '';
					$model->confirmation_password = '';
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', "Gagal disimpan!");
				$model->password = '';
				$model->confirmation_password = '';
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
		$model->password = '';
		$model->password_temp = '';
		$model->confirmation_password = '';
		$model->saltPassword = '';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password_temp = $model->password;
			$model->validate();
			if(!empty($model->password) && $model->validate())
			{
				$model->saltPassword = $model->generateSalt();
				$model->password = $model->hashPassword($model->password, $model->saltPassword);
				if($model->save())
				{	
					Yii::app()->user->setFlash('success', "Berhasil disimpan!");	
					$this->redirect(array('admin'));
				}
				else
				{
					Yii::app()->user->setFlash('error', "Gagal disimpan!");
					$model->password = '';
					$model->confirmation_password = '';
				}
			}	
			else
			{
				Yii::app()->user->setFlash('error', "Gagal disimpan!");
				$model->password = '';
				$model->confirmation_password = '';
			}

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionChangePassword()
	{
		$id = Yii::app()->user->getId();
		$model=$this->loadModel($id);
		$username = strtolower($model->username); 
        	$user = User::model()->find('LOWER(username)=?', array($username)); 

		$model->password = '';
		$model->password_temp = '';
		$model->confirmation_password = '';
		$model->saltPassword = '';

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password_temp = $model->password;
			$model->validate();
			if(!empty($model->password) && $model->validate())
			{
				if($user->validatePassword($model->password))
				{
					Yii::app()->user->setFlash('error', "Password Baru tidak boleh sama dengan Password Lama!");	
					$model->password = '';
					$model->confirmation_password = '';					
				} 
				else
				{
					$model->saltPassword = $model->generateSalt();
					$model->password = $model->hashPassword($model->password, $model->saltPassword);
					if($model->save())
					{	
						Yii::app()->user->setFlash('success', "Berhasil disimpan!");
						$model->password = '';
						$model->confirmation_password = '';
					}
					else
					{
						Yii::app()->user->setFlash('error', "Gagal disimpan!");
						$model->password = '';
						$model->confirmation_password = '';
					}
				}
				
			}	
			else
			{
				Yii::app()->user->setFlash('error', "Gagal disimpan!");
				$model->password = '';
				$model->confirmation_password = '';
			}

		}

		$this->render('changePassword',array(
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
