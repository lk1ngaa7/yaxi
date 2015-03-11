<form class="form-horizontal" role="form"  method="get" action="<?php echo Yii::app()->createUrl('adminmain/search');?>">
				<div class="form-group">
								<div class="col-sm-2">
									<label for="" class="control-label">学校名称</label>
									<input type="text" class="form-control" id="" name="schoolname" placeholder="学校名称">
								</div>
								<div class="col-sm-2">
									<label for="" class="control-label">电话号码</label>
									<input type="text" class="form-control" name="phonenumber" placeholder="电话号码">
								</div>
								<div class="col-sm-2">
									<label for="" class="control-label">姓名</label>
									<input type="text" class="form-control" name="realname" placeholder="姓名">
								</div>
																
								<?php
								 $admin='';
								  foreach($this->adminList as $a){
									$admin.= '<option value="'.$a['uId'].'">'.$a['realname'].'</option>';
									}
								if(Yii::app()->user->rights == 3)
									echo '<div class="col-sm-2">
										<label for="" class="control-label">管理员：</label>
										<select class="form-control" name="belongtouid">
																	<option value="">ALL</option>
										'.$admin.'							
										 </select>
									</div>'
								?>
								<div class="col-sm-<?php echo Yii::app()->user->rights==2? '3':'1';?>">
									<label for="" class="control-label">项目：</label>
									<select class="form-control" name = "proId">
																<option value="">ALL</option>
																<?php
																   foreach($this->proList as $p){
																       echo '<option value="'.$p['proId'].'">'.$p['proName'].'</option>';
																   }
																?>
																
								    </select>
								</div>
								<div class="col-sm-3">
									<label for="" class="control-label">出发时间 : </label><br>
								    <input name="starttime" class="date-picker" data-type="date-picker" type="text" data-date-format="yyyy-mm" />
								</div>
								
                                  
				</div>
				<div class="form-group">
				<div class="col-sm-8">
									<label for="" class="control-label">附属选项：</label>
								     
									 <div class="controls">
											<label class="checkbox inline">
											<input type="checkbox" name="addition[ispeigang]" value="0"> 未配岗
											</label>
											<label class="checkbox inline">
											  <input type="checkbox" name="addition[issignpaid]" value="0"> 未交报名费
											</label>
										   <label class="checkbox inline">
											  <input type="checkbox" name="addition[isprojectpaid]" value="0"> 未交项目费
											</label>
									</div>
				</div>
				<div class="col-sm-4 center">
				   <br>
				    <button class="btn btn-primary" type="submit"><i class="icon-search">查询</i></button>
					 <?php if(Yii::app()->user->rights==3)echo'<button class="btn btn-primary" type="button" id="noticeform"><i class="icon-bullhorn">添加系统通知</i></button>';?>
				</div>
				  
				</div>
</form>				