<?php 
class  StumainController extends Controller{
	public $isActivated = 0;
	public $mine;
	public $imageError = null;
	public $person;
	public $adminInfo;
	public $adminNotice;
	public $flightImageError = null;
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
	public function loadFile(){
	    $exCondition = '';
		if(Yii::app()->user->proId === '2'){
		 if(($sc = Chooseschool::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId()))))
		  $exCondition = ' and exSchoolId = '.$sc->exSchoolId;
		 else 
		   return array(array(),array());
		}
		  $ci = new CDbCriteria;
		  
		  $ci->condition = ' t.proId = '.Yii::app()->user->proId.$exCondition;
		  $ci->with =array('project','category','typeD');
		  $ci->addInCondition('t.typeId',array(5,6));
		  $models = Adminfiles::model()->findAll($ci);
	
		$stu  =array();
	     
		$ci = new CDbCriteria();
		foreach($models as $mo){
		    $ci->condition = 'uId = '.Yii::app()->user->getId().'  and  adminFilesId= '.$mo->adminFilesId;
			$stu[] = Stufiles::model()->find($ci);
	} 
	   return array($models,$stu);
	}
    public function actionIndex(){
	  
	    $ci = new CDbCriteria();
		$ci->with = array('project','range','project');
		$ci->condition = 'uId = '.Yii::app()->user->getId();
	    $this->mine = Stuinfo::model()->find($ci);
	    $this->breadcrumbs=array($this->mine->realname.'的个人主页');
		$this->person = Personalinfo::model()->find('uId = :u',array(':u'=>$this->mine->uId))?Personalinfo::model()->find('uId = :u',array(':u'=>$this->mine->uId)):new Personalinfo;
		$this->adminInfo = Admininfo::model()->find('uId = :u',array(':u'=>$this->mine->belongtouid));
		$this->adminNotice = Adminnotice::model()->find('proId = :u',array(':u'=>Yii::app()->user->proId));
		$fileData  =  $this->loadFile();
		$this->render("index",array('models'=>$fileData[0],'stu'=>$fileData[1]));
	
	}
	public function actionUploadFile($id){
	  
	   if($_FILES['file']['error'] == '4'){
	      Yii::app()->user->setFlash('notice','没有添加文件');
		  $this->redirect(array('stumain/index'));
		  exit;
	   }
	   if($_FILES['file']['size'] > 10*1024*1024){
	      Yii::app()->user->setFlash('notice','文件过大');
		  $this->redirect(array('stumain/index'));
		  exit;
	   }
	    $ci = new CDbCriteria();
		$ci->condition = 'adminFilesId = '.$id.'  and uId = '.Yii::app()->user->getId();
	    $stu = Stufiles::model()->find($ci)?Stufiles::model()->find($ci):new Stufiles();
	    $stu->uId = Yii::app()->user->getId();
		$stu->adminFilesId = $id;
		$stu->name = $_FILES['file']['name'];
		$stu->addtime = date('Y-m-d H:i:s',time());
		$stu->addip = Yii::app()->request->userHostAddress;
		$stu->isAdmin = 0;
        $url = 'stu/uId/'.Yii::app()->user->getId().'/upload/'.time().'/'.$_FILES['file']['name'];
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
	    $this->redirect(array('stumain/index'));
	}
	public function actionUploadimage(){
	   //var_dump($_FILES);
	   if($_FILES['image']['size'] > 4*1024*1024)
	     $this->imageError = '照片过大';
	   else{
	      $type = array('image/png','image/gif','image/jpeg','image/jpg');
	   if(in_array(strtolower($_FILES['image']['type']),$type)){
			  $filename = Yii::app()->user->getId().'/'.time().'/'.$_FILES['image']['name'];
			  
			  if($this->saveToQiniu($filename,$_FILES['image']['tmp_name'])){
				$stu = Stuinfo::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId()));
				$stu->imageUrl = $filename;
				$stu->save();
				$this->imageError = '照片上传成功';
			  }else{
				 $this->imageError = '照片，上传失败';
			  }
		  }else{
		     $this->imageError = '照片类型错误，只支持 PNG,GIF,JPEG,JPG';
		  }
	   }
	   Yii::app()->user->setFlash('notice',$this->imageError);
	   $this->redirect(array('stumain/index'));
	}
	public function actionDetail(){
	   $model = null;
	    switch(Yii::app()->user->project){
		   case 'STEP':$model = 'Stepupdated';break;
		   case 'ITP':$model = 'Itpupdated';break;
		   case 'exchange':$model = 'Exchangeupdated';break;
		}
	    $model = $model::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId()))?$model::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId())):new $model;
	   $this->render('detail',array('model'=>$model));
	}
	public function actionFlight(){
	   $go =$this->loadFlight(0);
	   $back = $this->loadFlight(1);
	   $this->updateRange();
	   $stu = Stuinfo::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId()));
	   $this->render('flight',array('go'=>$go,'back'=>$back,'stu'=>$stu));
	}
	public function actionAddflight(){
	  $ci = new CDbCriteria();
	  $ci->condition = 'uId = '.Yii::app()->user->getId().' and isBack = 0 and type = '.++$_POST['go']['type'];
	  $g = Flight::model()->find($ci)?Flight::model()->find($ci):new Flight;
	  $g->uId = Yii::app()->user->getId();
	  $g->isBack = 0;
	  $g->attributes = $_POST['go'];
	  if($g->save()){
		Yii::app()->user->setFlash('flightError','添加成功');
	 }else{
	     Yii::app()->user->setFlash('flightError','添加失败');
		 $this->logAr($g);
	  }
	  
	  $this->redirect(array('stumain/flight'));
	}
	public function actionAddbackflight(){
	  $ci = new CDbCriteria();
	  $ci->condition = 'uId = '.Yii::app()->user->getId().' and isBack = 1 and type = '.++$_POST['back']['type'];
	  $g = Flight::model()->find($ci)?Flight::model()->find($ci):new Flight;
	  $g->uId = Yii::app()->user->getId();
	  $g->isBack = 1;
	  $g->attributes = $_POST['back'];
	  if($g->save()){
	    Yii::app()->user->setFlash('flightError','添加成功');
	    
	  }else{
	     Yii::app()->user->setFlash('flightError','添加失败');
		 $this->logAr($g);
	  }
	  $this->redirect(array('stumain/flight'));
	}
	public function updateRange(){
	    $ci = new CDbCriteria();
		$ci->condition = 'uId = '.Yii::app()->user->getId();
		$f = Flight::model()->findAll($ci);
		if(count($f) == 6){
		    $s = Stuinfo::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId()));
			if($s->rangId < 4 ){
			   $s->rangId = 4;
			   return $s->save();
			}else
			   return true;
			 
		}else
		return true; 
	}
	public function actionUploadflight(){
	  
	   $type = array('image/png','image/gif','image/jpeg','image/jpg');
	   if($_FILES['flight']['size'] > 4*1024*1024){
	     $this->flightImageError = '图片过大，上传失败，图片要求在 3M 以内';
	   }else{
	   if(in_array(strtolower($_FILES['flight']['type']),$type)){
	     $stu = Stuinfo::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId()));
		 $filename = Yii::app()->user->getId().'/flightImage/'.time().'/'.$_FILES['flight']['name'];
	     if($this->saveToQiniu($filename,$_FILES['flight']['tmp_name'])){
		   $stu->flightimage = $filename;
		   if($stu->save())
		     $this->flightImageError = '电子行程单，上传成功';
		   else{
		     $this->flightImageError = '电子行程单，保存失败';
		   }
		 }else{
		   $this->flightImageError = '电子行程单，上传失败';
		 }
	      
	   }else{
	     $this->flightImageError = "电子行程单，图片格式错误";
	   }
	   }
	   Yii::app()->user->setFlash('flightError',$this->flightImageError);
	   $this->redirect(array('stumain/flight'));	  
	  
	}
    public function loadFlight($isBack){
	   $ci = new CDbCriteria();
	   $ci->condition = 'uId = '.Yii::app()->user->getId().' and isBack = '.$isBack;
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
}

?>