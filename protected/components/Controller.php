<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $isAdmin = 0;
	public $activateArray = array(null,null,null,null,null);
	public $isActivated = -1;
	public function beforeAction($action){
	  //var_dump(Yii::app()->user->isGuest);die();
	  if(Yii::app()->user->isGuest)
	   $this->redirect(Yii::app()->createUrl('login/index'));
	  else{
			$this->activateArray();
			return true;
      }     
       
	}
	// 在 渲染页面之前时确定 静态资源的路由
	public function beforeRender($view){
		
	   if(Yii::app()->params['static'] === '')
	     Yii::app()->params['static'] = Yii::app()->baseUrl.'/';
		return true;
	}
	public function activateArray(){
	   if($this->isActivated == -1)
	    return;
	   else{
	     $this->activateArray[$this->isActivated] = 'active';
	   }
	}
	public function filterCheckLogin($filterChain){
				if (Yii::app()->user->isGuest)  
                  Yii::app()->user->loginRequired(); 
					$filterChain->run();
	}
	 public function filters(){
		     return array(
				'CheckLogin',
			    'accessControl',
			 );
		 }
     public function logAr($model){
	    Yii::log(CHtml::errorSummary($model),'error','Application.error');
	 }
	 public function saveToQiniu($filename,$localfile){
		
	    return true;
	 }
	 public function deleteFromQiniu($filename){
	    
		return true;
	 
	 }
		 
}