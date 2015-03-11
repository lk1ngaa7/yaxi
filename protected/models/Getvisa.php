<?php

/**
 * This is the model class for table "getvisa".
 *
 * The followings are the available columns in table 'getvisa':
 * @property integer $getVisaId
 * @property integer $visaId
 * @property string $visadate
 * @property string $visatype
 * @property string $visaplace
 * @property string $visafinger
 * @property string $visanumber
 */
 /*
    8/10  adding a new property : visanumber
 */
class Getvisa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Getvisa the static model class
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
		return 'getvisa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('visaId, visadate, visatype, visaplace, visafinger,visanumber', 'required'),
			array('visaId', 'numerical', 'integerOnly'=>true),
			array('visatype', 'length', 'max'=>60),
			array('visaplace', 'length', 'max'=>100),
			array('visafinger', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('getVisaId, visaId, visadate, visatype, visaplace, visafinger', 'safe', 'on'=>'search'),
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
			'getVisaId' => 'Get Visa',
			'visaId' => 'Visa',
			'visadate' => 'Visadate',
			'visatype' => 'Visatype',
			'visaplace' => 'Visaplace',
			'visafinger' => 'Visafinger',
			'visanumber' => '签证号码'
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

		$criteria->compare('getVisaId',$this->getVisaId);
		$criteria->compare('visaId',$this->visaId);
		$criteria->compare('visadate',$this->visadate,true);
		$criteria->compare('visatype',$this->visatype,true);
		$criteria->compare('visaplace',$this->visaplace,true);
		$criteria->compare('visafinger',$this->visafinger,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}