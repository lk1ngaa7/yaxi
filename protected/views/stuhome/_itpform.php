  <form class="form-horizontal" method="post" action="<?php echo  Yii::app()->createUrl('stuhome/additp',array('id'=>$this->stuInfo->uId));?>">
  <div class="well">
    <h4 class="green">学生信息更新</h4>
		<div class="form-group">
		   <div class="col-sm-2">
			 <label for="" class="control-label">公司名称</label>
			 <input  type="text" class="form-control " name="companyname" value="<?php echo $this->formModel->companyname; ?>" id="">
		</div>
		 <div class="col-sm-2">
			<label for="" class="control-label">工作地点</label>
			<input  type="text" class="form-control" name = "workplace" value="<?php echo $this->formModel->workplace; ?>">
		</div>
		 <div class="col-sm-2">
			<label for="" class="control-label">工作类别</label>
			<input  type="text" class="form-control" name="jobtype" value="<?php echo $this->formModel->jobtype; ?>" >
		</div>
		
		<div class="col-sm-2">
			<label for="" class="control-label">职务</label>
			<input   type="text" class="form-control" name="position" value="<?php echo $this->formModel->position;?>" >
		</div>
		 <div class="col-sm-2">
			 <label for="" class="control-label">在美联系人 姓名</label>
			 <input type="text" class="form-control" name="americaname"  value="<?php echo $this->formModel->americaname; ?>" placeholder="">
		</div>
		<div class="col-sm-2">
			 <label for="" class="control-label">在美联系人 联系方式</label>
			 <input  type="text" class="form-control" name="americacommunication" value="<?php echo $this->formModel->americacommunication; ?>" placeholder="">
		</div>
	</div>
  <div class="form-group">
	   <div class="col-sm-2">
		 <label for="" class="control-label">住宿方式</label>
		 <input data-rel="tooltip" data-original-title="学生自找、我方协助、备注" type="text" class="form-control " name="hometype" value="<?php echo $this->formModel->hometype; ?>"id="">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">住宿地址</label>
		<input  type="text" class="form-control" name = "homeplace" value="<?php echo $this->formModel->homeplace; ?>">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">住宿条件</label>
		<input  type="text" class="form-control" name="homecondition" value="<?php echo $this->formModel->homecondition; ?>" >
    </div>
	<div class="col-sm-2">
		<label for="" class="control-label">同住人姓名</label>
		<input   type="text" class="form-control" name="partnername" value="<?php echo $this->formModel->partnername; ?>" >
    </div>
    <div class="col-sm-2">
		<label for="" class="control-label">同住人联系方式</label>
		<input   type="text" class="form-control" name="partnercommunication" value="<?php echo $this->formModel->partnercommunication; ?>" >
    </div>
	 <div class="col-sm-2">
		 <label for="" class="control-label">上班交通方式</label>
		 <input type="text" class="form-control" name="transportation" value="<?php echo $this->formModel->transportation; ?>"  placeholder="">
    </div>
	
  </div>
  <div class="form-group">
    <div class="col-sm-2">
		  <button type="submit" class="btn btn-info">保存</button>
    </div>
  </div>
	 
 </div>
</form>