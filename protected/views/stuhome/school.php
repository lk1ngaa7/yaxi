<h3 class="blue">学习历史</h3>
<?php
if($studyhistory == null)
  echo '<h3 class="red">还未填写</h3>';
else{

	echo '<table class="table table-hover">
		  <thead>
			<tr>
			  <th>学习时间</th>
			  <th>所读学校名称</th>
			  <th>地址</th>
			  <th>邮编</th>
			</tr>
		  </thead>
		  <tbody>';
		  foreach($studyhistory as $s){
			echo '<tr>
			  <td>'.$s->time.'</td>
			  <td>'.$s->name.'</td>
			  <td>'.$s->place.'</td>
			  <td>'.$s->zipcode.'</td>
				</tr>';
			
			}
		  echo '</tbody>
			</table>';
	
	}
?>
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