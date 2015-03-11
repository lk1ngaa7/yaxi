<?php  
class FiledownloadController extends Controller{
    public $isActivated = 3;
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
		  $ci->condition = 't.typeId = 2 and t.proId = '.Yii::app()->user->proId.' and t.categoryId = '.$m.$exCondition;
		  $ci->with =array('project','category','typeD');
		  $models[] = Adminfiles::model()->findAll($ci);
		}
		$ci->condition = 't.typeId = 1 and t.proId = '.Yii::app()->user->proId.$exCondition;
		$ci->with =array('project','category','typeD');
		$help = Adminfiles::model()->findAll($ci);
		 //var_dump($help);die();
	   $this->render("index",array('models'=>$models,'help'=>$help));
	  
	} 
}





?>