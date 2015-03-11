<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/layer/layer.min.js',2); ?>
<div class="page-header">
							<h1>
								个人信息主页/User Profile Page
								<small>
									<i class="icon-double-angle-right"></i>
									
								</small>
							</h1>
</div>
<div class="col-xs-12 col-sm-3 center">
  <div class="well" style="height:200px">
     <?php 
	   if($this->mine->imageUrl != ''){
	     echo '<img class="img-responsive" style="height:164px;width:216px;" src="'.Yii::app()->params['files'].$this->mine->imageUrl.'">';
	   }else
	     $this->renderPartial('_uploadimage');
	  ?>
  </div>
													<div class="space-6"></div>
												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="icon-circle light-green middle"></i>
															&nbsp;
															<span class="white"><?php echo $this->mine->realname;?></span>
														</a>

														
													</div>
												</div>
												<div class="space-6"></div>
												<div class="profile-contact-links align-left">
													<div class="profile-info-row">
													<div class="profile-info-name"> 导师姓名 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?php echo $this->adminInfo->realname;?></span>
													</div>
													</div>
													<div class="profile-info-row">
													<div class="profile-info-name"> 导师电话</div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?php echo $this->adminInfo->phonenumber;?></span>
													</div>
													</div>
												</div>
 </div>
<div class="col-xs-12 col-sm-9">
<!--
<div class="alert alert-info">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>
											<strong>你好</strong>

											你的配岗申请已经提交。
											<br>
										</div>	-->								
									<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> 出发日期 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username"><?php echo $this->mine->starttime;?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 家庭住址 </div>

													<div class="profile-info-value">
														<i class="icon-map-marker light-orange bigger-110"></i>
														
														<span class="editable editable-click" id="city"><?php echo $this->person->homeplace?$this->person->homeplace:'未填写';?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> <?php echo Yii::app()->user->project == 'exchange'?'学校':'配岗';?>信息 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="age"><a href="<?php echo Yii::app()->createUrl('stumain/detail'); ?>" target="_blank">点我</a></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">Email </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="signup"><?php echo $this->mine->email?$this->mine->email:'未填写';?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 手机号 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="login"><?php echo $this->mine->phonenumber?$this->mine->phonenumber:'未填写';?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> 身份证号 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->person->idnumber?$this->person->idnumber:'未填写';?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 家庭电话 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->person->homephonenumber?$this->person->homephonenumber:'未填写';?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 邮寄地址 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->person->postplace?$this->person->postplace:'未填写';?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 项目进度 </div>

													<div class="profile-info-value">
														<div class="progress">
																				<div class="progress-bar" style="width:<?php echo $this->mine->range->rangenum;?>%">
																					<span class="pull-left">已完成</span>
																					<span class="pull-right"><?php echo $this->mine->range->rangenum.'%';?></span>
																				</div>
														</div>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> 目前状态 </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about"><?php echo $this->mine->range->detail; ?></span>
													</div>
												</div>
											</div>
	</div>
	<div class="hr hr-40"></div>
    
    
	<div class="row">
														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="smaller">
																		<i class="icon-comments bigger-110"></i>
																		老师留言
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main">
																		<div class="well">
																			<h4 class="red"><?php echo $this->mine->teachernotification;?></h4>
																		</div>
																		
																	</div>
																</div>
															</div>
														</div>
                                                       <div class="col-xs-12 col-sm-6">
													        <div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="smaller">
																		<i class="icon-exchange bigger-110"></i>
																		联系方式
																	</h4>
																</div>

																	<div class="tabbable tabs-left">
																			<ul class="nav nav-tabs" id="myTab3">
																				<li class="active">
																					<a data-toggle="tab" href="#home3">
																						<i class="pink icon-location-arrow bigger-110"></i>
																						地址
																					</a>
																				</li>

																				<li class="">
																					<a data-toggle="tab" href="#profile3">
																						<i class="blue icon-globe bigger-110"></i>
																						在线咨询
																					</a>
																				</li>

																				<li class="">
																					<a data-toggle="tab" href="#dropdown13">
																						<i class="icon-phone"></i>
																						咨询热线
																					</a>
																				</li>
																			</ul>

																			<div class="tab-content">
																				<div id="home3" class="tab-pane active">
																					<p>川外山上行政楼B301；</p>
																					<p>西南大学南区行政楼612；</p>
																					<p>重庆大学虎溪校区综合楼113</p>
																					<p>重庆邮电大学国际处</p>
																				</div>

																				<div id="profile3" class="tab-pane">
																					<!--<p>微博账号:<a href="http://weibo.com/u/5150312763">美国实习-重庆</a></p>
																					<p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=578721802&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:419448909:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p>
																				    --->
																					<span class="green">微信二维码</span>
																					<img src="<?php echo Yii::app()->baseUrl.'/images/wechat.jpg'?>" class="img-responsive" style="display:inline;max-width:25%">
																					   <span class="orange">微博二维码</span>
																					<img src="<?php echo Yii::app()->baseUrl.'/images/weibo.png'?>" class="img-responsive" style="display:inline;max-width:25%">
																				</div>

																				<div id="dropdown13" class="tab-pane">
																					<p>023-63811110</p>
																					<p>023-63813089</p>
																				</div>
																			</div>
																	</div>
													   </div>
														
                                                </div>
	</div>
	<div class="hr hr-24"></div>
	<div class="well">
	<div class="row">
	  
	  <div class="col-xs-2"><a href="">电子行程单</a></div><div class="col-xs-8"></div><div class="col-xs-2"><a href="<?php echo Yii::app()->createUrl('stumain/flight');?>" target="_blank">编辑</a></div>
	  </div>
	</div>
	<hr>
  <div class="row">
														<div class="col-xs-12 col-sm-12">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="smaller">
																		<i class="icon-check bigger-110"></i>
																		通知公告
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main">
																		<p>
																		 <div class="alert alert-info">
																				<strong class="red"><?php echo $this->adminNotice->detail; ?></strong>
																		</div>
																			
																		</p>
																		
																	</div>
																</div>
															</div>
														</div>
										
														
</div>
<hr>
<div class="row">
<div class="col-sm-12">
					<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="smaller">
																		<i class="icon-download bigger-110"></i>
																		点击文件名即可下载文件
																	</h4>
																</div>

												<div class="widget-body">
														<div class="widget-main">
													<?php 
													   $this->renderPartial('_filetable',array('models'=>$models,'stu'=>$stu));
													?>
													
														</div>
												</div>
				</div>			
																
							
							
											
</div>	
<script type="text/javascript">
$(document).ready(function(){
<?php
     if(Yii::app()->user->hasFlash('notice')){
	    echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
	 }
 ?>
    var data = new Array();
   <?php
     if($models != 'exchange'){
       foreach($models as $m){
	         echo "data['".$m->adminFilesId."'] = new Array();";
		    echo "data['".$m->adminFilesId."'][0] = \"".str_replace("\r\n","",$m->message)."\";";
			 echo "data['".$m->adminFilesId."'][1] = \"".$m->name."\";";
			 
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
  

       ////////////////////////
		$('[data-rel=tooltip]').tooltip();

});
</script>												