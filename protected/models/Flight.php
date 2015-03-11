<?php

/**
 * This is the model class for table "flight".
 *
 * The followings are the available columns in table 'flight':
 * @property integer $flightId
 * @property integer $uId
 * @property integer $isBack
 * @property integer $type
 * @property string $from
 * @property string $to
 * @property string $airline
 * @property string $flightnumber
 * @property string $depaturedate
 * @property string $arrivaldate
 * @property string $depaturetime
 * @property string $arrivaltime
 * @property string $duration
 * @property string $arrivalday
 */
class Flight extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Flight the static model class
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
		return 'flight';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, isBack, type, from, to, airline, flightnumber, depaturedate, arrivaldate, depaturetime, arrivaltime, duration, arrivalday', 'safe'),
			array('uId, isBack, type', 'numerical', 'integerOnly'=>true),
			array('from, to, airline, flightnumber, depaturedate, arrivaldate', 'length', 'max'=>60),
			array('depaturetime, arrivaltime, duration', 'length', 'max'=>30),
			array('arrivalday', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('flightId, uId, isBack, type, from, to, airline, flightnumber, depaturedate, arrivaldate, depaturetime, arrivaltime, duration, arrivalday', 'safe', 'on'=>'search'),
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
			'flightId' => 'Flight',
			'uId' => 'U',
			'isBack' => 'Is Back',
			'type' => 'Type',
			'from' => '出发机场',
			'to' => '目的机场',
			'airline' => '航班',
			'flightnumber' => '航班号',
			'depaturedate' => '离开日期',
			'arrivaldate' => '到达日期',
			'depaturetime' => '离开时间',
			'arrivaltime' => '到达时间',
			'duration' => '时间间隔',
			'arrivalday' => '到达的日期',
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

		$criteria->compare('flightId',$this->flightId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('isBack',$this->isBack);
		$criteria->compare('type',$this->type);
		$criteria->compare('from',$this->from,true);
		$criteria->compare('to',$this->to,true);
		$criteria->compare('airline',$this->airline,true);
		$criteria->compare('flightnumber',$this->flightnumber,true);
		$criteria->compare('depaturedate',$this->depaturedate,true);
		$criteria->compare('arrivaldate',$this->arrivaldate,true);
		$criteria->compare('depaturetime',$this->depaturetime,true);
		$criteria->compare('arrivaltime',$this->arrivaltime,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('arrivalday',$this->arrivalday,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}