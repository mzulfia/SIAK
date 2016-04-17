<?php

/**
 * This is the model class for table "khs".
 *
 * The followings are the available columns in table 'khs':
 * @property integer $id_khs
 * @property integer $id_mhs
 * @property integer $id_jadwal
 * @property integer $semester
 * @property string $nilai_huruf
 * @property string $nilai_angka
 *
 * The followings are the available model relations:
 * @property Mahasiswa $idMhs
 * @property Jadwal $idJadwal
 */
class Khs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'khs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('semester', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('id_khs, id_mhs, id_jadwal, semester', 'numerical', 'integerOnly'=>true),
			array('nilai_angka', 'numerical'),
			array('nilai_huruf', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_khs, id_mhs, id_jadwal, semester, nilai_huruf', 'safe', 'on'=>'search'),
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
			'idMhs' => array(self::BELONGS_TO, 'Mahasiswa', 'id_mhs'),
			'idJadwal' => array(self::BELONGS_TO, 'Jadwal', 'id_jadwal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_khs' => 'Id Khs',
			'id_mhs' => 'Id Mhs',
			'id_jadwal' => 'Id Jadwal',
			'semester' => 'Semester',
			'nilai_angka' => 'Nilai Angka',
			'nilai_huruf' => 'Nilai Huruf',
			'tahun_ajaran' => 'Tahun Ajaran',
			'term' => 'Term',
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

		$criteria->compare('id_khs',$this->id_khs);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('semester',$this->semester);
		$criteria->compare('nilai_angka',$this->nilai_angka,true);
		$criteria->compare('nilai_huruf',$this->nilai_huruf,true);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('term',$this->term);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchListMhs($id)
	{
		$criteria = new CDbCriteria;

		$criteria->select = 'id_khs, id_mhs, id_jadwal, semester, nilai_angka, nilai_huruf';
		$criteria->condition = 'id_jadwal = :id';
		$criteria->params = array(':id' => $id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchViewSummary($mhs, $semester)
	{
		$criteria = new CDbCriteria;

		$criteria->select = 'id_khs, id_mhs, id_jadwal, semester, nilai_angka, nilai_huruf';
		$criteria->condition = 'id_mhs = :mhs AND semester = :semester';
		$criteria->params = array(':mhs' => $mhs, ':semester' => $semester);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Khs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function calculateIP($mhs, $semester)
	{
		$q1 = 'SELECT c.nama_mk, c.sks, a.nilai_huruf, a.semester FROM khs a, jadwal b, mata_kuliah c WHERE a.id_jadwal = b.id_jadwal AND b.id_mk = c.id_mk AND a.id_mhs = :mhs AND a.semester = :semester GROUP BY c.nama_mk, a.nilai_huruf, a.semester';
		$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $mhs, ':semester' => $semester));
		$res = 0.00;
		$total_sks = 0;
		$ip = 0.00;
		foreach($arr as $ar)
		{
			if($ar['nilai_huruf'] == 'A')
				$res += $ar['sks'] * 4.0;
			elseif($ar['nilai_huruf'] == 'A-')
				$res += $ar['sks'] * 3.75;
			elseif($ar['nilai_huruf'] == 'B+')
				$res += $ar['sks'] * 3.50;
			elseif($ar['nilai_huruf'] == 'B')
				$res += $ar['sks'] * 3.0;
			elseif($ar['nilai_huruf'] == 'B-')
				$res += $ar['sks'] * 2.75;
			elseif($ar['nilai_huruf'] == 'C+')
				$res += $ar['sks'] * 2.50;
			elseif($ar['nilai_huruf'] == 'C')
				$res += $ar['sks'] * 2.0;
			elseif($ar['nilai_huruf'] == 'D')
				$res += $ar['sks'] * 1.0;
			else
				$res += $ar['sks'] * 0;
			
			$total_sks += $ar['sks'];
		}
		
		if($total_sks == 0)
		{
			return $ip;
		}
		else
		{
			$ip = ($res/$total_sks);
			return Yii::app()->format->unformatNumber($ip);
		}	
	}

	public function calculateMutu($mhs, $semester)
	{
		$q1 = 'SELECT c.sks, a.nilai_huruf FROM khs a, jadwal b, mata_kuliah c WHERE a.id_jadwal = b.id_jadwal AND b.id_mk = c.id_mk AND a.id_mhs = :mhs AND a.semester = :semester GROUP BY a.nilai_huruf, c.sks';
		$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $mhs, ':semester' => $semester));
		$res = 0.00;
		foreach($arr as $ar)
		{
			if($ar['nilai_huruf'] == 'A')
				$res += $ar['sks'] * 4.0;
			elseif($ar['nilai_huruf'] == 'A-')
				$res += $ar['sks'] * 3.75;
			elseif($ar['nilai_huruf'] == 'B+')
				$res += $ar['sks'] * 3.50;
			elseif($ar['nilai_huruf'] == 'B')
				$res += $ar['sks'] * 3.0;
			elseif($ar['nilai_huruf'] == 'B-')
				$res += $ar['sks'] * 2.75;
			elseif($ar['nilai_huruf'] == 'C+')
				$res += $ar['sks'] * 2.50;
			else
				$res += 0.00;
		}
		return $res;
	}
	public function calculateSKS($mhs, $semester)
	{
		$q1 = 'SELECT c.sks, a.nilai_huruf FROM khs a, jadwal b, mata_kuliah c WHERE a.id_jadwal = b.id_jadwal AND b.id_mk = c.id_mk AND a.id_mhs = :mhs AND a.semester = :semester GROUP BY a.nilai_huruf, c.sks';
		$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $mhs, ':semester' => $semester));
		$res = 0;
		foreach($arr as $ar)
		{
			if($ar['nilai_huruf'] == 'A')
				$res += $ar['sks'];
			elseif($ar['nilai_huruf'] == 'A-')
				$res += $ar['sks'];
			elseif($ar['nilai_huruf'] == 'B+')
				$res += $ar['sks'];
			elseif($ar['nilai_huruf'] == 'B')
				$res += $ar['sks'];
			elseif($ar['nilai_huruf'] == 'B-')
				$res += $ar['sks'];
			elseif($ar['nilai_huruf'] == 'C+')
				$res += $ar['sks'];
			else
				$res += 0;
		}
		return $res;
	}

	public function getTotalSKSLulus($id)
	{
		$q1 = 'SELECT SUM(c.sks) AS total FROM khs a, jadwal b, mata_kuliah c WHERE a.id_mhs = :mhs AND a.id_jadwal = b.id_jadwal AND b.id_mk = c.id_mk AND a.nilai_huruf != "D" AND a.nilai_huruf != "E" AND a.nilai_huruf != "-" GROUP BY nilai_huruf';
		$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $id));
	 	if(!empty($arr))
	 	{
	 		return $arr[0]['total'];
	 	}
	 	else
		{	
			return 0;	
		}
	}

	public function getIPK($id)
	{
		$mutu = 0.00;
		$total_sks = 0;
		$q1 = 'SELECT semester FROM khs WHERE id_mhs = :mhs ORDER BY semester DESC LIMIT 1';
		$arr = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $id));
		$size = 0;
		$ipk = 0.00;
		if(!empty($arr))
		{
			$size = (int) $arr[0]['semester'];
			for($i = 1; $i <= $size; $i++)
			{
				$mutu += Khs::model()->calculateMutu($id, $i);
				$total_sks += Khs::model()->calculateSKS($id, $i);
			}
			if($total_sks == 0)
			{
				return Yii::app()->format->formatNumber((float)$ipk);
			}
			else
			{
				$ipk = ($mutu/$total_sks);
				return Yii::app()->format->formatNumber((float)$ipk);
			}
		}	
		else
		{	
			return Yii::app()->format->formatNumber((float)$ipk);
		}
	}

	public function getIPKSms($id, $sms)
	{
		$ipk = 0.00;
		$mutu = 0.00;
		$total_sks = 0;
		$mutu += Khs::model()->calculateMutu($id, $sms);
		$total_sks += Khs::model()->calculateSKS($id, $sms);
		
		if($total_sks == 0)
		{
			return Yii::app()->format->unformatNumber($ipk);
		}
		else
		{
			$ipk = ($mutu/$total_sks);
			return Yii::app()->format->unformatNumber($ipk);
		}
	}

	public function getKodeMK($id)
	{
		$q1 = 'SELECT m.kode_mk FROM jadwal j, mata_kuliah m WHERE j.id_mk = m.id_mk AND j.id_jadwal = :id';
		$res = Yii::app()->db->createCommand($q1)->queryAll(true, array(':id' => $id));	
		return $res[0]['kode_mk'];
	}

	public function getNamaMK($id)
	{
		$q1 = 'SELECT m.nama_mk FROM jadwal j, mata_kuliah m WHERE j.id_mk = m.id_mk AND j.id_jadwal = :id';
		$res = Yii::app()->db->createCommand($q1)->queryAll(true, array(':id' => $id));	
		return $res[0]['nama_mk'];
	}

	public function getSKSMK($id)
	{
		$q1 = 'SELECT m.sks FROM jadwal j, mata_kuliah m WHERE j.id_mk = m.id_mk AND j.id_jadwal = :id';
		$res = Yii::app()->db->createCommand($q1)->queryAll(true, array(':id' => $id));	
		return $res[0]['sks'];
	}

	public function getNilaiAngka($mhs, $jadwal)
	{
		$q1 = 'SELECT nilai_angka FROM khs WHERE id_mhs = :mhs AND id_jadwal = :jadwal';
		$res = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $mhs, ':jadwal' => $jadwal));	
		return $res[0]['nilai_angka'];
	}

	public function getNilaiHuruf($mhs, $jadwal)
	{
		$q1 = 'SELECT nilai_huruf FROM khs WHERE id_mhs = :mhs AND id_jadwal = :jadwal';
		$res = Yii::app()->db->createCommand($q1)->queryAll(true, array(':mhs' => $mhs, ':jadwal' => $jadwal));	
		return $res[0]['nilai_huruf'];
	}
}
