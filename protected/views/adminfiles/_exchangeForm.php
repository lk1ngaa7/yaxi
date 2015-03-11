															   <div class="form-group center">
																        <label class="control-label">文件类型</label>
																			  <div class="controls">
																				<label class="radio inline">
																				  <input type="radio" value="temp" radioType="uploadTempRadio" checked="checked" name="type">
																				  上传模板
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="item" radioType="addFileRadio" name="type">
																				  添加文件条目
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="help" radioType="addHelpRadio" name="type">
																				  帮助文档
																				</label>
																			  </div>
																 </div>
																 <div class="form-group center">
																   <label class="control-label">选择学校</label>
																   <div class="controls">
																	   <select class="input-xlarge" name="school">
																	   <?php
																	   foreach($this->ExSchoolArray as $s){
																			echo '<option value="'.$s['exSchoolId'].'">'.$s['schoolName'].'</option>';
																			}
																		?>
																	</select>
																</div>
																</div>
															<div class="Lktemp" >
															   <div class="form-group center">
                                                                   	<div class="col-xs-4">
																	</div>
																    <div class="col-xs-4">
																	<label class="control-label">选择文件</label>
                                                                  
																	  <!-- File Upload -->
																	  <div class="controls">
																		<input class="form-control" name = "templete" id="fileInput" type="file">
																	  </div>
																	  </div>
																</div>
																
																<div class="form-group center">

																	  <!-- Textarea -->
																	  <label class="control-label" >添加备注(办理方式)</label>
																	  <div class="controls">
																		<div class="textarea">
																			  <textarea type="" class="" rows="5" cols="30" name="message[temp]" > </textarea>
																		</div>
																	  </div>
																</div>
																<div class="form-group center">
																         <!-- Select Multiple -->
																	  <label class="control-label">选择项目(多选)</label>
																	  <div class="controls">
																		<select class="input-xlarge" name="cate[temp]">
																		  <option value="2">签证材料</option>
																	       <option value="4">学校申请材料</option>
																		 <option value="3">住宿材料</option>
																		</select>
																	  </div>

																</div>
															</div>
														   <div class="Lkitem" style="display:none;">
																 <div class="form-group center">

																	  <!-- Textarea -->
																	  <label class="control-label" >文件名称</label>
																	  <div class="controls">
																		<div class="textarea">
																			  <input type="text" class="" placeholder="必填" name="nameItem"/>
																		</div>
																	  </div>
																</div>
																<div class="form-group center">

																	  <!-- Textarea -->
																	  <label class="control-label" >添加备注(办理方式)</label>
																	  <div class="controls">
																		<div class="textarea">
																			  <textarea type="" class="" rows="5" cols="30" name="message[item]" > </textarea>
																		</div>
																	  </div>
																</div>
																<div class="form-group center">
																  <label class="control-label">选择项目(多选)</label>
																	  <div class="controls">
																		<select class="input-xlarge" name="cate[item]">
																		  <option value="2">签证材料</option>
																		  <option value="4">学校申请材料</option>
																		  <option value="3">住宿材料</option>
																		</select>
																	  </div>

																</div>
																<div class="form-group center">
																        <label class="control-label">文件动作（教师）</label>
																			  <div class="controls">

																				<!-- Inline Radios -->
																				<label class="radio inline">
																				  <input type="radio" value="no" id="" checked="checked" name="fileAction[t]">
																				  无
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="upload" id="uploadAtDetail_ex" name="fileAction[t]">
																				  在详情页面上传
																				</label>
																				
																			  </div>
																 </div>
																<div class="LknoAction">
																<div class="form-group center">
																        <label class="control-label">文件动作（学生）</label>
																			  <div class="controls">

																				<!-- Inline Radios -->
																				<label class="radio inline">
																				  <input type="radio" value="upload" id="" checked="checked" name="fileAction[s][no]">
																				  上传
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="conform" id="" name="fileAction[s][no]">
																				  确认
																				</label>
																				
																			  </div>
																 </div>
																 </div>
																 <div class="LkuploadAtDetail" style="display:none;">
																 <div class="form-group center">
																        <label class="control-label">文件动作（学生）</label>
																			  <div class="controls">

																				<!-- Inline Radios -->
																				<label class="radio inline">
																				  <input type="radio" value="onlyDownload" id="" checked="checked" name="fileAction[s][upload]">
																				  只是下载
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="downUp" id="" name="fileAction[s][upload]">
																				  下载&上传
																				</label>
																				
																			  </div>
																 </div>
																</div>
															</div>
															<div class="Lkhelp" style="display:none;">
															     <div class="form-group center">
                                                                   	<div class="col-xs-4">
																	</div>
																    <div class="col-xs-4">
																	<label class="control-label">选择文件</label>
                                                                  
																	  <!-- File Upload -->
																	  <div class="controls">
																		<input class="form-control" name="help" id="fileInput" type="file">
																	  </div>
																	  </div>
																</div>
																<div class="form-group center">

																	  <!-- Textarea -->
																	  <label class="control-label" >添加说明</label>
																	  <div class="controls">
																		<div class="textarea">
																			  <textarea type="" class="" rows="5" cols="30" name="message[help]" > </textarea>
																		</div>
																	  </div>
																</div>
																
															</div>
																<div class="form-group center">
																	  <label class="control-label"></label>
																	  <div class="controls">
																		<button class="btn btn-success" type="submit">提交</button>
																	  </div>
																</div>
