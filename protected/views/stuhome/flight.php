<div class="well"><h3 class="green"><span class="blue"><?php echo $stu->realname ;?></span> 同学的电子行程单</h3></div>
<div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#home4">出国</a>
												</li>

												<li>
													<a data-toggle="tab" href="#profile4">回国</a>
												</li>

												<li>
													<a data-toggle="tab" href="#dropdown14">电子行程单</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="home4" class="tab-pane in active">
													<?php
													 $attr = array_keys(Flight::model()->attributeLabels());
													 array_splice($attr,0,4);
													 $s = array('出发','中转','到达');
													 $i= 0; 
													 foreach($go as $model){
													 echo '<h3 class="blue">'.$s[$i++].'</h3>';
													 $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'attributes'=>$attr,
														'cssFile'=>false,
														'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
													  ));
													  echo '<hr>';
													}
													?>
												</div>

												<div id="profile4" class="tab-pane">
													<?php
													 $attr = array_keys(Flight::model()->attributeLabels());
													 array_splice($attr,0,4);
													 $s = array('出发','中转','到达');
													 $i= 0; 
													 foreach($back as $model){
													 echo '<h3 class="blue">'.$s[$i++].'</h3>';
													 $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'attributes'=>$attr,
														'cssFile'=>false,
														'htmlOptions'=>array('class'=>'table table-bordered table-striped table-hover'),
													  ));
													  echo '<hr>';
													}
													?>
												</div>

												<div id="dropdown14" class="tab-pane">
													<?php if($stu->flightimage){
													    echo '<img class="img-responsive" src="'.Yii::app()->params["files"].$stu->flightimage.'">';
													     }else{
														    echo '<h3 class="red">没有上传电子行程单</h3>';
														 }
													?>
												</div>
											</div>
										</div>
									</div>
