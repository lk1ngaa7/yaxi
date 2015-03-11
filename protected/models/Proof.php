<?php

/**
 * This is the model class for table "proof".
 *
 * The followings are the available columns in table 'proof':
 * @property integer $proofId
 * @property integer $uId
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $nation
 * @property string $borntime
 * @property string $place
 */
class Proof extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proof the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proof';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, name, phone, nation, borntime, place', 'required'),
			array('email','safe'),
			//array('proofId, uId', 'numerical', 'integerOnly'=>true),
			//array('name', 'length', 'max'=>40),
			//array('phone, email, nation', 'length', 'max'=>20),
			//array('place', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('proofId, uId, name, phone, email, nation, borntime, place', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'proofId' => 'Proof',
			'uId' => 'U',
			'name' => '姓名',
			'phone' => '电话',
			'email' => '邮箱',
			'nation' => '国籍',
			'borntime' => '出生日期',
			'place' => '现住址',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('proofId',$this->proofId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('borntime',$this->borntime,true);
		$criteria->compare('place',$this->place,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}