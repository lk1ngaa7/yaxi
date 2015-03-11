<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $uId
 * @property string $username
 * @property string $password
 * @property integer $rights
 * @property string $lastlogintime
 * @property string $lastloginip
 * @property string $indexurl
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
			array('username, password, rights,indexurl', 'required'),
			array('username','unique'),
			array('rights', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>40),
			array('password', 'length', 'max'=>50),
			array('lastloginip', 'length', 'max'=>255),
			array('indexurl', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uId, username, password, rights, lastlogintime, lastloginip, indexurl', 'safe', 'on'=>'search'),
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
		  'stuinfo'=>array(self::HAS_ONE,'Stuinfo','uId','order'=>'stuinfo.addtime DESC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uId' => 'U',
			'username' => 'Username',
			'password' => 'Password',
			'rights' => 'Rights',
			'lastlogintime' => 'Lastlogintime',
			'lastloginip' => 'Lastloginip',
			'indexurl' => 'Indexurl',
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

		$criteria->compare('uId',$this->uId);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('rights',$this->rights);
		$criteria->compare('lastlogintime',$this->lastlogintime,true);
		$criteria->compare('lastloginip',$this->lastloginip,true);
		$criteria->compare('indexurl',$this->indexurl,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}