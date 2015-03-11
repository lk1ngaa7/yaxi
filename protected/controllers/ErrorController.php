<?php
class ErrorController extends Controller{
	public function actionIndex()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	       //var_dump($error);
		   $this->render('index', $error);
	    }
	}

}

?>