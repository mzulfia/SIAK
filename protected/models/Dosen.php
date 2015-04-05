<?php

/**
 * This is the model class for table "dosen".
 *
 * The followings are the available columns in table 'dosen':
 * @property integer $nip_dosen
 * @property string $nama
 * @property integer $status_pembimbing
 * @property integer $id_user
 *
 * The followings are the available model relations:
 * @property User $idUser
 * @property Mahasiswa[] $mahasiswas
 * @property MataKuliah[] $mataKuliahs
 * @property Nilai[] $nilais
 */
class Dosen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dosen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status_pembimbing, id_user', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nip_dosen, nama, status_pembimbing, id_user', 'safe', 'on'=>'search'),
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
			'mahasiswas' => array(self::HAS_MANY, 'Mahasiswa', 'nip_dosen'),
			'mataKuliahs' => array(self::HAS_MANY, 'MataKuliah', 'nip_dosen'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'nip_dosen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nip_dosen' => 'Nip Dosen',
			'nama' => 'Nama',
			'status_pembimbing' => 'Status Pembimbing',
			'id_user' => 'Id User',
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

		$criteria->compare('nip_dosen',$this->nip_dosen);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('status_pembimbing',$this->status_pembimbing);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dosen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
