<div class="well">
   <div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>level</th>
														<th>category</th>
														<th class="hidden-480">
														logtime
														</th>
														<th>
														 message
														</th>
													</tr>
												</thead>

												<tbody>
												<?php
											        foreach($models as $m){
													    echo '<tr><td>'.$m->level.'</td><td>'.$m->category.'</td><td>'.date('Y-m-d H:i:s',$m->logtime).'</td><td>'.$m->message.'</td></tr>';
													}
												 ?>
												
														
														
												</tbody>
											
											</table>
											 <div class="" style="text-align:center">
										     <?php 
											 $this->widget('CLinkPager',array( 
													'htmlOptions'=>array('class'=>'pagination'),
													'cssFile'=>false,
													'header'=>'',    
													'firstPageLabel' => '首页',    
													'lastPageLabel' => '末页',    
													'prevPageLabel' => '上一页',    
													'nextPageLabel' => '下一页',    
													'pages' => $page, 
													'maxButtonCount'=>13    
												)    
											);    
												
										?>
									</div>
							</div><!-- /.table-responsive -->
</div>