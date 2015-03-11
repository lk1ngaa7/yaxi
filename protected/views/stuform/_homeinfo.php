<form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('stuform/home');?>" method="post" > 
<div class="well">
  <div class="form-group">
      <div class="col-sm-6">
		<label for="" class="control-label">父母婚姻状态：</label>
		<br>
		<?php
		   $parentMarried = 'checked="checked"';
		   $parentUnmarried = '';
		   $parentLive = 'checked="checked"';
		   $parentDied = '';
		   if($home->marrycondition === '离婚'){
		      $parentMarried = '';
		      $parentUnmarried = 'checked="checked"';
		   }
		   if($home->livecondition ==='去世'){
		      $parentLive = '';
		      $parentDied = 'checked="checked"';
		   }
		?>
		 <div class="controls">
				<label class="radio inline">
				  <input type="radio" value="正常" name="marrycondition" <?php echo $parentMarried;?> >
				  正常
				</label>
				<label class="radio inline">
				  <input type="radio" value="离婚" name="marrycondition" <?php echo $parentUnmarried; ?>>
				 离婚
				</label>
		</div>
	</div>
	<div class="col-sm-6">
		<label for="" class="control-label">父母是否在世：</label>
		<br>
		 <div class="controls">
				<label class="radio inline">
				  <input type="radio" value="在世" name="livecondition" <?php echo $parentLive;?>  >
				 在世
				</label>
				<label class="radio inline">
				  <input type="radio" value="去世" name="livecondition"  <?php echo $parentDied;?> >
				 去世
				</label>
		</div>
	</div>
  </div>
</div>

 <div class="well">
   <h4 class="green smaller lighter">父亲信息</h4>
   <div class="form-group">
    <div class="col-sm-3">
		<label  class="control-label">姓名：</label>
		<input  type="text" class="form-control validate[required]" id="" placeholder="" name="f_name" value="<?php echo $home->f_name; ?>">
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">电话：</label>
		 <input  type="text" class="form-control validate[required,custom[phone]]" id="" name="f_phonenumber" value="<?php echo $home->f_phonenumber; ?>" placeholder="">
    </div>
	<div class="col-sm-3">
	<label for="" class="control-label">Email：</label>
	<input type="text" class="form-control validate[required,custom[email]]" id="" name="f_email" value="<?php echo $home->f_email; ?>" placeholder="" >
	</div>
	<div class="col-sm-3">
	<label for="" class="control-label">国籍：</label>
	<input type="text" class="form-control validate[required]" id="" placeholder="" name="f_nation" value="<?php echo $home->f_nation; ?>" >
	</div>
   </div>
   <div class="form-group">
       <div class="col-sm-2">
		<label for="" class="control-label">出生日期：</label>
		<input class="form-control validate[required]" data-type="date-picker" type="text" data-date-format="yyyy-mm-dd" name="f_borntime" value="<?php echo $home->f_borntime; ?>">
	   </div>
	   <div class="col-sm-5">
		 <label for="" class="control-label">现住址：</label>
		 <input  type="text" class="form-control validate[required]" id="" placeholder="" name="f_liveplace" value="<?php echo $home->f_liveplace; ?>">
    </div>
	<div class="col-sm-5">
		 <label for="" class="control-label">工作单位：</label>
		 <input  type="text" class="form-control validate[required]" name="f_workplace" value="<?php echo $home->f_workplace; ?>" placeholder="">
    </div>
   </div>
</div>
<hr>
<div class="well">
   <h4 class="green smaller lighter">母亲信息</h4>
  <div class="form-group">
    <div class="col-sm-3">
		<label  class="control-label">姓名：</label>
		<input  type="text" class="form-control validate[required]" id="" placeholder="" name="m_name" value="<?php echo $home->m_name; ?>">
    </div>
	 <div class="col-sm-3">
		 <label for="" class="control-label">电话：</label>
		 <input  type="text" class="form-control validate[required,custom[phone]]" id="" name="m_phonenumber" value="<?php echo $home->m_phonenumber; ?>" placeholder="">
    </div>
	<div class="col-sm-3">
	<label for="" class="control-label">Email：</label>
	<input  type="text" class="form-control validate[required,custom[email]]" id="" name="m_email" value="<?php echo $home->m_email; ?>" placeholder="" >
	</div>
	<div class="col-sm-3">
	<label for="" class="control-label">国籍：</label>
	<input type="text" class="form-control validate[required]" id="" placeholder="" name="m_nation" value="<?php echo $home->m_nation; ?>" >
	</div>
   </div>
   <div class="form-group">
       <div class="col-sm-2">
		<label for="" class="control-label">出生日期：</label>
		<input class="form-control validate[required]" data-type="date-picker" type="text" data-date-format="yyyy-mm-dd" name="m_borntime" value="<?php echo $home->m_borntime; ?>">
	   </div>
	   <div class="col-sm-5">
		 <label for="" class="control-label">现住址：</label>
		 <input  type="text" class="form-control validate[required]" id="" placeholder="" name="m_liveplace" value="<?php echo $home->m_liveplace; ?>">
    </div>
	<div class="col-sm-5">
		 <label for="" class="control-label">工作单位：</label>
		 <input  type="text" class="form-control validate[required]" name="m_workplace" value="<?php echo $home->f_workplace; ?>" placeholder="">
    </div>
   </div>
</div>
	<div class="form-group">
	  <div class="col-sm-6">
		<label for="" class="control-label">申请人在美国是否有亲属？</label>
		<br>
		 <div class="controls">
				<label class="radio inline">
				  <input type="radio" value="A" name="Relatives"  id = "hasRelatives" >
				有
				</label>
				<label class="radio inline">
				  <input type="radio" value="B" name="Relatives" checked="checked" id = "noRelatives" >
				无
				</label>
		</div>
	</div>
	</div>
	<script type="text/javascript"> 
$(document).ready(function(){
  $('#noRelatives').click(function (){
      $('#hidedHomeInfoGroup').hide(200);
   });
	$('#hasRelatives').click(function (){
	   $('#hidedHomeInfoGroup').show(200);
	});			
	


  });
</script>
<div class="form-group" id = "hidedHomeInfoGroup" style="display:none;">
	<div class="col-sm-4">
		<label for="" class="control-label">申请人在美国的亲属的姓名：</label>
		<input type="text" class="form-control validate[required]" id="" name="americaname" value="<?php echo $home->americaname; ?>" placeholder="申请人在美国的亲属的姓名" >
	</div>
	<div class="col-sm-4">
		<label for="" class="control-label">亲属与申请人的关系：</label>
		<input type="text" class="form-control validate[required]" name="americarelation" value="<?php echo $home->americarelation;?>" placeholder="亲属与申请人的关系" >
	</div>
   <div class="col-sm-4">
		<label for="" class="control-label">亲属现在美国的身份状态 : </label>
		<input data-rel="tooltip" data-original-title="例如：绿卡、居民、暂住、非移民类签证、交流或者学习、工作签证等。" type="text" class="form-control validate[required]" name="americacondition" value="<?php echo $home->americacondition;?>" placeholder="">
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