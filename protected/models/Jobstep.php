<?php

/**
 * This is the model class for table "jobstep".
 *
 * The followings are the available columns in table 'jobstep':
 * @property integer $jobstepId
 * @property integer $uId
 * @property string $englishlevel
 * @property integer $englishyear
 * @property string $practicezone
 * @property string $americazone
 * @property string $prioritycondition
 * @property string $dormitoryrequirement
 * @property string $othercondition
 * @property string $projectlength
 */
class Jobstep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jobstep the static model class
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
		return 'jobstep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, englishlevel, englishyear, practicezone, americazone, prioritycondition, dormitoryrequirement', 'required'),
			array('othercondition','safe'),
			/*array('uId, enhilisyear', 'numerical', 'integerOnly'=>true),
			array('englishlevel', 'length', 'max'=>40),
			array('practicezone', 'length', 'max'=>60),
			array('americazone, dormitoryrequirement, othercondition', 'length', 'max'=>255),
			array('prioritycondition', 'length', 'max'=>80),*/
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('jobstepId, uId, englishlevel, enhilisyear, practicezone, americazone, prioritycondition, dormitoryrequirement, othercondition', 'safe', 'on'=>'search'),
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
			'jobstepId' => 'Jobstep',
			'uId' => 'U',
			'englishlevel' => '英语等级',
			'englishyear' => '英语学习年限(年)',
			'practicezone' => '实习区域',
			'americazone' => '赴美意向区域',
			'prioritycondition' => '优先考虑选项',
			'dormitoryrequirement' => '住宿要求',
			'othercondition' => '其他条件',
			'projectlength' => '项目时长',
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

		$criteria->compare('jobstepId',$this->jobstepId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('englishlevel',$this->englishlevel,true);
		$criteria->compare('enhilisyear',$this->enhilisyear);
		$criteria->compare('practicezone',$this->practicezone,true);
		$criteria->compare('americazone',$this->americazone,true);
		$criteria->compare('prioritycondition',$this->prioritycondition,true);
		$criteria->compare('dormitoryrequirement',$this->dormitoryrequirement,true);
		$criteria->compare('othercondition',$this->othercondition,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}