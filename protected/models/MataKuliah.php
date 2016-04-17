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
 * @property integer $nip_dosen
 *
 * The followings are the available model relations:
 * @property Jadwal[] $jadwals
 * @property Khs[] $khs
 * @property Krs[] $krs
 * @property Dosen $nipDosen
 * @property Nilai[] $nilais
 * @property Perkuliahan[] $perkuliahans
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
			array('kode_mk, nama_mk, sks, semester', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('sks, semester', 'numerical', 'integerOnly'=>true, 'min' => 1),
			array('nama_mk', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mk, kode_mk, nama_mk, sks, semester', 'safe', 'on'=>'search'),
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
			'jadwals' => array(self::HAS_MANY, 'Jadwal', 'id_mk'),
			'khs' => array(self::HAS_MANY, 'Khs', 'id_mk'),
			'krs' => array(self::HAS_MANY, 'Krs', 'id_mk'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'id_mk'),
			'perkuliahans' => array(self::HAS_MANY, 'Perkuliahan', 'id_mk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_mk' => 'ID MK',
			'kode_mk' => 'Kode MK',
			'nama_mk' => 'Nama MK',
			'sks' => 'SKS',
			'semester' => 'Semester',
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
		$criteria->compare('kode_mk',$this->kode_mk,true);
		$criteria->compare('nama_mk',$this->nama_mk,true);
		$criteria->compare('sks',$this->sks,true);
		$criteria->compare('semester',$this->semester,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'semester ASC',
			),


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

	public function getMKOption()
	{
		$mkArray = CHtml::listData(MataKuliah::model()->findAll(), 'id_mk','nama_mk');
		return $mkArray;
	}

	public function getNama($id){
		$res = MataKuliah::model()->findByAttributes(array('id_mk' => $id));
		return (empty($res['nama_mk'])) ? "" : $res['nama_mk']; 
	}

	public function getMK($id)
	{
		$ret = '';
		
		$sql = 'SELECT a.nama_mk AS nama FROM mata_kuliah a, pengajar_mk b WHERE a.id_mk = b.id_mk AND b.id_dosen = :id';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));

		for($i = 0; $i < sizeof($result); $i++)
		{
			$ret .= $result[$i]['nama'];
			$ret .= '<br>';
		}
		return $ret;
	}
}
