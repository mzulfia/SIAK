<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
	public $layout='//layouts/column2';
	public $temp_id = '';
	
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
             $arr =array('admin', 'update','delete','view', 'index', 'printIDM');
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr = array('admin', 'update', 'view', 'index', 'printIDM'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('view');      
        }
        else
        {
        	$arr = array('update','view', 'index', 'printIDM');
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
		if($id == Mahasiswa::getId(Yii::app()->user->getId()))
		{
			$this->render('view',array(
			'model'=> $this->loadModel($id),
			));
		}	
		elseif(Yii::app()->user->isDosen() && Mahasiswa::model()->getPembimbing($id) == Dosen::model()->getId(Yii::app()->user->getId()))
		{
			$this->render('view',array(
			'model'=> $this->loadModel($id),
			));
		}
		elseif(Yii::app()->user->isSekretariat() || Yii::app()->user->isAdmin())
		{
			$this->render('view',array(
			'model'=> $this->loadModel($id),
			));
		}
		else
		{
			throw new CHttpException(401,'Anda tidak memiliki akses.');
		}
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if($id == Mahasiswa::getId(Yii::app()->user->getId()))
		{
			$model = $this->loadModel($id);
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Mahasiswa']))
			{
				$model->attributes=$_POST['Mahasiswa'];
				if($model->save())
				{
					Yii::app()->user->setFlash('success', "Berhasil disimpan!");	
					$this->redirect(array('view', 'id' => $model->id_mhs));
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
		else if(Yii::app()->user->isDosen() && Mahasiswa::model()->getPembimbing($id) == Dosen::model()->getId(Yii::app()->user->getId()))
		{
			$model = $this->loadModel($id);
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Mahasiswa']))
			{
				$model->attributes=$_POST['Mahasiswa'];
				if($model->save())
				{
					Yii::app()->user->setFlash('success', "Berhasil disimpan!");	
					$this->redirect(array('view', 'id' => $model->id_mhs));
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
		elseif(Yii::app()->user->isSekretariat() || Yii::app()->user->isAdmin())
		{
			$model = $this->loadModel($id);
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Mahasiswa']))
			{
				$model->attributes=$_POST['Mahasiswa'];
				if($model->save())
				{
					Yii::app()->user->setFlash('success', "Berhasil disimpan!");	
					$this->redirect(array('view', 'id' => $model->id_mhs));
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
		else
		{
			throw new CHttpException(401,'Anda tidak memiliki akses.');
		}
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
		$dataProvider=new CActiveDataProvider('Mahasiswa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Mahasiswa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mahasiswa']))
			$model->attributes=$_GET['Mahasiswa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionPrintIDM($id)
	{
		if((Mahasiswa::model()->getId(Yii::app()->user->getId()) != $id) && Yii::app()->user->isMahasiswa()) 
		{
			Yii::app()->controller->redirect(array('printIDM', 'id' => Mahasiswa::model()->getId(Yii::app()->user->getId())));
		}
		else 
		{
			$model = Mahasiswa::model()->findByPk($id);
			$filename="IDM-" . Mahasiswa::model()->getNIM($id) . ".pdf";
			$head = ob_get_clean ();
			$content = ob_get_clean ();
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
			$content = '
			<h2 style= "text-align: center"><strong>ISIAN DATA MAHASISWA</strong></h2>	
			<table border = "1" style="border-collapse:collapse" class="box" width="100%">
			<tbody>
			<tr>
				<th colspan="4">IDENTITAS MAHASISWA</th>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>NIM</b></td>
				<td width="30%" style="font-size: 14px">'. $model->nim . '</td>
				<td class="head" width="10%" style="font-size: 14px"><b>Nama</b></td>
				<td width="30%" style="font-size: 14px">'. $model->nama . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Status Akademis</b></td>
				<td width="30%" style="font-size: 14px">'. $model->status_akademis . '</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<th colspan="4">DATA MAHASISWA</th>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Tempat Lahir</b></td>
				<td width="30%" style="font-size: 14px">'. $model->tempat_lahir . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Jenis Kelamin</b></td>
				<td width="30%" style="font-size: 14px">'. $model->jenis_kelamin . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Tanggal Lahir</b></td>
				<td width="30%" style="font-size: 14px">'. (($model->tanggal_lahir === "0000-00-00") ? "" : Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->tanggal_lahir))) . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Kewarganegaraan</b></td>
				<td width="30%" style="font-size: 14px">'. $model->kewarganegaraan . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Status Perkawinan</b></td>
				<td width="30%" style="font-size: 14px">'. $model->status_nikah . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Agama</b></td>
				<td width="30%" style="font-size: 14px">'. $model->agama . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Nomor Telepon</b></td>
				<td width="30%" style="font-size: 14px">'. $model->no_telp . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Nomor HP</b></td>
				<td width="30%" style="font-size: 14px">'. $model->no_hp . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>E-mail</b></td>
				<td width="30%" style="font-size: 14px">'. $model->email . '</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Alamat Tinggal</b></td>
				<td colspan="3" style="font-size: 14px">'. $model->alamat_rumah . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Alamat Tinggal</b></td>
				<td style="font-size: 14px">'. $model->alamat_tinggal . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Kode Pos</b></td>
				<td width="30%" style="font-size: 14px">15138</td>
			</tr>
			<tr>
				<th colspan="4"><b>ORANG TUA</b></th>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Nama Ayah</b></td>
				<td width="30%" style="font-size: 14px">'. $model->nama_ayah . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Nama Ibu</b></td>
				<td width="30%" style="font-size: 14px">'. $model->nama_ibu . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Tahun Lahir Ayah</b></td>
				<td width="30%" style="font-size: 14px">'. $model->tahun_ayah . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Tahun Lahir Ibu</b></td>
				<td width="30%" style="font-size: 14px">'. $model->tahun_ibu . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Pendidikan Ayah</b></td>
				<td width="30%" style="font-size: 14px">'. $model->pddkan_ayah . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Pendidikan Ibu</b></td>
				<td width="30%" style="font-size: 14px">'. $model->pddkan_ibu . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Alamat Orang Tua</b></td>
				<td colspan="3" style="font-size: 14px">'. $model->alamat_ortu . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Penghasilan Orang Tua</b></td>
				<td style="font-size: 14px">'. $model->penghasilan . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Kode Pos Orang Tua</b></td>
				<td width="30%" style="font-size: 14px">'. $model->kode_pos_ortu . '</td>
			</tr>
			<tr>
				<th colspan="4">ASAL SMA</th>
			</tr>
				<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Asal SMA / NPSN</b></td>
				<td width="30%" style="font-size: 14px">'. $model->asal_sma . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Jurusan SMA</b></td>
				<td width="30%" style="font-size: 14px">'. $model->jurusan_sma . '</td>
			</tr>
			<tr>
				<td class="head" width="20%" style="font-size: 14px"><b>Kota / Kabupaten</b></td>
				<td width="30%" style="font-size: 14px">'. $model->kota_kab . '</td>
				<td class="head" width="20%" style="font-size: 14px"><b>Propinsi</b></td>
				<td width="30%" style="font-size: 14px">'. $model->provinsi . '</td>
			</tr>
				</tbody></table>
			';

			$signature = '
			<br>
			<div id="krs" class="container">
				<div class="row">
						<p style="font-size: 14px; text-align: justify"><b>Dengan ini saya menyatakan bahwa data yang tercantum diatas adalah benar. Apabila terjadi kesalahan karena data yang saya isi tidak benar, sepenuhnya menjadi tanggung jawab saya.</b></p>
						<div class="col-md-4 col-md-offset-8">
				        	<p style="font-size: 14px">Tangerang,'. Kalender::model()->getDate() .'</p>
				            <br><br><br><br><br>
				            <p style="font-size: 14px"><u>'. $model->nama .'</u> <br> NIM. '. $model->nim .'</p>
					   </div>
				</div>  
			</div>';

			$mpdf = Yii::app()->ePdf->mpdf();

			// $mpdf->useOddEven = 1;
			// $mpdf->AddPage('L','','5','i','on');
			//$mpdf->AddPage('L','','','','',50,50,50,50,10,10);
			//$mpdf->WriteHTML($stylesheet,1);      // The parameter 1 tells that this is css/style only and no body/html/text
			//$mpdf->WriteHTML('<div>Section 1 text</div>');
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/css/siak3.css');
			$mpdf->setAutoTopMargin = 'stretch';
			$mpdf->setAutoBottomMargin = 'stretch';
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->SetHTMLHeader($head);
			$mpdf->WriteHTML($content, 2);
			$mpdf->addPage();
			$mpdf->WriteHTML($signature, 2);
			$mpdf->Output($filename, "I");
			exit;
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Mahasiswa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Mahasiswa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Mahasiswa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mahasiswa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}