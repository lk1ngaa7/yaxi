<?php  
    class AdminmainController extends Controller{
	     public $isActivated = 0;
		 public $proList = array();
		 public $adminList = array();
		 public $condition;
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
		 public function myRender($ci){
		       $command = Yii::app()->db;
			   $sql = $command->createCommand(" select * from project");
			   $this->proList = $sql->queryAll();
			   $sql = $command->createCommand('select uId , realname from admininfo');
			   $this->adminList = $sql->queryAll();
			   $ci->with = array('user','project','range');
			   $pages =  new CPagination(Stuinfo::model()->count($ci));
			   $pages->pageSize = 20;
			   $pages->applyLimit($ci);
			   $models = Stuinfo::model()->findAll($ci);
			   //var_dump($models);die();
			   $this->render("index",array('pages'=>$pages,'models'=>$models,'condition'=>$ci->condition));
		 }
		 public function actionIndex(){
		 
		   $ci  = new CDbCriteria();
		   //  加上了 项目终止 range ， rangeId = 6，所以这里要将condition 设置为 <6
		   $ci->condition = 't.rangId < 5';
		   // 如果非超级管理员，就显示该管理员下面的学员.
		   if(Yii::app()->user->rights == 2)
		   $ci->condition = $ci->condition.' and  belongtouid = '.Yii::app()->user->getId();
		  $this->myRender($ci);
		 
		 }
		 public function actionSearch(){
		 
		  if(Yii::app()->user->rights == 2 && isset($_GET['belongtouid']))
		    throw new CHttpException(403,'Access Denied');
		  $ci = new CDbCriteria();
		  $condition=' t.rangId < 5  and ';
		  $post = array_diff($_GET, array(null));
		  
		  if($post != null){
		      if(isset($post['page']))
			    unset($post['page']);
			  if(isset($post['addition'])){
				foreach($post['addition'] as $key=>$value){
				 
				  $condition.=$key.'='.$value.' and ';
				  }
				  unset($post['addition']);
			  }
			  foreach($post as $key=>$value){
			    if(in_array($key,array('schoolname','phonenumber','realname','starttime')))
				    $value = '\''.$value.'\'';
				if($key == 'proId')
				  $key = 't.proId';
					$condition.=$key.'='.$value.' and ';
			   }
		     $condition.= ' 1=1 ';
		  }else{
		     $condition = null;
		  }
		  if(Yii::app()->user->rights == 2){
		  if($condition == null)
		    $condition = 'belongtouid = '.Yii::app()->user->getId();
		  else
		   $condition.=' and belongtouid = '.Yii::app()->user->getId();
		  }

		  if($condition != null)
		   $ci->condition = $condition;
		   $this->myRender($ci);
		 }
	   public  function actionAddnotice(){
	      $db = Yii::app()->db;
		  $sql = "";
		  if(!isset($_POST['noticeGroup'])){
		     Yii::app()->user->setFlash('notice','添加系统通知时，请选择项目');
			$this->redirect(array('adminmain/index'));
		  }
		  if(isset($_POST['noticeGroup']['All'])){
		      $sql = $db->createCommand("update adminnotice set detail = '".$_POST['adminnotice']."'");
             $sql->execute();
			Yii::app()->user->setFlash('notice','系统通知保存成功');
	
		  }else{
		      foreach($_POST['noticeGroup'] as $proId){
			     $sql = $db->createCommand("update adminnotice set detail = '".$_POST['adminnotice']."' where proId = ".$proId);
				  $sql->execute();
					Yii::app()->user->setFlash('notice','系统通知保存成功');
			}
		  }
		  
		  $this->redirect(array('adminmain/index'));
		   
	   }
	   public function actionExportexcel(){
	       // var_dump($_POST['condition']);die();
			$dataProvider=new CActiveDataProvider('Stuinfo', array(
			    'criteria'=>array(
				    'select'=>'realname,issignpaid,ispeigang,isprojectpaid,addtime,starttime,email,phonenumber,qq,wechat,weibo,schoolname,teachernotification',
					'condition'=>$_POST['condition'],
					'order'=>'addtime DESC',
					'with'=>array('project','range'),
					),

				));
					 //var_dump($dataProvider->getData());die();
						$this->widget('ext.EExcelView', array(
						 'dataProvider'=> $dataProvider,
						 'title'=>'管理员导出',
						 'autoWidth'=>true,
						 'filename'=>'Export.xls',
						 'grid_mode' => 'export',
						 'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
						 'columns'=>array(
						   'realname',
						   array(
							'header' => '是否配岗',
							'name' => 'ispeigang',
							'value' => '$data == "1"?"已配岗":"没有配岗"',
						),
						 array(
							'header' => '是否缴纳报名费',
							'name' => 'issignpaid',
							'value' => '$data == "1"?"已缴报名费":"未缴报名费"',
						),
						 array(
							'header' => '是否缴纳项目费',
							'name' => 'isprojectpaid',
							'value' => '$data== "1"?"已缴项目费":"未缴项目费"',
						),
						   'project.proName',
						   'addtime',
						   'starttime',
						   'range.short',
						   'email',
						   'phonenumber',
						   'qq',
						   'wechat',
						   'weibo',
						   'schoolname',
						   'teachernotification',
						   
						 
						 ),
						   
					));
	   }
	}

?>