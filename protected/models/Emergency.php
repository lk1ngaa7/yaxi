<?php

/**
 * This is the model class for table "emergency".
 *
 * The followings are the available columns in table 'emergency':
 * @property integer $emergencyId
 * @property integer $personalInfoId
 * @property string $name
 * @property string $phonenumber
 * @property string $homephonenumber
 * @property string $email
 */
class Emergency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Emergency the static model class
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
		return 'emergency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('personalInfoId, name, email,phonenumber,homephonenumber', 'required'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('emergencyId, personalInfoId, name, phonenumber, homephonenumber, email', 'safe', 'on'=>'search'),
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
			'emergencyId' => 'Emergency',
			'personalInfoId' => 'Personal Info',
			'name' => '紧急联系人姓名',
			'phonenumber' => '紧急联系人手机号',
			'homephonenumber' => '紧急联系人家庭电话号',
			'email' => '紧急联系人邮件',
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

		$criteria->compare('emergencyId',$this->emergencyId);
		$criteria->compare('personalInfoId',$this->personalInfoId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phonenumber',$this->phonenumber,true);
		$criteria->compare('homephonenumber',$this->homephonenumber,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}