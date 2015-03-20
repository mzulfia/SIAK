<?php

/**
 * This is the model class for table "nilai".
 *
 * The followings are the available columns in table 'nilai':
 * @property integer $id_mhs
 * @property integer $id_dosen
 * @property integer $id_mk
 * @property integer $komponen
 * @property double $bobot
 * @property integer $maksimum
 * @property double $nilai_po
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
			array('id_mhs, id_dosen, id_mk, komponen, bobot, maksimum, nilai_po', 'required'),
			array('id_mhs, id_dosen, id_mk, komponen, maksimum', 'numerical', 'integerOnly'=>true),
			array('bobot, nilai_po', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mhs, id_dosen, id_mk, komponen, bobot, maksimum, nilai_po', 'safe', 'on'=>'search'),
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
			'id_mhs' => 'Id Mhs',
			'id_dosen' => 'Id Dosen',
			'id_mk' => 'Id Mk',
			'komponen' => 'Komponen',
			'bobot' => 'Bobot',
			'maksimum' => 'Maksimum',
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

		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_mk',$this->id_mk);
		$criteria->compare('komponen',$this->komponen);
		$criteria->compare('bobot',$this->bobot);
		$criteria->compare('maksimum',$this->maksimum);
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
}
