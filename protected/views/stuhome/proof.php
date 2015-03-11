<?php
if($models == null){
   echo '<h3 class="red">还没有填写诶</h3>';
}else{
 $i = 1;
 foreach($models as $model){
    echo '<h3 class="blue">证明人'.$i++.'</h3>';
	 $attr = array_keys($model->attributeLabels());
	 array_splice($attr,0,2);
	  $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attr,
		'cssFile'=>false,
		'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
	  ));
  }
}
?>