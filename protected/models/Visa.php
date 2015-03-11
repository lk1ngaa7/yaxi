<?php

/**
 * This is the model class for table "visa".
 *
 * The followings are the available columns in table 'visa':
 * @property integer $visaId
 * @property integer $uId
 * @property string $arrivaltime
 * @property string $staytime
 * @property string $stayplace
 * @property string $stayzipcode
 * @property string $driverlicense
 * @property string $licensegettime
 * @property string $licensestate
 * @property string $visadate
 * @property string $visatype
 * @property string $visaplace
 * @property string $visafinger
 * @property string $lostvisanumber
 * @property string $lostvisadate
 * @property string $refuseddate
 * @property string $refusedreason
 * @property string $refusedvisatype
 * @property string $refusedimmigrationvisatype
 * @property string $logoffvisadate
 * @property string $logoffvisanumber
 * @property string $logoffvisareason
 * @property string $nationname_o
 * @property string $visatype_o
 * @property string $reason_o
 * @property string $begintime_o
 * @property string $backtime_o
 * @property string $refuseddate_o
 * @property string $refusednation_o
 * @property string $refusedreason_o
 * @property string $refusedvisatype_o
 * @property string $refusedimmigrationvisatype_o
 */
class Visa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Visa the static model class
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
		return 'visa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, driverlicense, licensegettime, licensestate, lostvisanumber, lostvisadate, refuseddate, refusedreason, refusedvisatype, refusedimmigrationvisatype, logoffvisadate, logoffvisanumber, logoffvisareason,refuseddate_o, refusednation_o, refusedreason_o, refusedvisatype_o, refusedimmigrationvisatype_o', 'safe'),
			/*array('uId', 'numerical', 'integerOnly'=>true),
			array('stayplace', 'length', 'max'=>120),
			array('stayzipcode, visafinger', 'length', 'max'=>20),
			array('driverlicense, licensestate, visaplace, refusednation_o', 'length', 'max'=>100),
			array('visatype', 'length', 'max'=>60),
			array('lostvisanumber, logoffvisanumber, visatype_o, refusedvisatype_o, refusedimmigrationvisatype_o', 'length', 'max'=>80),
			array('refusedreason, logoffvisareason, nationname_o, reason_o, refusedreason_o', 'length', 'max'=>255),
			array('refusedvisatype, refusedimmigrationvisatype', 'length', 'max'=>40),*/
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('visaId, uId, arrivaltime, staytime, stayplace, stayzipcode, driverlicense, licensegettime, licensestate, visadate, visatype, visaplace, visafinger, lostvisanumber, lostvisadate, refuseddate, refusedreason, refusedvisatype, refusedimmigrationvisatype, logoffvisadate, logoffvisanumber, logoffvisareason, nationname_o, visatype_o, reason_o, begintime_o, backtime_o, refuseddate_o, refusednation_o, refusedreason_o, refusedvisatype_o, refusedimmigrationvisatype_o', 'safe', 'on'=>'search'),
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
			'visaId' => 'Visa',
			'uId' => 'U',
			'driverlicense' => '驾照号码（美国）',
			'licensegettime' => '驾照获得时间（美国）',
			'licensestate' => '驾照所属州（美国）',
			'lostvisanumber' => '丢失的签证号码（美国）',
			'lostvisadate' => '丢失签证的日期（美国）',
			'refuseddate' => '被拒签或被撤回入境申请的时间（美国）',
			'refusedreason' => '被拒签或被撤回入境申请的原因（美国）',
			'refusedvisatype' => '被拒签时所申请的签证类型（美国）',
			'refusedimmigrationvisatype' => '被拒绝入境美国或者入境时被撤回入境申请时所持的签证类型（美国）',
			'logoffvisadate' => '曾经被注销或者撤销的签证的签证颁发时间（美国）',
			'logoffvisanumber' => '曾经被注销或者撤销的签证的签证号码（美国）',
			'logoffvisareason' => '签证注销或撤离原因（美国）',
			'refuseddate_o' => '曾经被拒签、拒绝入境、入境时被撤回入境申请的时间（其他国家）',
			'refusednation_o' => '曾经被拒签、拒绝入境、入境时被撤回入境申请的国家（其他国家）',
			'refusedreason_o' => '曾经被拒签、拒绝入境、入境时被撤回入境申请的原因（其他国家）',
			'refusedvisatype_o' => '曾经被拒签时所申请的签证类型（其他国家）',
			'refusedimmigrationvisatype_o' => '被拒绝入境或者入境时被撤回入境申请时所持的签证类型（其他国家）',
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

		$criteria->compare('visaId',$this->visaId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('arrivaltime',$this->arrivaltime,true);
		$criteria->compare('staytime',$this->staytime,true);
		$criteria->compare('stayplace',$this->stayplace,true);
		$criteria->compare('stayzipcode',$this->stayzipcode,true);
		$criteria->compare('driverlicense',$this->driverlicense,true);
		$criteria->compare('licensegettime',$this->licensegettime,true);
		$criteria->compare('licensestate',$this->licensestate,true);
		$criteria->compare('visadate',$this->visadate,true);
		$criteria->compare('visatype',$this->visatype,true);
		$criteria->compare('visaplace',$this->visaplace,true);
		$criteria->compare('visafinger',$this->visafinger,true);
		$criteria->compare('lostvisanumber',$this->lostvisanumber,true);
		$criteria->compare('lostvisadate',$this->lostvisadate,true);
		$criteria->compare('refuseddate',$this->refuseddate,true);
		$criteria->compare('refusedreason',$this->refusedreason,true);
		$criteria->compare('refusedvisatype',$this->refusedvisatype,true);
		$criteria->compare('refusedimmigrationvisatype',$this->refusedimmigrationvisatype,true);
		$criteria->compare('logoffvisadate',$this->logoffvisadate,true);
		$criteria->compare('logoffvisanumber',$this->logoffvisanumber,true);
		$criteria->compare('logoffvisareason',$this->logoffvisareason,true);
		$criteria->compare('nationname_o',$this->nationname_o,true);
		$criteria->compare('visatype_o',$this->visatype_o,true);
		$criteria->compare('reason_o',$this->reason_o,true);
		$criteria->compare('begintime_o',$this->begintime_o,true);
		$criteria->compare('backtime_o',$this->backtime_o,true);
		$criteria->compare('refuseddate_o',$this->refuseddate_o,true);
		$criteria->compare('refusednation_o',$this->refusednation_o,true);
		$criteria->compare('refusedreason_o',$this->refusedreason_o,true);
		$criteria->compare('refusedvisatype_o',$this->refusedvisatype_o,true);
		$criteria->compare('refusedimmigrationvisatype_o',$this->refusedimmigrationvisatype_o,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}