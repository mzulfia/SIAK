<?php

/**
 * This is the model class for table "pembayaran".
 *
 * The followings are the available columns in table 'pembayaran':
 * @property integer $id_pembayaran
 * @property integer $nim
 * @property string $tahun_ajaran
 * @property string $semester
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mahasiswa $nim0
 */
class Pembayaran extends CActiveRecord
{
	public $mhs_nim;
	public $mhs_angkatan;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pembayaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mhs', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('id_mhs, pembayaran, tagihan', 'numerical', 'integerOnly'=>true),
			array('tahun_ajaran', 'match', 'pattern' => '/^[0-9 _\/-]{9}$/', 'message' => 'Harus 9 karakter'),
			array('semester', 'length', 'max'=>5),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pembayaran, id_mhs, pembayaran, tagihan, tahun_ajaran, semester, status, mhs_nim, mhs_angkatan', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pembayaran' => 'ID Pembayaran',
			'id_mhs' => 'ID MHS',
			'tahun_ajaran' => 'Tahun Ajaran',
			'semester' => 'Semester',
			'status' => 'Status',
			'pembayaran' => 'Pembayaran',
			'tagihan' => 'Tagihan'
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
		$criteria->with = array('idMhs');
		
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('id_pembayaran',$this->id_pembayaran);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran,true);
		$criteria->compare('t.semester',$this->semester,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('pembayaran',$this->pembayaran);
		$criteria->compare('tagihan',$this->tagihan);
		$criteria->compare('idMhs.nim', $this->mhs_nim, true);
		$criteria->compare('idMhs.tahun_masuk', $this->mhs_angkatan, true);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort' => array(
				'defaultOrder'=> 'tahun_ajaran',
				'attributes' => array(
					'mhs_nim' => array(
						'asc' => 'idMhs.nim ASC',
						'desc' => 'idMhs.nim DESC',
					),
				),
			),
			'pagination' => array(
				'pageSize' => 100
			),
		));
	}

	public function searchMhs($id_mhs)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pembayaran',$this->id_pembayaran);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('pembayaran',$this->pembayaran);
		$criteria->compare('tagihan',$this->tagihan);

		$criteria->condition = 'id_mhs = :id';
		$criteria->params = array(':id' => $id_mhs);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchSPP()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_pembayaran',$this->id_pembayaran);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('pembayaran',$this->pembayaran);
		$criteria->compare('tagihan',$this->tagihan);

		$criteria->condition = 'id_mhs = :id';
		$criteria->params = array(':id' => Mahasiswa::model()->getId(Yii::app()->user->getId()));
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pembayaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getLastStatus($id)
	{
		$q1 = 'SELECT id_pembayaran, status FROM pembayaran WHERE id_mhs = :id_mhs ORDER BY id_pembayaran DESC LIMIT 1';
		$result = Yii::app()->db->createCommand($q1)->queryAll(true, array(':id_mhs' => $id));

		if(!empty($result))
			return $result[0]['status'];
		else
			return "";
	}

	public function getLastYear($id)
	{
		$q1 = 'SELECT id_pembayaran, tahun_ajaran, semester FROM pembayaran WHERE id_mhs = :id_mhs ORDER BY id_pembayaran DESC LIMIT 1';
		$result = Yii::app()->db->createCommand($q1)->queryAll(true, array(':id_mhs' => $id));

		if(!empty($result))
			return $result[0]['tahun_ajaran'] . " " . $result[0]['semester'];
		else
			return "";
	}
}
