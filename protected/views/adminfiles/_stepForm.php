															   <div class="form-group center">
																        <label class="control-label">文件类型</label>
																			  <div class="controls">

																				<!-- Inline Radios -->
																				<label class="radio inline">
																				  <input type="radio" value="uploadTemp" id="uploadTempRadio" checked="checked" name="fileType">
																				  上传模板
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="addItem" id="addFileRadio" name="fileType">
																				  添加文件条目
																				</label>
																				
																			  </div>
																 </div>
															<div id="temp" >
															   <div class="form-group center">
                                                                   	<div class="col-xs-4">
																	</div>
																    <div class="col-xs-4">
																	<label class="control-label">选择文件</label>
                                                                  
																	  <!-- File Upload -->
																	  <div class="controls">
																		<input class="form-control" id="fileInput" type="file">
																	  </div>
																	  </div>
																</div>
																<div class="form-group center">

																	  <!-- Textarea -->
																	  <label class="control-label" >添加备注(办理方式)</label>
																	  <div class="controls">
																		<div class="textarea">
																			  <textarea type="" class="" rows="5" cols="30" placeholder="此项非必填项" > </textarea>
																		</div>
																	  </div>
																</div>
																<div class="form-group center">
																         <!-- Select Multiple -->
																	  <label class="control-label">选择项目(多选)</label>
																	  <div class="controls">
																		<select class="input-xlarge" multiple="multiple">
																		  <option>签证材料</option>
																		  <option>帮助材料</option>
																		  <option>配岗材料</option>
																		 
																		</select>
																	  </div>

																</div>
																</div>
																<div id="item" style="display:none;">
																 <div class="form-group center">

																	  <!-- Textarea -->
																	  <label class="control-label" >文件名称</label>
																	  <div class="controls">
																		<div class="textarea">
																			  <input type="text" class="" placeholder="此项非必填项" />
																		</div>
																	  </div>
																</div>
																<div class="form-group center">

																	  <!-- Textarea -->
																	  <label class="control-label" >添加备注(办理方式)</label>
																	  <div class="controls">
																		<div class="textarea">
																			  <textarea type="" class="" rows="5" cols="30" placeholder="此项非必填项" > </textarea>
																		</div>
																	  </div>
																</div>
																<div class="form-group center">
																  <label class="control-label">选择项目(多选)</label>
																	  <div class="controls">
																		<select class="input-xlarge" multiple="multiple">
																		  <option>签证材料</option>
																		  <option>帮助材料</option>
																		  <option>配岗材料</option>
																		 
																		</select>
																	  </div>

																</div>
																<div class="form-group center">
																        <label class="control-label">文件动作（教师）</label>
																			  <div class="controls">

																				<!-- Inline Radios -->
																				<label class="radio inline">
																				  <input type="radio" value="noAction" id="" checked="checked" name="fileActionTea">
																				  无
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="uploadAtDetail" id="" name="fileActionTea">
																				  在详情页面上传
																				</label>
																				
																			  </div>
																 </div>
																<div id="noAction">
																<div class="form-group center">
																        <label class="control-label">文件动作（学生）</label>
																			  <div class="controls">

																				<!-- Inline Radios -->
																				<label class="radio inline">
																				  <input type="radio" value="uploadTemp" id="" checked="checked" name="fileActionStu">
																				  上传
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="addItem" id="" name="fileActionStu">
																				  确认
																				</label>
																				
																			  </div>
																 </div>
																 </div>
																 <div id="uploadAtDetail" style="display:none;">
																 <div class="form-group center">
																        <label class="control-label">文件动作（学生）</label>
																			  <div class="controls">

																				<!-- Inline Radios -->
																				<label class="radio inline">
																				  <input type="radio" value="uploadTemp" id="" checked="checked" name="fileActionStu">
																				  只是下载
																				</label>
																				<label class="radio inline">
																				  <input type="radio" value="addItem" id="" name="fileActionStu">
																				  下载&上传
																				</label>
																				
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