<?php

/**
 * This is the model class for table "schoolinfo".
 *
 * The followings are the available columns in table 'schoolinfo':
 * @property integer $schoolInfoId
 * @property integer $uId
 * @property string $major
 * @property string $major_
 * @property string $grade
 * @property string $semester
 * @property string $academy
 * @property string $studyyear
 * @property string $assistantname
 * @property string $assistantphone
 * @property string $diseasehistory
 */
class Schoolinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Schoolinfo the static model class
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
		return 'schoolinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, major,  grade, semester, academy, studyyear, assistantname, assistantphone', 'required'),
			array('major_ , diseasehistory','safe'),
			/*array('uId' , 'numerical', 'integerOnly'=>true),
			array('major, major_', 'length', 'max'=>80),
			array('grade', 'length', 'max'=>10),
			array('semester, academy, studyyear', 'length', 'max'=>20),
			array('assistantname, assistantphone', 'length', 'max'=>40),
			array('diseasehistory', 'length', 'max'=>225),*/
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('schoolInfoId, uId, major, major_, grade, semester, academy, studyyear, assistantname, assistantphone, diseasehistory', 'safe', 'on'=>'search'),
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
			'schoolInfoId' => 'School Info',
			'uId' => 'U',
			'major' => '专业',
			'major_' => '第二专业',
			'grade' => '所处年级',
			'semester' => '学期',
			'academy' => '所处院系',
			'studyyear' => '学制/年',
			'assistantname' => '辅导员姓名',
			'assistantphone' => '辅导员联系方式',
			'diseasehistory' => '病史',
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

		$criteria->compare('schoolInfoId',$this->schoolInfoId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('major_',$this->major_,true);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('academy',$this->academy,true);
		$criteria->compare('studyyear',$this->studyyear,true);
		$criteria->compare('assistantname',$this->assistantname,true);
		$criteria->compare('assistantphone',$this->assistantphone,true);
		$criteria->compare('diseasehistory',$this->diseasehistory,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}