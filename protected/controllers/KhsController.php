<?php

class KhsController extends Controller
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
             $arr =array('admin','create','update','delete','view', 'index', 'viewListMhs', 'printKHS', 'viewRingkasan', 'viewRiwayat');
        }
        else if( Yii::app()->user->getState('role') == "2")
        {
            $arr =array('admin', 'create','update','delete','view', 'index', 'viewListMhs', 'printKHS', 'viewRingkasan', 'viewRiwayat'); 
        }
        else if( Yii::app()->user->getState('role') == "3")
        {
          	$arr = array('view', 'viewListMhs', 'viewRiwayat', 'viewRingkasan', 'ajaxUpdateNilai');      
        }
        else
        {
        	$arr = array('list', 'viewRiwayat', 'viewRingkasan');
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
		$model=new Khs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Khs']))
		{
			$model->attributes=$_POST['Khs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_khs));
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

		if(isset($_POST['Khs']))
		{
			$model->attributes=$_POST['Khs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_khs));
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
		$dataProvider=new CActiveDataProvider('Khs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Khs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Khs']))
			$model->attributes=$_GET['Khs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Khs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Khs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Khs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='khs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionViewListMhs($id)
	{
		$model=new Khs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Khs']))
			$model->attributes=$_GET['Khs'];

		$this->render('viewListMhs',array(
			'model'=>$model, 'id_jadwal' => $id
		));
	}

	public function actionViewRiwayat($id)
	{
		$model=new Khs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Khs']))
			$model->attributes=$_GET['Khs'];
		
		if((Mahasiswa::model()->getId(Yii::app()->user->getId()) != $id) && Yii::app()->user->isMahasiswa()) 
		{
			Yii::app()->controller->redirect(array('viewRiwayat', 'id' => Mahasiswa::model()->getId(Yii::app()->user->getId())));
		}
		elseif((Mahasiswa::model()->getPembimbing($id) != Dosen::model()->getId(Yii::app()->user->getId())) && Yii::app()->user->isDosen())
		{
			Yii::app()->controller->redirect(array('/Dosen/default/listAktif'));
		}	

		$this->render('viewRiwayat',array(
			'model'=>$model, 'id_mhs' => $id
		));
	}

	public function actionViewRingkasan($id)
	{
		$model=new Khs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Khs']))
			$model->attributes=$_GET['Khs'];
		
		if((Mahasiswa::model()->getId(Yii::app()->user->getId()) != $id) && Yii::app()->user->isMahasiswa()) 
		{
			$this->redirect(array('viewRingkasan', 'id' => Mahasiswa::model()->getId(Yii::app()->user->getId())));
		}
		elseif((Mahasiswa::model()->getPembimbing($id) != Dosen::model()->getId(Yii::app()->user->getId())) && Yii::app()->user->isDosen())
		{
			$this->redirect(array('/Dosen/default/listAktif'));
		}	
		else
		{
			$this->render('viewRingkasan',array(
				'model'=>$model, 'id_mhs' => $id
			));
		}
	}

	public function actionPrintKHS($id)
    {
    	$filename="Transkrip-" . Mahasiswa::model()->getNIM($id) . ".pdf";
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
		$content = 
		'
			<div id="krs" class="container">
				<div class="row" style= "text-align: center">
					<h3>KARTU HASIL STUDI (KHS)</h3><br>
				</div>		
				<div class="col-md-6">
					<table class="table data">
						<tbody>
							<tr class = "tr data">
								<td class = "td data">Nama</td>
								<td class = "td data">: ' . Mahasiswa::model()->getNama($id) . '</td>
							</tr>
							<tr class = "tr data">
								<td class = "td data">NIM</td>
								<td class = "td data">: ' . Mahasiswa::model()->getNIM($id) . '</td>
							</tr>
							<tr class = "tr data">
								<td class = "td data"class = "tr data">Semester</td>
								<td class = "td data">: ' . Mahasiswa::model()->getSms($id) . '</td>
							</tr>
							<tr class = "tr data">
								<td class = "td data">Tahun Akademik</td>
								<td class = "td data">: '. Kalender::model()->getTahun() . '</td>
							</tr>
							<tr class = "tr data">
								<td class = "td data">IPK</td>
								<td class = "td data">: ' . Khs::model()->getIPK($id) . '</td>
							</tr>
						</tbody>
					</table>
				</div>
		';
		$ip = 0.0;
			$q1 = 'SELECT semester FROM khs WHERE id_mhs = :mhs ORDER BY semester DESC LIMIT 1';
			$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $id));

			if(!empty($arr))
				{
					$size = (int) $arr[0]['semester'];
					for($i = 1; $i <= $size; $i++)
					{
						$content .=
						'
						<h4><strong>Semester '. $i . '</strong></h4>
						<table class="table nilai">
							<tr class = "tr nilai">
								<th class = "th nilai">NO</th>
								<th class = "th nilai">KODE</th>
								<th class = "th nilai">MATA AJARAN</th>
								<th class = "th nilai">JUMLAH SKS </th>
								<th class = "th nilai">NILAI AKHIR </th>
								<th class = "th nilai">NILAI HURUF</th>
							</tr>
						';
						$total_sks = 0;
						$q2 = 'SELECT * FROM khs WHERE id_mhs = :mhs AND semester = :sms';
						$ar = Yii::app()->db->createCommand($q2)->queryAll(true, array(':mhs' => $id, ':sms' => $i));
						for($ii = 0; $ii < sizeof($ar); $ii++)
						{
							$total_sks += Khs::model()->getSKSMK($ar[$ii]['id_jadwal']);
							$content .=
							'	
							<tr class = "tr nilai">
								<td class = "td nilai">'. ($ii+1) .'</td>
								<td class = "td nilai">'. Khs::model()->getKodeMK($ar[$ii]['id_jadwal']) .'</td>
								<td class = "td nilai">'. Khs::model()->getNamaMK($ar[$ii]['id_jadwal']) .'</td>
								<td class = "td nilai">'. Khs::model()->getSKSMK($ar[$ii]['id_jadwal']) .'</td>
								<td class = "td nilai">'. Khs::model()->getNilaiAngka($id, $ar[$ii]['id_jadwal']) .'</td>
								<td class = "td nilai">'. Nilai::model()->calculateGrade($id, $ar[$ii]['id_jadwal']) .'</td>
							</tr>
							';
						}	
						$content .= 
						'
							<tr class = "tr nilai">
								<td class = "td nilai" colspan="3">Jumlah</td>
								<td class = "td nilai"><b>'. $total_sks .'</b></td>
								<td class = "td nilai"></td>
								<td class = "td nilai"></td>
							</tr>
							<tr class = "tr nilai">
								<td class = "td nilai" colspan="3">Indeks Prestasi</td>
								<td class = "td nilai"></td>
								<td class = "th nilai" colspan="3"><b>'. Yii::app()->format->formatNumber((float)(Khs::model()->calculateIP($id, $i))) .'</b></td>
							</tr>
						</table>
						<br>
						';
					}	
				}
				else
				{
					$content .= '<b>Kosong</b><br>';
				}
				$content .= '</div>';


		$signature = '
		<div id="krs" class="container">
			<div class="row">
					<div class="col-md-3">
						<table class="table font12">
			                <thead class="thead font12">
			                  <tr class="tr success">
			                    <th>
			                      Nilai
			                    </th>
			                    <th>
			                      Min
			                    </th>
			                    <th>
			                      Maks
			                    </th>
			                  </tr>
			                </thead>
			                <tbody class="tbody font12">
			                  <tr class="tr font12">
			                    <td class="td font12">A</td>
			                    <td class="td font12">86</td>
			                    <td class="td font12">100</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">A-</td>
			                    <td class="td font12">81</td>
			                    <td class="td font12">85</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">B+</td>
			                    <td class="td font12">76</td>
			                    <td class="td font12">80</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">B</td>
			                    <td class="td font12">71</td>
			                    <td class="td font12">75</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">B-</td>
			                    <td class="td font12">66</td>
			                    <td class="td font12">70</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">C+</td>
			                    <td class="td font12">61</td>
			                    <td class="td font12">65</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">C</td>
			                    <td class="td font12">56</td>
			                    <td class="td font12">60</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">D</td>
			                    <td class="td font12">46</td>
			                    <td class="td font12">55</td>
			                  </tr>
			                  <tr class="tr font12">
			                    <td class="td font12">E</td>
			                    <td class="td font12">0</td>
			                    <td class="td font12">45</td>
			                  </tr>
			                </tbody>
			              </table>
			        </div>
					
					<div class="col-md-4">
			        	<p><b>Tangerang,'. Kalender::model()->getDate() .' <br><br> Program DIII Keperawatan <br> Akademi Keperawatan Islamic Village</b></p>
			            <br><br><br><br><br>
			            <p><b><u>Sri Wahyuni Purwaningsih, S.Kep.</u> <br> Wadir I Bidang Akademik </b></p>
				   </div>
			</div>  
		</div>';



		// conversion HTML => PDF
		$mpdf = Yii::app()->ePdf->mpdf();

		// $mpdf->useOddEven = 1;
		// $mpdf->AddPage('L','','5','i','on');
		//$mpdf->AddPage('L','','','','',50,50,50,50,10,10);
		//$mpdf->WriteHTML($stylesheet,1);      // The parameter 1 tells that this is css/style only and no body/html/text
		//$mpdf->WriteHTML('<div>Section 1 text</div>');
		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/css/siak3.css');
		$mpdf->setAutoTopMargin = 'stretch';
		$mpdf->setAutoBottomMargin = 'stretch';
		$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->SetHTMLHeader($head);
		$mpdf->WriteHTML($content, 2);
		$mpdf->addPage();
		$mpdf->WriteHTML($signature, 2);
		$mpdf->Output($filename, "I");
		exit;
  	}

	public function actionAjaxUpdateNilai()
	{
		$autoIdAll = $_POST['autoId'];
		
		foreach($autoIdAll as $autoId)
		{
			$khs = $this->loadModel($autoId);
			$mhs = Mahasiswa::model()->findByPk($khs->id_mhs);
			$nilai = Nilai::model()->calculateGrade($khs->id_mhs, $khs->id_jadwal);
			$khs->nilai_angka = Nilai::model()->calculateNumber($khs->id_mhs, $khs->id_jadwal);
			$khs->nilai_huruf = $nilai;
			$khs->update();
			if(Khs::model()->getTotalSKSLulus($khs->id_mhs) == 110)
			{
				$mhs->status_akademis = "Lulus";
				$mhs->update();
			}
		}	
	}
	
}
