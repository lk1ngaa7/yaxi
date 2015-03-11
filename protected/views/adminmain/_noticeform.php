<div class="widget-box transparent" id="noticeForm" style="display:none;">
					<div class="widget-header widget-header-small">
								<h4 class="smaller">
							      <i class="icon-bullhorn bigger-110"></i>
												系统通知
								</h4>
								<a href="#"><i class="icon-remove" id="removeForm" style="text-align:right"></i></a>
					</div>

					<div class="widget-body">
							<div class="widget-main">
									 <form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('adminmain/addnotice');?>" method="post" > 
											<div class="form-group center">
											   <div class="col-sm-12">
												<label for="" class="control-label">选择项目：</label>
												 
												 <div class="controls">
												       <label class="checkbox inline">
														  <input type="checkbox" name="noticeGroup[All]" value="4"> ALL
														</label>
														<label class="checkbox inline">
														<input type="checkbox" name="noticeGroup[]" value="2"> EXCHANGE
														</label>
														<label class="checkbox inline">
														  <input type="checkbox" name="noticeGroup[]" value="3"> STEP
														</label>
													   <label class="checkbox inline">
														  <input type="checkbox" name="noticeGroup[]" value="1"> ITP
														</label>
												</div>
												</div>
									       </div>
											<div class="form-group center">
											    <textarea name="adminnotice" cols="120" rows="5" ></textarea>
									       </div>
											 <div class="form-group center">
											 <button  type="submit" class="btn btn-success"><i class="icon-edit align-top bigger-125"></i>提交</button>
										    </div>
									</form>
								</div>
					</div>
	</div>