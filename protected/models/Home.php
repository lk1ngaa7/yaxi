<?php

/**
 * This is the model class for table "home".
 *
 * The followings are the available columns in table 'home':
 * @property integer $homeId
 * @property integer $uId
 * @property string $marrycondition
 * @property string $livecondition
 * @property string $f_name
 * @property string $f_phonenumber
 * @property string $f_email
 * @property string $f_nation
 * @property string $f_borntime
 * @property string $f_liveplace
 * @property string $f_workplace
 * @property string $m_name
 * @property string $m_phonenumber
 * @property string $m_email
 * @property string $m_nation
 * @property string $m_borntime
 * @property string $m_liveplace
 * @property string $m_workplace
 * @property string $americaname
 * @property string $americarelation
 * @property string $americacondition
 */
class Home extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Home the static model class
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
		return 'home';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, marrycondition, livecondition, f_name, f_phonenumber, f_email, f_nation, f_borntime, f_liveplace, f_workplace, m_name, m_phonenumber, m_email, m_nation, m_borntime, m_liveplace, m_workplace, americaname, americarelation, americacondition', 'safe'),
			//array('uId', 'numerical', 'integerOnly'=>true),
			//array('marrycondition, livecondition, f_name, f_phonenumber, f_email, f_nation, m_name, m_phonenumber, m_email, m_nation, americaname, americarelation, americacondition', 'length', 'max'=>20),
			//array('f_liveplace, f_workplace, m_liveplace, m_workplace', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('homeId, uId, marrycondition, livecondition, f_name, f_phonenumber, f_email, f_nation, f_borntime, f_liveplace, f_workplace, m_name, m_phonenumber, m_email, m_nation, m_borntime, m_liveplace, m_workplace, americaname, americarelation, americacondition', 'safe', 'on'=>'search'),
		);
	}
   public function forSafeAssign($attribute,$params){
       return true;
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
			'homeId' => 'Home',
			'uId' => 'U',
			'marrycondition' => '父母婚姻状况',
			'livecondition' => '父母是否在世',
			'f_name' => '父亲姓名',
			'f_phonenumber' => '父亲电话',
			'f_email' => '父亲邮箱',
			'f_nation' => '父亲国籍',
			'f_borntime' => '父亲生日',
			'f_liveplace' => '父亲居住地',
			'f_workplace' => '父亲工作地',
			'm_name' => '母亲姓名',
			'm_phonenumber' => '母亲电话',
			'm_email' => '母亲邮箱',
			'm_nation' => '母亲国籍',
			'm_borntime' => '母亲生日',
			'm_liveplace' => '母亲居住地',
			'm_workplace' => '母亲工作地',
			'americaname' => '在美亲属姓名',
			'americarelation' => '在美亲属与本人关系',
			'americacondition' => '在美亲属身份状态',
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

		$criteria->compare('homeId',$this->homeId);
		$criteria->compare('uId',$this->uId);
		$criteria->compare('marrycondition',$this->marrycondition,true);
		$criteria->compare('livecondition',$this->livecondition,true);
		$criteria->compare('f_name',$this->f_name,true);
		$criteria->compare('f_phonenumber',$this->f_phonenumber,true);
		$criteria->compare('f_email',$this->f_email,true);
		$criteria->compare('f_nation',$this->f_nation,true);
		$criteria->compare('f_borntime',$this->f_borntime,true);
		$criteria->compare('f_liveplace',$this->f_liveplace,true);
		$criteria->compare('f_workplace',$this->f_workplace,true);
		$criteria->compare('m_name',$this->m_name,true);
		$criteria->compare('m_phonenumber',$this->m_phonenumber,true);
		$criteria->compare('m_email',$this->m_email,true);
		$criteria->compare('m_nation',$this->m_nation,true);
		$criteria->compare('m_borntime',$this->m_borntime,true);
		$criteria->compare('m_liveplace',$this->m_liveplace,true);
		$criteria->compare('m_workplace',$this->m_workplace,true);
		$criteria->compare('americaname',$this->americaname,true);
		$criteria->compare('americarelation',$this->americarelation,true);
		$criteria->compare('americacondition',$this->americacondition,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}