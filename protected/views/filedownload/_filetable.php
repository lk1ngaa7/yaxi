<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>名称</th>
														<th>办理方式</th>
														<th>所属项目</th>
														<th>文档类型</th>
														<th>文档属性</th>
														<th>添加时间</th>
														
													</tr>
												</thead>

												<tbody>
													
														
                                                    <?php  
													    foreach($models as $m){
														    echo '<tr><td>
															<a title=""  href="'.Yii::app()->params['files'].$m->url.'" target="_blank">'.$m->name.'</a>
														</td>
														<td ><button class="lk btn btn-info" id = "'.$m->adminFilesId.'">详情</button></td><td>'.$m->project->proName.'</td><td>'.$m->category->categoryname.'</td><td>'.$m->typeD->typename.'</td>
														<td >'.$m->addtime.'</td>
														
													</tr>';
														}
													?>
														

													

												</tbody>
											</table>