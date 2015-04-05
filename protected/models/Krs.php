<?php

/**
 * This is the model class for table "krs".
 *
 * The followings are the available columns in table 'krs':
 * @property integer $id_krs
 * @property integer $nim
 * @property integer $semester
 * @property integer $id_mk
 *
 * The followings are the available model relations:
 * @property Mahasiswa $nim0
 * @property MataKuliah $idMk
 */
class Krs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'krs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nim, semester, id_mk', 'required'),
			array('nim, semester, id_mk', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_krs, nim, semester, id_mk', 'safe', 'on'=>'search'),
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
			'nim0' => array(self::BELONGS_TO, 'Mahasiswa', 'nim'),
			'idMk' => array(self::BELONGS_TO, 'MataKuliah', 'id_mk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_krs' => 'Id Krs',
			'nim' => 'Nim',
			'semester' => 'Semester',
			'id_mk' => 'Id Mk',
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

		$criteria->compare('id_krs',$this->id_krs);
		$criteria->compare('nim',$this->nim);
		$criteria->compare('semester',$this->semester);
		$criteria->compare('id_mk',$this->id_mk);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Krs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
