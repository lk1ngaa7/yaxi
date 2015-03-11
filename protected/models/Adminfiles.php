<?php

/**
 * This is the model class for table "adminfiles".
 *
 * The followings are the available columns in table 'adminfiles':
 * @property integer $adminFilesId
 * @property integer $uId
 * @property integer $proId
 * @property integer $typeId
 * @property integer $categoryId
 * @property integer $exSchoolId
 * @property string $name
 * @property string $addtime
 * @property string $url
 * @property string $message
 * @property integer $size
 * @property string $type
 */
class Adminfiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Adminfiles the static model class
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
		return 'adminfiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, proId, addtime, message,categoryId, typeId,  name,  url,  size, type', 'required'),
			//array('uId, proId, typeId, categoryId, exSchoolId, size', 'numerical', 'integerOnly'=>true),
			//array('name, url, type', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('adminFilesId, uId, proId, typeId, categoryId, exSchoolId, name, addtime, url, message, size, type', 'safe', 'on'=>'search'),
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
		 'typeD'=>array(self::HAS_ONE,'Type',array('typeId'=>'typeId')),
		 'category'=>array(self::HAS_ONE,'Category',array('categoryId'=>'categoryId')),
		 'project'=>array(self::HAS_ONE,'Project',array('proId'=>'proId'))
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'adminFilesId' => 'Admin Files',
			'uId' => 'U',
			'proId' => 'Pro',
			'typeId' => 'Type',
			'categoryId' => 'Category',
			'exSchoolId' => 'Ex School',
			'name' => 'Name',
			'addtime' => 'Addtime',
			'url' => 'Url',
			'message' => 'Message',
			'size' => 'Size',
			'type' => 'Type',
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

		$criteria->compare('adminFilesId',$this->adminFilesId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('proId',$this->proId);
		$criteria->compare('typeId',$this->typeId);
		$criteria->compare('categoryId',$this->categoryId);
		$criteria->compare('exSchoolId',$this->exSchoolId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}