<?php 
    class StuhomeController extends Controller{
	    public $formModel;
		public $stuInfo;
		public $personInfo;
		public $range;
		public $admininfo;
		public $proname;
		public function accessRules()
		  {
			return array(
				array(
					'allow',  // allow all users to access 'index' and 'view' actions.
					'expression'=>'$user->rights>=2',
				),
				array(
					'deny',  // deny all users
					'users'=>array('*'),
					'message'=>'You do not have access to this page ! ! ',
				),
			);
		 }
		public function loadModel($id){
		    $db =  Yii::app()->db;
			
		    $ci = new CDbCriteria();
			$ci->condition = 'uId = '.$id; 
		    $this->stuInfo = Stuinfo::model()->find($ci);
			$pronamesql = $db->createCommand('select proName from project where proId = '.$this->stuInfo->proId);
			$this->proname = $pronamesql->queryAll();
			$this->admininfo = Admininfo::model()->find('uId = :u',array(':u'=>$this->stuInfo->belongtouid));
			$this->range = Range::model()->find('rangeId = :u',array(':u'=>$this->stuInfo->rangId));
			$this->personInfo = Personalinfo::model()->find($ci);
			if($this->personInfo == null)
			 $this->personInfo = new Personalinfo();
			$className= '';
			switch($this->stuInfo->proId){
			    case '1':$className = 'Itpupdated';break;
				case '2':$className='Exchangeupdated';break;
				case '3':$className = 'Stepupdated';break;
			}
			$this->formModel = $className::model()->find($ci);if($this->formModel==null) $this->formModel = new $className();
		}
		public function loadFile($uId){
		$ma = array('1','2','3');
		$models = array();
		$exCondition = '';
		$stu = Stuinfo::model()->find('uId = :u',array(':u'=>$uId));
		if($stu->proId === '2'){
		  $ma[0] = '4';
		  if(!($sc = Chooseschool::model()->find('uId = :u',array(':u'=>$uId)))){
			// 如果该生是交换生，且他没有选择学校，所以我们就无法给她呈现文件
			// 直接给 $models 和 stu  赋值为 'exchange'， 然后在 view 层 显示他没有选择学校
		   $this->render("index",array('models'=>'exchange'));
			 Yii::app()->end();
		  }else{
		     $exCondition = ' and exSchoolId = '.$sc->exSchoolId;
		  }	  
		}
		$ci = new CDbCriteria;
		foreach($ma as $m){
		  $ci->addInCondition('t.typeId',array(2,3,4,5,6));
		  $ci->condition = ' t.proId = '.$stu->proId.' and t.categoryId = '.$m.$exCondition;
		  $ci->with =array('project','category','typeD');
		  $models[] = Adminfiles::model()->findAll($ci);
		}
		$stu  =array(array(),array(),array());
	    $i  =0;
		$ci = new CDbCriteria();
		foreach($models as $mo){
		    foreach($mo as $m){
			   $ci->condition = 'uId = '.$uId.'  and  adminFilesId= '.$m->adminFilesId;
			   $stu[$i][] = Stufiles::model()->find($ci);
			} 
			$i++;
		}
		 //var_dump(count($models[1]));
		// var_dump($stu[1]);die();
		  return array($models,$stu);
		}
		
	    public function actionIndex($id){
		   $this->loadModel($id);
		   
		   if(Yii::app()->user->rights == 2){
		   if($this->stuInfo->belongtouid != Yii::app()->user->getId()){
		      Yii::log('非法的获得学生信息 uId = '.Yii::app()->user->getId(),'error','Application.error');
			  $this->redirect(array('adminmain/index'));
			  exit; 
		   }
		   }
		   $fileData = $this->loadFile($id);
		   $this->render("index",array('models'=>$fileData[0],'stu'=>$fileData[1]));
		 
		 }
		 
		 public function actionUploadfile($id){
			 
			 $stuId = $_POST['stuId'];
		   if($_FILES['file']['error'] == '4'){
			  Yii::app()->user->setFlash('notice','没有添加文件');
			  $this->redirect(array('stuhome/index','id'=>$stuId));
			  exit;
		   }
		   if($_FILES['file']['size'] > 10*1024*1024){
			  Yii::app()->user->setFlash('notice','文件过大');
			  $this->redirect(array('stuhome/index','id'=>$stuId));
			  exit;
		   }
	    $ci = new CDbCriteria();
		$ci->condition = 'adminFilesId = '.$id.'  and uId = '.$stuId;
	    $stu = Stufiles::model()->find($ci)?Stufiles::model()->find($ci):new Stufiles();
	    $stu->uId = $stuId;
		$stu->adminFilesId = $id;
		$stu->name = $_FILES['file']['name'];
		$stu->addtime = date('Y-m-d H:i:s',time());
		$stu->isAdmin = 1;
		$stu->addip = Yii::app()->request->userHostAddress;
        $url = 'admin/uId/'.Yii::app()->user->getId().'/upload/'.time().'/'.$_FILES['file']['name'];
		if($this->saveToQiniu($url,$_FILES['file']['tmp_name'])){
		   $stu->url = $url;
		   if($stu->save()){
		      Yii::app()->user->setFlash('notice','文件上传成功');
		   }else{
		     Yii::app()->user->setFlash('notice','文件上传失败');
			 $this->logAr($stu);
		   }
		   
		}else{
		   Yii::app()->user->setFlash('notice','文件上传失败');
		}
	   $this->redirect(array('stuhome/index','id'=>$stuId));
		 
		 }
		 public function updateRange($id){
		     $stu = Stuinfo::model()->find('uId = :u',array(':u'=>$id));
			 if($stu->rangId < 3)
			 $stu->rangId = 3;
			 else{
			    $stu->ispeigang = 1;
			    return $stu->save();
			 }
			 $stu->ispeigang = 1;
			 return $stu->save();
		 }
	    public function actionAddstep($id){
		   if(!Yii::app()->request->isPostRequest)
		     $this->redirect(array('stuhome/index','id'=>(int)$id));
		 $ci = new CDbCriteria();
		  $ci->condition = 'uId = '.$id;
		  $step = Stepupdated::model()->find($ci);
		  if($step == null)
		   $step = new Stepupdated();
		   $_POST['uId'] = $id;
		  $step->attributes = $_POST;
		  if($step->save()&&$this->updateRange($id)){
		  Yii::app()->user->setFlash('notice','STEP项目信息更新成功');
		  
		 }else{
		    Yii::app()->user->setFlash('notice','STEP项目信息更新成功');
			$this->logAr($step);
		 }
		  $this->redirect(array('stuhome/index','id'=>(int)$id));
		}
		public function actionAdditp($id){
		     if(!Yii::app()->request->isPostRequest)
		     $this->redirect(array('stuhome/index','id'=>(int)$id));
			
		 $ci = new CDbCriteria();
		  $ci->condition = 'uId = '.$id;
		  $itp = Itpupdated::model()->find($ci);
		  if($itp == null)
		   $itp = new Itpupdated();
		   $_POST['uId'] = $id;
		  $itp->attributes = $_POST;
		  if($itp->save()&&$this->updateRange($id)){
			Yii::app()->user->setFlash('notice','ITP项目信息更新成功');
		 }else{
		     Yii::app()->user->setFlash('notice','ITP项目信息更新失败');
			 $this->logAr($itp);
		  }
		   
		    $this->redirect(array('stuhome/index','id'=>(int)$id));
		}
		public function actionAddexchange($id){
		     if(!Yii::app()->request->isPostRequest)
		     $this->redirect(array('stuhome/index','id'=>(int)$id));
		 $ci = new CDbCriteria();
		  $ci->condition = 'uId = '.$id;
		  $exchange = Exchangeupdated::model()->find($ci);
		  if($exchange == null)
		   $exchange = new Exchangeupdated();
		   $_POST['uId'] = $id;
		  $exchange->attributes = $_POST;
		  if($exchange->save()&&$this->updateRange($id)){
		  Yii::app()->user->setFlash('notice','交换生项目信息更新成功');
		  
		  }else{
		     Yii::app()->user->setFlash('notice','交换生项目信息更新失败');
			 $this->logAr($exchange);
		  }
		   $this->redirect(array('stuhome/index','id'=>(int)$id));
		}
		public function actionAddnotification($id){
		       if(!Yii::app()->request->isPostRequest)
			      $this->redirect(array('stuhome/index','id'=>(int)$id));
		      $nosql = Yii::app()->db->createCommand("UPDATE stuinfo SET teachernotification = '".$_POST['content']."' where uId = ".$id);
			  $nosql->execute();
			  $this->redirect(array('stuhome/index','id'=>(int)$id));
		}
		public function actionShowperson($id){
		   $model  = Personalinfo::model()->find('uId = :u',array(':u'=>$id));
		   $emergency = null;
		   if($model == null )
		    $model = new Personalinfo();
		   else{
		     $emergency = Emergency::model()->findAll('personalInfoId = :u',array(':u'=>$model->personalInfoId));
		   }
		   $this->render('person',array('model'=>$model,'emergency'=>$emergency));
		}
		public function actionShowjob($id,$p){
		  $model;
		   switch($p){
		     case 'STEP':$model = Jobstep::model()->find('uId = :u',array(':u'=>$id))?Jobstep::model()->find('uId = :u',array(':u'=>$id)):new Jobstep();break; 
		     case 'ITP':$model = Itpprojectlen::model()->find('uId = :u',array(':u'=>$id))?Itpprojectlen::model()->find('uId = :u',array(':u'=>$id)):new Itpprojectlen;break;
			 case 'exchange':$model = Chooseschool::model()->find('uId = :u',array(':u'=>$id))?Chooseschool::model()->find('uId = :u',array(':u'=>$id)):new Chooseschool();break;
		   }
		   $this->render('job',array('model'=>$model));
		}
		public function actionShowpassport($id){
		   $model = Passport::model()->find('uId = :u',array(':u'=>$id))?Passport::model()->find('uId = :u',array(':u'=>$id)):new Passport;
		   $this->render('passport',array('model'=>$model));
		}
		public function actionShowhome($id){
		   $model = Home::model()->find('uId = :u',array(':u'=>$id))?Home::model()->find('uId = :u',array(':u'=>$id)):new Home;
		   $this->render('home',array('model'=>$model));
		}
		public function actionShowschool($id){
		   $model = Schoolinfo::model()->find('uId = :u',array(':u'=>$id))?Schoolinfo::model()->find('uId = :u',array(':u'=>$id)):new Schoolinfo;
		   $studyhistory = Studyhistory::model()->findAll('schoolInfoId = :u',array(':u'=>$model->schoolInfoId));
		   $this->render('school',array('model'=>$model,'studyhistory'=>$studyhistory));
		}
		public function actionShowvisa($id){
		   $model = Visa::model()->find('uId = :u',array(':u'=>$id))?Visa::model()->find('uId = :u',array(':u'=>$id)):new Visa;
		   $goneamerica = Goneamerica::model()->findAll('visaId = :u',array(':u'=>$model->visaId));
		   $goneother = Goneother::model()->findAll('visaId = :u',array(':u'=>$model->visaId));
		   $getvisa = Getvisa::model()->findAll('visaId = :u',array(':u'=>$model->visaId));
		   
		   $this->render('visa',array('model'=>$model,'goneamerica'=>$goneamerica,'goneother'=>$goneother,'getvisa'=>$getvisa));
		}
		public function actionShowproof($id){
		   $model = Proof::model()->findAll('uId = :u',array(':u'=>$id))?Proof::model()->findAll('uId = :u',array(':u'=>$id)):null;
		   $this->render('proof',array('models'=>$model));
		}
		public function actionShowflight($id){
	        $go =  $this->loadFlight(0,$id);
			$back = $this->loadFlight(1,$id);
			$stu = Stuinfo::model()->find('uId =:u',array(':u'=>$id));
			$this->render('flight',array('go'=>$go,'back'=>$back,'stu'=>$stu));
		}
		public function actionSetsignpaid($id){
		   $s = Stuinfo::model()->find('uId = :u',array(':u'=>$id));
		   $s->issignpaid = 1;
		   if($s->save()){
		       Yii::app()->user->setFlash('notice',$s->realname.' 同学已设置为已交报名费');
			   $this->redirect(array('stuhome/index','id'=>(int)$id));
		   }
		}
		public function actionSetprojectpaid($id){
		   $s = Stuinfo::model()->find('uId = :u',array(':u'=>$id));
		   $s->isprojectpaid = 1;
		   if($s->save()){
		       Yii::app()->user->setFlash('notice',$s->realname.' 同学已设置为已交项目费');
			   $this->redirect(array('stuhome/index','id'=>(int)$id));
		   }
		}
		 public function loadFlight($isBack,$id){
			   $ci = new CDbCriteria();
			   $ci->condition = 'uId = '.$id.' and isBack = '.$isBack;
			   $g = Flight::model()->findAll($ci);
			   $r = array(new Flight,new Flight,new Flight);
			   if(count($g) == 0)
			   return $r;
			   else{
				  foreach($g as $gg){
					  $r[(int)$gg->type-1] = $gg;
				  }
			   }
			   return $r;
	}
	 public function checkAdmin($id){
	     return User::model()->findByPk($id)->rights == '1' ? false:true;
	 }
}

?>