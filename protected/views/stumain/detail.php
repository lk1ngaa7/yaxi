<div class="well"><h4 class="blue"><?php echo Yii::app()->user->project == 'exchange'?'学校':'配岗';?>信息</h4></div>
<?php
 $attr = array_keys($model->attributeLabels());
 array_splice($attr,0,2);
  $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
	'attributes'=>$attr,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
  ));

?>