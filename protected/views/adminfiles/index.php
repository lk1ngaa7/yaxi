<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/layer/layer.min.js',2); ?>
<div class="row">
   <div class="col-xs-12">
	<div class="well">
			<h4 class="green smaller lighter">所有文档</h4>
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>文档名称</th>
														
														<th class="hidden-480">
														所属项目
														</th>
													    <th class="hidden-480">
														文档大小
														</th>
														<th class="hidden-480">
														备注消息
														</th>
														<th class="hidden-480">
														文档动作
														</th>
														<th class="hidden-480">
														文档类型
														</th>
														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															添加时间
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
													    $downloadUrl = '#"';
													     if($m->url!='nourl')
														   $downloadUrl = Yii::app()->params['files'].$m->url.'"  target="_blank"';
													    echo '<tr>
														<td>
															<label>
																<a href="'.$downloadUrl.'>'.$m->name.'</a>
															</label>
														</td>
														<td>'.strtoupper($m->project->proName).'</td><td class="hidden-480">'.($m->size+1).'MB</td><td class="green"><button class="lk btn btn-info" id = "'.$m->adminFilesId.'">详情</button></td><td>'.$m->typeD->typedetail.'</td><td>'.$m->category->categoryname.'</td><td>'.$m->addtime.'</td>
													   <td>
															<div class="btn-group">
														        <a href="'.Yii::app()->createUrl('adminfiles/delete',array('id'=>$m->adminFilesId)).'"><button class="btn btn-danger">删除</button></a>';
																//if($m->url!='nourl')
																// echo '<button class="btn btn"><a target="_blank" href="'.Yii::app()->createUrl('adminfiles/download',array('id'=>$m->adminFilesId)).'">下载</a></button>';
															  echo '</div>
														
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
<script type="text/javascript"> 
$(document).ready(function(){
   var data = new Array();
   <?php
       foreach($models as $m){
	         echo "data['".$m->adminFilesId."'] = new Array();";
		     echo "data['".$m->adminFilesId."'][0] = '".str_replace("\r\n","",$m->message)."';";
			 echo "data['".$m->adminFilesId."'][1] = '".$m->name."';";
	   }
   
   ?>
     $('.lk').click(function(){

	   $.layer({
			type: 1, 
			title: data[this.id][1],
			border: [0],
			closeBtn: [1,true],
			shadeClose: true,
			area: ['460px', '200px'],
			page: {
				html: '<div class="well" style="width:460px;height:200px"><h4 class="red">文件备注：</h4><p class="green">'+data[this.id][0]+'</p></div>'
			}
		});
	 });
  
  });

</script>
<div class="row">
<div class="col-xs-12">
<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">添加文档</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												   <?php $this->renderPartial('_uploadform');?>
												</div>
											</div>
										</div>

</div>
</div>