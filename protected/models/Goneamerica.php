<?php

/**
 * This is the model class for table "goneamerica".
 *
 * The followings are the available columns in table 'goneamerica':
 * @property integer $goneAmericaId
 * @property integer $visaId
 * @property string $arrivaltime
 * @property string $staytime
 * @property string $stayplace
 * @property string $stayzipcode
 */
class Goneamerica extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Goneamerica the static model class
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
		return 'goneamerica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('visaId, arrivaltime, staytime, stayplace, stayzipcode', 'required'),
			array('visaId', 'numerical', 'integerOnly'=>true),
			array('staytime, stayzipcode', 'length', 'max'=>40),
			array('stayplace', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('goneAmericaId, visaId, arrivaltime, staytime, stayplace, stayzipcode', 'safe', 'on'=>'search'),
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
			'goneAmericaId' => 'Gone America',
			'visaId' => 'Visa',
			'arrivaltime' => 'Arrivaltime',
			'staytime' => 'Staytime',
			'stayplace' => 'Stayplace',
			'stayzipcode' => 'Stayzipcode',
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

		$criteria->compare('goneAmericaId',$this->goneAmericaId);
		$criteria->compare('visaId',$this->visaId);
		$criteria->compare('arrivaltime',$this->arrivaltime,true);
		$criteria->compare('staytime',$this->staytime,true);
		$criteria->compare('stayplace',$this->stayplace,true);
		$criteria->compare('stayzipcode',$this->stayzipcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}