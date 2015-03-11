<?php

/**
 * This is the model class for table "studyhistory".
 *
 * The followings are the available columns in table 'studyhistory':
 * @property integer $studyHisId
 * @property integer $schoolInfoId
 * @property string $time
 * @property string $name
 * @property string $place
 * @property string $zipcode
 */
class Studyhistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Studyhistory the static model class
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
		return 'studyhistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schoolInfoId, time, name, place, zipcode', 'required'),
			/*array('schoolInfoId', 'numerical', 'integerOnly'=>true),
			array('time', 'length', 'max'=>40),
			array('name', 'length', 'max'=>80),
			array('place', 'length', 'max'=>120),
			array('zipcode', 'length', 'max'=>20),*/
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('studyHisId, schoolInfoId, time, name, place, zipcode', 'safe', 'on'=>'search'),
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
			'studyHisId' => 'Study His',
			'schoolInfoId' => 'School Info',
			'time' => 'Time',
			'name' => 'Name',
			'place' => 'Place',
			'zipcode' => 'Zipcode',
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

		$criteria->compare('studyHisId',$this->studyHisId);
		$criteria->compare('schoolInfoId',$this->schoolInfoId);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('zipcode',$this->zipcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}