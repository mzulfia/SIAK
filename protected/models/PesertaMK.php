<?php

/**
 * This is the model class for table "daftar_kelas".
 *
 * The followings are the available columns in table 'daftar_kelas':
 * @property integer $id_daftar
 * @property integer $id_mhs
 * @property integer $id_jadwal
 *
 * The followings are the available model relations:
 * @property Mahasiswa $idMhs
 * @property jadwal $idjadwal
 */
class PesertaMK extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'peserta_mk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mhs, id_jadwal', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_peserta_mk, id_mhs, id_jadwal', 'safe', 'on'=>'search'),
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
			'id_peserta_mk' => 'ID Peserta MK',
			'id_mhs' => 'ID Mhs',
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

		$criteria->compare('id_peserta_mk',$this->id_peserta_mk);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('id_jadwal',$this->id_jadwal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchListMhs($id)
	{
		$criteria = new CDbCriteria;

		$criteria->select = 'id_peserta_mk, id_mhs, id_jadwal';
		$criteria->condition = 'id_jadwal = :id';
		$criteria->params = array(':id' => $id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DaftarKelas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getJumlahMhs($id)
	{
		$mhs = PesertaMK::model()->findAllByAttributes(array('id_jadwal' => $id));
		return sizeof($mhs);
	}
}
