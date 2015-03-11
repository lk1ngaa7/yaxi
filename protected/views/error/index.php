<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="error-container">
									<div class="well">
										<h1 class="grey lighter smaller">
											<span class="blue bigger-125">
												<i class="icon-remove icon-animated-remove"></i>
												wo!wo! Something Went Wrong
											</span>
											<p>HTTP STATUS CODE : <?php echo $code; ?></p>
											<p>ERROR TYPE : <?php echo $type; ?></p>
											<p>ERROR MESSAGE:<?php echo CHtml::encode($message); ?></p>
										</h1>

										<hr>
										<h3 class="lighter smaller">
											
										</h3>

										<div class="space"></div>
									<!---
										<div>
											<h4 class="lighter smaller">Meanwhile, try one of the following:</h4>

											<ul class="list-unstyled spaced inline bigger-110 margin-15">
												<li>
													<i class="icon-hand-right blue"></i>
													Read the faq
												</li>

												<li>
													<i class="icon-hand-right blue"></i>
													Give us more info on how this specific error occurred!
												</li>
											</ul>
										</div>
									----->
										<hr>
										<div class="space"></div>

										<div class="center">
											<a href="<?php if(Yii::app()->user->rights == 1)$url = 'stumain/index';else $url = 'adminmain/index'; echo Yii::app()->createUrl($url);?>" class="btn btn-grey" >
												<i class="icon-arrow-left"></i>
												返回首页
											</a>

							
											<a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=mK2voK_qqaCoqtjp6bb79-U" style="text-decoration:none;" class="btn btn-primary" >
											<i class="icon-envelope"></i>
												给管理员发送邮件
											</a>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div>