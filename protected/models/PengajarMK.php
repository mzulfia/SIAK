<?php

/**
 * This is the model class for table "pengajar_mk".
 *
 * The followings are the available columns in table 'pengajar_mk':
 * @property integer $id_pengajar_mk
 * @property integer $id_dosen
 * @property integer $id_mk
 * @property integer $status_koordinator
 *
 * The followings are the available model relations:
 * @property Dosen $idDosen
 * @property MataKuliah $idMk
 */
class PengajarMK extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengajar_mk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('id_dosen, id_mk', 'numerical', 'integerOnly'=>true),
			array('status_koordinator', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pengajar_mk, id_dosen, id_mk, status_koordinator', 'safe', 'on'=>'search'),
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
			'idDosen' => array(self::BELONGS_TO, 'Dosen', 'id_dosen'),
			'idMk' => array(self::BELONGS_TO, 'MataKuliah', 'id_mk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pengajar_mk' => 'Id Pengajar Mk',
			'id_dosen' => 'Id Dosen',
			'id_mk' => 'Id Mk',
			'status_koordinator' => 'Status Koordinator',
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

		$criteria->compare('id_pengajar_mk',$this->id_pengajar_mk);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_mk',$this->id_mk);
		$criteria->compare('status_koordinator',$this->status_koordinator);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchPengajarMK($id)
	{
		$criteria=new CDbCriteria;

		$criteria->select = '*';
		$criteria->condition = 'id_mk = :id';
		$criteria->params = array(':id' => $id);


		$criteria->compare('id_pengajar_mk',$this->id_pengajar_mk);
		$criteria->compare('id_dosen',$this->id_dosen);
		$criteria->compare('id_mk',$this->id_mk);
		$criteria->compare('status_koordinator',$this->status_koordinator);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

	}

	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PengajarMk the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getPengajarMK($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$ret = '';
		
		$sql = 'SELECT * FROM pengajar_mk WHERE id_mk = :id';
		$result = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));
		
		if(!empty($result))
		{
			for($i = 0; $i < sizeof($result); $i++)
			{
				if($result[$i]['id_dosen'] != NULL)
				{
					if($result[$i]['status_koordinator'] == 'Aktif')
					{
						$ret .= Dosen::model()->getNama($result[$i]['id_dosen']);
						$ret .= ' (Koordinator) <br>';
					}
				}
			}

			for($i = 0; $i < sizeof($result); $i++)
			{
				if($result[$i]['id_dosen'] != NULL)
				{
					if($result[$i]['status_koordinator'] == 'Kosong')
					{
						$ret .= Dosen::model()->getNama($result[$i]['id_dosen']);
						$ret .= '<br>';
					}
				}
			}

			return $ret;
		}
		else
		{
			return $ret;
		}
	}

	public function getListPengajarMK($id)
	{
		$result = array();
		$sql = 'SELECT * FROM dosen, pengajar_mk WHERE dosen.id_dosen = pengajar_mk.id_dosen AND pengajar_mk.id_mk = :id';
		$dosen = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));
		if(!empty($dosen))
		{
			for($i = 0; $i < sizeof($dosen); $i++)
			{
				$result += array(
					$dosen[$i]['id_dosen'] => $dosen[$i]['nama']
				);
			}
			return $result;
		}
		else
		{
			return $result;
		}
	}

	public function getStatusKoordinator($id_dosen, $id_mk)
	{
		$sql = 'SELECT status_koordinator FROM pengajar_mk WHERE id_dosen = :id1 AND id_mk = :id2';
		$dosen = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id1' => $id_dosen, ':id2' => $id_mk));

		return empty($dosen) ? false : ($dosen[0]['status_koordinator']=='Aktif');
	}
}
