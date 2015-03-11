<h3 class="blue">美国出境记录</h3>
<?php
if($goneamerica == null)
  echo '<h3 class="red">无美国出境记录</h3>';
else{
    
	echo '<table class="table table-hover">
		  <thead>
			<tr>
			  <th>赴美的具体抵达时间</th>
			  <th>每次在美国的停留时间</th>
			  <th>地址</th>
			  <th>邮编</th>
			</tr>
		  </thead>
		  <tbody>';
		  foreach($goneamerica as $s){
			echo '<tr>
			  <td>'.$s->arrivaltime.'</td>
			  <td>'.$s->staytime.'</td>
			  <td>'.$s->stayplace.'</td>
			  <td>'.$s->stayzipcode.'</td>
				</tr>';
			
			}
		  echo '</tbody>
			</table>';
	
	}
?>
<hr>
<h3 class="blue">获得美国签证记录</h3>
<?php
if($getvisa == null)
  echo '<h3 class="red">无美国签证记录</h3>';
else{
    
	echo '<table class="table table-hover">
		  <thead>
			<tr>
			  <th>曾经获得美国签证的签发日期</th>
			  <th>曾经获得美国签证的签证类型</th>
			  <th>曾经获得美国签证的签发地点</th>
			  <th>签证手指个数</th>
			  <th>签证号码</th>
			</tr>
		  </thead>
		  <tbody>';
		  foreach($getvisa as $s){
			echo '<tr>
			  <td>'.$s->visadate.'</td>
			  <td>'.$s->visatype.'</td>
			  <td>'.$s->visaplace.'</td>
			  <td>'.$s->visafinger.'</td>
				</tr>';
			
			}
		  echo '</tbody>
			</table>';
	
	}
?>
<hr>
<h3 class="blue">其他国家出境记录</h3>
<?php
if($goneother == null)
  echo '<h3 class="red">无其他国家出境记录</h3>';
else{
    
	echo '<table class="table table-hover">
		  <thead>
			<tr>
			  <th>所到国家名称</th>
			  <th>出境所持签证类型</th>
			  <th>出境的事由</th>
			  <th>出境时间</th>
			  <th>返回时间</th>
			</tr>
		  </thead>
		  <tbody>';
		  foreach($goneother as $s){
			echo '<tr>
			  <td>'.$s->nationname.'</td>
			  <td>'.$s->visatype.'</td>
			  <td>'.$s->reason.'</td>
			  <td>'.$s->begintime.'</td>
			  <td>'.$s->backtime.'</td>
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