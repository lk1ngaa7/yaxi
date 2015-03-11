<form class="form-horizontal" action="<?php echo Yii::app()->createUrl('adminadmin/addadmin')?>" method="post">
  <div class="form-group">
   <div class="col-sm-2">
		<label for="" class="control-label">用户名</label>
		<input type="text" class="form-control" id="" name="username" placeholder="用户名" >
    </div>
   <div class="col-sm-3">
		<label for="" class="control-label">姓名</label>
		<input type="text" class="form-control" id="" name="realname" placeholder="姓名" >
    </div>
	
	<div class="col-sm-2">
		<label for="" class="control-label">email</label>
		<input type="text" class="form-control" id="" name="email" placeholder="email" >
    </div>
	 <div class="col-sm-2">
		 <label for="" class="control-label">项目</label>
		<div class="controls">
            <select name="proId" class="form-control">
            <?php 
			    foreach($this->proList as $e){
				   if($e['proName']=='exchange')
				     $e['proName'] = '交换生';
				   echo '<option value = "'.$e['proId'].'">'.$e['proName'].'</option>';
				}
			?>
            </select>
          </div>
    </div>
	 <div class="col-sm-3">
		<label for="" class="control-label">手机号:</label>
		 <input type="text" class="form-control" id="" name="phonenumber" placeholder="手机号" >
    </div>
	
  </div>
  <hr>
  <div class="form-group">
   <div class="col-sm-3">
		<button class="btn btn-primary" type = "submit">提交</button>
   </div>
   </div>
</form>