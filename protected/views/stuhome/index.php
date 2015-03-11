<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/layer/layer.min.js',2); ?>
<div class="well">
<div class="row">
<div class="col-xs-12 col-sm-3 center">

  <img class="img-responsive" src="<?php echo $this->stuInfo->imageUrl?Yii::app()->params['files'].$this->stuInfo->imageUrl:'http://asiaedu.qiniudn.com/assets/avatars/no2.jpg';?>" height="200px" />
												<div class="space-6"></div>
												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="icon-circle light-green middle"></i>
															&nbsp;
															<span class="white"><?php echo $this->stuInfo->realname?$this->stuInfo->realname:'未填写'; ?></span>
														</a>

														
													</div>
												</div>
												<div class="space-6"></div>
												<div class="profile-contact-links align-left">
													<div class="profile-info-row">
													<div class="profile-info-name"> 导师 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?php echo $this->admininfo->realname?$this->admininfo->realname:'未填写'; ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 项目</div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?php if($this->proname[0]['proName'] == 'exchange'){echo '交换生';}else{echo  $this->proname[0]['proName']?$this->proname[0]['proName']:'未填写';}?></span>
													</div>
												</div>
												</div>
 </div>
 <div class="col-xs-12 col-sm-9">
								
									<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> 出发日期 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?php echo $this->stuInfo->starttime?$this->stuInfo->starttime:'未填写';?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 家庭住址 </div>

													<div class="profile-info-value">
														<i class="icon-map-marker light-orange bigger-110"></i>
														
														<span class="editable editable-click" id="city"><?php echo $this->personInfo->homeplace?$this->personInfo->homeplace:'未填写'; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 国籍 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="age"><?php echo $this->personInfo->nation?$this->personInfo->nation:'未填写'; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 出生日期 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="signup"><?php echo $this->personInfo->borntime?$this->personInfo->borntime:'未填写'; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 手机号 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="login"><?php echo $this->stuInfo->phonenumber?$this->stuInfo->phonenumber:'未填写'; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 身份证号 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->personInfo->idnumber?$this->personInfo->idnumber:'未填写';?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 家庭电话 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->personInfo->homephonenumber?$this->personInfo->homephonenumber:'未填写'; ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 邮寄地址 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->personInfo->postplace?$this->personInfo->postplace:'未填写'; ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 项目进度 </div>

													<div class="profile-info-value">
														<div class="progress">
																				<div class="progress-bar" style="width:<?php echo $this->range->rangenum;?>%">
																					<span class="pull-left">已完成</span>
																					<span class="pull-right"><?php echo $this->range->rangenum; ?>%</span>
																				</div>
														</div>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 目前状态 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->range->detail;?></span>
													</div>
												</div>
											</div>
 </div>
 </div>
 <hr>
 <!--
 <div class="row">
     <div class="col-xs-4 center">
	     
	</div>
   <div class="col-xs-4 center">
	     
	</div>
	<div class="col-xs-4 center">
	     <button class="btn btn-danger">导出为pdf</button>
	</div>
 </div>--->
 </div>
 <hr>
 <div class="well">
    <h3 class="blue">报名表</h3>
	<?php 
	   $s = array();
	    switch($this->proname[0]['proName']){
		  case 'ITP':$s = array('id'=>$this->stuInfo->uId,'p'=>'ITP');break;
		  case 'exchange':$s = array('id'=>$this->stuInfo->uId,'p'=>'exchange');break;
		  case 'STEP':$s = array('id'=>$this->stuInfo->uId,'p'=>'STEP');break;
		}
		$l = array('showperson'=>'个人信息','showjob'=>'工作信息','showpassport'=>'护照信息','showhome'=>'家庭信息','showschool'=>'学校信息','showvisa'=>'签证信息','showproof'=>'证明人信息');
		foreach($l as $key=>$value){
		  if($key == 'showjob'){
		     if($s['p'] == 'ITP')
			  $value = '工作时长';
			 else if($s['p'] == 'exchange')
			  $value = '学校选择';
			 echo '<a target="_blank" href="'.Yii::app()->createUrl('stuhome/'.$key,$s).'">'.$value.'</a>　　';
		  }else
		  echo '<a target="_blank" href="'.Yii::app()->createUrl('stuhome/'.$key,array('id'=>$this->stuInfo->uId)).'">'.$value.'</a>　　';
		}
	?>
 </div>
 <div class="well">
 <div class="row">
 
    <div class="col-sm-4" style="text-align:center;"><a target="_blank" href="<?php echo Yii::app()->createUrl('stuhome/showFlight',array('id'=>$this->stuInfo->uId));?>"><button class="btn btn-info">电子行程单</button></a></div>
    <div class="col-sm-4" style="text-align:center;"><a href="<?php echo Yii::app()->createUrl('stuhome/setsignpaid',array('id'=>$this->stuInfo->uId))?>" ><button class="btn btn-primary" id="signpaid">已交报名费</button></a></div>
	<div class="col-sm-4" style="text-align:center;"><a href="<?php echo Yii::app()->createUrl('stuhome/setprojectpaid',array('id'=>$this->stuInfo->uId))?>" ><button class="btn btn-success" id="projectpaid">已交剩余项目费</button></a></div>
 </div>
 </div>
 <hr>
 <div class="row">
 <?php
  switch($this->stuInfo->proId){
	   case '3': $this->renderPartial('_stepform');break;
	   case '1': $this->renderPartial('_itpform');break;
	   case '2': $this->renderPartial('_exchangeform');break;
   }
 ?>
 </div>
 <hr>
 <div class="row">
    <div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="">
													<a data-toggle="tab" href="#peigang">
														<i class="green icon-home bigger-110"></i>
													     <?php
														   if($this->stuInfo->proId == '2')
														   echo '学校申请';
														   else
														     echo '配岗';
														 ?>材料
													</a>
												</li>

												<li class="active">
													<a data-toggle="tab" href="#visa">
														签证材料
														<span class="badge badge-danger"></span>
													</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#addition">
														住宿申请材料
														<span class="badge badge-danger"></span>
													</a>
												</li>
											
											</ul>

											<div class="tab-content">
												<div id="peigang" class="tab-pane">
												 <?php 
														  if($models !== 'exchange')
															$this->renderPartial('_filetable',array('models'=>$models[0],'stu'=>$stu[0]));
															else{
															  echo '<p class="red">没有选择学校</p>';
															}
														?>
												</div>

												<div id="visa" class="tab-pane active">
													 <?php 
														  if($models !== 'exchange')
															$this->renderPartial('_filetable',array('models'=>$models[1],'stu'=>$stu[1]));
															else{
															  echo '<p class="red">没有选择学校</p>';
															}
														?>
												</div>
											     <div id="addition" class="tab-pane">
												 <?php 
														  if($models !== 'exchange')
															$this->renderPartial('_filetable',array('models'=>$models[2],'stu'=>$stu[2]));
															else{
															  echo '<p class="red">没有选择学校</p>';
															}
														?>
												</div>
											</div>
										</div>
									</div>
 </div>
 <hr>
 <div class="row">
 <div class="widget-box transparent">
					<div class="widget-header widget-header-small">
								<h4 class="smaller">
							      <i class="icon-comments bigger-110"></i>
												老师留言
								</h4>
					</div>

					<div class="widget-body">
							<div class="widget-main">
									 <form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('stuhome/addnotification',array('id'=>$this->stuInfo->uId));?>" method="post" > 
											<div class="form-group center">
											    <textarea name="content" cols="120" rows="5" value=""> <?php echo $this->stuInfo->teachernotification;?></textarea>
									       </div>
											 <div class="form-group center">
											 <button  type="submit" class="btn btn-success"><i class="icon-edit align-top bigger-125"></i>提交</button>
										    </div>
									</form>
								</div>
					</div>
</div>
   
 </div>
  <script type="text/javascript"> 
$(document).ready(function(){
  $('#signpaid').click(function(){
      return confirm('确定要将 <?php echo $this->stuInfo->realname?> 同学设置为已交报名费状态吗？');
  });
    $('#projectpaid').click(function(){
      return confirm('确定要将 <?php echo $this->stuInfo->realname?> 同学设置为已交剩余项目费状态吗？');
  });
 <?php
     if(Yii::app()->user->hasFlash('notice')){
	    echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
	 }
 ?>
   var data = new Array();
   <?php
   if($models != 'exchange'){
     // 拼装用来显示文件详情的js 数组
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

