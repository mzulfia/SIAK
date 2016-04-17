<?php

/**
 * This is the model class for table "krs".
 *
 * The followings are the available columns in table 'krs':
 * @property integer $id_krs
 * @property integer $id_mhs
 * @property integer $id_jadwal
 * @property integer $semester
 *
 * The followings are the available model relations:
 * @property Mahasiswa $idMhs
 * @property Jadwal $idJadwal
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
			array('semester', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('id_mhs, id_jadwal, semester', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_krs, id_mhs, id_jadwal, semester', 'safe', 'on'=>'search'),
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
			'idJadwal' => array(self::BELONGS_TO, 'Jadwal', 'id_jadwal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_krs' => 'Id Krs',
			'id_mhs' => 'Id Mhs',
			'id_jadwal' => 'Id Jadwal',
			'semester' => 'Semester',
			'tahun_ajaran' => 'Tahun Ajaran',
			'term' => 'Term',
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

		$criteria->select = array('id_krs', 'id_mhs', 'semester', 'id_jadwal');
		$criteria->condition ='id_mhs =:id';
		$criteria->params = array(':id' => (int) Mahasiswa::getId(Yii::app()->user->getId())); 

		$criteria->compare('id_krs',$this->id_krs);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('semester',$this->semester);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran);
		$criteria->compare('term',$this->term);

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

	public function getKRS($id, $semester)
	{
		$sql = 'SELECT * from krs WHERE id_mhs = :id_mhs AND semester = :semester';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id_mhs' => $id, ':semester' => $semester));
		return empty($result);
	}

	public function getSms($id)
	{
		$sql = 'SELECT semester FROM krs WHERE id_mhs = :id_mhs ORDER BY semester DESC LIMIT 1';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id_mhs' => $id));
		$ret = '';

		foreach($result as $arr)
		{
			$ret = $arr['semester'];
		}

		return empty($ret) ? 1 : $ret;
	}
}
