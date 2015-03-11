<?php

/**
 * This is the model class for table "itpprojectlen".
 *
 * The followings are the available columns in table 'itpprojectlen':
 * @property integer $itpProjectLenId
 * @property integer $uId
 * @property string $projectlength
 *
 * The followings are the available model relations:
 * @property User $u
 */
class Itpprojectlen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Itpprojectlen the static model class
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
		return 'itpprojectlen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, projectlength', 'required'),
			array('uId', 'numerical', 'integerOnly'=>true),
			array('projectlength', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('itpProjectLenId, uId, projectlength', 'safe', 'on'=>'search'),
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
			'u' => array(self::BELONGS_TO, 'User', 'uId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'itpProjectLenId' => 'Itp Project Len',
			'uId' => 'U',
			'projectlength' => '项目长度',
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

		$criteria->compare('itpProjectLenId',$this->itpProjectLenId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('projectlength',$this->projectlength,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}