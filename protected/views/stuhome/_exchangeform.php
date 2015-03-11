  <form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('stuhome/addexchange',array('id'=>$this->stuInfo->uId));?>">
  <div class="well">
    <h4 class="green">学生信息更新</h4>
		<div class="form-group">
	<div class="col-sm-2">
	    <label for="" class="control-label">学习时间：</label>
		<input class="form-control" id="" data-type="date-range-picker" type="text" name="studytime" value="<?php echo $this->formModel->studytime;?>" >
	</div>
		 <div class="col-sm-2">
			<label for="" class="control-label">所学专业</label>
			<input  type="text" class="form-control" name = "major" value="<?php echo $this->formModel->major;?>">
		</div>
		 <div class="col-sm-2">
			<label for="" class="control-label">可转学分</label>
			<input  type="text" class="form-control" name="academiccredit" value="<?php echo $this->formModel->academiccredit;?>" >
		</div>
		
		 <div class="col-sm-3">
			 <label for="" class="control-label">学校联系人 姓名</label>
			 <input type="text" class="form-control" name="schoolname" value="<?php echo $this->formModel->schoolname;?>" placeholder="">
		</div>
		<div class="col-sm-3">
			 <label for="" class="control-label">学校联系人 联系方式</label>
			 <input  type="text" class="form-control" name="schoolcommunication" value="<?php echo $this->formModel->schoolcommunication;?>" placeholder="">
		</div>
	</div>
  <div class="form-group">
	   <div class="col-sm-2" >
		 <label for="" class="control-label">住宿家庭地址</label>
		 <input type="text" class="form-control " name="homeplace" value="<?php echo $this->formModel->homeplace;?>" id="">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">住宿家庭条件</label>
		<input  type="text" class="form-control" name = "homecondition" value="<?php echo $this->formModel->homecondition;?>">
    </div>
	 <div class="col-sm-3">
			 <label for="" class="control-label">住宿家庭联系人 姓名</label>
			 <input type="text" class="form-control" name="homename" value="<?php echo $this->formModel->homename;?>" placeholder="">
		</div>
		<div class="col-sm-3">
			 <label for="" class="control-label">住宿家庭联系人 联系方式</label>
			 <input  type="text" class="form-control" name="homecommunication" value="<?php echo $this->formModel->homecommunication;?>" placeholder="">
		</div>
  
	 <div class="col-sm-2">
		 <label for="" class="control-label">上课交通方式</label>
		 <input type="text" class="form-control" name="transportation" value="<?php echo $this->formModel->transportation;?>" placeholder="">
    </div>
	
  </div>
  <div class="form-group">
    <div class="col-sm-2">
		  <button type="submit" class="btn btn-info">保存</button>
    </div>
  </div>
	 
 </div>
</form>