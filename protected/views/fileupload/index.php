<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/layer/layer.min.js',2); ?>
<div class="row">
<div class="alert alert-info">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>
											<strong>同学您好</strong>
												请仔细查看办理方式
											
										</div>	
<div class="col-sm-12">
										<h3 class="row header smaller lighter blue">
											<span class="col-xs-6"> 上传专区 </span><!-- /span -->

											
										</h3>

										<div id="accordion" class="accordion-style1 panel-group">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
															<i class="icon-angle-down bigger-110" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
															&nbsp;
															<?php
															 if(Yii::app()->user->proId == '2')
															    echo '学校申请';
															 else 
															     echo '配岗';
															?>材料<span class="red">点击文件名称即可下载已上传的文件</span>
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse in" id="collapseOne">
													<div class="panel-body">
										          <?php 
												    if($models !== 'exchange')
													$this->renderPartial('_filetable',array('models'=>$models[0],'stu'=>$stu[0]));
													else{
													  echo '<a href="'.Yii::app()->createUrl('stuform/index').'">点击这里去选择学校</a>';
													}
												?>
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
															<i class="icon-angle-right bigger-110" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
															&nbsp;签证材料<span class="red">点击文件名称即可下载已上传的文件</span>
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseTwo">
													<div class="panel-body">
													  <?php 
												    if($models !== 'exchange')
													$this->renderPartial('_filetable',array('models'=>$models[1],'stu'=>$stu[1]));
													else{
													  echo '<a href="'.Yii::app()->createUrl('stuform/index').'">点击这里去选择学校</a>';
													}
												?>
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
															<i class="icon-angle-right bigger-110" data-icon-hide="icon-angle-down" data-icon-show="icon-angle-right"></i>
															&nbsp;住宿材料<span class="red">点击文件名称即可下载已上传的文件</span>
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseThree">
													<div class="panel-body">
														  <?php 
														  if($models !== 'exchange')
															$this->renderPartial('_filetable',array('models'=>$models[2],'stu'=>$stu[2]));
															else{
															  echo '<a href="'.Yii::app()->createUrl('stuform/index').'">点击这里去选择学校</a>';
															}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
</div>
 <script type="text/javascript"> 
 <?php
     if(Yii::app()->user->hasFlash('notice')){
	    echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
	 }
 ?>
$(document).ready(function(){
   var data = new Array();
   <?php
     if($models != 'exchange'){
       foreach($models as $mm){
	      foreach($mm as $m){
		    echo "data['".$m->adminFilesId."'] = new Array();";
		     echo "data['".$m->adminFilesId."'][0] = '".str_replace("\r\n","",$m->message)."';";
			 echo "data['".$m->adminFilesId."'][1] = '".$m->name."';";
			 
		  }
	   }
    }
   ?>
     $('.lk').click(function(){

	   $.layer({
			type: 1,   //0-4的选择,
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
