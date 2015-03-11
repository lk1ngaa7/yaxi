<!DOCTYPE html>
<html lang="zh_cn">

	<head>
		<meta charset="utf-8" />
		<title>亚西教育管理系统</title>
		 <meta name="renderer" content="webkit"> 
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
		<meta content="IE=10,chrome=1" http-equiv="X-UA-Compatible">
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

		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
			<script src="<?php echo Yii::app()->params['static']; ?>assets/js/jquery-1.10.2.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo Yii::app()->params['static']; ?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='<?php echo Yii::app()->params['static']; ?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<!-- ace settings handler -->

		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo Yii::app()->params['static']; ?>assets/js/respond.min.js"></script>
		
			<link href="<?php echo Yii::app()->params['static']; ?>assets/js/cross-domain/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
			<link href="<?php echo Yii::app()->baseUrl; ?>/assets/js/cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
			<script src="<?php echo Yii::app()->baseUrl; ?>/assets/js/cross-domain/respond.proxy.js"></script>
			
		<![endif]-->
		
	</head>

	<body>
	
		<?php $this->beginContent('//layouts/navbar'); ?>

	   

       <?php $this->endContent(); ?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>
              
				<?php 
				if(Yii::app()->user->rights==1)
				$this->beginContent('//layouts/sidebar'); 
				else 
				$this->beginContent('//layouts/sidebar_admin'); 
				?>
               
				<?php $this->endContent(); ?>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
						
						<?php 
						  $this->widget('zii.widgets.CBreadcrumbs', array(
								'links'=>$this->breadcrumbs,
							));

						?>
                      <!---
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Other Pages</a>
							</li>
							<li class="active">Blank Page</li>
						</ul><!-- .breadcrumb -->
                      <!---   preparing for deleting
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						
							
								<!-- PAGE CONTENT BEGINS -->
									<?php echo $content; ?>
								<!-- PAGE CONTENT ENDS -->
							<!-- /.col -->
						<!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
                 <?php $this->beginContent('//layouts/setting'); ?>

				

				<?php $this->endContent(); ?>
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

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

</body>
</html>
