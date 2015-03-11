<form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('stuform/school')?>" method="post" > 
<div class="well">
<h4 class="green smaller lighter">学习经历</h4>
<hr>
   <h4 class="blue smaller lighter">学习背景(从高中开始至今)</h4>
   <div class="form-group">
   <div class="col-sm-3">
	    <label for="" class="control-label">时间：</label>
		<input class="form-control validate[groupRequired[history]]" id="h1" data-type="date-range-picker" type="text" name="h1[time]" value="<?php echo $studyhis[0]->time;?>">
	</div>
	<div class="col-sm-3">
		<label for="" class="control-label">所读学校名称：</label>
		<input  type="text" class="form-control validate[condRequired[h1]]" id="" placeholder="所读学校名称" name="h1[name]" value="<?php echo $studyhis[0]->name;?>">
	</div>
	 <div class="col-sm-3">
		<label for="" class="control-label">地址：</label>
		<input type="text" class="form-control validate[condRequired[h1]]" id="" placeholder="地址" name="h1[place]" value="<?php echo $studyhis[0]->place;?>">
	</div>
	<div class="col-sm-3">
		<label for="" class="control-label">邮编：</label>
		<input type="text" class="form-control validate[condRequired[h1]]" id="" placeholder="邮编" name="h1[zipcode]"value="<?php echo $studyhis[0]->zipcode;?>">
	</div>
	 
   </div>
   <div class="form-group">
   <div class="col-sm-3">
	    <label  class="control-label">时间：</label>
		<input class="form-control validate[groupRequired[history]]" id = "h2" data-type="date-range-picker" type="text" name="h2[time]" value="<?php echo $studyhis[1]->time;?>">
	</div>
	<div class="col-sm-3">
		<label for="" class="control-label">所读学校名称：</label>
		<input  type="text" class="form-control validate[condRequired[h2]]" id="" placeholder="所读学校名称" name="h2[name]" value="<?php echo $studyhis[1]->name;?>">
	</div>
	 <div class="col-sm-3">
		<label for="" class="control-label">地址：</label>
		<input type="text" class="form-control validate[condRequired[h2]]" id="" placeholder="地址" name="h2[place]" value="<?php echo $studyhis[1]->place;?>">
	</div>
	<div class="col-sm-3">
		<label for="" class="control-label">邮编：</label>
		<input type="text" class="form-control validate[condRequired[h2]]" id="" placeholder="邮编" name="h2[zipcode]"value="<?php echo $studyhis[1]->zipcode;?>">
	</div>
	 
   </div>
    <div class="form-group">
   <div class="col-sm-3">
	    <label for="" class="control-label">时间：</label>
		<input class="form-control validate[groupRequired[history]]" id="h3" data-type="date-range-picker" type="text" name="h3[time]" value="<?php echo $studyhis[2]->time;?>">
	</div>
	<div class="col-sm-3">
		<label for="" class="control-label">所读学校名称：</label>
		<input  type="text" class="form-control validate[condRequired[h3]]" id="" placeholder="所读学校名称" name="h3[name]" value="<?php echo $studyhis[2]->name;?>">
	</div>
	 <div class="col-sm-3">
		<label for="" class="control-label">地址：</label>
		<input type="text" class="form-control validate[condRequired[h3]]" id="" placeholder="地址" name="h3[place]" value="<?php echo $studyhis[2]->place;?>">
	</div>
	<div class="col-sm-3">
		<label for="" class="control-label">邮编：</label>
		<input type="text" class="form-control validate[condRequired[h3]]" id="" placeholder="邮编" name="h3[zipcode]"value="<?php echo $studyhis[2]->zipcode;?>">
	</div>
	 
   </div>
 <hr>
      <div class="form-group">
      <div class="col-sm-2">
		<label for="" class="control-label">所学专业：</label>
		<input type="text" class="form-control validate[required]" id="" placeholder="所学专业" name="major" value="<?php echo $school->major;?>">
	</div>
	<div class="col-sm-2">
		<label for="" class="control-label">辅修专业：</label>
		<input data-rel="tooltip" data-original-title="若无,则不需要填写" type="text" class="form-control" id="" placeholder="辅修专业" name="major_" value="<?php echo $school->major_;?>" >
	</div>
	 <div class="col-sm-2">
		<label for="" class="control-label">所处年级：</label>
		<input type="text" class="form-control validate[required]" id="" placeholder="所处年级" name="grade" value="<?php echo $school->grade;?>" >
	</div>
	<div class="col-sm-2">
		<label for="" class="control-label">学期：</label>
		<input type="text" class="form-control validate[required]" id="" placeholder="学期" name="semester" value="<?php echo $school->semester;?>">
	</div>
	 <div class="col-sm-2">
		<label for="" class="control-label">所在院系：</label>
		<input type="text" class="form-control validate[required]" id="" placeholder="所在院系" name="academy" value="<?php echo $school->academy;?>">
	</div>
	<div class="col-sm-2">
		<label for="" class="control-label">学制/年：</label>
		<input type="text" class="form-control validate[required]" id="" placeholder="学制/年" name="studyyear" value="<?php echo $school->studyyear;?>">
	</div>
   </div>
   <div class="form-group">
      <div class="col-sm-2">
		<label for="" class="control-label">辅导员姓名：</label>
		<input type="text" class="form-control validate[required]" id="" placeholder="辅导员姓名" name="assistantname" value="<?php echo $school->assistantname;?>">
	</div>
	<div class="col-sm-2">
		<label for="" class="control-label">辅导员联系方式：</label>
		<input type="text" class="form-control validate[required,custom[phone]]" id="" placeholder="辅导员联系方式" name="assistantphone" value="<?php echo $school->assistantphone;?>">
	</div>
	<div class="col-sm-8">
	<label for="" class="control-label">病史：</label>
		<input data-rel="tooltip" data-original-title="如果申请人有病史，请详述；否则不要填写" type="text" class="form-control" id="" placeholder="病史" name="diseasehistory" value="<?php echo $school->diseasehistory;?>">
	</div>
   </div>
 </div>
 <hr>
 <div class="form-group">
	   <div class="col-sm-2">
		  <button type="submit" class="btn btn-info">提交</button>
		</div>
		<div class="col-sm-10">
		 	<div class="controls">
				<label class="checkbox inline">
			    <input name="lk" class = "validate[minCheckbox[1]]" type="checkbox" value="7ReVfucBYLJrB1Pamzy7i4afGyuJZiR28RbvoNrIVB0_"> 以上信息均按照个人真实情况填写，我愿承担因本人提供信息不真实、不完整而导致签证申请失败的后果！
				</label>
		   </div>
		</div>
 </div>
</form>


