<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
	private $info;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$userModel = new User();
		$user = $userModel->find('username = :u',array(':u'=>$this->username));
		if($user!=null && $user->rights ==1)
		$stu = Stuinfo::model()->find('uId = :u',array(':u'=>$user->uId));
		
		if($user==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password !== $this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
		   if($user->rights == 1){
		        if($stu->rangId == 6)
				  return !self::ERROR_PASSWORD_INVALID;
		   }
            Yii::app()->user->setState('rights',$user->rights);
			$this->setState('index',Yii::app()->createUrl($user->indexurl));
			$this->_id = $user->uId;
			$user->lastlogintime = date('Y-m-d H:m:s',time());
			$user->lastloginip = Yii::app()->request->userHostAddress;
			if(!$user->save()){
			  throw new CHttpException(500,'source code error');
			}else{
			  if($user->rights === '1'){
			     $this->setStu();
			  }
			}
			$this->errorCode = self::ERROR_NONE;
	   }
		return !$this->errorCode;
	}
	public function setStu(){
	    $stuInfo = new Stuinfo();
		$stuInfo = $stuInfo->find('uId =:u',array(':u'=>$this->_id));
		$pro = new Project();
        $pro = $pro->find('proId = :p',array(':p'=>$stuInfo->proId));		
		$this->setState('email',$stuInfo->email);
		$this->setState('project',$pro->proName);
		$this->setState('proId',$pro->proId);
	}
	public function getId(){
	    return $this->_id;
	}
}