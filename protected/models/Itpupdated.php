<?php

/**
 * This is the model class for table "itpupdated".
 *
 * The followings are the available columns in table 'itpupdated':
 * @property integer $itpUpdatedId
 * @property integer $uId
 * @property string $companyname
 * @property string $workplace
 * @property string $jobtype
 * @property string $position
 * @property string $americaname
 * @property string $americacommunication
 * @property string $hometype
 * @property string $homeplace
 * @property string $homecondition
 * @property string $partnername
 * @property string $partnercommunication
 * @property string $transportation
 */
class Itpupdated extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Itpupdated the static model class
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
		return 'itpupdated';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, companyname, workplace, jobtype, position, americaname, americacommunication, hometype, homeplace, homecondition, partnername, partnercommunication, transportation', 'safe'),
			array('uId', 'numerical', 'integerOnly'=>true),
			array('companyname, workplace, jobtype, position, americaname, americacommunication, hometype, homeplace, homecondition, partnername, partnercommunication, transportation', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('itpUpdatedId, uId, companyname, workplace, jobtype, position, americaname, americacommunication, hometype, homeplace, homecondition, partnername, partnercommunication, transportation', 'safe', 'on'=>'search'),
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
			'itpUpdatedId' => 'Itp Updated',
			'uId' => 'U',
			'companyname' => '公司名称',
			'workplace' => '工作地点',
			'jobtype' => '工作类型',
			'position' => '职务',
			'americaname' => '在美联系人姓名',
			'americacommunication' => '在美联系人联系方式',
			'hometype' => '住宿方式',
			'homeplace' => '住宿地址',
			'homecondition' => '住宿条件',
			'partnername' => '同住人姓名',
			'partnercommunication' => '同住人联系方式',
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

		$criteria->compare('itpUpdatedId',$this->itpUpdatedId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('companyname',$this->companyname,true);
		$criteria->compare('workplace',$this->workplace,true);
		$criteria->compare('jobtype',$this->jobtype,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('americaname',$this->americaname,true);
		$criteria->compare('americacommunication',$this->americacommunication,true);
		$criteria->compare('hometype',$this->hometype,true);
		$criteria->compare('homeplace',$this->homeplace,true);
		$criteria->compare('homecondition',$this->homecondition,true);
		$criteria->compare('partnername',$this->partnername,true);
		$criteria->compare('partnercommunication',$this->partnercommunication,true);
		$criteria->compare('transportation',$this->transportation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}