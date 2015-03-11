<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>亚西教育管理系统</title>
		 <meta content="IE=10,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="renderer" content="webkit"> 
		
		<!-- basic styles -->

		<link href="<?php echo Yii::app()->params['static']; ?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo Yii::app()->params['static']; ?>assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo Yii::app()->params['static']; ?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo Yii::app()->params['static']; ?>assets/css/fontFamily.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo Yii::app()->params['static']; ?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->params['static']; ?>assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->params['static']; ?>assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo Yii::app()->params['static']; ?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
        <!--[if !IE]> -->

		<script type="text/javascript" src="<?php echo Yii::app()->params['static']; ?>assets/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
			<script type="text/javascript" src="<?php echo Yii::app()->params['static']; ?>assets/js/jquery-1.10.2.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo Yii::app()->params['static']; ?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script type="text/javascript" src='<?php echo Yii::app()->params['static']; ?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<!-- ace settings handler -->

		<script type="text/javascript" src="<?php echo Yii::app()->params['static']; ?>assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo Yii::app()->params['static']; ?>assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		
			<link href="<?php echo Yii::app()->params['static']; ?>assets/js/cross-domain/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
			<link href="assets/js/cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
			<script type="text/javascript" src="assets/js/cross-domain/respond.proxy.js"></script>
		<![endif]-->
		
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">亚西教育</span>
									<span class="white"></span>
								</h1>
								
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												输入用户名和密码
											</h4>

											<div class="space-6"></div>

											<form action="<?php echo Yii::app()->createUrl('login/auth');?>" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="UserId" name="userId" />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" name="password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
											<?php  
											 if($model->hasErrors()){
											 echo '<div class="social-or-login center">
													<span class="red bigger-110"><i class="icon-wrench icon-animated-wrench"></i>Error Message</span>
												</div>
												<div class="social-login center">
													'.CHtml::errorSummary($model).'
												</div>';
												}
											?>
											
										</div><!-- /widget-main -->

										
									</div><!-- /widget-body -->
								</div><!-- /login-box -->


							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<!-- basic scripts -->
       <script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo Yii::app()->params['static']; ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->

		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

</body>
</html>
