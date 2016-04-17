<?php

/**
 * This is the model class for table "kalender".
 *
 * The followings are the available columns in table 'kalender':
 * @property integer $id_kalender
 * @property integer $tahun_ajaran
 * @property integer $term
 * @property string $jenis_event
 * @property string $keterangan
 * @property string $tanggal_awal
 * @property string $tanggal_akhir
 */
class Kalender extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kalender';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tahun_ajaran, semester, jenis_event, tanggal_awal, tanggal_akhir', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('tahun_ajaran', 'match', 'pattern' => '/^[0-9 _\/-]{9}$/', 'message' => 'Harus 9 karakter'),
			array('jenis_event', 'length', 'max'=>30),
			array('keterangan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kalender, tahun_ajaran, semester, jenis_event, keterangan, tanggal_awal, tanggal_akhir', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kalender' => 'ID Kalender',
			'tahun_ajaran' => 'Tahun Ajaran',
			'semester' => 'Semester',
			'jenis_event' => 'Jenis Event',
			'keterangan' => 'Keterangan',
			'tanggal_awal' => 'Tanggal Awal',
			'tanggal_akhir' => 'Tanggal Akhir',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		
		$criteria=new CDbCriteria;

		$criteria->compare('id_kalender',$this->id_kalender);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('semester',$this->semester, true);
		$criteria->compare('jenis_event',$this->jenis_event,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('tanggal_awal',$this->tanggal_awal,true);
		$criteria->compare('tanggal_akhir',$this->tanggal_akhir,true);

		

		return new CActiveDataProvider($this, array(
			'sort'=>array(
			    'defaultOrder'=>'id_kalender DESC',
			),
			'criteria'=>$criteria,
		));
	}

	public function searchIndex()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$q1 = 'SELECT tahun_ajaran FROM kalender ORDER BY tahun_ajaran DESC LIMIT 1';
		$arr = Yii::app()->db->createCommand($q1)->queryAll();
		$tahun_ajaran = $arr[0]['tahun_ajaran'];

		$criteria=new CDbCriteria;
		$criteria->select = '*';
		$criteria->condition = 'tahun_ajaran = :tahun';
		$criteria->params = array(':tahun' => $tahun_ajaran);

		$criteria->compare('id_kalender',$this->id_kalender);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('semester',$this->semester, true);
		$criteria->compare('jenis_event',$this->jenis_event,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('tanggal_awal',$this->tanggal_awal,true);
		$criteria->compare('tanggal_akhir',$this->tanggal_akhir,true);

		

		return new CActiveDataProvider($this, array(
			'sort'=>array(
			    'defaultOrder'=>'id_kalender DESC',
			),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kalender the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTahun()
	{
		$q1 = 'SELECT id_kalender, tahun_ajaran, semester FROM kalender WHERE jenis_event = "Registrasi Administrasi" ORDER BY id_kalender DESC LIMIT 1';
		$arr = Yii::app()->db->createCommand($q1)->queryAll();
		foreach($arr as $ar)
		{
			$tahun = $ar['tahun_ajaran'];
			$sms = $ar['semester'];
		}
		return $tahun . " " . $sms;
	}
	
	public function getDate()
	{

	 	$tahun = date('Y');
		$bulan = '';
		if(date('m') == '01')
			$bulan = 'Januari';
		elseif(date('m') == '02')
			$bulan = 'Februari';
		elseif(date('m') == '03')
			$bulan = 'Maret';
		elseif(date('m') == '04')
			$bulan = 'April';
		elseif(date('m') == '05')
			$bulan = 'Mei';
		elseif(date('m') == '06')
			$bulan = 'Juni';
		elseif(date('m') == '07')
			$bulan = 'Juli';
		elseif(date('m') == '08')
			$bulan = 'Agustus';
		elseif(date('m') == '09')
			$bulan = 'September';
		elseif(date('m') == '10')
			$bulan = 'Oktober';
		elseif(date('m') == '11')
			$bulan = 'November';
		else
			$bulan = 'Desember';
		$hari = date('d');

		$date = " " . $hari . " " . $bulan . " " . $tahun; 
		return $date;
	}

	public function getLastYear()
	{
		$q1 = 'SELECT tahun_ajaran FROM kalender ORDER BY tahun_ajaran DESC LIMIT 1';
		$arr = Yii::app()->db->createCommand($q1)->queryAll();
		foreach($arr as $ar)
		{
			$tahun = $ar['tahun_ajaran'];
		}
		return $tahun;

	}

	public function getLastTerm()
	{
		$q1 = 'SELECT semester FROM kalender ORDER BY semester DESC LIMIT 1';
		$arr = Yii::app()->db->createCommand($q1)->queryAll();
		foreach($arr as $ar)
		{
			$semester = $ar['semester'];
		}
		return $semester;
	}
}
