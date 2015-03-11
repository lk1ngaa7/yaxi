<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>名称</th>
														<th>状态</th>
														<th>上传时间</th>
														<th>项目类别</th>
														<th>办理方式</th>
														
														<th>Operation</th>
													</tr>
												</thead>

												<tbody>
												<?php
												  $status = array(array('success','uploaded success'),array('info','not upload'));
												  $status_conform = array(array('success','conform success'),array('info','not conformed'));
												  $i = 0;
												foreach($models as $m){
													if($stu[$i]){
													  if($m->typeId != '3'){
													   $s[0] = $status[0][0];$s[1]  = $status[0][1];
													    if($m->typeId == '5' || $m->typeId == '6'){
														   if($stu[$i]->isAdmin == '1'){
																	$s[0] = 'warning';
                                                                    $s[1]  = 'teacher '.$status[0][1];
														   }else{
														        $s[1]  = 'student '.$status[0][1];
														   }
														   
														}
													  }else{
													    $s[0] = $status_conform[0][0];$s[1]  = $status_conform[0][1];
															
													  }
													  
													  $s[2] = $stu[$i]->addtime; 
													}else{
													   if($m->typeId != '3'){
													    $s[0] = $status[1][0];$s[1]  = $status[1][1];
														if($m->typeId == '5' || $m->typeId == '6'){
																$s[0] = 'danger';
																 $s[1]  = 'teacher '.$status[1][1];
															}
													  }else{
													    $s[0] = $status_conform[1][0]; $s[1]  = $status_conform[1][1];
													  }
													  $s[2] = '没有上传或确认'; 
													}
													if(in_array($m->typeId,array('2','3','4','5','6'))){
													    $downloadUrl = $stu[$i]?$stu[$i]->url:'#';
														if($downloadUrl != '#'){
														   $downloadUrl .= '"  target = "_blank"' ;
														   $downloadUrl = Yii::app()->params['files'].$downloadUrl;
														}
													}
												echo '	<tr>
													<td>
															<a href="'.$downloadUrl.'">'.$m->name.'</a>
														</td>
														<td class="hidden-480" ><span class="label label-'.$s[0].' arrowed">'.$s[1].'</span></td>
														<td >'.$s[2].'</td>
														<td >'.$m->project->proName.'</td><td><button class="lk btn btn-info" id = "'.$m->adminFilesId.'">详情</button></td>
														<td >';
														if($m->typeId == '5'){
														if($stu[$i] !== null)
														   echo '<a href="'.$stu[$i]->url.'"><button type="submit" class="btn btn-primary"><i class="icon-cloud-download align-top bigger-125"></i>下载</button></a>';
														 else
														   echo '<button type="submit" class="btn btn-primary"><i class="icon-remove align-top bigger-125"></i>还没上传呀</button>';
														}else{
														if($stu[$i]!=null){
													     echo '<form method="post" action="'.Yii::app()->createUrl('stumain/uploadfile',array('id'=>$m->adminFilesId)).'" enctype="multipart/form-data">
															<input name="token" type="hidden" value="<upload_token>">
														  <input name="file" type="file" class="form-control" />
														   <hr>
														  <button type="submit" class="btn btn-primary"><i class="icon-cloud-upload align-top bigger-125"></i>提交</button>
														</form>';
														}else{
														     echo '<button type="submit" class="btn btn-primary"><i class="icon-remove align-top bigger-125"></i>还没上传呀</button>';
														}
														
														}
													echo '</td>
														
													</tr>';
													$i++;
													}
													?>

													</tbody>
											</table>