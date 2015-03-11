<?php 
if(Yii::app()->user->project == 'STEP'){
		$practiceZone = array('','','');
		switch($stepjob->practicezone){
		 case '东海岸': $practiceZone[0] = 'checked="checked"';break;
		 case '西海岸': $practiceZone[1] = 'checked="checked"';break;
		 case '其他区域':$practiceZone[2] = 'checked="checked"';break;
		}
		$practiceWill = array('Business'=>'','ArtAndCulture'=>'','Education'=>'','Engineering'=>'');
		$pw = explode(',',$stepjob->americazone);
		foreach($pw as $e){
		  $practiceWill[$e] = 'checked="checked"';
		}
		$prioritzone = 'checked="checked"';
		$prioritjob = '';
		if($stepjob->prioritycondition === '工作意向'){
		  $prioritzone = '';
		   $prioritjob = 'checked="checked"';
		}
		$dormitoryRequirements = array('无吸烟者'=>'','无宠物'=>'','无幼儿'=>'','无残疾人'=>'');
		$dr  = explode(',',$stepjob->dormitoryrequirement);
		foreach($dr as $d){
		   $dormitoryRequirements[$d] = 'checked="checked"';
		}
		$pro_1 = 'checked="checked"';
		$pro_2 = '';
		if($stepjob->projectlength === '2'){
		  $pro_1 = '';
		   $pro_2 = 'checked="checked"';
		}
echo'
<form class="form-horizontal" method="post" action="'.Yii::app()->createUrl('stuform/jobstep').'">
<div class="well">
<h3>STEP</h3>
    <div class="form-group">
	     <div class="col-sm-2">
		 <label for="" class="control-label">英语程度：</label>
		 <input data-rel="tooltip" data-original-title="填写：初级，中级，高级" type="text" class="form-control validate[required]" name="englishlevel" value="'.$stepjob->englishlevel.'" placeholder="">
		</div>
	  <div class="col-sm-2">
		<label for="" class="control-label">英语学习时间/年</label>
		<input type="text" class="form-control validate[required,custom[number]]" id="" name="englishyear" value="'.$stepjob->englishyear.'" placeholder="英语学习时间/年">
     </div>
		  <div class="col-sm-3">
		          <label for="" class="control-label">实习意向区域</label>
		  <br>
		   <label class="radio inline">
              <input type="radio" value="东海岸" name="practicezone" '.$practiceZone[0].'>
              东海岸
            </label>
			<label class="radio inline">
              <input type="radio" value="西海岸" name="practicezone"  '.$practiceZone[1].'>
              西海岸
            </label>
			<label class="radio inline">
              <input type="radio" value="其他区域" name="practicezone"  '.$practiceZone[2].'>
              其他
            </label>
		 </div>
		 <div class="col-sm-5">
		 	<label for="" class="control-label">赴美实习意向：</label>
								     
									 <div class="controls">
											<label class="checkbox inline">
											<input name="america[]" class = "validate[minCheckbox[1]]" type="checkbox" value="Business" '.$practiceWill['Business'].'> Business
											</label>
											<label class="checkbox inline">
											  <input name="america[]" class = "validate[minCheckbox[1]]" type="checkbox" value="ArtAndCulture" '.$practiceWill['ArtAndCulture'].'> Art and Culture
											</label>
										   <label class="checkbox inline">
											  <input name="america[]" class = "validate[minCheckbox[1]]" type="checkbox" value="Education" '.$practiceWill['Education'].'> Education 
											</label>
											 <label class="checkbox inline">
											  <input name="america[]" class = "validate[minCheckbox[1]]" type="checkbox" value="Engineering" '.$practiceWill['Engineering'].'> Engineering
											</label>
									</div>
		 </div>
		 
	</div>
	<div class="form-group">
	 <div class="col-sm-3">
		          <label for="" class="control-label">优先考虑条件：</label>
		  <br>
		   <label class="radio inline">
              <input type="radio" value="意向区域" name="prioritycondition" '.$prioritzone.'>
              意向区域
            </label>
			<label class="radio inline">
              <input type="radio" value="工作意向" name="prioritycondition" '.$prioritjob.'>
              工作意向
            </label>
			<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="right" data-content="实习工作意向与意向区域矛盾冲突时优先考虑" title="" data-original-title="Help">?</span>
		 </div>
		  <div class="col-sm-4">
		 	<label for="" class="control-label">住宿要求：</label>
								     
									 <div class="controls">
											<label class="checkbox inline">
											<input name="dormitory[]" class = "validate[minCheckbox[1]]" type="checkbox" value="无吸烟者" '.$dormitoryRequirements['无吸烟者'].'> 无吸烟者
											</label>
											<label class="checkbox inline">
											  <input name="dormitory[]" class = "validate[minCheckbox[1]]" type="checkbox" value="无宠物" '.$dormitoryRequirements['无宠物'].'>无宠物
											</label>
										   <label class="checkbox inline">
											  <input name="dormitory[]" class = "validate[minCheckbox[1]]" type="checkbox" value="无幼儿" '.$dormitoryRequirements['无幼儿'].'> 无幼儿
											</label>
											 <label class="checkbox inline">
											  <input name="dormitory[]" class = "validate[minCheckbox[1]]" type="checkbox" value="无残疾人" '.$dormitoryRequirements['无残疾人'].'> 无残疾人
											</label>
									</div>
		 </div>
		 <div class="col-sm-2">
		     <label for="" class="control-label">项目时长选择</label>
			<br>
			<label class="radio inline">
              <input type="radio" value="1" name="projectlength"  '.$pro_1.'>
              1 个月
            </label>
			<label class="radio inline">
              <input type="radio" value="2" name="projectlength" '.$pro_2.'>
             2 个月
            </label>
		</div>
		  <div class="col-sm-3">
		 <label for="" class="control-label">其他条件：</label>
		 <input data-rel="tooltip" data-original-title="可根据个人生活习惯，针对以上几项详细描述" type="text" class="form-control" id="" name="othercondition" value="'.$stepjob->othercondition.'" placeholder="">
		</div>
	</div>
	<div class="form-group">
  <div class="alert alert-warning">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>
											<strong>注意！！</strong>
											<br>

											1、实习意向只能在以上四大类中选择，不可细化;<br>
											2、要求越灵活配岗时间越短，若要求过高，配岗时间将变长;<br>
											3、经过前期沟通交流工作offer下来之后如要换岗请缴纳300美金换岗费。

											<br>
										</div>
  </div>
</div>
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
</form>';
}else if(Yii::app()->user->project === 'ITP'){
   if($this->Projectlength != null)
   echo '<h4 class="blue">您上次的选择是'.$this->Projectlength['projectlength'].'个月</h4>';
   echo '<form class="form-horizontal" role="form" action="'.Yii::app()->createUrl('stuform/itpprojectlen').'" method="post" > 
          
		  <div class="form-group">
		  <div class="col-sm-12">
		 <label for="" class="control-label">项目时长选择</label>
		 <br>
		 <label class="radio inline">
              <input type="radio" value="6-12" name="projectlength" checked="checked">
              6 到 12 个月
            </label>
			<label class="radio inline">
              <input type="radio" value="12-18" name="projectlength">
             12 到 18 个月
            </label>
			
		</div>
		</div>
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
   '; 
}else{
  if($this->ExChoosedSchool){
     echo '<h4 class="blue">您上次的选择是'.$this->ExChoosedSchool['schoolname'].' 学校</h4>';
  }
  echo '<form class="form-horizontal" role="form" action="'.Yii::app()->createUrl('stuform/exschoolchoose').'" method="post" > 
         
		  <div class="from-group">

         <label class="form-label">选择学校</label>
          <div class="controls">
            <select class="input-xlarge" name="school">';
		foreach($this->ExSchoolArray as $s){
			echo '<option value="'.$s['schoolName'].','.$s['exSchoolId'].'">'.$s['schoolName'].'</option>';
			}
            
		echo	'</select>
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
   '; 
}

?>