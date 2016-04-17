<?php

class DefaultController extends Controller
{
	
	public $layout = '//layouts/column2';
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
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
             $arr =array('admin', 'create','update', 'view', 'delete', 'index', 'listPA', 'updatePA', 'viewLulusan', 'printLulusan', 'ajaxSave' );
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('update', 'view', 'delete', 'index', 'listPA', 'updatePA', 'viewLulusan', 'printLulusan', 'ajaxSave'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('');      
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
		$model = $this->loadModel($id);
		$this->render('view',array(
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

		if(isset($_POST['Sekretariat']))
		{
			$model->attributes=$_POST['Sekretariat'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', "Berhasil disimpan!");	
				$this->redirect(array('view', 'id' => $model->id_sekretariat));
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
		$dataProvider=new CActiveDataProvider('Sekretariat');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Sekretariat('search');
		
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['Sekretariat']))
			$model->attributes=$_GET['Sekretariat'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sekretariat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sekretariat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sekretariat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mata-kuliah-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionListPA()
	{
		$model=new Dosen('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Dosen']))
			$model->attributes=$_GET['Dosen'];

		if (isset($_GET['pageSize']))
		{
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }

		$this->render('listPA',array(
			'model'=>$model,
		));
	}

	public function actionUpdatePA()
	{
		$model=new Mahasiswa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mahasiswa']))
			$model->attributes=$_GET['Mahasiswa'];

		$this->render('updatePA',array(
			'model'=>$model,
		));
	}

	public function actionViewLulusan()
	{
		$model=new Mahasiswa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mahasiswa']))
			$model->attributes=$_GET['Mahasiswa'];

		$this->render('viewLulusan',array(
			'model'=>$model,
		));
	}

	public function actionPrintLulusan()
	{
		$model = new Mahasiswa();
		$model->unsetAttributes();
		if(isset($_GET['Mahasiswa']))
			$model->attributes=$_GET['Mahasiswa'];
		$dataProvider = $model->searchLulusan();
		$dataProvider->pagination = false; 
		$data = $dataProvider->getData();
		$head =
			'
			<html>
			<body>
			<div class="header">
					<div class="row">
						<div class="col-md-1" style= "text-align: center">
							<img src="'. Yii::app()->request->baseUrl . '/images/Head.png">
						</div>
					<div style="background-color: #00923F; height: 4px"></div>
			        <div style="background-color: #FFF500; height: 2px"></div>
			        <div style="background-color: #00923F; height: 2px"></div>
				</div>
			</body>
			</html>
			';
		$content =
			'
			<h2 style= "text-align: center"><strong>LULUSAN AKADEMI KEPERAWATAN ISLAMIC VILLAGE</strong></h2>	
			<br>
			<table border = "1" style="border-collapse:collapse" class="box" width="100%">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>NAMA</th>
					<th>ANGKATAN</th>
					<th>KREDIT</th>
					<th>IPK</th>
				</tr>
			';
		$i = 1;
		foreach($data as $model){
			$content .= 
			'<tr>
				<td style="text-align: center; font-size: 12px">' . $i . '</td>
				<td style="text-align: center; font-size: 12px">' . $model['nim'] . '</td>
				<td style="text-align: center; font-size: 12px">'. $model['nama'] .'</td>
				<td style="text-align: center; font-size: 12px">'. date('Y', strtotime($model['tanggal_masuk'])) .'</td>
				<td style="text-align: center; font-size: 12px">'. Khs::model()->getTotalSKSLulus($model['id_mhs']) .'</td>
				<td style="text-align: center; font-size: 12px">'. Khs::model()->getIPK($model['id_mhs']) .'</td>
			</tr>
			';
			$i++;
		}

		$content .= '
			</table>
		';

		$mpdf = Yii::app()->ePdf->mpdf();
		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/css/siak3.css');
		$mpdf->setAutoTopMargin = 'stretch';
		$mpdf->setAutoBottomMargin = 'stretch';
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->SetHTMLHeader($head);
		$mpdf->WriteHTML($content);
		$mpdf->Output("Lulusan-Akper.pdf", "I");
		exit;
		
	}

	public function actionAjaxSave()
	{
		$setAll = $_POST['id_dosen_pa'];
	    if(count($setAll) > 0)	
	    {	
	    	foreach($setAll as $id_mhs => $id_dosen_pa)
			{	
				$model=Mahasiswa::model()->findByPk($id_mhs);
				if($model===null)
				{
					throw new CHttpException(404,'The requested page does not exist.');
				}
				else
				{
					$model->id_dosen_pa = $id_dosen_pa;
					$model->update();
				}
    		}
    	}	
	}
}
