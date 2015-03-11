<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->
                         
					<ul class="nav nav-list">
						<li class="<?php echo $this->activateArray[0];?>">
							<a href="<? echo Yii::app()->createUrl('stumain/index');?>">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 首页 </span>
							</a>
						</li>
						<li class="<?php echo $this->activateArray[1];?>">
							<a href="<? echo Yii::app()->createUrl('stuform/index');?>">
								<i class="icon-edit"></i>
								<span class="menu-text"> 报名表 </span>
							</a>
						</li>
						<li class="<?php echo $this->activateArray[2];?>">
							<a href="<? echo Yii::app()->createUrl('fileupload/index');?>">
								<i class="icon-cloud-upload"></i>
								<span class="menu-text"> 上传专区 </span>
							</a>
						</li>
						<li class="<?php echo $this->activateArray[3];?>">
							<a href="<?php echo Yii::app()->createUrl('filedownload/index');?>">
								<i class="icon-download"></i>
								<span class="menu-text"> 下载专区 </span>
							</a>
						</li>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>