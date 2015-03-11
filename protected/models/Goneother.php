<?php

/**
 * This is the model class for table "goneother".
 *
 * The followings are the available columns in table 'goneother':
 * @property integer $goneOtherId
 * @property integer $visaId
 * @property string $nationname
 * @property string $visatype
 * @property string $reason
 * @property string $begintime
 * @property string $backtime
 */
class Goneother extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Goneother the static model class
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
		return 'goneother';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('visaId, nationname, visatype, reason, begintime, backtime', 'required'),
			array('visaId', 'numerical', 'integerOnly'=>true),
			array('nationname, reason', 'length', 'max'=>255),
			array('visatype', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('goneOtherId, visaId, nationname, visatype, reason, begintime, backtime', 'safe', 'on'=>'search'),
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
			'goneOtherId' => 'Gone Other',
			'visaId' => 'Visa',
			'nationname' => 'Nationname',
			'visatype' => 'Visatype',
			'reason' => 'Reason',
			'begintime' => 'Begintime',
			'backtime' => 'Backtime',
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

		$criteria->compare('goneOtherId',$this->goneOtherId);
		$criteria->compare('visaId',$this->visaId);
		$criteria->compare('nationname',$this->nationname,true);
		$criteria->compare('visatype',$this->visatype,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('begintime',$this->begintime,true);
		$criteria->compare('backtime',$this->backtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}