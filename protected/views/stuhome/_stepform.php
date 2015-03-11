  <form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('stuhome/addstep',array('id'=>$this->stuInfo->uId));?>">
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
			<input   type="text" class="form-control" name="position" value="<?php echo $this->formModel->position; ?>">
		</div>
		 <div class="col-sm-2">
			 <label for="" class="control-label">Coordinator 姓名</label>
			 <input type="text" class="form-control" name="coordinatorname" value="<?php echo $this->formModel->coordinatorname; ?>" placeholder="">
		</div>
		<div class="col-sm-2">
			 <label for="" class="control-label">Coordinator 联系方式</label>
			 <input  type="text" class="form-control" name="coordinatorcommunication" value="<?php echo $this->formModel->coordinatorcommunication; ?>" placeholder="">
		</div>
	</div>
  <div class="form-group">
	   <div class="col-sm-2">
		 <label for="" class="control-label">寄宿家庭住址</label>
		 <input  type="text" class="form-control " name="homeplace" value="<?php echo $this->formModel->homeplace; ?>" id="">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">寄宿家庭条件</label>
		<input  type="text" class="form-control" name = "homecondition" value="<?php echo $this->formModel->homecondition; ?>">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">寄宿家庭联系人姓名</label>
		<input  type="text" class="form-control" name="homename" value="<?php echo $this->formModel->homename; ?>" >
    </div>
	
    <div class="col-sm-3">
		<label for="" class="control-label">寄宿家庭联系方式</label>
		<input   type="text" class="form-control" name="homecommunication" value="<?php echo $this->formModel->homecommunication; ?>" >
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">上班交通方式</label>
		 <input type="text" class="form-control" name="transportation" value="<?php echo $this->formModel->transportation; ?>" placeholder="">
    </div>
	
  </div>
  <div class="form-group">
    <div class="col-sm-2">
		  <button type="submit" class="btn btn-info">保存</button>
    </div>
  </div>
	 
 </div>
</form>