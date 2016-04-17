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
class Pengajar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengajar';
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
			array('id_pengajar, id_dosen, id_jadwal', 'safe', 'on'=>'search'),
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
			'id_pengajar' => 'Id pengajar',
			'id_dosen' => 'Pengajar',
			'id_jadwal' => 'ID Jadwal',
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

		$criteria->compare('id_pengajar',$this->id_pengajar);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMK($sms, $awal, $akhir)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		// $tahun = date('Y', strtotime($awal));
		// $bulan = date('m', strtotime($awal));
		// $hari = date('d' , strtotime($awal));
		// $waktu_awal = $tahun . "-" . ($bulan) . "-" . $hari;
		// $waktu_akhir = $tahun . "-" . ($bulan + 4) . "-" . $hari;

		// $criteria->select = 'id_pengajar, id_dosen, j.id_jadwal';
		// $criteria->join = 'RIGHT JOIN jadwal j ON t.id_jadwal = j.id_jadwal';
		// $criteria->condition = 'j.id_jadwal IN (SELECT j.id_jadwal FROM jadwal j, mata_kuliah m WHERE j.id_mk = m.id_mk AND m.semester = :sms AND ((j.tanggal_awal BETWEEN :awal AND :akhir) OR (j.tanggal_akhir BETWEEN :awal AND :akhir)))';
		// $criteria->params = array(':awal' => $waktu_awal, ':akhir' => $waktu_akhir, ':sms' => $sms);
		
		$criteria->select = 'id_pengajar, id_dosen, j.id_jadwal';
		$criteria->join = 'RIGHT JOIN jadwal j ON t.id_jadwal = j.id_jadwal';
		$criteria->condition = 'j.id_jadwal IN (SELECT j.id_jadwal FROM jadwal j, mata_kuliah m WHERE j.id_mk = m.id_mk AND m.semester = :sms AND j.tanggal_awal = :awal AND j.tanggal_akhir = :akhir)';
		$criteria->params = array(':awal' => $awal, ':akhir' => $akhir, ':sms' => $sms);

		$criteria->compare('id_pengajar',$this->id_pengajar);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		
			return new CActiveDataProvider($this, array(
			'sort'=>array(
			    'defaultOrder'=>'id_mk, kelas ASC',
			),
			'criteria'=>$criteria,
		));
	}

	public function searchKrs($id)
	{
		$criteria=new CDbCriteria;

		$criteria->select = 'id_pengajar, id_dosen, t.id_jadwal';
		$criteria->join = 'RIGHT JOIN krs ON t.id_jadwal = krs.id_jadwal AND krs.id_mhs = :id';
		$criteria->params = array(':id' => $id);

			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchJadwal($id, $sms)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->select = 'id_pengajar, id_dosen, krs.id_jadwal';
		$criteria->join = 'RIGHT JOIN krs ON t.id_jadwal = krs.id_jadwal';
		$criteria->condition = 'krs.id_mhs = :id AND krs.semester = :sms';
		$criteria->params = array(':id' => $id, ':sms' => $sms);
		
		$criteria->compare('id_pengajar',$this->id_pengajar);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		
			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchJadwalD($id, $awal, $akhir)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		
		$criteria->select = 'id_pengajar, id_dosen, j.id_jadwal';
		$criteria->join = 'RIGHT JOIN jadwal j ON t.id_jadwal = j.id_jadwal';
		$criteria->condition = 'id_dosen = :id AND (j.tanggal_awal = :awal OR j.tanggal_akhir = :akhir)';
		$criteria->params = array(':id' => $id, ':awal' => $awal, ':akhir' => $akhir);

		$criteria->compare('id_pengajar',$this->id_pengajar);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchJadwalSBA($awal, $akhir)
	{
		$criteria=new CDbCriteria;
		
		$criteria->select = 'id_pengajar, id_dosen, j.id_jadwal';
		$criteria->join = 'RIGHT JOIN jadwal j ON t.id_jadwal = j.id_jadwal';
		$criteria->condition = 'j.tanggal_awal = :awal AND j.tanggal_akhir = :akhir';
		$criteria->params = array(':awal' => $awal, ':akhir' => $akhir);

		$criteria->compare('id_pengajar',$this->id_pengajar);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchJadwalSBA2($id_jadwal)
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'id_pengajar, id_dosen, id_jadwal';
		$criteria->condition = 'id_jadwal = :id';
		$criteria->params = array(':id' => $id_jadwal);
		
		$criteria->compare('id_pengajar',$this->id_pengajar);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		
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

	public function getPengajar($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$ret = '';
		
		$sql = 'SELECT id_dosen FROM pengajar WHERE id_jadwal = :id';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));
		
		if(!empty($result))
		{
			for($i = 0; $i < sizeof($result); $i++)
			{
				if($result[$i]['id_dosen'] != NULL)
				{
					$ret .= Dosen::model()->getNama($result[$i]['id_dosen']);
					$ret .= '<br>';
				}	
			}
			return $ret;
		}
		else
		{
			return $ret;
		}
	}
}
