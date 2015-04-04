<?php

/**
 * This is the model class for table "perkuliahan".
 *
 * The followings are the available columns in table 'perkuliahan':
 * @property integer $id_perkuliahan
 * @property integer $id_mk
 * @property integer $id_mhs
 *
 * The followings are the available model relations:
 * @property MataKuliah $idMk
 * @property Mahasiswa $idMhs
 */
class Perkuliahan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'perkuliahan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mk, id_mhs', 'required'),
			array('id_mk, id_mhs', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_perkuliahan, id_mk, id_mhs', 'safe', 'on'=>'search'),
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
			'idMk' => array(self::BELONGS_TO, 'MataKuliah', 'id_mk'),
			'idMhs' => array(self::BELONGS_TO, 'Mahasiswa', 'id_mhs'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_perkuliahan' => 'Id Perkuliahan',
			'id_mk' => 'Id Mk',
			'id_mhs' => 'Id Mhs',
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

		$criteria->compare('id_perkuliahan',$this->id_perkuliahan);
		$criteria->compare('id_mk',$this->id_mk);
		$criteria->compare('id_mhs',$this->id_mhs);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Perkuliahan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
