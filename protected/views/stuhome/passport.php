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