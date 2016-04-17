<?php

/**
 * This is the model class for table "komponen".
 *
 * The followings are the available columns in table 'komponen':
 * @property integer $id_komponen
 * @property integer $id_jadwal
 * @property string $nama
 * @property double $bobot
 * @property integer $nilai_maks
 *
 * The followings are the available model relations:
 * @property MataKuliah $idMk
 * @property Nilai[] $nilais
 */
class Komponen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'komponen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_jadwal', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('id_jadwal', 'numerical', 'integerOnly'=>true),
			array('nilai_maks', 'numerical', 'integerOnly' => true, 'min'=>0),
			array('bobot', 'length', 'max'=>4),
			array('nama', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_komponen, id_jadwal, nama, bobot, nilai_maks', 'safe', 'on'=>'search'),
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
			'idMk' => array(self::BELONGS_TO, 'MataKuliah', 'id_jadwal'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'id_komponen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_komponen' => 'ID Komponen',
			'id_jadwal' => 'ID MK',
			'nama' => 'Nama',
			'bobot' => 'Bobot',
			'nilai_maks' => 'Nilai Maksimum',
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

		$criteria->compare('id_komponen',$this->id_komponen);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('bobot',$this->bobot);
		$criteria->compare('nilai_maks',$this->nilai_maks);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchUpdate($id_jadwal)
	{
		$criteria=new CDbCriteria;
		$criteria->select = '*';
		$criteria->condition = 'id_jadwal = :id';
		$criteria->params = array(':id' => $id_jadwal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Komponen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getKomponen($id_jadwal)
	{
		$komponen = CHtml::listData(Komponen::model()->findAllByAttributes(array('id_jadwal' => $id_jadwal)), 'id_komponen','nama');
		return $komponen;
	}

	public function getListKomponen($mhs, $id_jadwal)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$ret = '';
		
		$sql = 'SELECT nama, bobot, nilai_po FROM nilai, komponen WHERE nilai.id_komponen = komponen.id_komponen AND nilai.id_jadwal = komponen.id_jadwal AND nilai.id_mhs = :mhs AND nilai.id_jadwal = :jadwal';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':mhs' => $mhs, ':jadwal' => $id_jadwal));
		
		for($i = 0; $i < sizeof($result); $i++)
		{
			if(!empty($result))
			{
				$ret .= $result[$i]['nama'] . " (" . $result[$i]['bobot']*100 . "%): " . $result[$i]['nilai_po'] . ";" ;
				$ret .= '<br>';	
			}
		}
		
		return $ret;
	}
}
