<form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('stuform/passport');?>"role="form">
<div class="form-group">
    <div class="col-sm-3">
		<label for="" class="control-label">护照号</label>
		<input name ="passportnumber" value="<?php echo $pass->passportnumber;?>" data-rel="tooltip" data-original-title="护照号为护照有照片的信息页的右上角G开头的8位数字。例如G12345678" type="text" class="form-control validate[required]" id="" placeholder="">
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">护照本号：</label>
		 <input name="passportbooknumber" value="<?php echo $pass->passportbooknumber;?>" data-rel="tooltip" data-original-title="护照本号为护照信息页右侧，竖着的一排小数字。有的护照有，有的没有。没有的请不要填写" type="text" class="form-control validate[custom[onlyLetterNumber]]" id="" placeholder="">
    </div>
	
	<div class="col-sm-6">
	<label for="" class="control-label">护照签发地（详细到国家，省份或州，城市）：</label>
	<input name ="passportplace" value="<?php echo $pass->passportplace;?>"  type="text" class="form-control validate[required]" id="" placeholder="详细到国家，省份或州，城市" >
	</div>
</div>
<div class="form-group">
    
	<div class="col-sm-2">
		<label for="" class="control-label">护照签发日期：</label>
		<input name ="passportdate" value="<?php echo $pass->passportdate;?>" class="form-control validate[required]" data-type = "date-picker" type="text" data-date-format="yyyy-mm-dd" >
	</div>
	<div class="col-sm-2">
		<label for="" class="control-label">护照到期日：</label>
		<input name="passportenddate" value="<?php echo $pass->passportenddate;?>"  class="form-control validate[required]" data-type = "date-picker" type="text" data-date-format="yyyy-mm-dd" name="birthday">
    </div>
	<div class="col-sm-6">
	<label for="" class="control-label">您的护照是否曾经丢失或者被盗过？</label>
	<br>
	<?php
	  $lost = '';
	  $notLost = 'checked="checked"';
	  $showLostDiv = 'none';
	  if($pass->lostnumber!==''){
		  $lost = 'checked="checked"';
		  $notLost = '';
		  $showLostDiv = 'block';
	  }
	?>
	 <div class="controls">
			<label class="radio inline">
              <input type="radio" value="A" name="isLost" checked="checked" id = "NoLostPass" <?php echo $notLost;?>>
              否
            </label>
			<label class="radio inline">
              <input type="radio" value="B" name="isLost" id = "LostPass" <?php echo $lost;?>>
             是
            </label>
	</div>
	</div>
</div>
<div class="form-group" id = "hidedPassportGroup" style="display:<?php echo $showLostDiv;?>;">
<div class="col-sm-6">
	<label for="" class="control-label">曾经遗失或者被盗的护照号码：</label>
	<input name = "lostnumber" value="<?php echo $pass->lostnumber;?>"  type="text" class="form-control validate[required,custom[onlyLetterNumber]]" id="" placeholder="曾经遗失或者被盗的护照号码" >
</div>
<div class="col-sm-6">
	<label for="" class="control-label">曾经遗失或者被盗的护照号码的签发日期：</label>
	<input name="lostdate" value="<?php echo $pass->lostdate;?>"  class="form-control validate[required]" data-type = "date-picker" type="text" data-date-format="yyyy-mm-dd" >
</div>

</div>
<script type="text/javascript"> 
$(document).ready(function(){
  $('#NoLostPass').click(function (){
      $('#hidedPassportGroup').hide(200);
   });
	$('#LostPass').click(function (){
	   $('#hidedPassportGroup').show(200);
	});			
	


  });

</script>
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