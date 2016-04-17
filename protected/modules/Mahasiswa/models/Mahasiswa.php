<?php

/**
 * This is the model class for table "mahasiswa".
 *
 * The followings are the available columns in table 'mahasiswa':
 * @property integer $nim
 * @property string $nama
 * @property integer $id_user
 * @property integer $nip_dosen
 * @property string $jurusan
 * @property string $fakultas
 * @property string $jenjang
 * @property string $status_akademis
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $status_nikah
 * @property string $no_telp
 * @property string $no_hp
 * @property string $email
 * @property string $tanggal_masuk
 * @property string $jenis_kelamin
 * @property string $kewarganegaraan
 * @property string $agama
 * @property string $alamat_rumah
 * @property string $alamat_tinggal
 * @property integer $kode_pos
 * @property string $nama_ayah
 * @property integer $tahun_ayah
 * @property string $nama_ibu
 * @property integer $tahun_ibu
 * @property string $alamat_ortu
 * @property string $kode_pos_ortu
 * @property string $pddkan_ayah
 * @property string $pddkan_ibu
 * @property integer $penghasilan
 * @property string $asal_sma
 * @property string $jurusan_sma
 * @property string $kota_kab
 * @property string $provinsi
 *
 * The followings are the available model relations:
 * @property Khs[] $khs
 * @property Krs[] $krs
 * @property User $idUser
 * @property Dosen $nipDosen
 * @property Nilai[] $nilais
 * @property Pembayaran[] $pembayarans
 * @property Perkuliahan[] $perkuliahans
 */
class Mahasiswa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mahasiswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user', 'required'),
			array('id_user, id_dosen_pa, semester, kode_pos, tahun_ayah, tahun_ibu', 'numerical', 'integerOnly'=>true),
			array('nama, tempat_lahir, email, nama_ayah, nama_ibu', 'length', 'max'=>30),
			array('nim, status_nikah, no_telp, no_hp, kewarganegaraan', 'length', 'max'=>20),
			array('kode_pos_ortu', 'length', 'max'=>5),
			array('status_akademis', 'length', 'max'=>10),
			array('status_krs', 'length', 'max'=>20),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('agama, pddkan_ayah, pddkan_ibu, penghasilan, asal_sma, jurusan_sma, kota_kab, provinsi', 'length', 'max'=>25),
			array('alamat_rumah, alamat_tinggal, alamat_ortu', 'length'),
			array('tanggal_lahir, tanggal_masuk', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_mhs, nim, nama, id_user, id_dosen_pa, nip_dosen, status_akademis, status_krs, semester, tanggal_lahir, tempat_lahir, status_nikah, no_telp, no_hp, email, tanggal_masuk, jenis_kelamin, kewarganegaraan, agama, alamat_rumah, alamat_tinggal, kode_pos, nama_ayah, tahun_ayah, nama_ibu, tahun_ibu, alamat_ortu, kode_pos_ortu, pddkan_ayah, pddkan_ibu, penghasilan, asal_sma, jurusan_sma, kota_kab, provinsi', 'safe', 'on'=>'search'),
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
			'khs' => array(self::HAS_MANY, 'Khs', 'id_mhs'),
			'krs' => array(self::HAS_MANY, 'Krs', 'id_mhs'),
			'pesertaMK' => array(self::HAS_MANY, 'PesertaMK', 'id_mhs'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'id_mhs'),
			'pembayarans' => array(self::HAS_MANY, 'Pembayaran', 'id_mhs'),
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'idDosenPA'=> array(self::BELONGS_TO, 'Dosen', 'id_dosen_pa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_mhs' => 'ID MHS',
			'nim' => 'NIM',
			'nama' => 'Nama',
			'id_user' => 'ID User',
			'id_dosen_pa' => 'ID Dosen PA',
			'status_akademis' => 'Status Akademis',
			'status_krs' => 'Status KRS',
			'semester' => 'Semester',
			'tanggal_lahir' => 'Tanggal Lahir',
			'tempat_lahir' => 'Tempat Lahir',
			'status_nikah' => 'Status Nikah',
			'no_telp' => 'No Telp',
			'no_hp' => 'No Hp',
			'email' => 'Email',
			'tanggal_masuk' => 'Tanggal Masuk',
			'jenis_kelamin' => 'Jenis Kelamin',
			'kewarganegaraan' => 'Kewarganegaraan',
			'agama' => 'Agama',
			'alamat_rumah' => 'Alamat Rumah',
			'alamat_tinggal' => 'Alamat Tinggal',
			'kode_pos' => 'Kode Pos',
			'nama_ayah' => 'Nama Ayah',
			'tahun_ayah' => 'Tahun Ayah',
			'nama_ibu' => 'Nama Ibu',
			'tahun_ibu' => 'Tahun Ibu',
			'alamat_ortu' => 'Alamat Ortu',
			'kode_pos_ortu' => 'Kode Pos Ortu',
			'pddkan_ayah' => 'Pendidikan Ayah',
			'pddkan_ibu' => 'Pendidikan Ibu',
			'penghasilan' => 'Penghasilan',
			'asal_sma' => 'Asal Sma',
			'jurusan_sma' => 'Jurusan Sma',
			'kota_kab' => 'Kota Kab',
			'provinsi' => 'Provinsi',
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
		$criteria->compare('nim',$this->nim, true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_dosen_pa',$this->id_user);
		$criteria->compare('status_akademis',$this->status_akademis,true);
		$criteria->compare('status_krs',$this->status_krs,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('status_nikah',$this->status_nikah,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('no_hp',$this->no_hp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('kewarganegaraan',$this->kewarganegaraan,true);
		$criteria->compare('agama',$this->agama,true);
		$criteria->compare('alamat_rumah',$this->alamat_rumah,true);
		$criteria->compare('alamat_tinggal',$this->alamat_tinggal,true);
		$criteria->compare('kode_pos',$this->kode_pos);
		$criteria->compare('nama_ayah',$this->nama_ayah,true);
		$criteria->compare('tahun_ayah',$this->tahun_ayah);
		$criteria->compare('nama_ibu',$this->nama_ibu,true);
		$criteria->compare('tahun_ibu',$this->tahun_ibu);
		$criteria->compare('alamat_ortu',$this->alamat_ortu,true);
		$criteria->compare('kode_pos_ortu',$this->kode_pos_ortu,true);
		$criteria->compare('pddkan_ayah',$this->pddkan_ayah,true);
		$criteria->compare('pddkan_ibu',$this->pddkan_ibu,true);
		$criteria->compare('penghasilan',$this->penghasilan);
		$criteria->compare('asal_sma',$this->asal_sma,true);
		$criteria->compare('jurusan_sma',$this->jurusan_sma,true);
		$criteria->compare('kota_kab',$this->kota_kab,true);
		$criteria->compare('provinsi',$this->provinsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 100
			),
			'sort' => array(
				'defaultOrder'=> 'nim ASC'
			),
		));
	}

	public function searchMhsAktif($id)
	{
		$criteria=new CDbCriteria;
		$criteria->select = 'id_mhs, nim, nama, semester, status_akademis, status_krs';
		$criteria->condition = 'id_dosen_pa = :id AND status_akademis = "Aktif"';
		$criteria->params = array(':id' => $id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMhsKosong($id)
	{
		$criteria=new CDbCriteria;
		$criteria->select = 'id_mhs, nim, nama, status_akademis, status_krs';
		$criteria->condition = 'id_dosen_pa = :id AND status_akademis = "Kosong"';
		$criteria->params = array(':id' => $id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMhsCuti($id)
	{
		$criteria=new CDbCriteria;
		$criteria->select = 'id_mhs, nim, nama, status_akademis, status_krs';
		$criteria->condition = 'id_dosen_pa = :id AND status_akademis = "Cuti"';
		$criteria->params = array(':id' => $id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMhsLulus($id)
	{
		$criteria=new CDbCriteria;
		$criteria->select = 'id_mhs, nim, nama, status_akademis, status_krs';
		$criteria->condition = 'id_dosen_pa = :id AND status_akademis = "Lulus"';
		$criteria->params = array(':id' => $id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchUpdateMhsBimbingan($id)
	{
		$criteria=new CDbCriteria;
		$criteria->select = 'id_mhs, nim, nama, status_akademis, status_krs, semester';
		$criteria->condition = 'id_dosen_pa = :id';
		$criteria->params = array(':id' => $id);

		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('nim',$this->nim, true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('status_akademis',$this->status_akademis,true);
		$criteria->compare('status_krs',$this->status_krs,true);
		$criteria->compare('semester',$this->semester,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 100
			),
		));
	}

	public function searchLulusan()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->select = 'id_mhs, nim, nama, status_akademis, tanggal_masuk';
		$criteria->condition = 'status_akademis = "Lulus"';

		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('status_akademis',$this->status_akademis,true);
		$criteria->compare('nim',$this->nim);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'nim ASC',
			),
			'pagination' => array(
				'pageSize' => 100
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mahasiswa the static model class
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

	public function getYearOption()
	{
		$q1 = 'SELECT DISTINCT YEAR(tanggal_masuk) AS year FROM mahasiswa WHERE tanggal_masuk != "0000-00-00" ORDER BY year DESC';
		$arr = Yii::app()->db->createCommand($q1)->queryAll();
		$result = array();
		for($i = 0; $i < sizeof($arr); $i++)
		{
			if($arr [$i]['year'] != "")
				$result[$arr[$i]['year']] = $arr[$i]['year'];	
		}

		return $result;
	}

	public function getStatusOption()
	{
		$q1 = 'SELECT DISTINCT status_akademis FROM mahasiswa';
		$arr = Yii::app()->db->createCommand($q1)->queryAll();
		$result = array();
		for($i = 0; $i < sizeof($arr); $i++)
		{
			if($arr[$i]['status_akademis'] != '')
				$result[$arr[$i]['status_akademis']] = $arr[$i]['status_akademis'];	
		}

		return $result;
	} 

	public function getId($id)
	{
		$sql = 'SELECT id_mhs FROM mahasiswa WHERE id_user = :id';
		$arr = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));

		$result = '';
		foreach($arr as $arr2)
		{
			$result = $arr2['id_mhs'];
		}
		return (int) $result;
	}
	
	public function getNama($id){
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return (empty($res['nama'])) ? "" : $res['nama']; 
	}
	public function getSms($id){
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return (empty($res['semester'])) ? "" : $res['semester'];
	}

	public function getTglMsk($id){
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return (empty($res['tanggal_masuk'])) ? "" : $res['tanggal_masuk'];
	}

	public function getNIM($id){
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return (empty($res['nim'])) ? "" : $res['nim'];
	}

	public function getStatus($id){
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return $res['status_krs']; 
	}

	public function getStatusAkademis($id){
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return (empty($res['status_akademis'])) ? "" : $res['status_akademis'];
	}

	public function getPembimbing($id)
	{
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return (empty($res['id_dosen_pa'])) ? "" : $res['id_dosen_pa'];
	}

	public function getNamaPembimbing($id)
	{
		$res = Mahasiswa::model()->findByAttributes(array('id_mhs' => $id));
		return (empty($res['id_dosen_pa'])) ? "" : Dosen::model()->getNama($res['id_dosen_pa']); 
	}

	public function getListMhs()
	{
		$sql = 'SELECT * FROM mahasiswa';
		$mhs = Yii::app()->db->createCommand($sql)->queryAll();
		$result = CHtml::listData($mhs, 'id_mhs', 'nama');

		return (empty($result)) ?  "" : $result;
	}


	public function getMahasiswa($id)
	{
		$ret = '';
		
		$sql = 'SELECT nama FROM mahasiswa WHERE id_dosen_pa = :id';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));


		for($i = 0; $i < sizeof($result); $i++)
		{
			$ret .= $result[$i]['nama'];
			$ret .= '<br>';
		}
		return $ret;
	}
}
