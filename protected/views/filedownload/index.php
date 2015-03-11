<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/layer/layer.min.js',2); ?>
<div class="row">
							<div class="col-sm-12 col-xs-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													<?php if(Yii::app()->user->proId == '2')
																echo '学校申请材料';
														  else
														        echo '配岗材料';
													?>
													<small>点击下载文件名称即可下载</small>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												<?php 
												
												    if($models !== 'exchange')
													$this->renderPartial('_filetable',array('models'=>$models[0]));
													else{
													  echo '<a href="'.Yii::app()->createUrl('stuform/index').'">点击这里去选择学校</a>';
													}
												?>
													
												</div>
											</div>
										</div>
									</div>
</div>
<div class="row">
							<div class="col-sm-12 col-xs-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													签证材料
													<small>点击下载文件名称即可下载</small>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												<?php 
												    if($models !== 'exchange')
													$this->renderPartial('_filetable',array('models'=>$models[1]));
													else{
													  echo '<a href="'.Yii::app()->createUrl('stuform/index').'">点击这里去选择学校</a>';
													}
												?>
													
													
												</div>
											</div>
										</div>
									</div>

</div>
<div class="row">
							<div class="col-sm-12 col-xs-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													住宿材料
													<small>点击下载文件名称即可下载</small>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												<?php 
												    if($models !== 'exchange')
													$this->renderPartial('_filetable',array('models'=>$models[2]));
													else{
													  echo '<a href ="'.Yii::app()->createUrl('stuform/index').'">点击这里去选择学校</a>';
													}
												?>
						
												</div>
											</div>
										</div>
							</div>

</div>
<div class="row">
							<div class="col-sm-12 col-xs-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													帮助材料
													<small>点击下载文件名称即可下载</small>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												<?php 
												    if($models !== 'exchange')
													$this->renderPartial('_filetable',array('models'=>$help));
													else{
													  echo '<a href ="'.Yii::app()->createUrl('stuform/index').'">点击这里去选择学校</a>';
													}
												?>
						
												</div>
											</div>
										</div>
							</div>

</div>
 <script type="text/javascript"> 
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
	   foreach($help as $m){
	       echo "data['".$m->adminFilesId."'] = new Array();";
		     echo "data['".$m->adminFilesId."'][0] = '".str_replace("\r\n","",$m->message)."';";
			 echo "data['".$m->adminFilesId."'][1] = '".$m->name."';";
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


