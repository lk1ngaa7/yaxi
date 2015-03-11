<?php

/**
 * This is the model class for table "admininfo".
 *
 * The followings are the available columns in table 'admininfo':
 * @property integer $aId
 * @property integer $uId
 * @property integer $isSuper
 * @property integer $proId
 * @property integer $phonenumber
 * @property string $email
 * @property string $addtime
 * @property string $realname
 */
class Admininfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admininfo the static model class
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
		return 'admininfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, isSuper, proId, addtime', 'required'),
			array('uId, isSuper, proId, phonenumber', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aId, uId, isSuper, proId, phonenumber, email, addtime', 'safe', 'on'=>'search'),
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
		 'user'=>array(self::HAS_ONE,'User',array('uId'=>'uId'),'order'=>'addtime DESC'),
		 'project'=>array(self::HAS_ONE,'Project',array('proId'=>'proId')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aId' => 'A',
			'uId' => 'U',
			'isSuper' => 'Is Super',
			'proId' => 'Pro',
			'phonenumber' => 'Phonenumber',
			'email' => 'Email',
			'addtime' => 'Addtime',
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

		$criteria->compare('aId',$this->aId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('isSuper',$this->isSuper);
		$criteria->compare('proId',$this->proId);
		$criteria->compare('phonenumber',$this->phonenumber);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('addtime',$this->addtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}