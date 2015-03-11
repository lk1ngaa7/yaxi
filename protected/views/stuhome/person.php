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

<?php
  if($emergency == null)
   echo '<h3 class="red">未填写紧急联系人</h3>';
  else{
	$ae = array_keys(Emergency::model()->attributeLabels());
   array_splice($ae,0,2);
   $i = 1;
	foreach($emergency as $e){
	  echo '<hr>
			<h4 class="green">紧急联系人'.$i++.'</h4>';
	    $this->widget('zii.widgets.CDetailView', array(
		'data'=>$e,
		'attributes'=>$ae,
		'cssFile'=>false,
		'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
	));
	}
	}
?>