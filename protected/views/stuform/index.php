<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/date-time/bootstrap-datepicker.min.js',2); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->params['static'].'assets/css/datepicker.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/validateEngine/jquery.validationEngine.min.js',2); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/validateEngine/jquery.validationEngine-zh_CN.js',2); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->params['static'].'assets/css/validationEngine.jquery.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/date-time/daterangepicker.min.js',2); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->params['static'].'assets/css/daterangepicker.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/date-time/moment.min.js',2); ?>

   <div class="col-sm-12">
       <div class="alert alert-warning">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>
											<strong>Notice!</strong>
											<p>亲爱的同学，请您认真地填写这些表单。这些表单的信息的正确度及完成程度将直接影响你
											的项目办理进度。</p> <br><i class="icon-heart"></i>&nbsp;谢谢合作&nbsp;<i class="icon-heart"></i>
											
											<br>
									</div>
   </div>
<hr>
<div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#form1"><i class="icon-flag"></i>申请人个人及相关人信息</a>
												</li>

												<li class="">
													<a data-toggle="tab" href="#form2"><?php
													  if(Yii::app()->user->project == 'STEP')
													     echo '工作及兼职';
													  else if(Yii::app()->user->project == 'ITP')
													     echo '项目时长';
													  else
													     echo '学校选择';
													     
													?></a>
												</li>

												<li class="">
													<a data-toggle="tab" href="#form3">护照</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#form4">家庭</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#form5">学校信息&医疗和健康</a>
												</li>
												
												<li class="">
													<a data-toggle="tab" href="#form6"><i class="icon-flag"></i>签证及出境</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#form7">证明人</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="form1" class="tab-pane active">
													<?php echo $this->renderPartial('_personinfo',array('per'=>$per,'stu'=>$stu,'emergency'=>$emergency)); ?>
												</div>

												<div id="form2" class="tab-pane">
													<?php echo $this->renderPartial('_jobinfo',array('stepjob'=>$stepjob)); ?>
												</div>

												<div id="form3" class="tab-pane">
													<?php echo $this->renderPartial('_passportinfo',array('pass'=>$pass)); ?>
												</div>
												<div id="form4" class="tab-pane">
													<?php echo $this->renderPartial('_homeinfo',array('home'=>$home)); ?>
												</div>
												<div id="form5" class="tab-pane">
													<?php echo $this->renderPartial('_schoolinfo',array('school'=>$school,'studyhis'=>$studyhis)); ?>
												</div>
												<div id="form6" class="tab-pane">
													<?php echo $this->renderPartial('_visainfo',array('visa'=>$visa)); ?>
												</div>
												<div id="form7" class="tab-pane">
													<?php echo $this->renderPartial('_proofinfo',array('proof'=>$proof)); ?>
												</div>
											</div>
										</div>
</div>
