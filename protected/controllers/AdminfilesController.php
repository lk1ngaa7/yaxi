<?php  
    class AdminfilesController extends Controller{
	      public $isActivated = 3;
		  public $ExSchoolArray = array();
		  public function accessRules()
		  {
			return array(
				array(
					'allow',  // allow all users to access 'index' and 'view' actions.
					'expression'=>'$user->rights==3',
				),
				array(
					'deny',  // deny all users
					'users'=>array('*'),
					'message'=>'You do not have access to this page ! ! ',
				),
			);
		 }
		 public function load(){
		    $db  = Yii::app()->db; 
		    $this->ExSchoolArray = $db->createCommand('select * from exschool')->queryAll();
			unset($this->ExSchoolArray[0]); // 0 just for no school like STEP & ITP
		 }
		 public function actionIndex(){
		   //load the school list for exchange
		   $this->load();
		   $ci = new CDbCriteria;
		   $ci->order = 'addtime DESC';
		   $ci->with = array('typeD','category','project');
		   $pages =  new CPagination(Adminfiles::model()->count($ci));
		   $pages->pageSize = 10;
           $pages->applyLimit($ci);
           $models = Adminfiles::model()->findAll($ci);
		   $this->render("index",array('models'=>$models,'pages'=>$pages));
		 
		 }
		public function actionDelete($id){
		   $af = Adminfiles::model()->findByPk($id);
		   if(!$af)
		     $this->redirect(array('adminfiles/index'));
		   if($af->typeId == '1'||$af->typeId == '2'){
		   if($this->deleteFromQiniu($af->url)){
		      if($af->delete())
			     Yii::app()->user->setFlash('notice','删除成功');
		   }else{
		       Yii::app()->user->setFlash('notice','删除失败');
		   }
		   }else{
		      if($af->delete())
			     Yii::app()->user->setFlash('notice','删除成功');
			  else
			  Yii::app()->user->setFlash('notice','删除失败');
		   }
		  $this->redirect(array('adminfiles/index'));
		}
	   public function actionAddfiles(){
	        //var_dump($_POST);die();
	       if(!Yii::app()->request->isPostRequest)
		     $this->redirect(array('adminfiles/index'));
		   
		   $af = new Adminfiles();
		   $af->uId = Yii::app()->user->getId();
		   $af->proId = $_POST['proId'];
		   $af->addtime = date('Y-m-d H:i:s',time());
		   $_POST['message'][$_POST['type']] = trim($_POST['message'][$_POST['type']],' ');
		   $af->message = empty($_POST['message'][$_POST['type']])?'没有备注':$_POST['message'][$_POST['type']];
		   
		   // especially for exchange, database set the 0 for exSchool
		   if(isset($_POST['school']))
		    $af->exSchoolId  = $_POST['school'];
		   $save = true;
		   switch($_POST['type']){
		      case 'help':$af->typeId = 1;
						  $af->categoryId = 5;
						  $af->name = $_FILES['help']['name'];
						  $af->url = 'admin/'.$_POST['proId'].'/'.$af->typeId.'/'.time().'/'.$_FILES['help']['name'];
						  $af->type = $_FILES['help']['type'];
						  $af->size = $_FILES['help']['size']/(1024*1024);
						  $save = $this->saveToQiniu($af->url,$_FILES['help']['tmp_name']);
						  break;
			  case 'temp':$af->typeId = 2;
						  $af->categoryId = $_POST['cate'][$_POST['type']];
						  $af->name = $_FILES['templete']['name'];
						  $af->url = 'admin/'.$_POST['proId'].'/'.$af->typeId.'/'.time().'/'.$_FILES['templete']['name'];
						  $af->type = $_FILES['templete']['type'];
						  $af->size = $_FILES['templete']['size']/(1024*1024);
						  $save = $this->saveToQiniu($af->url,$_FILES['templete']['tmp_name']);
						  break;
			  case 'item':$af->typeId = $this->itemTypeId($_POST['fileAction']);
			              $af->categoryId = $_POST['cate'][$_POST['type']];
						  $af->name = $_POST['nameItem'];
						  $af->url = 'nourl';
						  $af->type = 'notype';
						  $af->size = 0;
			              break;
		   }
		   if(!$save){
		     Yii::app()->user->setFlash('notice','文件上传失败');
			 $this->redirect(array('adminfiles/index'));
		   }else if(!$af->save()){
		     
			 Yii::app()->user->setFlash('notice',$af->name.' 添加失败');
			 $this->logAr($af);
			 $this->redirect(array('adminfiles/index'));
		   }
		    Yii::app()->user->setFlash('notice',$af->name.'  添加成功');
		   $this->redirect(array('adminfiles/index'));
	   }
	   public function actionDownload($id){
	      $m  = Adminfiles::model()->findByPk($id);
		  readfile(Yii::app()->params['files'].$m->url);
	   }
	  public function  itemTypeId($a){
	     if($a['t'] == 'upload'){
		     if($a['s'][$a['t']] == 'downUp')
			  return 6;
			 else if($a['s'][$a['t']] =='onlyDownload')
			  return 5;
		 }else if($a['t'] == 'no'){
		     if($a['s'][$a['t']] == 'conform')
			  return 3;
			 else if($a['s'][$a['t']] =='upload')
			  return 4;
		 }
		 throw new CHttpException(500,'code error adminfiles set type!!');
	  }
	}

?>