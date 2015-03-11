<?php 
class  StuformController extends Controller{
		public $isActivated = 1;
		public $Projectlength = null;
		public $ExSchoolArray = array();
		public $Goneamerica;
		public $Goneother;
		public $Getvisa;
		public $ExChoosedSchool = null;
		private $Personalinfo;
		private $Stuinfo;
		private $Emergency;
		private $Passport;
		private $Home;
		private $Visa;
		private $Proof;
		private $Schoolinfo;
		private $Schoolhistory;
		private $Jobstep;
		
		public function accessRules()
		  {
			return array(
				array(
					'allow',  // allow all users to access 'index' and 'view' actions.
					'expression'=>'$user->rights==1',
				),
				array(
					'deny',  // deny all users
					'users'=>array('*'),
					'message'=>'You do not have access to this page ! ! ',
				),
			);
		 }
	    public function beforeAction($action){
		      parent::beforeAction($action);
			  if(Yii::app()->request->isPostRequest){
			     if(@$_POST['lk'] != '7ReVfucBYLJrB1Pamzy7i4afGyuJZiR28RbvoNrIVB0_'){
				   Yii::log('stuform 非法访问 IP = '.Yii::app()->request->userHostAddress,'error','Application.error');
			       throw new CHttpException(500,'invalid request');
				 }
			  }
			
			  if(Yii::app()->user->project == 'ITP'){
					$query = Yii::app()->db->createCommand("select projectlength from itpprojectlen where uId = ".Yii::app()->user->getId());
					$this->Projectlength = $query->queryRow();
			  }else if(Yii::app()->user->project == 'exchange'){
			     $query =  Yii::app()->db->createCommand("select exSchoolId , schoolName from exschool");
				 $this->ExSchoolArray = $query->queryAll();
				 unset($this->ExSchoolArray[0]); // 0 just for no school like STEP & ITP
				 $query = Yii::app()->db->createCommand("select schoolname from chooseschool where uId = ".Yii::app()->user->getId());
				 $this->ExChoosedSchool = $query->queryRow();
			  }
			  return true;
		}
    public function loadAllModels(){
			  $this->Personalinfo = $this->loadModel('Personalinfo');
			  $this->Stuinfo = $this->loadModel('Stuinfo');
			  $this->Emergency = $this->loademergency($this->Personalinfo->personalInfoId);
			  $this->Passport = $this->loadModel('Passport');
			  $this->Home = $this->loadModel('Home');
			  $this->Visa = $this->loadModel('Visa');
			  $this->Goneamerica = $this->loadForVisa($this->Visa->visaId,'Goneamerica');
			  $this->Getvisa = $this->loadForVisa($this->Visa->visaId,'Getvisa');
			  $this->Goneother = $this->loadForVisa($this->Visa->visaId,'Goneother');
			  $this->Proof = $this->loadProof();
			  $this->Schoolinfo = $this->loadModel('Schoolinfo');
			  $this->Schoolhistory = $this->loadHistory($this->Schoolinfo->schoolInfoId);
			  $this->Jobstep = $this->loadModel('Jobstep');
			  //设置学生的进度
			  if(!($this->Personalinfo->isNewRecord||
			  $this->Passport->isNewRecord||$this->Home->isNewRecord||
			  $this->Visa->isNewRecord||$this->Proof[0]->isNewRecord||$this->Schoolinfo->isNewRecord)){
			     if(Yii::app()->user->project=='STEP'&&$this->Jobstep->isNewRecord==false){
				     if($this->Stuinfo->rangId == 1){
					   $this->Stuinfo->rangId = 2;
					   $this->Stuinfo->save();
					 }
					 
				 }
			  }
	}
    public function actionIndex(){
	    $this->breadcrumbs=array('报名表');
		$this->loadAllModels();
		$this->render("index",array('per'=>$this->Personalinfo,'stu'=>$this->Stuinfo,
		'emergency'=>$this->Emergency,'pass'=>$this->Passport,'home'=>$this->Home,
		'visa'=>$this->Visa,'proof'=>$this->Proof,'school'=>$this->Schoolinfo,
		'studyhis'=>$this->Schoolhistory,'stepjob'=>$this->Jobstep));
	
	}
    public function actionPersoninfo(){
	     $this->Personalinfo = $this->loadModel('Personalinfo');
		 $this->Stuinfo = $this->loadModel('Stuinfo');
		 $this->Emergency = $this->loademergency($this->Personalinfo->personalInfoId);
	   
		$this->Personalinfo->uId  = Yii::app()->user->getId(); //  set uId 
		
		$this->Personalinfo->attributes = $_POST;
		$this->Stuinfo->attributes = $_POST;
		$this->Personalinfo->lastedittime = date('Y-m-d H:i:s',time());
		if($this->Personalinfo->save()&&$this->Stuinfo->save()){
			$_POST['em1']['personalInfoId'] = $this->Personalinfo->personalInfoId;
			$_POST['em2']['personalInfoId'] = $this->Personalinfo->personalInfoId;
			$this->Emergency[0]->attributes = $_POST['em1'];$this->Emergency[1]->attributes = $_POST['em2'];
			if(!($this->Emergency[0]->save()&&$this->Emergency[1]->save())){
			  //var_dump($this->Emergency[0]->getErrors());
			  //var_dump($this->Emergency[1]->getErrors());
			  Yii::log(CHtml::errorSummary($this->Emergency[0]).CHtml::errorSummary($this->Emergency[1]),'error','Application.error');
			}
			Yii::app()->user->setFlash('notice','个人信息更新成功');
		}else{
		   Yii::log(CHtml::errorSummary($this->Personalinfo).CHtml::errorSummary($this->Stuinfo),'error','Applicatio.error');
		   Yii::app()->user->setFlash('notice','个人信息更新失败');
		   //throw new CHttpException(500,'code error');
		}
		$this->redirect(array('stuform/index'));
	}
	public function actionJobstep(){
	    $this->Jobstep = $this->loadModel('Jobstep');
	   $this->Jobstep->englishlevel = $_POST['englishlevel'];
	   $this->Jobstep->englishyear = $_POST['englishyear'];
	   $this->Jobstep->practicezone = $_POST['practicezone'];
	   $this->Jobstep->prioritycondition = $_POST['prioritycondition'];
       $this->Jobstep->othercondition = $_POST['othercondition'];
	   $this->Jobstep->projectlength = $_POST['projectlength'];
	   $this->Jobstep->americazone = implode(',',$_POST['america']);
	   $this->Jobstep->dormitoryrequirement = implode(',',$_POST['dormitory']);
	   $this->Jobstep->uId = Yii::app()->user->getId();
	   if($this->Jobstep->save()){
	    Yii::app()->user->setFlash('notice','STEP工作信息更新成功');		
	   }else{
	       Yii::app()->user->setFlash('notice','STEP工作信息更新失败');
		   $this->logAr($this->Jobstep);
	   }
	   $this->redirect(array('stuform/index'));
	
	}
	public function actionItpprojectlen(){
	    $command = Yii::app()->db;
		if(isset($_POST['projectlength'])){
		   $checkInserted =  $command->createCommand("select * from itpprojectlen where uId = ".Yii::app()->user->getId());
           if(count($checkInserted->queryAll())== 0){
		    $query = $command->createCommand("insert into itpprojectlen (uId,projectlength) values(".Yii::app()->user->getId().",'".$_POST['projectlength']."')");
		   }else
		     $query = $command->createCommand("update itpprojectlen set projectlength = '".$_POST['projectlength']."' where uId = ".Yii::app()->user->getId());
			  $query->execute();
				Yii::app()->user->setFlash('notice','ITP项目时长设置成功');  
			 
		}else{
	      Yii::app()->user->setFlash('notice','你的输入是错的');  
		 }
		 $this->redirect(array('stuform/index'));
	}
	public function actionExschoolchoose(){
	    $command = Yii::app()->db;
		$post = explode(',',$_POST['school']);
		if(isset($_POST['school'])){
		  $checkInserted =  $command->createCommand("select * from chooseschool where uId = ".Yii::app()->user->getId());
           if(count($checkInserted->queryAll())== 0){
		    $query = $command->createCommand("insert into chooseschool (uId,schoolname,exSchoolId) values(".Yii::app()->user->getId().",'".$post[0]."', ".$post[1].")");
		   }else
		     $query = $command->createCommand("update chooseschool set schoolname = '".$post[0]."' , exSchoolId = ".$post[1]." where uId = ".Yii::app()->user->getId());
		  $query->execute();
		     Yii::app()->user->setFlash('notice','交换生学校选择成功');
		 
		}else{
		   Yii::app()->user->setFlash('notice','你的输入是错的');
		}
		$this->redirect(array('stuform/index'));
	}
	public function actionPassport(){
	    $this->Passport = $this->loadModel('Passport');
	    $this->Passport->uId  = Yii::app()->user->getId();
		$this->Passport->attributes = $_POST;
		if($this->Passport->save()){
		  Yii::app()->user->setFlash('notice','护照保存成功');
		}else{
		  Yii::app()->user->setFlash('notice','护照保存失败');
		  $this->logAr($this->Passport);
		}
		   
		$this->redirect(array('stuform/index'));
		  
	}
	public function actionHome(){
	  $this->Home = $this->loadModel('Home');
	   
	   $this->Home->uId = Yii::app()->user->getId();
	   $this->Home->attributes = $_POST;
	   if($this->Home->save()){
	       Yii::app()->user->setFlash('notice','家庭信息保存成功');
	   }else{
	       Yii::app()->user->setFlash('notice','家庭信息保存失败');
		  $this->logAr($this->Home);
	   }
		
		$this->redirect(array('stuform/index'));
	}
	public function actionSchool(){
	   
	     $this->Schoolinfo = $this->loadModel('Schoolinfo');
		 $this->Schoolhistory = $this->loadHistory($this->Schoolinfo->schoolInfoId);
		$this->Schoolinfo->uId = Yii::app()->user->getId();
		$this->Schoolinfo->attributes = $_POST;
		 
		if($this->Schoolinfo->save()){
			if(isset($_POST['h1'])&&isset($_POST['h2'])&&isset($_POST['h3'])){
			      $_POST['h1']['schoolInfoId'] = $this->Schoolinfo->schoolInfoId;
			      $_POST['h2']['schoolInfoId'] = $this->Schoolinfo->schoolInfoId;
				  $_POST['h3']['schoolInfoId'] = $this->Schoolinfo->schoolInfoId;
			      $this->Schoolhistory[0]->attributes = $_POST['h1'];
			      $this->Schoolhistory[1]->attributes = $_POST['h2'];
				  $this->Schoolhistory[2]->attributes = $_POST['h3'];
				  $this->Schoolhistory[0]->save();$this->Schoolhistory[1]->save();$this->Schoolhistory[2]->save();
			 }else
			    Yii::log('study history not set','error','Application.error');
			Yii::app()->user->setFlash('notice','学校信息更新成功');
		}else{
		   Yii::app()->user->setFlash('notice','学校信息更新失败');
		   $this->logAr($this->Schoolinfo);
		}
		    $this->redirect(array('stuform/index'));
	}
	public  function loadHistory($id){
	    $newh = new Studyhistory();
		if($id == null)
		 return array($newh,new Studyhistory,new Studyhistory);
		$s = $newh->findAll('schoolInfoId = :u',array(':u'=>$id));
		
		switch(count($s)){
		   case 3:return $s;break;
		   case 2:return array($s[0],$s[1],$newh);break;
		   case 1:return array($s[0],$newh,new Studyhistory);break;
		   case 0:return array($newh,new Studyhistory,new Studyhistory);break;
		}
	}
	public function actionVisa(){
	   
			$this->Visa = $this->loadModel('Visa');
			  $this->Goneamerica = $this->loadForVisa($this->Visa->visaId,'Goneamerica');
			  $this->Getvisa = $this->loadForVisa($this->Visa->visaId,'Getvisa');
			  $this->Goneother = $this->loadForVisa($this->Visa->visaId,'Goneother');
	   for($i=1;$i<=3;$i++){
	       $this->Goneamerica[$i-1]->attributes = $_POST['gA'.$i];unset($_POST['gA'.$i]);
		   $this->Getvisa[$i-1]->attributes = $_POST['gV'.$i];unset($_POST['gV'.$i]);
		   $this->Goneother[$i-1]->attributes = $_POST['gO'.$i];unset($_POST['gO'.$i]);
	   }
	  $this->Visa->uId = Yii::app()->user->getId();
	  $this->Visa->attributes = $_POST;
	  if($this->Visa->save()){
	    for($i=0;$i<3;$i++){
		  $this->Getvisa[$i]->visaId = $this->Visa->visaId;
		  $this->Getvisa[$i]->save();
		  $this->Goneother[$i]->visaId =  $this->Visa->visaId;$this->Goneother[$i]->save();
		  $this->Goneamerica[$i]->visaId =  $this->Visa->visaId;$this->Goneamerica[$i]->save();
		}
	    Yii::app()->user->setFlash('notice','签证信息更新成功'); 
	   }else{
	      Yii::app()->user->setFlash('notice','签证信息更新失败');
          $this->logAr($this->Visa);		  
	  }
	   $this->redirect(array('stuform/index'));
	}
	
   /*
      load model : Goneamerica ,Getvisa, Goneother
   
   */
	public function loadForVisa($id,$className){
	      $O = new $className;
		  $OO = $O->findAll('visaId = :u',array(':u'=>$id));
		  switch(count($OO)){
			   case 3:return $OO;break;
			   case 2:return array($OO[0],$OO[1],$O);break;
			   case 1:return array($OO[0],$O,new $className);break;
			   case 0:return array($O,new $className,new $className);break;
		  }
	}
	public function actionProof(){
	         $this->Proof = $this->loadProof();
			 $attr[0] = $_POST['f'];
			 $attr[1] = $_POST['s'];
			 $attr[0]['uId'] = Yii::app()->user->getId();
			 $attr[1]['uId'] = Yii::app()->user->getId();
			 $this->Proof[0]->attributes = $attr[0];
			 $this->Proof[1]->attributes = $attr[1];
			if($this->Proof[0]->save()&&$this->Proof[1]->save())
			  Yii::app()->user->setFlash('notice','证明人信息更新成功');
			else{
				Yii::app()->user->setFlash('notice','证明人信息更新失败');
				$this->logAr($this->Proof[0].$this->Proof[1]);
			}
		
	     $this->redirect(array('stuform/index'));
}
	
	public function loadProof(){
	    $p = new Proof();
		$newp = $p->findAll('uId = :u',array(':u'=>Yii::app()->user->getId()));
		switch(count($newp)){
		     case 2:return array($newp[0],$newp[1]);break;
			 case 1:return array($newp[0],$p);break;
			 case 0:return array($p,new Proof());break;
		}
		
	
	}
	
    public function loadModel($modelName){
	    $newModel = new $modelName();
	    $n = $newModel->find('uId = :u',array(':u'=>Yii::app()->user->getId()));
		if($n !== null)
		  return $n;
		else
		 return $newModel;
	}
	public function loademergency($id){
	     $newe = new Emergency();
	      if($id === null)
		   return array(new Emergency,new Emergency);
	    $e  = $newe->findAll('personalInfoId = :u',array(':u'=>$id));
		if(empty($e))
		 return array(new Emergency,new Emergency);
		else if(count($e) == 1)
		return array($e[0],new Emergency);
		else
		 return $e;
	}
}

?>