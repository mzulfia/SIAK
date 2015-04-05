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
			array('nama, id_user', 'required'),
			array('id_user, nip_dosen, kode_pos, tahun_ayah, tahun_ibu, penghasilan', 'numerical', 'integerOnly'=>true),
			array('nama, tempat_lahir, email, nama_ayah, nama_ibu', 'length', 'max'=>30),
			array('jurusan, fakultas, status_nikah, no_telp, no_hp, kewarganegaraan', 'length', 'max'=>20),
			array('jenjang, kode_pos_ortu', 'length', 'max'=>5),
			array('status_akademis', 'length', 'max'=>10),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('agama, pddkan_ayah, pddkan_ibu, asal_sma, jurusan_sma, kota_kab, provinsi', 'length', 'max'=>25),
			array('alamat_rumah, alamat_tinggal, alamat_ortu', 'length', 'max'=>50),
			array('tanggal_lahir, tanggal_masuk', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nim, nama, id_user, nip_dosen, jurusan, fakultas, jenjang, status_akademis, tanggal_lahir, tempat_lahir, status_nikah, no_telp, no_hp, email, tanggal_masuk, jenis_kelamin, kewarganegaraan, agama, alamat_rumah, alamat_tinggal, kode_pos, nama_ayah, tahun_ayah, nama_ibu, tahun_ibu, alamat_ortu, kode_pos_ortu, pddkan_ayah, pddkan_ibu, penghasilan, asal_sma, jurusan_sma, kota_kab, provinsi', 'safe', 'on'=>'search'),
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
			'khs' => array(self::HAS_MANY, 'Khs', 'nim'),
			'krs' => array(self::HAS_MANY, 'Krs', 'nim'),
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'nipDosen' => array(self::BELONGS_TO, 'Dosen', 'nip_dosen'),
			'nilais' => array(self::HAS_MANY, 'Nilai', 'nim'),
			'pembayarans' => array(self::HAS_MANY, 'Pembayaran', 'nim'),
			'perkuliahans' => array(self::HAS_MANY, 'Perkuliahan', 'nim'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nim' => 'Nim',
			'nama' => 'Nama',
			'id_user' => 'Id User',
			'nip_dosen' => 'Nip Dosen',
			'jurusan' => 'Jurusan',
			'fakultas' => 'Fakultas',
			'jenjang' => 'Jenjang',
			'status_akademis' => 'Status Akademis',
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
			'pddkan_ayah' => 'Pddkan Ayah',
			'pddkan_ibu' => 'Pddkan Ibu',
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

		$criteria->compare('nim',$this->nim);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('nip_dosen',$this->nip_dosen);
		$criteria->compare('jurusan',$this->jurusan,true);
		$criteria->compare('fakultas',$this->fakultas,true);
		$criteria->compare('jenjang',$this->jenjang,true);
		$criteria->compare('status_akademis',$this->status_akademis,true);
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
}
