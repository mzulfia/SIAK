<?php

/**
 * This is the model class for table "mata_kuliah".
 *
 * The followings are the available columns in table 'mata_kuliah':
 * @property integer $id_mk
 * @property integer $kode_mk
 * @property string $nama_mk
 * @property integer $sks
 * @property integer $semester
 * @property integer $kapasitas
 * @property integer $id_dosen
 */
class MataKuliah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mata_kuliah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_mk, nama_mk, sks, semester, kapasitas, id_dosen', 'required'),
			array('kode_mk, sks, semester, kapasitas, id_dosen', 'numerical', 'integerOnly'=>true),
			array('nama_mk', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mk, kode_mk, nama_mk, sks, semester, kapasitas, id_dosen', 'safe', 'on'=>'search'),
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
			'id_mk' => 'Id Mk',
			'kode_mk' => 'Kode Mk',
			'nama_mk' => 'Nama Mk',
			'sks' => 'Sks',
			'semester' => 'Semester',
			'kapasitas' => 'Kapasitas',
			'id_dosen' => 'Id Dosen',
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

		$criteria->compare('id_mk',$this->id_mk);
		$criteria->compare('kode_mk',$this->kode_mk);
		$criteria->compare('nama_mk',$this->nama_mk,true);
		$criteria->compare('sks',$this->sks);
		$criteria->compare('semester',$this->semester);
		$criteria->compare('kapasitas',$this->kapasitas);
		$criteria->compare('id_dosen',$this->id_dosen);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MataKuliah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
