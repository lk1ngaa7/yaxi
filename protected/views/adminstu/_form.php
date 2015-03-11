<form class="form-horizontal" action="<?php echo Yii::app()->createUrl('adminstu/addstu')?>" method="post">
  <div class="form-group">
   <div class="col-sm-3">
		<label for="" class="control-label">姓名</label>
		<input type="text" class="form-control" id="" name="realname" placeholder="姓名" >
    </div>
	<div class="col-sm-3">
		<label for="" class="control-label">学校</label>
		<input type="text" class="form-control" id="" name="schoolname" placeholder="学校名称" >
    </div>
	 <div class="col-sm-3">
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
		<label for="" class="control-label">出发时间：</label>
		 <input class="form-control" data-type="date-picker" type="text" data-date-format="yyyy-mm" name="starttime">
    </div>
	
  </div>
  <hr>
  <div class="form-group">
   <div class="col-sm-3">
		<button class="btn btn-primary" type = "submit">提交</button>
   </div>
   </div>
</form>