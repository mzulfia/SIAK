<?php

/**
 * This is the model class for table "ruang".
 *
 * The followings are the available columns in table 'ruang':
 * @property integer $id_ruang
 * @property string $no_ruang
 *
 * The followings are the available model relations:
 * @property Jadwal[] $jadwals
 * @property Jadwal[] $jadwals1
 * @property Jadwal[] $jadwals2
 */
class Ruang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ruang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_ruang', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('no_ruang', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ruang, no_ruang', 'safe', 'on'=>'search'),
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
			'jadwals1' => array(self::HAS_MANY, 'Jadwal', 'id_ruang_1'),
			'jadwals2' => array(self::HAS_MANY, 'Jadwal', 'id_ruang_2'),
			'jadwals3' => array(self::HAS_MANY, 'Jadwal', 'id_ruang_3'),
			'jadwals4' => array(self::HAS_MANY, 'Jadwal', 'id_ruang_4'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ruang' => 'ID Ruang',
			'no_ruang' => 'No Ruang',
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

		$criteria->compare('id_ruang',$this->id_ruang);
		$criteria->compare('no_ruang',$this->no_ruang);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ruang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getRuangOption()
	{
		$ruangArray = CHtml::listData(Ruang::model()->findAll(), 'id_ruang','no_ruang');
		return $ruangArray;
	}
}
