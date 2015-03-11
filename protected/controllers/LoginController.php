<?php  
   class LoginController extends Controller{
       
	   
	    public function filters(){
		     return array(
				'accessControl',
			 );
		 }
	   
        public function actionIndex(){
			 if(!Yii::app()->user->isGuest)
			  $this->redirect(Yii::app()->user->index);
		    $this->renderPartial('index',array('model'=>new LoginForm));
		}
		/*
		   @Override the method from CController to avoid request loop
		*/
		public function beforeAction(){
		   
		    return true;
		}
		public function  actionAuth(){
		
		     if(!Yii::app()->user->isGuest)
			  $this->redirect(Yii::app()->user->index);
			$loginModel = new LoginForm();
			$loginModel->attributes = $_POST;
			$loginModel->validate();
			if($loginModel->login()){
			   $this->redirect(Yii::app()->user->index);
			   
			}else{
			   $this->renderPartial('index',array('model'=>$loginModel));
			}
			
		}
		public function actionLogout(){
		    Yii::app()->user->logout();
			$this->redirect(Yii::app()->createUrl('login/index'));
		}
		public function actionTest(){
		   var_dump(Yii::app()->user->getName());
		   if(Yii::app()->user->rights==1)
		   var_dump(Yii::app()->user->project);
		}
										
		}
?>