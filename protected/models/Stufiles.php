<?php

/**
 * This is the model class for table "stufiles".
 *
 * The followings are the available columns in table 'stufiles':
 * @property integer $stuFilesId
 * @property integer $uId
 * @property integer $adminFilesId
 * @property string $name
 * @property string $addtime
 * @property string $addip
 * @property string $url
 */
class Stufiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Stufiles the static model class
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
		return 'stufiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, adminFilesId, name, addtime, addip, url', 'required'),
			array('uId, adminFilesId', 'numerical', 'integerOnly'=>true),
			array('name, addip, url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('stuFilesId, uId, adminFilesId, name, addtime, addip, url', 'safe', 'on'=>'search'),
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
			'stuFilesId' => 'Stu Files',
			'uId' => 'U',
			'adminFilesId' => 'Admin Files',
			'name' => 'Name',
			'addtime' => 'Addtime',
			'addip' => 'Addip',
			'url' => 'Url',
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

		$criteria->compare('stuFilesId',$this->stuFilesId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('adminFilesId',$this->adminFilesId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('addip',$this->addip,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}