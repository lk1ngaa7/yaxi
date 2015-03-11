<?php

/**
 * This is the model class for table "stepupdated".
 *
 * The followings are the available columns in table 'stepupdated':
 * @property integer $stepUpdatedId
 * @property integer $uId
 * @property string $companyname
 * @property string $workplace
 * @property string $position
 * @property string $jobtype
 * @property string $coordinatorname
 * @property string $coordinatorcommunication
 * @property string $homeplace
 * @property string $homecondition
 * @property string $homename
 * @property string $homecommunication
 * @property string $transportation
 */
class Stepupdated extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Stepupdated the static model class
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
		return 'stepupdated';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, companyname, workplace, position, jobtype, coordinatorname, coordinatorcommunication, homeplace, homecondition, homename, homecommunication, transportation', 'safe'),
			array('uId', 'numerical', 'integerOnly'=>true),
			array('companyname, workplace, position, jobtype, coordinatorname, coordinatorcommunication, homeplace, homecondition, homename, homecommunication, transportation', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('stepUpdatedId, uId, companyname, workplace, position, jobtype, coordinatorname, coordinatorcommunication, homeplace, homecondition, homename, homecommunication, transportation', 'safe', 'on'=>'search'),
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
			'stepUpdatedId' => 'Step Updated',
			'uId' => 'U',
			'companyname' => '公司名称',
			'workplace' => '工作地点',
			'position' => '职位',
			'jobtype' => '工作类别',
			'coordinatorname' => 'Coordinator 姓名',
			'coordinatorcommunication' => 'Coordinator 联系方式',
			'homeplace' => '寄宿家庭住址',
			'homecondition' => '寄宿家庭条件',
			'homename' => '寄宿家庭联系人姓名',
			'homecommunication' => '寄宿家庭联系人联系方式',
			'transportation' => '上班交通方式',
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

		$criteria->compare('stepUpdatedId',$this->stepUpdatedId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('companyname',$this->companyname,true);
		$criteria->compare('workplace',$this->workplace,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('jobtype',$this->jobtype,true);
		$criteria->compare('coordinatorname',$this->coordinatorname,true);
		$criteria->compare('coordinatorcommunication',$this->coordinatorcommunication,true);
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