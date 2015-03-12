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
							<a href="<?php echo Yii::app()->createUrl('adminmain/index');?>">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 管理员首页 </span>
							</a>
						</li>
						<li class="<?php echo $this->activateArray[1];?>">
							<a href="<?php echo Yii::app()->createUrl('adminstu/index');?>">
								<i class="icon-list"></i>
								<span class="menu-text"> 学生管理 </span>
							</a>
						</li>
						<?php
					     	 if(Yii::app()->user->rights==3)
							  echo
								'<li class="'.$this->activateArray[2].'">
									<a href="'.Yii::app()->createUrl("adminadmin/index").'">
										<i class="icon-male"></i>
										<span class="menu-text"> 管理员管理 </span>
									</a>
								</li>
								<li class="'.$this->activateArray[3].'">
									<a href="'.Yii::app()->createUrl("adminfiles/index").'">
										<i class="icon-file"></i>
										<span class="menu-text"> 文档管理 </span>
									</a>
								</li>
								<li class="'.$this->activateArray[4].'">
									<a href="'.Yii::app()->createUrl("adminexschool/index").'">
										<i class="icon-home"></i>
										<span class="menu-text"> 交换生学校管理 </span>
									</a>
								</li>';
						?>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>