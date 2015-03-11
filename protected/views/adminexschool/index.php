<div class="well">
 <div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>学校名称</th>
														<th>选择学校的人数</th>
														<th class="hidden-480">
														添加时间
														</th>
														<th>
														 操作
														</th>
													</tr>
												</thead>

												<tbody>
												 <?php
												    foreach($school as $s){
													  echo '<tr><td>'.$s->schoolName.'</td><td>'.$s->stunum.'</td><td>'.$s->addtime.'</td><td><a id ="add" data-rel="tooltip" data-original-title="删除这个学校，已选择这个学校的学生将重新选择。同时文档管理中与这个学校相关的文档也将删除" href="'.Yii::app()->createUrl('adminexschool/delete',array('id'=>$s->exSchoolId)).'"><button type="button" class="btn btn-danger">删除</button></a></td></tr>';
													}
												 ?>
												
														
														
												</tbody>
											
											</table>
											
							</div><!-- /.table-responsive -->

</div>
<hr>
<div class="well">
  <h3 class="green">添加学校</h3>
    <form class="form-horizontal"   method = "post" action="<?php echo Yii::app()->createUrl('adminexschool/add'); ?>">
	   <div class="form-group">
	     <div class="col-sm-6">
		 <label for="" class="control-label">学校名称</label>
		 <input  type="text" class="form-control" name="schoolName" >
		</div>
		
	   </div>
	   <div class="form-group">
	     <div class="col-sm-6">
		  <button type="submit" class="btn btn-info">提交</button>
		</div>
	   </div>
	</form>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
    <?php
	    if(Yii::app()->user->hasFlash('notice')){
		    echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
		}
	?>
	$('[data-rel=tooltip]').tooltip({container:'body'});
	$('#add').click(function(){
	     return confirm("删除这个学校，已选择这个学校的学生将重新选择。同时文档管理中与这个学校相关的文档也将删除。确认删除吗？");
	
	});
	  });

</script>