<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/date-time/bootstrap-datepicker.min.js',2); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->params['static'].'assets/css/datepicker.css'); ?>

<div class="row">
<div class="col-xs-12">
<div class="well">
 <div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>项目</th>
														<th>总人数</th>
														<th class="hidden-480">
														中断
														</th>
														<th>
														 完成
														</th>
													</tr>
												</thead>

												<tbody>
												<?php
												  $p = array('ITP','EXCHANGE','STEP');
												      for($i=0;$i<3;$i++){
													  $abort;$success;
													   switch(count($tongji[$i])){
													       case 0: $abort = 0;$success = 0;break;
														   case 1: if($tongji[$i][0]['rangId'] == '6'){ $abort = $tongji[$i][0]['num']; $success = 0;}else{$abort = 0;$success = $tongji[$i][0]['num'];};break;
													       case 2: if($tongji[$i][0]['rangId'] == '6'){ $abort = $tongji[$i][0]['num']; $success = $tongji[$i][1]['num'];}else{$abort = $tongji[$i][1]['num']; $success = $tongji[$i][0]['num'];};break;
													   }
													   
													   echo '<tr>
														<td>
														   '.$p[$i].'
														</td><td>'.$tongji[3][$i]['num'].'</td><td>'.$abort.'</td><td class="hidden-480">'.$success.'</td></tr>';
													  
													
													}
													
													   
													 
												?>
												
														
														
												</tbody>
											
											</table>
											
							</div><!-- /.table-responsive -->
</div>
<hr>
	<div class="well">
			<h4 class="green smaller lighter">所有学生</h4>
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>姓名</th>
														<th>出发时间</th>
														<th class="hidden-480">
														项目
														</th>

														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															添加时间
														</th>
														<th>
														学校名称
														</th>
														<th>
														<i class="icon-wrench bigger-110 hidden-480"></i>
														Operation
														</th>
													</tr>
												</thead>

												<tbody>
												<?php
												      foreach($models as $m){
													   if($m->rangId == '5'){
													     $color = 'green';
													   }else if($m->rangId == '6'){
													     $color = 'red';
													   }else
													     $color = 'blue';
													   echo '<tr>
														<td>
															<label>
																<a  class="'.$color.'" target="_blank" href="'.Yii::app()->createUrl('stuhome/index',array('id'=>$m->uId)).'">'.$m->realname.'</a>
															</label>
														</td>'; 
														echo '<td>
															<a href="#">'.$m->starttime.'</a>
														</td>';
													   echo '<td>'.strtoupper($m->project->proName).'</td><td class="hidden-480">'.$m->addtime.'</td><td>'.$m->schoolname.'</td>';
													   echo '<td>
															<div class="btn-group">
														       
																<span class="btn btn-sm" data-rel="popover" title="学生信息" data-content="用户名：'.$m->user->username.' <br>密码：'.$m->user->password.'" data-original-title="Default">查看</span>
																<a href="'.Yii::app()->createUrl('adminstu/delete',array('id'=>$m->user->uId)).'" style="display:inline;"><span data-rel="tooltip" data-original-title="这将会删除学生所有在本系统填写的信息" class="btn btn-sm btn-danger"> 删除</span></a>
																<a href="'.Yii::app()->createUrl('adminstu/projectend',array('id'=>$m->user->uId)).'" style="display:inline;"><span data-rel="tooltip" data-original-title="项目成功后，设置学生的状态为项目结束，学生将不会出现在管理首页" class="btn btn-sm btn-info"> <i class="icon-bookmark"></i>项目结束</span></a>
																<a class="abort" href="'.Yii::app()->createUrl('adminstu/projectabort',array('id'=>$m->user->uId)).'" style="display:inline;"><span data-rel="tooltip" data-original-title="由于放弃项目，设置学生的状态为项目终止，学生将不会出现在管理首页" class="btn btn-sm btn-info"> <i class="icon-abort"></i>项目终止</span></a>
															  </div>
														
														</td>
													</tr>';
													}
													
													   
													 
												?>
												
														
														
												</tbody>
											
											</table>
									      <div class="" style="text-align:center">
										     <?php 
											 $this->widget('CLinkPager',array( 
													'htmlOptions'=>array('class'=>'pagination'),
													'cssFile'=>false,
													'header'=>'',    
													'firstPageLabel' => '首页',    
													'lastPageLabel' => '末页',    
													'prevPageLabel' => '上一页',    
													'nextPageLabel' => '下一页',    
													'pages' => $pages, 
													'maxButtonCount'=>13    
												)    
											);    
												
										?>
									</div>
											
							</div><!-- /.table-responsive -->
	        </div>
	</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">添加学生</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												 <?php $this->renderPartial('_form');?>
												</div>
											</div>
										</div>

</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	<?php
	   if(Yii::app()->user->hasFlash('projectEnd')){
	      echo 'alert("'.Yii::app()->user->getFlash('projectEnd').'");';
	   }
	   if(Yii::app()->user->hasFlash('notice')){
	      echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
	   }
	?>
 $('.abort').click(function(){
   return confirm('需要将该学生设置为项目终止状态吗?');     
});
  $('[data-type=date-picker]').datepicker();
  $('[data-rel=popover]').popover({html:true});
   $('[data-rel=tooltip]').tooltip({container:'body'});
  });
</script>