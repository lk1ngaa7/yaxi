<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/date-time/bootstrap-datepicker.min.js',2); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->params['static'].'assets/css/datepicker.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/validateEngine/jquery.validationEngine.min.js',2); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/validateEngine/jquery.validationEngine-zh_CN.js',2); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->params['static'].'assets/css/validationEngine.jquery.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->params['static'].'assets/js/date-time/moment.min.js',2); ?>

<div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#home4">出国</a>
												</li>

												<li class="">
													<a data-toggle="tab" href="#profile4">回国</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#profile5">上传电子行程单</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="home4" class="tab-pane active">
												<?php 
												  $a = array('出发','中转','到达');
												for($i=0;$i<3;$i++){
												  echo '<h3 class="green">'.$a[$i].'</h3>';
													echo '<form class="form-horizontal" id="form_person" name="person" method = "post" action="'.Yii::app()->createUrl('stumain/addflight').'">
													    <div class="form-group">
														<input name="go[type]" type="hidden" value="'.$i.'"> 
														   <div class="col-sm-2">
																 <label for="" class="control-label">出发机场</label>
																 <input type="text" class="form-control" id=""  name="go[from]" value="'.$go[$i]->from.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">目的机场</label>
																 <input type="text" class="form-control" id=""  name="go[to]" value="'.$go[$i]->to.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">航班</label>
																 <input type="text" class="form-control" id=""  name="go[airline]" value="'.$go[$i]->airline.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">航班号</label>
																 <input type="text" class="form-control" id=""  name="go[flightnumber]" value="'.$go[$i]->flightnumber.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">出发日期</label>
																 <input type="text" class="form-control" data-type="date-picker" data-date-format="yyyy-mm-dd"  id="" name="go[depaturedate]" value="'.$go[$i]->depaturedate.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">到达日期</label>
																 <input type="text" class="form-control" data-type="date-picker" data-date-format="yyyy-mm-dd" id=""  name="go[arrivaldate]" value="'.$go[$i]->arrivaldate.'">
															</div>
														</div>
														<div class="form-group">
														   <div class="col-sm-3">
																 <label for="" class="control-label">出发时间</label>
																 <input type="text" class="form-control" data-rel="tooltip" data-original-title="具体到分钟" id=""  name="go[depaturetime]" value="'.$go[$i]->depaturetime.'">
															</div>
															 <div class="col-sm-3">
																 <label for="" class="control-label">到达时间</label>
																 <input type="text" class="form-control" data-rel="tooltip" data-original-title="具体到分钟" id="" name="go[arrivaltime]" value="'.$go[$i]->arrivaltime.'">
															</div>
															 <div class="col-sm-3">
																 <label for="" class="control-label">时长/h</label>
																 <input type="text" class="form-control" id=""  name="go[duration]" value="'.$go[$i]->duration.'">
															</div>
															 <div class="col-sm-3">
																   <label class="control-label">到达日</label>
																				  <div class="controls">
																					<select class="input-xlarge" name="go[arrivalday]">
																					  <option value="Monday">Mon</option>
																					  <option value="Sunday">Sun</option>
																					  <option value="Tuesday">Tue</option>
																					  <option value="Wednesday">Wed</option>
																					  <option value="Thursday">Thu</option>
																					  <option value="Friday">Fri</option>
																					  <option value="Saturday">Sat</option>
																					</select>
																				  </div>

															</div>
															
														</div>
														<div class="form-group">
															   <div class="col-sm-2">
																  <button type="submit" class="btn btn-info">提交</button>
																</div>
														 </div>
													</form><hr>';
													}
													?>
												</div>

												<div id="profile4" class="tab-pane">
												<?php 
												  $a = array('出发','中转','到达');
												for($i=0;$i<3;$i++){
												  echo '<h3 class="green">'.$a[$i].'</h3>';
													echo '<form class="form-horizontal" id="form_person" name="person" method = "post" action="'.Yii::app()->createUrl('stumain/addbackflight').'">
													    <div class="form-group">
														<input name="back[type]" type="hidden" value="'.$i.'"> 
														   <div class="col-sm-2">
																 <label for="" class="control-label">出发机场</label>
																 <input type="text" class="form-control" id=""  name="back[from]" value="'.$back[$i]->from.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">目的机场</label>
																 <input type="text" class="form-control" id=""  name="back[to]" value="'.$back[$i]->to.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">航班</label>
																 <input type="text" class="form-control" id=""  name="back[airline]" value="'.$back[$i]->airline.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">航班号</label>
																 <input type="text" class="form-control" id=""  name="back[flightnumber]" value="'.$back[$i]->flightnumber.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">出发日期</label>
																 <input type="text" class="form-control" data-type="date-picker" data-date-format="yyyy-mm-dd"  id="" name="back[depaturedate]" value="'.$back[$i]->depaturedate.'">
															</div>
															 <div class="col-sm-2">
																 <label for="" class="control-label">到达日期</label>
																 <input type="text" class="form-control" data-type="date-picker" data-date-format="yyyy-mm-dd" id=""  name="back[arrivaldate]" value="'.$back[$i]->arrivaldate.'">
															</div>
														</div>
														<div class="form-group">
														   <div class="col-sm-3">
																 <label for="" class="control-label">出发时间</label>
																 <input type="text" class="form-control" data-rel="tooltip" data-original-title="具体到分钟" id=""  name="back[depaturetime]" value="'.$back[$i]->depaturetime.'">
															</div>
															 <div class="col-sm-3">
																 <label for="" class="control-label">到达时间</label>
																 <input type="text" class="form-control" data-rel="tooltip" data-original-title="具体到分钟" id="" name="back[arrivaltime]" value="'.$back[$i]->arrivaltime.'">
															</div>
															 <div class="col-sm-3">
																 <label for="" class="control-label">时长/h</label>
																 <input type="text" class="form-control" id=""  name="back[duration]" value="'.$back[$i]->duration.'">
															</div>
															 <div class="col-sm-3">
																   <label class="control-label">到达日</label>
																				  <div class="controls">
																					<select class="input-xlarge" name="back[arrivalday]">
																					  <option value="Monday">Mon</option>
																					  <option value="Sunday">Sun</option>
																					  <option value="Tuesday">Tue</option>
																					  <option value="Wednesday">Wed</option>
																					  <option value="Thursday">Thu</option>
																					  <option value="Friday">Fri</option>
																					  <option value="Saturday">Sat</option>
																					</select>
																				  </div>

															</div>
															
														</div>
														<div class="form-group">
															   <div class="col-sm-2">
																  <button type="submit" class="btn btn-info">提交</button>
																</div>
														 </div>
													</form><hr>';
													}
													?>
													
												</div>
												<div id="profile5" class="tab-pane">
												  <form class="form-horizontal" method="post" action ="<?php echo Yii::app()->createUrl('stumain/uploadflight');?>" enctype="multipart/form-data">
												    <div class="form-group">
													   <div class="col-sm-2">
													     <label for="" class="control-label">选择文件</label>
														 <input type="file" class="form-control" name="flight">
													   </div>
													   <div class="col-sm-10"><h3 class="red">上传电子行程单的截图(小于3M),格式：JPEG,PNG,GIF,JPG</h3></div>
													</div> 
													<div class="form-group">
													  <div class="col-sm-2">
														<button type="submit" class="btn btn-info">提交</button>
													  </div>
													</div> 
												  </form>
												  <?php
												  if($stu->flightimage){
												  echo '<hr>
												  <div class="well">
												    <img class="img-responsive" src="'.Yii::app()->params["files"].$stu->flightimage.'">
												  </div>
												</div>';
												}?>
											</div>
										</div>
									</div>
<script type="text/javascript"> 
$(document).ready(function(){
<?php
   if(Yii::app()->user->hasFlash('flightError'))
     echo 'alert("'.Yii::app()->user->getFlash("flightError").'");';
?>
 $(":input").change(function(){
	   if($(this).val() == '')
	     $(this).attr("value","");
	});
	 $('[data-type=date-picker]').datepicker();
	 $('[data-rel=popover]').popover({container:'body'});
   
	  $('[data-rel=tooltip]').tooltip({container:'body'});


  });

</script>									