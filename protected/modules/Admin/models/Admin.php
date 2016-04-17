<?php

class Admin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_user', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('jenis', 'length', 'max'=>11),
			array('nama', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_admin, jenis, nama, id_user', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_admin' => 'ID Admin',
			'jenis' => 'Jenis',
			'nama' => 'Nama',
			'id_user' => 'ID User',
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
		$criteria->compare('id_admin',$this->id_admin);
		$criteria->compare('jenis',$this->jenis);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getId($id)
	{
		$sql = 'SELECT id_admin FROM admin WHERE id_user = :id';
		$arr = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));

		$result = '';
		foreach($arr as $arr2)
		{
			$result = $arr2['id_admin'];
		}
		return $result;
	}

	public function getNama($id){
		$res = Admin::model()->findByAttributes(array('id_admin' => $id));
		return $res->nama; 
	}

	public function getJenis($id){
		$res = Admin::model()->findByAttributes(array('id_admin' => $id));
		return $res->jenis; 
	}
}
