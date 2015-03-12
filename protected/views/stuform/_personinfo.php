<form class="form-horizontal" id="form_person" name="person" method = "post" action="<?php echo Yii::app()->createUrl('stuform/personinfo'); ?>">
 <div class="well">
    <h5 class="green">联系方式（我们会为你的个人信息负责，请你放心填写）</h5>
       <div class="form-group">
     <div class="col-sm-2">
		 <label for="" class="control-label">手机</label>
		 <input data-rel="tooltip" data-original-title="必填" type="text" class="form-control validate[required,custom[phone]]" name="phonenumber" id="" value="<?php echo $stu->phonenumber; ?>">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">个人Email</label>
		<input data-rel="tooltip" data-original-title="必填" type="text" class="form-control validate[required,custom[email]]" name = "email" value="<?php echo $stu->email;?>">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">QQ</label>
		<input data-rel="tooltip" data-original-title="填写以便于联系" type="text" class="form-control validate[custom[qq]]" name="qq" value="<?php echo $stu->qq;?>" placeholder="">
    </div>
	
    <div class="col-sm-3">
		<label for="" class="control-label">微信号</label>
		<input  data-rel="tooltip" data-original-title="填写以便于联系" type="text" class="form-control input-phone" name="wechat" value="<?php echo $stu->wechat?>" placeholder="">
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">微博号</label>
		 <input data-rel="tooltip" data-original-title="填写以便于联系" type="text" class="form-control" name="weibo"  value="<?php echo $stu->weibo ;?>" placeholder="">
    </div>
 </div>
 </div>
  <div class="form-group">
   <div class="col-sm-2">
		<label for="" class="control-label">姓（拼音）</label>
		<input type="text" class="form-control validate[required,custom[onlyLetterSp]]" id="" placeholder="姓（拼音）" name = "lastname" value="<?php echo $per->lastname;?>">
    </div>
	 <div class="col-sm-2">
		 <label for="" class="control-label">姓（汉字）</label>
		 <input type="text" class="form-control validate[required,custom[chinese]]" id="" placeholder="姓（汉字）" name="lastname_" value="<?php echo $per->lastname_ ;?>">
    </div>
	 <div class="col-sm-2">
		<label for="" class="control-label">名（拼音）</label>
		<input type="text" class="form-control validate[required,custom[onlyLetterSp]]" id="" placeholder="名（拼音）" name="firstname" value="<?php echo $per->firstname;?>">
    </div>
	 <div class="col-sm-2">
		 <label for="" class="control-label">名（汉字）</label>
		 <input type="text" class="form-control validate[required,custom[chinese]]" id="" placeholder="名（汉字）" name="firstname_" value="<?php echo $per->firstname_;?>">
    </div>
	  <div class="col-sm-2">
		<label for="" class="control-label">曾用名</label>
		<input data-rel="tooltip" data-original-title="若无则不填，多个请用逗号隔开" type="text" class="form-control" name="pastname" id="" value="<?php echo $per->pastname;?>" placeholder="曾用名">
    </div>
	 <div class="col-sm-2">
		 <label for="" class="control-label">性别</label>
		 <br>
		 <?php
		   $femalechecked="";
		   $malechecked="";
		   if($per->gender=="female"){
		      $femalechecked = 'checked="checked"';
		   }else if($per->gender =="male"){
		     $malechecked = 'checked="checked"';
		   }else{
		      $malechecked = 'checked="checked"';
		   }
		 ?>
		 <label class="radio inline">
              <input type="radio" value="female" name="gender" <?php  echo $femalechecked;?>>
              女
            </label>
			<label class="radio inline">
              <input type="radio" value="male" name="gender" <?php  echo $malechecked; ?>>
             男
            </label>
    </div>
  </div>
  <div class="form-group">
           <div class="col-sm-2">
		<label for="" class="control-label">出生日期：</label>
		<input class="form-control validate[required]" data-type="date-picker" type="text" name="borntime" data-date-format="yyyy-mm-dd"  value="<?php echo $per->borntime;?>">
    </div>
	 <div class="col-sm-2">
		 <label for="" class="control-label">填表时间：</label>
		 <input class="form-control validate[required]" data-type="date-picker" name="addformtime" type="text" data-date-format="yyyy-mm-dd"  value="<?php echo $per->addformtime; ?>">
    </div>
	 <div class="col-sm-3">
		<label for="" class="control-label">计划实习时间：</label>
		<input class="form-control validate[required]" data-type="date-range-picker" type="text" name="practicetime" value="<?php echo $per->practicetime; ?>">
    </div>
	 <div class="col-sm-2">
		 <label for="" class="control-label">旅行时长/天</label>
		 <input type="text" class="form-control validate[required,custom[integer]]" id="" placeholder="旅行时长/天" name="traveldays" value="<?php echo $per->traveldays;?>">
    </div>
	  <div class="col-sm-3">
		<label for="" class="control-label">出生地:</label>
		<input type="text" class="form-control validate[required]" id="" placeholder="出生地" name="bornplace" value="<?php echo $per->bornplace;?>">
    </div>
	
  </div>
  <div class="form-group">
    <div class="col-sm-2">
		<label for="" class="control-label">国籍</label>
		<input type="text" class="form-control validate[required]"  placeholder="" value="<?php echo $per->nation;?>"  name="nation">
    </div>

	<div class="col-sm-4">
		<label for="" class="control-label">户口所在地</label>
		<input data-rel="tooltip" data-original-title="尽量详细，按照户口本填写" type="text" class="form-control validate[required]" name="accountplace" value="<?php echo $per->accountplace;?>" placeholder="请填写详细地址">
    </div>
	 
	 <div class="col-sm-3">
		<label for="" class="control-label">身高/cm</label>
		<input type="text" class="form-control validate[required,custom[number]]" name="height" value="<?php echo $per->height;?>" placeholder="单位是cm">
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">体重/kg</label>
		 <input  type="text" class="form-control validate[required,custom[number]]" name="weight" value="<?php echo $per->weight;?>" placeholder="单位是kg">
    </div>
  </div>
  <div class="form-group">
       <div class="col-sm-2">
		<label for="" class="control-label">家庭电话</label>
		<input data-rel="tooltip" data-original-title="（加区号）" type="text" class="form-control validate[required]" value="<?php echo $per->homephonenumber;?>" name="homephonenumber" placeholder="">
    </div>
	<div class="col-sm-3">
		 <label for="" class="control-label">身份证号</label>
		 <input  type="text" class="form-control validate[required,custom[chinaIdLoose]]" id="" placeholder="身份证号一般为18位或15位" name="idnumber" value="<?php echo $per->idnumber;?>">
    </div>
    <div class="col-sm-4">
		<label for="" class="control-label">家庭地址</label>
		<input  data-rel="tooltip" data-original-title="（详细到门牌号）" type="text" class="form-control validate[required]" id="homeAddress" name="homeplace" value="<?php echo $per->homeplace;?>">
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">家庭住址邮编：</label>
		 <input  type="text" class="form-control validate[required,custom[chinaZip]]" id="homeZipCode" name="homezipcode" value="<?php echo $per->homezipcode;?>">
    </div>
 </div>
  
 <div class="form-group">
    
	 <div class="col-sm-3">
		<label for="" class="control-label">现居住地址（详细到门牌号）：</label>
		<input type="text" class="form-control validate[required]" id="nowAdderss" placeholder="" name="nowplace" value="<?php echo $per->nowplace;?>">
    </div>
	<div class="col-sm-3">
		<label for="" class="control-label">现住地址邮编：</label>
		<input type="text" class="form-control validate[required,custom[chinaZip]]" id="nowZipCode" placeholder="" name="nowzipcode" value="<?php echo $per->nowzipcode;?>">
    </div>
	<div class="col-sm-3">
		<label for="" class="control-label">邮寄地址（详细到门牌号）：</label>
		<input  type="text" class="form-control validate[required]" id="postAddress" name="postplace" placeholder="" value="<?php echo $per->postplace;?>">
    </div>
	<div class="col-sm-3">
		<label for="" class="control-label">邮寄地址邮编：</label>
		<input type="text" class="form-control validate[required]" id="postZipCode" name="postzipcode"  placeholder="" value="<?php echo $per->postzipcode;?>">
    </div>
</div>
 <div class="form-group">
    <?php
	  $showForeignDiv="none";
	  $hasForeign = '';
	  $noForeign = 'checked="checked"';
	  if($per->othernation !== ''){
	    $hasForeign = 'checked="checked"';
		$noForeign = '';
		$showForeignDiv = 'block';
	  }
	?>
     <div class="col-sm-3">
		 <label for="" class="control-label">是否有其他国际或身份</label>
		 <br>
		 
		   <label class="radio inline">
              <input type="radio" name="hasothernation" value="yes"  id="hasForeign" <?php echo $hasForeign;?>>
              有
            </label>
            <label class="radio inline">
              <input type="radio" name="hasothernation" value="no" id="noForeign" <?php echo $noForeign;?>>
              无
            </label>
		
	</div>
     <div class="col-sm-3">
		 <label for="" class="control-label">是否有雅思或托福成绩</label>
		 <br>
		 <?php
		   $hasYaSI ='';
		   $noYaSI = 'checked="checked"';
		   $showYaSiDiv = 'none';
		   if(($per->yasi!=='0' || $per->tuofu !== '0')&&(!$per->getIsNewRecord()) ){
		     $hasYaSI = 'checked="checked"';
			 $noYaSI = '';
			 $showYaSiDiv ='block';
		   }
		 ?>
		   <label class="radio inline">
              <input type="radio" name="hasyasi" value="yes" id="hasYaSI" <?php echo $hasYaSI;?>>
              有
            </label>
            <label class="radio inline">
              <input type="radio" name="hasyasi" value="no" id="noYaSI" <?php echo $noYaSI;?>>
              无
            </label>
		
	</div>
 
	 <div class="col-sm-3">
		  <label for="" class="control-label">婚姻状况</label>
		  <br>
		  <?php
		    $married = '';
            $unmarried = 'checked = "checked"';
            if($per->marrycondition === 'married'){
			  $married = 'checked="checked"';
			  $unmarried = '';
			}			
		  ?>
		   <label class="radio inline">
              <input type="radio" value="married" name="marrycondition" <?php echo $married;?>>
              已婚
            </label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="radio inline">
              <input type="radio" value="unmarried" name="marrycondition" <?php echo $unmarried;?>>
              未婚
            </label>
			
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">血型</label>
		  <br>
		  <?php
		    $blood_A = 'checked="checked"';
			$blood_B = '';
			$blood_AB = '';
			$blood_O = '';
			$blood_qita = '';
			switch($per->bloodtype){
			  case 'A':$blood_A = 'checked="checked"';break;
			  case 'B':$blood_B = 'checked="checked"';break;
			  case 'AB':$blood_AB = 'checked="checked"';break;
			  case 'O':$blood_O = 'checked="checked"';break;
			  case 'other':$blood_qita = 'checked="checked"';break;
			  default:break;
			  }
		  ?>
		   <label class="radio inline">
              <input type="radio" value="A" name="bloodtype" <?php echo $blood_A;?>>
              A型
            </label>
			<label class="radio inline">
              <input type="radio" value="B" name="bloodtype" <?php echo $blood_B;?>>
              B型
            </label>
			<label class="radio inline">
              <input type="radio" value="AB" name="bloodtype" <?php echo $blood_AB;?>>
              AB型
            </label>
			<label class="radio inline">
              <input type="radio" value="O" name="bloodtype" <?php echo $blood_O;?>>
              O型
            </label>
			<label class="radio inline">
              <input type="radio" value="other" name="bloodtype" <?php echo $blood_qita;?>>
              其他
            </label>
    </div>
	 
 </div>

<div class="form-group">
<div class="col-sm-4" id="foreignInfo" style="display:<?php echo $showForeignDiv;?>;">
	 <div >
	 <label for="" class="control-label">其他国际或身份</label>
		 <input name="othernation" id="foreignInfo" width="" style="display:;" data-rel="tooltip" data-original-title="若有，例如香港暂住居民，或者枫叶卡持有者等，请列名具体情况，以及获得时间。" type="text" class="form-control validate[required]"  value="<?php echo $per->othernation;?>" placeholder="具体情况">
    </div>
	</div>
 <div id="yaSi" style="display:<?php echo $showYaSiDiv;?>;">
    <div class="col-sm-3" >
		 <label for="" class="control-label">托福成绩：</label>
		 <input name="tuofu" data-rel="tooltip" data-original-title="若无则不需要填写" type="text" class="form-control validate[custom[number]]" id="" value="<?php echo $per->yasi;?>" placeholder="">
		 
    </div>
	 <div class="col-sm-3" >
		<label for="" class="control-label">雅思成绩：</label>
		 <input name="yasi" data-rel="tooltip" data-original-title="若无则不需要填写" type="text" class="form-control validate[custom[number]]" value="<?php echo $per->tuofu;?>" placeholder="">
    </div>
  </div>
	
</div>

	<div class="well">
				<h4 class="green smaller lighter">紧急联系人信息（同学或朋友或室友）【至少填一个】</h4>
				<div class="form-group">
				<h5>紧急联系人1</h5>
				   <div class="col-sm-3">
					<label for="" class="control-label">姓名：</label>
					<input name="em1[name]" type="text" class="form-control validate[groupRequired[emergency]]" id="r1" value="<?php echo $emergency[0]->name;?>" placeholder="">
				</div>
				 <div class="col-sm-3">
					 <label for="" class="control-label">手机号码</label>
					 <input name="em1[phonenumber]" data-rel="tooltip" data-original-title="必填" type="text" class="form-control validate[custom[phone],condRequired[r1]]" value ="<?php echo $emergency[0]->phonenumber;?>" id="" placeholder="">
					 
				</div>
				 <div class="col-sm-3">
					<label for="" class="control-label">家庭电话</label>
					 <input name="em1[homephonenumber]" data-rel="tooltip" data-original-title="必填" type="text" class="form-control validate[condRequired[r1]]" value ="<?php echo $emergency[0]->homephonenumber;?>" id="" placeholder="">
				</div>
				 <div class="col-sm-3">
					<label for="" class="control-label">邮箱：</label>
					<input  name="em1[email]"  type="text" class="form-control validate[custom[email],condRequired[r1]]" value ="<?php echo $emergency[0]->email;?>" id="" placeholder="">
				</div>
			</div>	
		  <div class="form-group">
				<h5>紧急联系人2</h5>
				   <div class="col-sm-3">
					<label for="" class="control-label">姓名：</label>
					<input name="em2[name]" type="text" class="form-control validate[groupRequired[emergency]]" id="r2" value ="<?php echo $emergency[1]->name;?>" placeholder="">
				</div>
				 <div class="col-sm-3">
					 <label for="" class="control-label">手机号码</label>
					 <input name="em2[phonenumber]" data-rel="tooltip" data-original-title="必填" type="text" class="form-control validate[custom[phone],condRequired[r2]]" value ="<?php echo $emergency[1]->phonenumber;?>" id="" placeholder="">
					 
				</div>
				 <div class="col-sm-3">
					<label for="" class="control-label">家庭电话</label>
					 <input name="em2[homephonenumber]" data-rel="tooltip" data-original-title="必填" type="text" class="form-control validate[condRequired[r2]]" value ="<?php echo $emergency[1]->homephonenumber;?>"id="" placeholder="">
				</div>
				 <div class="col-sm-3">
					<label for="" class="control-label">邮箱：</label>
					<input  name="em2[email]"  type="text" class="form-control validate[custom[email],condRequired[r2]]" id="" value ="<?php echo $emergency[1]->email;?>" placeholder="">
				</div>
			</div>	
	</div>
	<div class="well">
				<h4 class="green smaller lighter">资金提供者信息</h4>
				<div class="form-group">
				     <div class="col-sm-3">
					<label for="" class="control-label">姓名：</label>
					<input name="foundspersonname" type="text" class="form-control validate[required]" id="" value="<?php echo $per->foundspersonname;?>" placeholder="">
				</div>
				 <div class="col-sm-3">
					 <label for="" class="control-label">与申请者关系</label>
					 <input name="relation" data-rel="tooltip" data-original-title="母子，父子，或其他" type="text" class="form-control validate[required,custom[chinese]]" value="<?php echo $per->relation;?>"  id="" placeholder="">
					 
				</div>
				 <div class="col-sm-3">
					<label for="" class="control-label">电话</label>
					 <input name="foundsphonenumber" type="text" class="form-control validate[required]" id="" value="<?php echo $per->foundsphonenumber;?>" placeholder="">
				</div>
				 <div class="col-sm-3">
					<label for="" class="control-label">邮箱：</label>
					<input name="foundsemail" type="text" class="form-control validate[required,custom[email]]" value="<?php echo $per->foundsemail;?>" id="" placeholder="">
				</div>
				</div>
				<div class="form-group">
				  <div class="col-sm-4">
					<label for="" class="control-label">出生日期：</label>
					<input name="foundsborntime"  class="form-control validate[required]" data-type="date-picker" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $per->foundsborntime;?>">
				</div>
				 <div class="col-sm-4">
					 <label for="" class="control-label">国籍</label>
					 <input name="foundsnation" type="text" class="form-control validate[required]" value="<?php echo $per->foundsnation;?>" id="" placeholder="">
					 
				</div>
				 <div class="col-sm-4">
					<label for="" class="control-label">现住址：</label>
					 <input name="foundsplace" data-rel="tooltip" data-original-title="详细到门牌号" type="text" class="form-control validate[required]" value="<?php echo $per->foundsplace;?>" id="" placeholder="">
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
</form>
<script type="text/javascript"> 
$(document).ready(function(){
    <?php
	    if(Yii::app()->user->hasFlash('notice')){
		    echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
		}
	?>
    $(":input").change(function(){
	   if($(this).val() == '')
	     $(this).attr("value","");
	})
    $('#hasYaSI').click(function(){
       $('#yaSi').show(200);
	});
	$('#noYaSI').click(function(){
       $('#yaSi').hide(200);
  });
  ///////////////////////
	 $('#homeAddress').change(function(){
        $('#nowAdderss').val($('#homeAddress').val());
		$('#postAddress').val($('#homeAddress').val());
   });
   $('#homeZipCode').change(function(){
        $('#nowZipCode').val($('#homeZipCode').val());
		$('#postZipCode').val($('#homeZipCode').val());
   });
   $('#nowAdderss').change(function(){
        $('#postAddress').val($('#nowAddress').val());
   });
   $('#nowZipCode').change(function(){
        $('#postZipCode').val($('#nowZipCode').val());
   });
    /////////////
	
   	$('#hasForeign').click( function(){
	      $('#foreignInfo').show(200);
	});
	$('#noForeign').click( function(){
	      $('#foreignInfo').hide(200);
	});
	/////////
	$(".form-horizontal").validationEngine("attach",{ 
		promptPosition:"inline", 
		scroll:true,
		validateNonVisibleFields:false,
  }); 
 ///////////
	 $('[data-type=date-picker]').datepicker();
	 $('[data-rel=popover]').popover({container:'body'});
   
	  $('[data-type=date-range-picker]').daterangepicker();
	  $('[data-rel=tooltip]').tooltip({container:'body'});


  });

</script>