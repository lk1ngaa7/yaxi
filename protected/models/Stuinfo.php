<?php

/**
 * This is the model class for table "stuinfo".
 *
 * The followings are the available columns in table 'stuinfo':
 * @property integer $sId
 * @property integer $uId
 * @property integer $proId
 * @property integer $belongtouid
 * @property string $email
 * @property string $phonenumber
 * @property string $addtime
 * @property integer $rangId
 * @property string $qq
 * @property string $wechat
 * @property string $weibo
 * @property string $realname
 * @property string $starttime
 * @property string $schoolname
 * @property string $belongtouid
 * @property integer $ispeigang
 * @property integer $issignpaid
 * @property integer $isprojectpaid
 *
 */
 /*
    give the default value to the rangId 1
 */
class Stuinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Stuinfo the static model class
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
		return 'stuinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('uId, proId, addtime, rangId', 'required'),
			///array('uId, proId, rangId', 'numerical', 'integerOnly'=>true),
			// 这是为了使用 YiI 框架的 安全特性 赋值  http://www.yiiframework.com/doc/guide/1.1/zh_cn/form.model#sec-4
			array('email, phonenumber, qq, wechat, weibo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sId, uId, proId, email, phonenumber, addtime, rangId, qq, wechat, weibo', 'safe', 'on'=>'search'),
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
		 'range'=>array(self::HAS_ONE,'Range',array('rangeId'=>'rangId')),
		 'latestFiles'=>array(self::HAS_MANY,'Stufiles',array('uId'=>'uId'),'order'=>'latestFiles.addtime DESC','limit'=>'3'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sId' => 'S',
			'uId' => 'U',
			'realname'=>'真实姓名',
			'starttime'=>'出发时间',
			'proId' => '项目ID',
			'email' => 'Email',
			'phonenumber' => '电话号码',
			'addtime' => '添加时间',
			'rangId' => '进度ID',
			'qq' => 'qq号',
			'schoolname'=>'学校名称',
			'teachernotification'=>'老师通知',
			'wechat' => '微信号',
			'weibo' => '微博账号',
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

		$criteria->compare('sId',$this->sId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('proId',$this->proId);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phonenumber',$this->phonenumber,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('rangId',$this->rangId);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('wechat',$this->wechat,true);
		$criteria->compare('weibo',$this->weibo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}