<?php  
    class AdminadminController extends Controller{
			public $proList;
		   public $isActivated = 2;
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

		 
		 public function actionIndex(){
		   $command = Yii::app()->db;
		   $sql = $command->createCommand(" select * from project");
		   $this->proList = $sql->queryAll();
		   $ci = new CDbCriteria();
		   $ci->with = array('user','project');
		   $ci->condition = 'isSuper = 0';
		   $pages =  new CPagination(Admininfo::model()->count($ci));
		   $pages->pageSize = 5;
           $pages->applyLimit($ci);
           $models = Admininfo::model()->findAll($ci);
		   $this->render("index",array('pages'=>$pages,'models'=>$models));
		 
		 }
		 
		 public function actionAddadmin(){
		   if(!Yii::app()->request->isPostRequest||(count(array_diff($_POST, array(null))) != 5))
		      $this->redirect(array('adminadmin/index'));
			$newUser = new User;
            $newUser->username = $_POST['username'];
			$newUser->password = $this->genPassword();
			$newUser->rights = 2;
			$newUser->indexurl = 'adminmain/index';
			if($newUser->save()){
			   $newAdmin = new Admininfo;
			   $newAdmin->realname = $_POST['realname'];
			   $newAdmin->addtime = date('Y-m-d H:m:s',time());
			   $newAdmin->isSuper = 0;
			   $newAdmin->phonenumber = $_POST['phonenumber'];
			   $newAdmin->email =$_POST['email'];
			   $newAdmin->proId = $_POST['proId'];
			   $newAdmin->uId = $newUser->uId;
			   if(!$newAdmin->save()){
					Yii::log(CHtml::errorSummary($newAdmin),'error','application.error');
					Yii::app()->user->setFlash('sqlerror','新增管理员失败');
				}
				
			}else{
			 Yii::app()->user->setFlash('sqlerror','用户名必须是唯一的');
		     Yii::log(CHtml::errorSummary($newUser),'error','application.error');
			}
			 $this->redirect(array('adminadmin/index'));
		 }
		 public function actionDelete($id){
		     $ci = new CDbCriteria();
			 $ci->condition = 'belongtouid = '.$id; 
		     $Allstus = Stuinfo::model()->findAll($ci);
			 foreach($Allstus as $s){
			 // 这里只有超级管理员可以访问，所以此时的uId 就是 超级管理员的uId 
			   $s->belongtouid = Yii::app()->user->getId();
			   if(!$s->save()){
				   Yii::log(CHtml::errorSummary($s),'error','application.error');
					
				}
			 }
			 $deletedAdmin = User::model()->findByPk($id);
			 if($deletedAdmin->delete())
			   Yii::app()->user->setFlash('sqlerror','删除成功');
			 else{
			     Yii::app()->user->setFlash('sqlerror','删除失败');
				 $this->logAr($deletedAdmin);
			 }
			 $this->redirect(array('adminadmin/index'));
		 }
		  public function genPassword(){
		    return substr(md5(time()),2,6);
		 }
	
	}

?>