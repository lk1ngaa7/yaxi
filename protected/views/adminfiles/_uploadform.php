<form class="form-horizontal">
							
							       <div class="form-group center">
									   <label class="control-label">选择项目</label>
												 <div class="controls">

																				
													<label class="radio inline">
														<input type="radio" value="itp" id="itp_radio" checked="checked" name="group">
																 ITP
													</label>
													<label class="radio inline">
													    <input type="radio" value="step" id="step_radio" name="group">
															STEP
														</label>
													<label class="radio inline">
													   <input type="radio" value="exchange" id="exchange_radio" name="group">
														 交换生
													</label>
												</div>
									</div>
		</form>
							    <div class="well" id="itp" style="display:;">
								<form class="form-horizontal" id="itpform" method="post" action="<?php echo Yii::app()->createUrl('adminfiles/addfiles');?>" enctype="multipart/form-data">
										<input type="hidden" id="hiddenInput" name="proId" value="1">
										<?php $this->renderPartial('_unionForm');?>
								</form>
								</div >
								<div class="well" id="exchange" style="display:none;">
								 <form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('adminfiles/addfiles');?>" enctype="multipart/form-data">
										<input type="hidden"  name="proId" value="2">
										<?php $this->renderPartial('_exchangeForm');?>
								  </form>
								</div >
																
						  
 
 <script type="text/javascript"> 
$(document).ready(function(){
    <?php
	    if(Yii::app()->user->hasFlash('notice')){
		   echo 'alert("'.Yii::app()->user->getFlash('notice').'");';
		}
	?>
     $('#itp_radio').click(function(){
	     $('#itp').show(200);
		 // set proId
		 $('#hiddenInput').attr('value','1');
		 $('#exchange').hide(200);
	 });
	  $('#step_radio').click(function(){
	     $('#itp').show(200);
		 // set proId
		 $('#hiddenInput').attr('value','3');
		  $('#exchange').hide(200);
	 });
	  $('#exchange_radio').click(function(){
	     $('#itp').hide(200);
		 $('#exchange').show(200);
	 });
	 ////////////////////////////////
	 $('[radioType=uploadTempRadio]').click(function(){
	     $('.Lktemp').show(250);
		 $('.Lkitem').hide(250);
		 $('.Lkhelp').hide(250);
	 });
	 $('[radioType=addFileRadio]').click(function(){
	     $('.Lktemp').hide(250);
		 $('.Lkitem').show(250);
		 $('.Lkhelp').hide(250);
	 });
   $('[radioType=addHelpRadio]').click(function(){
	      $('.Lktemp').hide(250);
		 $('.Lkitem').hide(250);
		 $('.Lkhelp').show(250);
	 });
  });

</script>