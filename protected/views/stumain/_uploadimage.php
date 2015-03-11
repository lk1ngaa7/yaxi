<form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('stumain/uploadimage');?>" enctype="multipart/form-data">
	  <div class="from-group">
	     <input type="file" class="form-control" name="image" />
	  </div>
	  <br><br>
	  <p>大小在2M以内 宽：高（5:4）</p>
	  <br>
	  <div class="from-group">
	    <button class="btn-info" type="submit">上传</button>
	  </div>
	</form>