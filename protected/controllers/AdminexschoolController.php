<?php  
    class AdminexschoolController extends Controller{
	     public $isActivated = 4;
    
	public function accessRules()
		  {
			return array(
				array(
					'allow',  // allow all users to access 'index' and 'view' actions.
					'expression'=>'$user->rights == 3',
				),
				array(
					'deny',  // deny all users
					'users'=>array('*'),
					'message'=>'You do not have access to this page ! ! ',
				),
			);
		 }
	public function actionIndex(){
	    $school = Exschool::model()->with('stunum')->findAll();
		//var_dump($school[1]->stunum);die();
		unset($school[0]);
	    $this->render('index',array('school'=>$school));
	
	}
	public function actionDelete($id){
	     $school  = Exschool::model()->findByPk($id);
		 if($school->delete()){
		    Yii::app()->user->setFlash('notice','删除学校成功');
		 }else{
		   Yii::app()->user->setFlash('notice','删除学校失败');
		   $this->logAr($school);
		 }
		 $this->redirect(array('adminexschool/index'));
	}
	public function actionAdd(){
	   $school = new Exschool();
	   $school->schoolName = $_POST['schoolName'];
	   $school->addtime = date('Y-m-d H:m:s',time());
	   if($school->save()){
	      Yii::app()->user->setFlash('notice','添加学校成功');
	   }else{
	     Yii::app()->user->setFlash('notice','添加学校失败');
		 $this->logAr($school);
	   }
	   $this->redirect(array('adminexschool/index'));
	}
  }
?>