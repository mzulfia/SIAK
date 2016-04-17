<?php

/**
 * This is the model class for table "pengajar".
 *
 * The followings are the available columns in table 'pengajar':
 * @property integer $id_pengajar
 * @property integer $id_dosen
 * @property integer $id_jadwal
 *
 * The followings are the available model relations:
 * @property DaftarKelas[] $daftarKelases
 * @property Dosen $idDosen
 * @property Jadwal $idJadwal
 */
class PengajarKuliah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengajar_kuliah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dosen, id_jadwal', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_dosen, id_dosen, id_jadwal, tahun_ajaran, semester', 'safe', 'on'=>'search'),
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
			'idDosen' => array(self::BELONGS_TO, 'Dosen', 'id_dosen'),
			'idJadwal' => array(self::BELONGS_TO, 'Jadwal', 'id_jadwal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pengajar_kuliah' => 'ID Pengajar Kuliah',
			'id_dosen' => 'ID Dosen',
			'id_jadwal' => 'ID Jadwal',
			'tahun_ajaran' => 'Tahun Ajaran',
			'semester' => 'Semester',
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

		$criteria->compare('id_pengajar_kuliah',$this->id_pengajar_kuliah);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('semester',$this->semester);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMK($sms)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$year = Kalender::model()->getLastYear();
		$term = Kalender::model()->getLastTerm();

		$criteria=new CDbCriteria;
		$criteria->select = 'id_pengajar_kuliah, id_dosen, j.id_jadwal, j.tahun_ajaran, j.semester';
		$criteria->join = 'RIGHT JOIN jadwal j ON t.id_jadwal = j.id_jadwal';
		$criteria->condition = 'j.tahun_ajaran = :year AND j.semester = :term AND j.id_mk IN (SELECT j.id_mk FROM jadwal j, mata_kuliah m WHERE j.id_mk = m.id_mk AND m.semester = :sms) GROUP BY j.id_jadwal';
		$criteria->params = array(':year' => $year, ':term' => $term, ':sms' => $sms);
		
		$criteria->compare('id_pengajar_kuliah',$this->id_pengajar_kuliah);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('semester',$this->semester);
		
			return new CActiveDataProvider($this, array(
			'sort'=>array(
			    'defaultOrder'=>'id_mk, kelas ASC',
			),
			'criteria'=>$criteria,
		));
	}

	public function searchKrs($id, $sms)
	{
		$year = Kalender::model()->getLastYear();
		$term = Kalender::model()->getLastTerm();

		$criteria=new CDbCriteria;


		$criteria->select = 'id_pengajar_kuliah, id_dosen, krs.id_jadwal';
		$criteria->join = 'RIGHT JOIN krs ON t.id_jadwal = krs.id_jadwal';
		$criteria->condition = 'krs.id_mhs = :id AND krs.semester = :sms AND krs.tahun_ajaran = :year AND krs.term = :term GROUP BY krs.id_jadwal';
		$criteria->params = array(':id' => $id, ':sms' => $sms, ':year' => $year, ':term' => $term);

			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchJadwal($id, $sms)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.


		$criteria=new CDbCriteria;
		$criteria->select = 'id_pengajar_kuliah, id_dosen, krs.id_jadwal';
		$criteria->join = 'RIGHT JOIN krs ON t.id_jadwal = krs.id_jadwal';
		$criteria->condition = 'krs.id_mhs = :id AND krs.semester = :sms GROUP BY krs.id_jadwal';
		$criteria->params = array(':id' => $id, ':sms' => $sms);
		
		$criteria->compare('id_pengajar_kuliah',$this->id_pengajar_kuliah);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('semester',$this->semester);
		
			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchJadwalD($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		
		$criteria->select = 'id_pengajar_kuliah, id_dosen, id_jadwal';
		$criteria->condition = 'id_dosen = :id';
		$criteria->params = array(':id' => $id);

		$criteria->compare('id_pengajar_kuliah',$this->id_pengajar_kuliah);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('semester',$this->semester);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function searchJadwalSBA2($id_jadwal)
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'id_pengajar_kuliah, id_dosen, id_jadwal';
		$criteria->condition = 'id_jadwal = :id';
		$criteria->params = array(':id' => $id_jadwal);
		
		$criteria->compare('id_pengajar_kuliah',$this->id_pengajar_kuliah);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('semester',$this->semester);

			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public function searchListMK($id)
	{
		$criteria = new CDbCriteria;
		
		$criteria->select = '*';
		$criteria->condition = 'id_dosen = :id';
		$criteria->params = array(':id' => $id);

		$criteria->compare('tahun_ajaran',$this->tahun_ajaran, true);
		$criteria->compare('semester',$this->semester, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return pengajar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getPengajarKuliah($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$ret = '';
		
		$sql = 'SELECT id_dosen FROM pengajar_kuliah WHERE id_jadwal = :id';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));
		
		for($i = 0; $i < sizeof($result); $i++)
		{
			if(!empty($result))
			{
				if($result[$i]['id_dosen'] != NULL)
				{
					$ret .= Dosen::model()->getNama($result[$i]['id_dosen']);
					$ret .= '<br>';	
				}	
			}
		}
		
		return $ret;
	}
}
