<form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('stuform/proof');?>" method="post" > 
   <div class="well">
       <h4 class="red smaller lighter">证明人1</h4>
	   <div class="form-group">
	     <div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">
						<i class="icon-remove"></i>
					</button>
						<strong>Notice!</strong>
							<p>
								证明人主要是朋友或者同学，不可以填写亲属。(必须填写两个)

							</p> <br><i class="icon-heart"></i>&nbsp;谢谢合作&nbsp;<i class="icon-heart"></i>
											
						<br>
			</div>
		</div>	
	   <div class="form-group">
	      <div class="col-sm-3">
			<label for="" class="control-label">姓名：</label>
			<input  type="text" class="form-control validate[required]" name="f[name]" placeholder="" value="<?php echo $proof[0]->name; ?>">
          </div>
			 <div class="col-sm-3">
				 <label for="" class="control-label">电话：</label>
				 <input  type="text" class="form-control validate[required,custom[phone]]" name="f[phone]" placeholder="" value="<?php echo $proof[0]->phone; ?>">
			</div>
			<div class="col-sm-3">
			<label for="" class="control-label">Email：</label>
			<input data-rel="tooltip" data-original-title="若无则不填写" type="text" class="form-control validate[custom[email]]" name="f[email]" value="<?php echo $proof[0]->email; ?>" >
			</div>
			<div class="col-sm-3">
			<label for="" class="control-label">国籍：</label>
			<input type="text" class="form-control validate[required]" name="f[nation]"   value="<?php echo $proof[0]->nation; ?>">
			</div>
	   </div>
	   <div class="form-group">
			<div class="col-sm-6">
				<label for="" class="control-label">出生日期：</label>
				<input class="form-control validate[required]" data-type="date-picker" type="text" data-date-format="yyyy-mm-dd" name="f[borntime]" value="<?php echo $proof[0]->borntime; ?>">
			</div>
			 <div class="col-sm-6">
				<label for="" class="control-label">现住址：</label>
				<input type="text" class="form-control validate[required]" id="" placeholder="现住址" name="f[place]" value="<?php echo $proof[0]->place; ?>">
			</div>
	   </div>
   </div>
   <hr>
   <div class="well">
       <h4 class="red smaller lighter">证明人2</h4>
 <div class="form-group">
	      <div class="col-sm-3">
			<label for="" class="control-label">姓名：</label>
			<input  type="text" class="form-control validate[required]" name="s[name]" placeholder="" value="<?php echo $proof[1]->name; ?>">
          </div>
			 <div class="col-sm-3">
				 <label for="" class="control-label">电话：</label>
				 <input  type="text" class="form-control validate[required,custom[phone]]" name="s[phone]" placeholder="" value="<?php echo $proof[1]->phone; ?>">
			</div>
			<div class="col-sm-3">
			<label for="" class="control-label">Email：</label>
			<input data-rel="tooltip" data-original-title="若无则不填写" type="text" class="form-control validate[custom[email]]" name="s[email]" value="<?php echo $proof[1]->email; ?>" >
			</div>
			<div class="col-sm-3">
			<label for="" class="control-label">国籍：</label>
			<input type="text" class="form-control validate[required]" name="s[nation]"  value="<?php echo $proof[1]->nation; ?>">
			</div>
	   </div>
	   <div class="form-group">
			<div class="col-sm-6">
				<label for="" class="control-label">出生日期：</label>
				<input class="form-control validate[required]" data-type="date-picker" type="text" data-date-format="yyyy-mm-dd" name="s[borntime]" value="<?php echo $proof[1]->borntime; ?>">
			</div>
			 <div class="col-sm-6">
				<label for="" class="control-label">现住址：</label>
				<input type="text" class="form-control validate[required]" id="" placeholder="现住址" name="s[place]" value="<?php echo $proof[1]->place; ?>">
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
