<?php  
    class AdminstuController extends Controller{
	     public $proList;
		  public $isActivated = 1;
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
		 
		 public function actionIndex(){
		   $command = Yii::app()->db;
		   $sql = $command->createCommand(" select * from project");
		   $tongji = array();
		   $this->proList = $sql->queryAll();
		   $ci  = new CDbCriteria();
		   $ci->with = array('user','project');
		   // 如果非超级管理员，就显示该管理员下面的学员.
		   if(Yii::app()->user->rights == 2)
		   $ci->condition = 'belongtouid = '.Yii::app()->user->getId();
		   $pages =  new CPagination($tongji['all'] = Stuinfo::model()->count($ci));
		   $pages->pageSize = 10;
           $pages->applyLimit($ci);
           $models = Stuinfo::model()->findAll($ci);
		   $tongji = $this->loadTongjiData();
		   //var_dump($tongji);die();
		   //var_dump(Stuinfo::model()->count($ci));die();
		   $this->render("index",array('pages'=>$pages,'models'=>$models,'tongji'=>$tongji));
		 
		 }
		 public function loadTongjiData(){
		      $db = Yii::app()->db;
			  $r = array();
			  for($i=1;$i<=3;$i++){
			      $sql = $db->createCommand('SELECT count(sId) as num,rangId,proId from stuinfo  where proId = '.$i.' and rangId in(6,5) group by rangId');
				  $r[] = $sql->queryAll();
			  }
			  for($i =1 ;$i<=3;$i++){
			   $sql = $db->createCommand('SELECT count(sId) as num,proId from stuinfo where proId = '.$i);
               $r[3][] = $sql->queryRow();
			  }			  
		    return $r;
		 }
		 /**
		 *
		 * 此处使用了外键进行了处理，删除 user 后，他所有的在系统中的信息都会被删除。
		 */
		 public function actionDelete($id){
		    if(Yii::app()->user->rights == 2){
			   $ci = new CDbCriteria();
			   $ci->condition = 'belongtouid = '.Yii::app()->user->getId().' and uId = '.$id;
			   $s = Stuinfo::model()->find($ci);
			   if($s == null){
			      Yii::app()->user->setFlash('notice','学生不存在');
                  Yii::log('非法的删除学生 adminstu/delete 62','error','Application.error');			  
			      $this->redirect(array('adminstu/index'));
				  exit;
			   }
			  else
			   $user = User::model()->findByPk($id);
			}else
		    $user = User::model()->findByPk($id);
			if($user->delete()){
				Yii::app()->user->setFlash('notice','成功删除学生');
			}else{
			  Yii::app()->user->setFlash('notice','删除学生失败');
			  Yii::log(CHtml::errorSummary($user),'error','Application.error');
			}
			  $this->redirect(array('adminstu/index'));
		 }
		 public function actionAddstu(){
		    if((count(array_diff($_POST, array(null))) != 4)||!Yii::app()->request->isPostRequest)
			  $this->redirect(array('adminstu/index'));
			  //var_dump($_POST);die();
			  $newUser = new User();
			  
			  $userinfo['username'] = $this->genUserName();
			  $userinfo['password'] = $this->genPassword();
			  $userinfo['rights'] = 1;
			  $userinfo['indexurl'] = 'stumain/index';
			  $newUser->attributes = $userinfo;
			  if($newUser->save()){
			    
					$newStu = new Stuinfo();
					$newStu->uId = $newUser->uId;
					$newStu->proId = $_POST['proId'];
					$newStu->addtime = date('Y-m-d H:i:s',time());
					$newStu->realname = $_POST['realname'];
					$newStu->starttime = $_POST['starttime'];
					$newStu->schoolname = $_POST['schoolname'];
					$newStu->belongtouid  = Yii::app()->user->getId();
					if(!$newStu->save()){
					  $this->logAr($newStu);
					  Yii::app()->user->setFlash('notice','学生信息添加失败');
					  }
			  }else{
			  $this->logAr($newUser);
			   Yii::app()->user->setFlash('notice','学生信息添加失败');
			}
		    $this->redirect(array('adminstu/index'));
		 }
		 public function genPassword(){
		    return substr(md5(time()),2,6);
		 }
	     public function genUserName(){
		   
		    $command = Yii::app()->db;
			$sqlNum = $command->createCommand("select sId ,username from user,stuinfo where proId =".$_POST['proId']."  and rights = 1  and `user`.uId = stuinfo.uId ORDER BY sId desc limit 0,1");
			$sqlNum = $sqlNum->queryRow(); 
			//var_dump($sqlNum);die();
			if($sqlNum == false)
			   $num = '001';
			else{
			   $stunum = substr($sqlNum['username'],-3);
			   $stunum = $stunum + 1;
				switch(strlen((int)$stunum)){
				   case 1:$num = '00'.($stunum);break;
				   case 2:$num = '0'.($stunum);break;
				   case 3:$num = ($stunum);break;
				}
		   }
		   $sqlPro = $command->createCommand("select proName from project where proId = ".$_POST['proId']);
		    $sqlPro = $sqlPro->queryRow();
			switch($sqlPro['proName']){
			   case 'exchange':$pro = 'EX';break;
			   default:$pro = $sqlPro['proName'];break;
			}
		   $year = substr($_POST['starttime'],2,2);
		   return $year.$pro.$num;
		 }
		 public function actionProjectend($id){
		     $db = Yii::app()->db;
			 $stu = $db->createCommand("select rangId from stuinfo where uId = ".$id);
			 $oldRange = $stu->queryRow();
			 if((int)$oldRange['rangId'] <= 3){
			     Yii::app()->user->setFlash('projectEnd','不可以更新为项目已完成，行程信息未更新');
			}else{
			   $newRange = $db->createCommand("update stuinfo set rangId = 5 where uId = ".$id);
			   $newRange->execute();
			      Yii::app()->user->setFlash('projectEnd','更新成功，学生状态为项目已结束');
			   
			}
			$this->redirect(array('adminstu/index'));
		 }
		 public function actionProjectabort($id){
		      $db = Yii::app()->db;
			 $stu = $db->createCommand("select rangId from stuinfo where uId = ".$id);
			 $oldRange = $stu->queryRow();
			 $newRange = $db->createCommand("update stuinfo set rangId = 6 where uId = ".$id);
			 $newRange->execute();
			    
			Yii::app()->user->setFlash('projectEnd','更新成功，学生状态为项目已中断');
			$this->redirect(array('adminstu/index'));
		 }
	}

?>