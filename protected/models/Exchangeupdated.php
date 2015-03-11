<?php

/**
 * This is the model class for table "exchangeupdated".
 *
 * The followings are the available columns in table 'exchangeupdated':
 * @property integer $exchangeUpdatedId
 * @property integer $uId
 * @property string $studytime
 * @property string $major
 * @property string $academiccredit
 * @property string $schoolname
 * @property string $schoolcommunication
 * @property string $homeplace
 * @property string $homecondition
 * @property string $homename
 * @property string $homecommunication
 * @property string $transportation
 */
class Exchangeupdated extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Exchangeupdated the static model class
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
		return 'exchangeupdated';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('exchangeUpdatedId, uId, studytime, major, academiccredit, schoolname, schoolcommunication, homeplace, homecondition, homename, homecommunication, transportation', 'safe'),
			array('exchangeUpdatedId, uId', 'numerical', 'integerOnly'=>true),
			array('studytime, major', 'length', 'max'=>60),
			array('academiccredit', 'length', 'max'=>10),
			array('schoolname, schoolcommunication, homeplace, homecondition, homename, homecommunication, transportation', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('exchangeUpdatedId, uId, studytime, major, academiccredit, schoolname, schoolcommunication, homeplace, homecondition, homename, homecommunication, transportation', 'safe', 'on'=>'search'),
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
			'exchangeUpdatedId' => 'Exchange Updated',
			'uId' => 'U',
			'studytime' => '学习时间',
			'major' => '所学专业',
			'academiccredit' => '可转学分',
			'schoolname' => '学校联系人姓名',
			'schoolcommunication' => '学校联系人联系方式',
			'homeplace' => '住宿家庭地址',
			'homecondition' => '住宿家庭条件',
			'homename' => '住宿家庭联系人姓名',
			'homecommunication' => '住宿家庭联系人联系方式',
			'transportation' => '上课交通方式',
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

		$criteria->compare('exchangeUpdatedId',$this->exchangeUpdatedId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('studytime',$this->studytime,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('academiccredit',$this->academiccredit,true);
		$criteria->compare('schoolname',$this->schoolname,true);
		$criteria->compare('schoolcommunication',$this->schoolcommunication,true);
		$criteria->compare('homeplace',$this->homeplace,true);
		$criteria->compare('homecondition',$this->homecondition,true);
		$criteria->compare('homename',$this->homename,true);
		$criteria->compare('homecommunication',$this->homecommunication,true);
		$criteria->compare('transportation',$this->transportation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}