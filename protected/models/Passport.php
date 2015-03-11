<?php

/**
 * This is the model class for table "passport".
 *
 * The followings are the available columns in table 'passport':
 * @property integer $passportId
 * @property integer $uId
 * @property string $passportnumber
 * @property string $passbooknumber
 * @property string $passportplace
 * @property string $passportdate
 * @property string $passportenddate
 * @property string $lostnumber
 * @property string $lostdate
 */
class Passport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Passport the static model class
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
		return 'passport';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, passportnumber, passportbooknumber,lostnumber, passportplace, passportdate, passportenddate, lostdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('passportId, uId, passportnumber, passbooknumber, passportplace, passportdate, passportenddate, lostnumber, lostdate', 'safe', 'on'=>'search'),
		);
	}
    public function forSafeAssign($attribute,$params){
	   return true;
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
			'passportId' => 'Passport',
			'uId' => 'U',
			'passportnumber' => '护照号码',
			'passbooknumber' => '护照本号',
			'passportplace' => '护照签发地',
			'passportdate' => '护照签发日期',
			'passportenddate' => '护照到期日',
			'lostnumber' => '丢失的护照号',
			'lostdate' => '丢失护照号的日期',
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

		$criteria->compare('passportId',$this->passportId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('passportnumber',$this->passportnumber,true);
		$criteria->compare('passbooknumber',$this->passbooknumber,true);
		$criteria->compare('passportplace',$this->passportplace,true);
		$criteria->compare('passportdate',$this->passportdate,true);
		$criteria->compare('passportenddate',$this->passportenddate,true);
		$criteria->compare('lostnumber',$this->lostnumber,true);
		$criteria->compare('lostdate',$this->lostdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}