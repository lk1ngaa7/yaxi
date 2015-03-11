
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
												  $status_conform = array(array('success','confirm success'),array('info','not confirmed'));
												  $i = 0;
												foreach($models as $m){
													if($stu[$i]){
													  if($m->typeId != '3'){
													    $s[0] = $status[0][0];$s[1]  = $status[0][1];
													  }else{
													    $s[0] = $status_conform[0][0];$s[1]  = $status_conform[0][1];
													  }
													  $s[2] = $stu[$i]->addtime; 
													}else{
													   if($m->typeId != '3'){
													    $s[0] = $status[1][0];$s[1]  = $status[1][1];
													  }else{
													    $s[0] = $status_conform[1][0]; $s[1]  = $status_conform[1][1];
													  }
													  $s[2] = '没有上传或确认'; 
													}
													
													    $downloadUrl = $stu[$i]?$stu[$i]->url:'#';
														if($downloadUrl != '#'){
														  if($downloadUrl == 'conform'){
														      $downloadUrl = '#';
														   }else{
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
														<td >'.strtoupper($m->project->proName).'</td><td><button class="lk btn btn-info" id = "'.$m->adminFilesId.'">详情</button></td>
														<td >';
														if($m->typeId == '3'){
														 echo '<a href="'.Yii::app()->createUrl('fileupload/conform',array('id'=>$m->adminFilesId)).'"><button type="submit" class="btn btn-primary"><i class="icon-ok align-top bigger-125"></i>确认</button></a>';
														}else{
													     echo '<form method="post" action="'.Yii::app()->createUrl('fileupload/uploadfile',array('id'=>$m->adminFilesId)).'" enctype="multipart/form-data">
															<input name="token" type="hidden" value="<upload_token>">
														  <input name="file" type="file" class="form-control" />
														   <hr>
														  <button type="submit" class="btn btn-primary"><i class="icon-cloud-upload align-top bigger-125"></i>提交</button>
														</form>';
														}
													echo	'</td>
														
													</tr>';
													$i++;
													}
													?>

													</tbody>
											</table>
