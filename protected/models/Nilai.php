<?php

/**
 * This is the model class for table "nilai".
 *
 * The followings are the available columns in table 'nilai':
 * @property integer $id_nilai
 * @property integer $id_mhs
 * @property integer $id_jadwal
 * @property integer $id_komponen
 * @property double $nilai_po
 *
 * The followings are the available model relations:
 * @property Mahasiswa $idMhs
 * @property Komponen $idKomponen
 * @property Jadwal $idJadwal
 */
class Nilai extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nilai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('id_komponen, nilai_po', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('id_mhs, id_jadwal, id_komponen', 'numerical', 'integerOnly'=>true),
			array('nilai_po', 'numerical', 'min' => 0),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_nilai, id_mhs, id_jadwal, id_komponen, nilai_po', 'safe', 'on'=>'search'),
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
			'idKomponen' => array(self::BELONGS_TO, 'Komponen', 'id_komponen'),
			'idJadwal' => array(self::BELONGS_TO, 'Jadwal', 'id_jadwal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nilai' => 'Id Nilai',
			'id_mhs' => 'Id Mhs',
			'id_jadwal' => 'Id Jadwal',
			'id_komponen' => 'Id Komponen',
			'nilai_po' => 'Nilai Po',
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

		$criteria->compare('id_nilai',$this->id_nilai);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('id_komponen',$this->id_komponen);
		$criteria->compare('nilai_po',$this->nilai_po);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMhs($id_komponen, $id_jadwal)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->select = 'T2.id_mhs, T2.id_jadwal, T2.id_komponen, t.nilai_po';
		$criteria->join = 'RIGHT JOIN (
			SELECT id_mhs, krs.id_jadwal, id_komponen, nilai_maks
			FROM komponen INNER JOIN krs ON komponen.id_jadwal = krs.id_jadwal
			WHERE id_komponen = :id1 AND krs.id_jadwal = :id2
			) AS T2 ON t.id_mhs = T2.id_mhs AND t.id_jadwal = T2.id_jadwal AND t.id_komponen = T2.id_komponen';
		$criteria->params = array(':id1' => $id_komponen, ':id2' => $id_jadwal);

		$criteria->compare('id_nilai',$this->id_nilai);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('id_komponen',$this->id_komponen);
		$criteria->compare('nilai_po',$this->nilai_po);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Nilai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getNilaiRecord($id_mhs, $id_jadwal, $id_komponen)
	{
		$res = Nilai::model()->findByAttributes(array('id_mhs' => $id_mhs, 'id_jadwal' => $id_jadwal, 'id_komponen' => $id_komponen));
		return empty($res); 
	}

	public function getId($id_mhs, $id_jadwal, $id_komponen)
	{
		$res = Nilai::model()->findByAttributes(array('id_mhs' => $id_mhs, 'id_jadwal' => $id_jadwal, 'id_komponen' => $id_komponen));
		return (int) $res['id_nilai']; 
	}

	public function calculateGrade($mhs, $jadwal)
	{
		$nilai = Nilai::model()->findAllByAttributes(array('id_mhs' => $mhs, 'id_jadwal' => $jadwal));
		$angka = 0;
		$res = '';
		foreach($nilai as $poin)
		{
			$komponen = Komponen::model()->findByAttributes(array('id_komponen' => $poin['id_komponen']));
			$angka += $poin['nilai_po'] * $komponen['bobot'];
		}

		if($angka <= 100 && $angka >= 86)
		{
			$res = 'A';
		}
		elseif($angka <= 85 && $angka >= 81)
		{
			$res = 'A-';
		}
		elseif($angka <= 80 && $angka >= 76)
		{
			$res = 'B+';
		}
		elseif($angka <= 75 && $angka >= 71)
		{
			$res = 'B';
		}
		elseif($angka <= 70 && $angka >= 66)
		{
			$res = 'B-';
		}
		elseif($angka <= 65 && $angka >= 61)
		{
			$res = 'C+';
		}
		elseif($angka <= 60 && $angka >= 56)
		{
			$res = 'C';
		}
		elseif($angka <= 55 && $angka >= 46)
		{
			$res = 'D';
		}
		else
		{
			$res = 'E';
		}

		return $res;
	}

	public function calculateNumber($mhs, $jadwal)
	{
		$nilai = Nilai::model()->findAllByAttributes(array('id_mhs' => $mhs, 'id_jadwal' => $jadwal));
		$angka = 0.0;
		foreach($nilai as $poin)
		{
			$komponen = Komponen::model()->findByAttributes(array('id_komponen' => $poin['id_komponen']));
			$angka += $poin['nilai_po'] * $komponen['bobot'];
		}
		
		return Yii::app()->format->formatNumber((float)$angka);
	}
}
