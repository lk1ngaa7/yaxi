<?php

/**
 * This is the model class for table "personalinfo".
 *
 * The followings are the available columns in table 'personalinfo':
 * @property integer $personalInfoId
 * @property integer $uId
 * @property string $lastedittime
 * @property string $lastname
 * @property string $lastname_
 * @property string $firstname
 * @property string $firstname_
 * @property string $pastname
 * @property string $gender
 * @property string $borntime
 * @property string $addformtime
 * @property string $practicetime
 * @property integer $traveldays
 * @property string $bornplace
 * @property string $nation
 * @property string $accountplace
 * @property double $height
 * @property double $weight
 * @property string $homephonenumber
 * @property string $idnumber
 * @property string $homeplace
 * @property string $homezipcode
 * @property string $nowplace
 * @property string $nowzipcode
 * @property string $postplace
 * @property string $postzipcode
 * @property string $bloodtype
 * @property string $marrycondition
 * @property string $foundspersonname
 * @property string $relation
 * @property string $foundsphonenumber
 * @property string $foundsemail
 * @property string $foundsborntime
 * @property string $foundsnation
 * @property string $foundsplace
 */
class Personalinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personalinfo the static model class
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
		return 'personalinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lastname, lastname_, firstname, gender ,firstname_,borntime, bornplace,addformtime, practicetime, traveldays, nation, accountplace, height, weight, homephonenumber, idnumber, homeplace, homezipcode, nowplace, nowzipcode, postplace, postzipcode, bloodtype, marrycondition, foundspersonname, relation, foundsphonenumber, foundsemail, foundsborntime, foundsnation, foundsplace', 'safe'),
			array('othernation,yasi,tuofu,pastname','safe'),
			//array('height, weight', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('personalInfoId, uId, lastedittime, lastname, lastname_, firstname, firstname_, pastname, gender, borntime, addformtime, practicetime, traveldays, bornplace, nation, accountplace, height, weight, homephonenumber, idnumber, homeplace, homezipcode, nowplace, nowzipcode, postplace, postzipcode, bloodtype, marrycondition, foundspersonname, relation, foundsphonenumber, foundsemail, foundsborntime, foundsnation, foundsplace', 'safe', 'on'=>'search'),
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
   public function forSafeAssign($attribute,$params){
        return true;
   }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'personalInfoId' => '个人及相关人信息',
			'uId' => 'U',
			'lastname' => '姓',
			'lastname_' => '姓（拼音）',
			'firstname' => '名',
			'firstname_' => '名（拼音）',
			'pastname' => '曾用名',
			'gender' => '性别',
			'borntime' => '出生日期',
			'addformtime' => '填表时间',
			'practicetime' => '实习时间',
			'traveldays' => '旅行时长(天)',
			'bornplace' => '出生地',
			'nation' => '国籍',
			'accountplace' => '户籍地',
			'height' => '身高(cm)',
			'weight' => '体重(kg)',
			'homephonenumber' => '家庭电话',
			'idnumber' => '身份证',
			'homeplace' => '家庭住址',
			'homezipcode' => '家庭邮编',
			'nowplace' => '现在住址',
			'nowzipcode' => '现住址邮编',
			'postplace' => '邮寄地址',
			'postzipcode' => '邮寄地址邮编',
			'bloodtype' => '血型',
			'marrycondition' => '婚姻状况',
			'foundspersonname' => '资金提供人信息',
			'relation' => '与申请者关系',
			'foundsphonenumber' => '资金提供者电话',
			'foundsemail' => '资金提供者邮箱',
			'foundsborntime' => '资金提供者出生日期',
			'foundsnation' => '资金提供者国籍',
			'foundsplace' => '资金提供者住址',
			'othernation' => '其他国籍或身份',
			'yasi' => '雅思成绩',
			'tuofu'=>'托福成绩',
			'lastedittime' => '最后一次编辑时间',
			
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

		$criteria->compare('personalInfoId',$this->personalInfoId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('lastedittime',$this->lastedittime,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('lastname_',$this->lastname_,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('firstname_',$this->firstname_,true);
		$criteria->compare('pastname',$this->pastname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('borntime',$this->borntime,true);
		$criteria->compare('addformtime',$this->addformtime,true);
		$criteria->compare('practicetime',$this->practicetime,true);
		$criteria->compare('traveldays',$this->traveldays);
		$criteria->compare('bornplace',$this->bornplace,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('accountplace',$this->accountplace,true);
		$criteria->compare('height',$this->height);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('homephonenumber',$this->homephonenumber,true);
		$criteria->compare('idnumber',$this->idnumber,true);
		$criteria->compare('homeplace',$this->homeplace,true);
		$criteria->compare('homezipcode',$this->homezipcode,true);
		$criteria->compare('nowplace',$this->nowplace,true);
		$criteria->compare('nowzipcode',$this->nowzipcode,true);
		$criteria->compare('postplace',$this->postplace,true);
		$criteria->compare('postzipcode',$this->postzipcode,true);
		$criteria->compare('bloodtype',$this->bloodtype,true);
		$criteria->compare('marrycondition',$this->marrycondition,true);
		$criteria->compare('foundspersonname',$this->foundspersonname,true);
		$criteria->compare('relation',$this->relation,true);
		$criteria->compare('foundsphonenumber',$this->foundsphonenumber,true);
		$criteria->compare('foundsemail',$this->foundsemail,true);
		$criteria->compare('foundsborntime',$this->foundsborntime,true);
		$criteria->compare('foundsnation',$this->foundsnation,true);
		$criteria->compare('foundsplace',$this->foundsplace,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}