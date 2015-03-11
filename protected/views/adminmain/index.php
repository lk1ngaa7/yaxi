<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/date-time/bootstrap-datepicker.min.js',2); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->params['static'].'assets/css/datepicker.css'); ?>
<div class="row">

	<div class="col-sm-12">
	<div class="well">
	  <h4 class="green smaller lighter">查询</h4>
			<?php $this->renderPartial('_searchform'); ?>
  </div>
  </div>

</div>
 <?php
   if(Yii::app()->user->rights==3){
	echo '<div class="row">';
	  $this->renderPartial("_noticeform");
	echo '</div>';
	 
  }
 ?>	
<script type="text/javascript">
$(document).ready(function(){
  $('.date-picker').datepicker();
   <?php if(Yii::app()->user->rights==3)
          echo '$("#noticeform").click(function(){
				  $("#noticeForm").show(200);
			   });
			   $("#removeForm").click(function(){
				  $("#noticeForm").hide(200);
			   });';
   ?>
  });
</script>
<hr>
<div class="row">
		<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
													   <th>学生编号</th>
														<th>真实姓名</th>
														<th>状态</th>
														<th>
														进度
														</th>
														<th>
														学校名称
														</th>
														<th>
														电话号码
														</th>
														<th>
														项目
														</th>
														<th>
														邮箱
														</th>
														<th>
														<i class="icon-wrench bigger-110 hidden-480"></i>
														操作
														</th>
													</tr>
												</thead>

												<tbody>
											
												<?php 
												 //  返回根据ispeigang，issignpaid，isprojectpaid 这三个值而产生的状态信息 
												  function getStatus(Stuinfo $m){
												     if($m->issignpaid == '0')
													  return '未交报名费';
													 switch($m->ispeigang.$m->isprojectpaid){
													     case '00':return '未配岗，未缴项目费';break;
														 case '01':return '未配岗，已交项目费';break;
														 case '10':return '已配岗，未交项目费';break;
														 case '11':return '已配岗，已交项目费';break;
														 
													 }
												  
												  }
												  foreach($models as $m){
												  $file = '';
												  $i = 1;
												   foreach($m->latestFiles as $f){
                                                            $file.= $i++.' . '.$f->name.'  '.$f->addtime.'<br>';														
														}
													  if($file == '')
													    $file = '还没有上传文件';
													 
													 
												     echo '<tr data-rel="tooltip" data-original-title="'.$file.'">
														<td>'.$m->user->username.'</td><td>
															<label>
																<a href="#">'.$m->realname.'</a>
															</label>
														</td>';
												    echo '<td>
															<a href="#">'.getStatus($m).'</a>
														</td>'; 
													echo '<td>'.$m->range->rangenum.'%　'.$m->range->short.'</td><td>'.$m->schoolname.'</td><td>'.$m->phonenumber.'</td>';
													echo '<td class="hidden-480">'.strtoupper($m->project->proName).'</td>';
													echo '<td>'.$m->email.'</td>'.'<td>
															<div class="btn-group">
																<a target="_blank" href="'.Yii::app()->createUrl('stuhome/index',array('id'=>$m->uId)).'"><i class="icon-edit"></i>详情</a></div>
														
														</td>
													</tr>';
												   
												   }
												   
												?>
											    </tbody>
											
											</table>
									       
											
												
								 <div class="col-xs-12" style="text-align:center">
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
										<div class="col-xs-12">
											<form class="form-horizontal" method="post" target="_blank" action="<?php echo Yii::app()->createUrl('adminmain/exportexcel'); ?>">
											<div class="form-group">
											<div class="col-xs-12">
											<!--
											<div class="controls">
												<label class="checkbox">
												  <input type="checkbox" value="1"> 航班信息
												</label>
												<label class="checkbox">
												  <input type="checkbox" value="2"> 工作及学校
												</label>
											  </div>
											 -->
											</div>
											
											</div>
											<div class="form-group">
											<input type="hidden" value="<?php echo $condition?>" name="condition">
											  <div class="col-sm-2">
												<button class="btn btn-primary no-border">
													<i class="icon-share-alt align-top bigger-125"></i>
												导出为xls
												</button>
											</div>
											</div>
											
											</form>
											
											
											</div>
										</div><!-- /.table-responsive -->
									</div>
										
</div>
<div class="row">
</div>
<script type="text/javascript">
			jQuery(function($) {
			   <?php if(Yii::app()->user->hasFlash('notice')){
			        echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
			   }
			   
			   ?>
			   $('[data-rel=tooltip]').tooltip({container:'body',
												html:true,});
			   
			})
</script>