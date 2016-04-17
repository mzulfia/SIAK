<?php

/**
 * This is the model class for table "jadwal".
 *
 * The followings are the available columns in table 'jadwal':
 * @property integer $id_jadwal
 * @property string $waktu_awal_1
 * @property string $waktu_akhir_1
 * @property string $hari_1
 * @property string $waktu_awal_2
 * @property string $waktu_akhir_2
 * @property string $hari_2
 * @property string $waktu_awal_3
 * @property string $waktu_akhir_3
 * @property string $hari_3
 * @property string $waktu_awal_4
 * @property string $waktu_akhir_4
 * @property string $hari_4
 * @property string $kelas
 * @property integer $kapasitas
 * @property integer $id_mk
 * @property integer $id_ruang_1
 * @property integer $id_ruang_2
 * @property integer $id_ruang_3
 * @property integer $id_ruang_4
 *
 * The followings are the available model relations:
 * @property Ruang $idRuang4
 * @property MataKuliah $idMk
 * @property Ruang $idRuang1
 * @property Ruang $idRuang3
 * @property Khs[] $khs
 * @property Komponen[] $komponens
 * @property Krs[] $krs
 * @property Nilai[] $nilais
 * @property Pengajar[] $pengajars
 * @property PesertaMk[] $pesertaMks
 */
class Jadwal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jadwal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('waktu_awal_1, waktu_akhir_1, hari_1, kelas, kapasitas, id_ruang_1, id_mk', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('waktu_awal_1, waktu_akhir_1, waktu_awal_2, waktu_akhir_2, waktu_awal_3, waktu_akhir_3, waktu_awal_4, waktu_akhir_4', 'type', 'type'=>'time', 'timeFormat'=>'hh:mm:ss'),
			array('kapasitas, id_mk, id_ruang_1, id_ruang_2, id_ruang_3, id_ruang_4', 'numerical', 'integerOnly'=>true),
			array('hari_1, hari_2, hari_3, hari_4', 'length', 'max'=>10),
			array('kelas', 'length', 'max'=>1),
			array('tahun_ajaran', 'length', 'max'=>9),
			array('semester', 'length', 'max'=>6),
			array('waktu_awal_2, waktu_akhir_2, waktu_awal_3, waktu_akhir_3, waktu_awal_4, waktu_akhir_4', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tahun_ajaran, semester, id_jadwal, tanggal_awal, tanggal_akhir, waktu_awal_1, waktu_akhir_1, hari_1, waktu_awal_2, waktu_akhir_2, hari_2, waktu_awal_3, waktu_akhir_3, hari_3, waktu_awal_4, waktu_akhir_4, hari_4, kelas, kapasitas, id_mk, id_ruang_1, id_ruang_2, id_ruang_3, id_ruang_4', 'safe', 'on'=>'search'),
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
			'idRuang1' => array(self::BELONGS_TO, 'Ruang', 'id_ruang_1'),
			'idRuang2' => array(self::BELONGS_TO, 'Ruang', 'id_ruang_2'),
			'idRuang3' => array(self::BELONGS_TO, 'Ruang', 'id_ruang_3'),
			'idRuang4' => array(self::BELONGS_TO, 'Ruang', 'id_ruang_4'),
			'khs' => array(self::HAS_MANY, 'Khs', 'id_jadwal'),
			'komponens' => array(self::HAS_MANY, 'Komponen', 'id_jadwal'),
			'krs' => array(self::HAS_MANY, 'Krs', 'id_jadwal'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'id_jadwal'),
			'pengajars' => array(self::HAS_MANY, 'Pengajar', 'id_jadwal'),
			'pesertaMks' => array(self::HAS_MANY, 'PesertaMk', 'id_jadwal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tahun_ajaran'=>'Tahun Ajaran',
			'semester'=>'Semester',
			'id_jadwal' => 'ID Jadwal',
			'waktu_awal_1' => 'Waktu Awal 1',
			'waktu_akhir_1' => 'Waktu Akhir 1',
			'hari_1' => 'Hari 1',
			'waktu_awal_2' => 'Waktu Awal 2',
			'waktu_akhir_2' => 'Waktu Akhir 2',
			'hari_2' => 'Hari 2',
			'waktu_awal_3' => 'Waktu Awal 3',
			'waktu_akhir_3' => 'Waktu Akhir 3',
			'hari_3' => 'Hari 3',
			'waktu_awal_4' => 'Waktu Awal 4',
			'waktu_akhir_4' => 'Waktu Akhir 4',
			'hari_4' => 'Hari 4',
			'kelas' => 'Kelas',
			'kapasitas' => 'Kapasitas',
			'id_mk' => 'Mata Kuliah',
			'id_ruang_1' => 'Ruang 1',
			'id_ruang_2' => 'Ruang 2',
			'id_ruang_3' => 'Ruang 3',
			'id_ruang_4' => 'Ruang 4',
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
		$criteria=new CDbCriteria;

		$criteria->compare('tahun_ajaran',$this->tahun_ajaran, true);
		$criteria->compare('semester',$this->semester, true);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('waktu_awal_1',$this->waktu_awal_1,true);
		$criteria->compare('waktu_akhir_1',$this->waktu_akhir_1,true);
		$criteria->compare('hari_1',$this->hari_1,true);
		$criteria->compare('waktu_awal_2',$this->waktu_awal_2,true);
		$criteria->compare('waktu_akhir_2',$this->waktu_akhir_2,true);
		$criteria->compare('hari_2',$this->hari_2,true);
		$criteria->compare('waktu_awal_3',$this->waktu_awal_3,true);
		$criteria->compare('waktu_akhir_3',$this->waktu_akhir_3,true);
		$criteria->compare('hari_3',$this->hari_3,true);
		$criteria->compare('waktu_awal_4',$this->waktu_awal_4,true);
		$criteria->compare('waktu_akhir_4',$this->waktu_akhir_4,true);
		$criteria->compare('hari_4',$this->hari_4,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('kapasitas',$this->kapasitas);
		$criteria->compare('id_mk',$this->id_mk);
		$criteria->compare('id_ruang_1',$this->id_ruang_1);
		$criteria->compare('id_ruang_2',$this->id_ruang_2);
		$criteria->compare('id_ruang_3',$this->id_ruang_3);
		$criteria->compare('id_ruang_4',$this->id_ruang_4);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchListMKSBA()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('tahun_ajaran',$this->tahun_ajaran,true);
		$criteria->compare('semester',$this->semester,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jadwal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getKrsRecord($id_jadwal)
	{
		$id_mhs = Mahasiswa::getId(Yii::app()->user->getId());
		$sms = Mahasiswa::model()->findByPk($id_mhs);
		$sql = 'SELECT id_krs FROM krs WHERE id_jadwal = :jadwal AND id_mhs = :mhs AND semester = :sms' ;
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':jadwal' => $id_jadwal, ':mhs' => $id_mhs, ':sms' => $sms->semester));
		return empty($result);	
	}	


	//perlu dianalisis
	public function checkJadwal($tahun_ajaran, $semester, $waktu_awal_1, $waktu_awal_2, $waktu_awal_3, $waktu_awal_4, $hari_1, $hari_2, $hari_3, $hari_4, $id_ruang_1, $id_ruang_2, $id_ruang_3, $id_ruang_4)
	{
		$q1 = 'SELECT count(id_jadwal) AS jumlah FROM jadwal WHERE tahun_ajaran = :tahun_ajaran AND semester = :semester AND
			(((:waktu_awal_1 BETWEEN waktu_awal_1 AND waktu_akhir_1) AND hari_1 = :hari_1 AND id_ruang_1 = :id_ruang_1) OR
			((:waktu_awal_2 BETWEEN waktu_awal_2 AND waktu_akhir_2) AND hari_2 = :hari_2 AND id_ruang_2 = :id_ruang_2) OR
			((:waktu_awal_3 BETWEEN waktu_awal_3 AND waktu_akhir_3) AND hari_3 = :hari_3 AND id_ruang_3 = :id_ruang_3) OR
			((:waktu_awal_4 BETWEEN waktu_awal_4 AND waktu_akhir_4) AND hari_4 = :hari_4 AND id_ruang_4 = :id_ruang_4))
		';
		$result = Yii::app()->db->createCommand($q1)->queryAll(true, array(
			':tahun_ajaran' => $tahun_ajaran,
			':semester' => $semester,
			':waktu_awal_1' => $waktu_awal_1,
			':waktu_awal_2' => $waktu_awal_2,
			':waktu_awal_3' => $waktu_awal_3,
			':waktu_awal_4' => $waktu_awal_4,
			':hari_1' => $hari_1,
			':hari_2' => $hari_2,
			':hari_3' => $hari_3,
			':hari_4' => $hari_4,
			':id_ruang_1' => $id_ruang_1,
			':id_ruang_2' => $id_ruang_2,
			':id_ruang_3' => $id_ruang_3,
			':id_ruang_4' => $id_ruang_4,
		));
		return $result[0]['jumlah'] <= 1;
	}

	//perlu dianalisis
	public function checkKelas($tahun_ajaran, $semester, $id_mk, $kelas)
	{
		$q1 = 'SELECT count(id_jadwal) AS jumlah FROM jadwal WHERE tahun_ajaran = :tahun_ajaran AND semester = :semester AND id_mk = :id_mk AND kelas = :kelas';
		$result = Yii::app()->db->createCommand($q1)->queryAll(true, array(
			':tahun_ajaran' => $tahun_ajaran,
			':semester' => $semester,
			':id_mk' => $id_mk, 
			':kelas' => $kelas,
		));
		
		return $result[0]['jumlah'] <= 1;
	}

	public function getMataKuliah($id)
	{
		$q1 = 'SELECT nama_mk FROM mata_kuliah m, jadwal j WHERE m.id_mk = j.id_mk AND j.id_jadwal = :id ';
		$mk = Yii::app()->db->createCommand($q1)->queryAll(true, array(':id'=>$id));

		return empty($mk[0]['nama_mk']) ? null : $mk[0]['nama_mk'];
	}

	public function getSms($id)
	{
		$res = Jadwal::model()->findByAttributes(array('id_jadwal' => $id));
		return (empty($res['semester'])) ? "" : $res['semester']; 
	}

	public function getTahun($id)
	{
		$res = Jadwal::model()->findByAttributes(array('id_jadwal' => $id));
		return (empty($res['tahun_ajaran'])) ? "" : $res['tahun_ajaran']; 
	}
}
