<?php 
class FileuploadController extends Controller{
     public $isActivated = 2;
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
	 public function actionIndex(){
	    $ma = array('1','2','3');
		$models = array();
		$exCondition = '';
		//var_dump(Yii::app()->user->proId);die();
		if(Yii::app()->user->proId === '2'){
		  $ma[0] = '4';
		  if(!($sc = Chooseschool::model()->find('uId = :u',array(':u'=>Yii::app()->user->getId())))){	   
		   $this->render("index",array('models'=>'exchange'));
			 Yii::app()->end();
		  }else{
		     $exCondition = ' and exSchoolId = '.$sc->exSchoolId;
		  }	  
		}
		$ci = new CDbCriteria;
		foreach($ma as $m){
		 
		  $ci->condition = ' t.proId = '.Yii::app()->user->proId.' and t.categoryId = '.$m.$exCondition.' and t.typeid in(2,3,4)';
		 // $ci->addInCondition('t.typeId',array(2,3,4));
		  $ci->with =array('project','category','typeD');
		  
		  $models[] = Adminfiles::model()->findAll($ci);
		}
		$stu  =array(array(),array(),array());
	    $i  =0;
		$ci = new CDbCriteria();
		foreach($models as $mo){
		    
		    foreach($mo as $m){
			   $ci->condition = 'uId = '.Yii::app()->user->getId().'  and  adminFilesId= '.$m->adminFilesId;
			   $stu[$i][] = Stufiles::model()->find($ci);
			} 
			$i++;
		}
		
	   $this->render("index",array('models'=>$models,'stu'=>$stu));
	    
	 }
	 public function actionUploadfile($id){
	    
		if($_FILES['file']['error'] == 4){
		    Yii::app()->user->setFlash('notice','没有添加文件');
			$this->redirect(array('fileupload/index'));
			exit;
		}
		if($_FILES['file']['size'] >= 6*1024*1024){
		    Yii::app()->user->setFlash('notice','文件过大');
			$this->redirect(array('fileupload/index'));
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
	    $this->redirect(array('fileupload/index'));
	 }
	 public function actionConform($id){
	     $ci = new CDbCriteria();
		$ci->condition = 'adminFilesId = '.$id.'  and uId = '.Yii::app()->user->getId();
	    $stu = Stufiles::model()->find($ci)?Stufiles::model()->find($ci):new Stufiles();
		$admin = Adminfiles::model()->findByPk($id);
		if(!$admin){
		      Yii::app()->user->setFlash('notice','错误的请求');
			$this->redirect(array('fileupload/index'));
			exit;
		}
	    $stu->uId = Yii::app()->user->getId();
		$stu->adminFilesId = $id;
		$stu->name = $admin->name;
		$stu->addtime = date('Y-m-d H:i:s',time());
		$stu->addip = Yii::app()->request->userHostAddress;
        $stu->url = 'conform';
	    if($stu->save()){
		     Yii::app()->user->setFlash('notice','确认成功');
		}else{
		   Yii::app()->user->setFlash('notice','确认失败');
		   $this->logAr($stu);
		}
		$this->redirect(array('fileupload/index'));
	 }
	 

}


?>