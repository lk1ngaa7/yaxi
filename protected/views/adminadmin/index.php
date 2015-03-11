<div class="row">
<div class="col-xs-12">
	<div class="well">
			<h4 class="green smaller lighter">所有管理员</h4>
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>姓名</th>
														
														<th class="hidden-480">
														项目
														</th>

														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															添加时间
														</th>
														<th>
														  email
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
													    echo '<tr>
														<td>
															<label>
																<a href="#">'.$m->realname.'</a>
															</label>
														</td>'; 
														
													   echo '<td>'.strtoupper($m->project->proName).'</td><td class="hidden-480">'.$m->addtime.'</td><td>'.$m->email.'</td>';
													   echo '<td>
															<div class="btn-group">
														        <span class="btn btn-sm btn-danger"><a data-rel="tooltip" data-original-title="删除后，该管理员的所有学生移交至超级管理员" href="'.Yii::app()->createUrl('adminadmin/delete',array('id'=>$m->uId)).'">删除</a></span>
																<span class="btn btn-sm" data-rel="popover" title="管理员信息" data-content="用户名：'.$m->user->username.' <br>密码：'.$m->user->password.'" data-original-title="Default">查看</span>
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
												<h4 class="smaller">添加管理员</h4>
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
     if(Yii::app()->user->hasFlash('sqlerror')){
	   echo 'alert("'.Yii::app()->user->getFlash('sqlerror').'");';
	 }
  
  ?>
  $('[data-rel=popover]').popover({html:true});
  $('[data-rel=tooltip]').tooltip({container:'body'});
  });
</script>