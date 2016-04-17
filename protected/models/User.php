<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property string $username
 * @property string $password
 * @property string $saltPassword
 * @property integer $id_role
 *
 * The followings are the available model relations:
 * @property Admin[] $admins
 * @property Dosen[] $dosens
 * @property Mahasiswa[] $mahasiswas
 * @property Sekretariat[] $sekretariats
 * @property Role $idRole
 */
class User extends CActiveRecord
{
	public $password_temp;
	public $confirmation_password;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, confirmation_password, id_role', 'required', 'message' => '{attribute} tidak boleh kosong'),
			array('username', 'unique', 'className' => 'User',
				'attributeName' => 'username',
				'message' => 'Username sudah digunakan'),
			array('password', 'length', 'min'=>6, 'max'=>50),
			array('password', 'match', 'pattern'=>'/[a-zA-Z]/', 'message'=>'Password harus terdiri dari minimal 1 huruf'),
			array('password', 'match', 'pattern'=>'/\d/', 'message'=>'Password harus terdiri dari minimal 1 angka'),
			array('confirmation_password', 'compare', 'compareAttribute' => 'password_temp', 'message' => 'Password dan Confirmation Password tidak sama' ),
			array('id_role', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, saltPassword', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, username, password, saltPassword, id_role', 'safe', 'on'=>'search'),
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
			'admins' => array(self::HAS_MANY, 'Admin', 'id_user'),
			'dosens' => array(self::HAS_MANY, 'Dosen', 'id_user'),
			'mahasiswas' => array(self::HAS_MANY, 'Mahasiswa', 'id_user'),
			'sekretariats' => array(self::HAS_MANY, 'Sekretariat', 'id_user'),
			'idRole' => array(self::BELONGS_TO, 'Role', 'id_role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'username' => 'Username',
			'password' => 'Password',
			'confirmation_password' => 'Confirmation Password',
			'saltPassword' => 'Salt Password',
			'id_role' => 'Role',
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

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('saltPassword',$this->saltPassword,true);
		$criteria->compare('id_role',$this->id_role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getRoleOption()
	{
		$roleArray = CHtml::listData(Role::model()->findAll(), 'id_role','nama');
		return $roleArray;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function validatePassword($password)
	{
		return $this->hashPassword($password, $this->saltPassword) === $this->password;
	}
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
	public function generateSalt()
	{
		return uniqid('', true);
	}
}
