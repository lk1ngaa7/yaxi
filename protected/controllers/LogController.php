<?php  
    class LogController extends Controller{
			
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
		    $ci  = new CDbCriteria();
			$ci->order = 'logtime DESC';
	        $pages = new CPagination(Syslogs::model()->count($ci));
			$pages->pageSize = 10;
            $pages->applyLimit($ci);
            $models = Syslogs::model()->findAll($ci);
			$this->render('index',array('page'=>$pages,'models'=>$models));
		
		}
  }
		
?>		
		