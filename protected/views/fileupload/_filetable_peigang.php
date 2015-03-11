<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>名称/File Name</th>
														<th>状态/ Status</th>
														<th>上传时间/ Upload time</th>
														<th>项目类别/ Project</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php
												  $status = array(array('success','uploaded success'),array('info','not upload'));
												foreach($filename as $r){
													$s = $status[rand(21,99)%2];
													if($s[0]=='success')
													   $s[2] = date('Y-m-d H:i:s',rand(1413568954,1413268954));
													 else
													   $s[2] = '还没有上传奥';
												echo '	<tr>
													<td>
															<a href="#">'.$r.'</a>
														</td>
														<td class="hidden-480" ><span class="label label-'.$s[0].' arrowed">'.$s[1].'</span></td>
														<td >'.$s[2].'</td>
														<td >WAT</td>
														<td >
														<form method="post" action="http://up.qiniu.com/" enctype="multipart/form-data">
														  <input name="key" type="hidden" value="<resource_key>">
														  <input name="x:<custom_name>" type="hidden" value="<custom_value>">
														  <input name="token" type="hidden" value="<upload_token>">
														  <input name="file" type="file" class="form-control" />
														   <hr>
														  <button type="submit" class="btn btn-primary"><i class="icon-cloud-upload align-top bigger-125"></i>提交</button>
														</form>
														</td>
														
													</tr>';
													}
													?>
												<tr data-rel="tooltip" data-original-title="推荐在优酷，土豆，56等视频网站上传视频后在这里提交Url">
													<td>
															<a href="#">配岗视频</a>
														</td>
														<td class="hidden-480" ><span class="label label-info arrowed">没有上传</span></td>
														<td ></td>
														<td >WAT</td>
														<td >
														<form class="form-horizontal" role="form" action="" method="post">
														  <div class="form-group">
															  <div class="col-sm-12">
																<label for="" class="control-label">视频Url：</label>
																<input type="text" class="form-control" id="" placeholder="URL" >
															</div>
															</div>
														   <hr>
														  <button type="submit" class="btn btn-primary"><i class="icon-cloud-upload align-top bigger-125"></i>提交</button>
														</form>
														</td>
														
													</tr>
													</tbody>
											</table>
										<script type="text/javascript"> 
											$(document).ready(function(){
													 $('[data-rel=tooltip]').tooltip({container:'body'});
											});
										</script>