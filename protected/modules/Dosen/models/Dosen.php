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
	public $status_pembimbing;
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
			array('id_dosen, id_user', 'numerical', 'integerOnly'=>true),
			array('nip_dosen', 'length', 'max'=>20),
			array('nama', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_dosen, nip_dosen, nama, id_user', 'safe', 'on'=>'search'),
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
			'jadwals' => array(self::HAS_MANY, 'Jadwal', 'id_ruang'),
			'pengajars' => array(self::HAS_MANY, 'Pengajar', 'id_dosen'),
			'mahasiswas' => array(self::HAS_MANY, 'Mahasiswa', 'id_dosen'),
			'mataKuliahs' => array(self::HAS_MANY, 'MataKuliah', 'id_dosen'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'id_dosen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_dosen' => 'ID Dosen',
			'nip_dosen' => 'NIP',
			'nama' => 'Nama',
			'status_pembimbing' => 'Status Pembimbing',
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
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('nip_dosen',$this->nip_dosen, true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
				'defaultOrder'=> 'nip_dosen ASC'
			),
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

	public function getStatus($id)
	{
		$sql = 'SELECT id_mhs FROM mahasiswa WHERE id_dosen_pa = :id';
		$params = array(':id' => $id);
		$arr = Yii::app()->db->createCommand($sql)->queryAll(true, $params);
		if(count($arr) > 0)
		{
			return 'Aktif';
		}
		else
		{
			return 'Kosong';
		}
	}

	public function getId($id)
	{
		$sql = 'SELECT id_dosen FROM dosen WHERE id_user = :id';
		$arr = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));

		$result = '';
		foreach($arr as $arr2)
		{
			$result = $arr2['id_dosen'];
		}
		return $result;
	}

	public function getNama($id){
		$res = Dosen::model()->findByAttributes(array('id_dosen' => $id));
		return $res->nama; 
	}

	public function getNIP($id){
		$res = Dosen::model()->findByAttributes(array('id_dosen' => $id));
		return $res->nip_dosen; 
	}
	
	public function getListDosen()
	{
		$sql = 'SELECT * FROM dosen';
		$dosen = Yii::app()->db->createCommand($sql)->queryAll();
		$result = CHtml::listData($dosen, 'id_dosen', 'nama');

		return $result;
	}
}
