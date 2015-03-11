<form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('stuform/visa');?>" method="post" > 
  <?php
    $goneAmerica = '';
	$noGoneAmerica = 'checked="checked"';
	$showGoneAmericaDiv = 'none';
	$hasLicense = '';
	$noLicense = 'checked="checked"';
	$showLicenseDiv = 'none';
	if(!$this->Goneamerica[0]->getIsNewRecord()){
	  $goneAmerica = 'checked="checked"';
	  $noGoneAmerica = '';
	  $showGoneAmericaDiv = 'block';
	  if($visa->driverlicense!==''){
	    $hasLicense = 'checked="checked"';
	    $noLicense = '';
	    $showLicenseDiv = 'block';
	  }
	}
	
	$hasAmericaVisa = '';
	$noAmericaVisa = 'checked="checked"';
	$showAmericaVisaDiv = 'none';
	$visaLost = '';
	$noVisaLost = 'checked="checked"';
	$showVisaLostDiv = 'none';
	if(!$this->Getvisa[0]->getIsNewRecord()){
	   	$hasAmericaVisa = 'checked="checked"';
	    $noAmericaVisa = '';
	    $showAmericaVisaDiv = 'block';
		if($visa->lostvisanumber !==''){
		  $visaLost = 'checked="checked"';
		  $noVisaLost = '';
		  $showVisaLostDiv = 'block';
		}
	}
	
	$hasRefused = '';
	$noRefused = 'checked="checked"';
	$showRefusedDiv = 'none';
	if($visa->refusedreason !=='' && !$visa->getIsNewRecord()){
	   $hasRefused = 'checked="checked"';
	   $noRefused = '';
	   $showRefusedDiv = 'block';
	}
	
	$hasLogoff = '';
	$noLogoff = 'checked="checked"';
	$showLogoffDiv = 'none';
	if($visa->logoffvisanumber !==''&& !$visa->getIsNewRecord()){
	  $hasLogoff = 'checked="checked"';
	  $noLogoff = '';
	  $showLogoffDiv = 'block';
	}
  ?>
  <div class="well">
      <h4 class="green smaller lighter">1.美国</h4>
	   <div class="form-group">
			<div class="col-sm-3">
				<label for="" class="control-label">申请人是否曾经去过美国？</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="goneAmerica"  id = "goneAmerica" <?php echo $goneAmerica;?>>
						是
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="goneAmerica"  id = "noGoneAmerica" <?php echo $noGoneAmerica;?> >
						否
						</label>
				</div>
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">申请人是否曾经获得过美国签证?</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="hasAmericaVisa"  id = "hasAmericaVisa" <?php echo $hasAmericaVisa;?>>
						是
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="hasAmericaVisa"  id = "noAmericaVisa" <?php echo $noAmericaVisa;?>>
						否
						</label>
				</div>
			</div>
		   <div class="col-sm-6">
				<label for="" class="control-label"> 申请人是否曾经被拒签、或者被拒绝入境美国或者入境时被撤回入境申请？</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="visaRefused"  id = "hasRefused" <?php echo $hasRefused;?>>
						是
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="visaRefused"  id = "noRefused" <?php echo $noRefused;?>>
						否
						</label>
				</div>
			</div>	
		</div>
		<div class="form-group">
		     <div class="col-sm-5">
				<label for="" class="control-label"> 申请人曾经获得的美国签证是否曾经被注销或者撤销？</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="visaLogoff"  id = "hasLogoff" <?php echo $hasLogoff;?>>
						是
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="visaLogoff"  id = "noLogoff" <?php echo $noLogoff; ?>>
						否
						</label>
				</div>
			</div>	
		</div>
  
  </div>
 
  <div id="goneAmericaGroup" style="display:<?php echo $showGoneAmericaDiv;?>;">
     <div class="well">
     <h4 class="green smaller lighter"> 如果您选择“是”，请继续填写以下内容&nbsp;&nbsp;&nbsp;&nbsp;<span class="red smaller lighter">From :&nbsp;申请人是否曾经去过美国</span>：</h4>
		<div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
			  <div class="col-sm-3">
				<label for="" class="control-label">每次赴美的具体抵达日期：</label>
				<input class="form-control validate[groupRequired[gA]]" id="gA1" type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gA1[arrivaltime]" value="<?php echo $this->Goneamerica[0]->arrivaltime;?>">
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">每次在美国的停留时间：</label>
				<input class="form-control validate[condRequired[gA1]]" data-type = "date-range-picker" type="text" name="gA1[staytime]" value="<?php echo $this->Goneamerica[0]->staytime;?>">
			</div>
			 <div class="col-sm-3">
				<label for="" class="control-label">地址：</label>
				<input type="text" class="form-control validate[condRequired[gA1]]" id="" placeholder="地址" name="gA1[stayplace]" value="<?php echo $this->Goneamerica[0]->stayplace;?>" >
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">邮编：</label>
				<input type="text" class="form-control validate[condRequired[gA1]]" id="" placeholder="邮编" name="gA1[stayzipcode]" value="<?php echo $this->Goneamerica[0]->stayzipcode;?>" >
			</div>
		</div>
		<div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
			  <div class="col-sm-3">
				<label for="" class="control-label">每次赴美的具体抵达日期：</label>
				<input class="form-control validate[groupRequired[gA]]" id="gA2" type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gA2[arrivaltime]" value="<?php echo $this->Goneamerica[1]->arrivaltime;?>">
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">每次在美国的停留时间：</label>
				<input class="form-control validate[condRequired[gA2]]" data-type = "date-range-picker" type="text" name="gA2[staytime]" value="<?php echo $this->Goneamerica[1]->staytime;?>">
			</div>
			 <div class="col-sm-3">
				<label for="" class="control-label">地址：</label>
				<input type="text" class="form-control validate[condRequired[gA2]]" id="" placeholder="地址" name="gA2[stayplace]" value="<?php echo $this->Goneamerica[1]->stayplace;?>" >
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">邮编：</label>
				<input type="text" class="form-control validate[condRequired[gA2]]" id="" placeholder="邮编" name="gA2[stayzipcode]" value="<?php echo $this->Goneamerica[1]->stayzipcode;?>" >
			</div>
		</div>
		<div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
			  <div class="col-sm-3">
				<label for="" class="control-label">每次赴美的具体抵达日期：</label>
				<input class="form-control validate[groupRequired[gA]]" id="gA3" type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gA3[arrivaltime]" value="<?php echo $this->Goneamerica[2]->arrivaltime;?>">
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">每次在美国的停留时间：</label>
				<input class="form-control validate[condRequired[gA3]]" data-type = "date-range-picker" type="text" name="gA3[staytime]" value="<?php echo $this->Goneamerica[2]->staytime;?>">
			</div>
			 <div class="col-sm-3">
				<label for="" class="control-label">地址：</label>
				<input type="text" class="form-control validate[condRequired[gA3]]" id="" placeholder="地址" name="gA3[stayplace]" value="<?php echo $this->Goneamerica[2]->stayplace;?>" >
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">邮编：</label>
				<input type="text" class="form-control validate[condRequired[gA3]]" id="" placeholder="邮编" name="gA3[stayzipcode]" value="<?php echo $this->Goneamerica[2]->stayzipcode;?>" >
			</div>
		</div>
		<div class="form-group">
		    <div class="col-sm-5">
				<label for="" class="control-label"> 申请人是否持有美国驾驶执照？</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="License"  id = "hasLicense" <?php echo $hasLicense; ?>>
						有
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="License"  id = "noLicense" <?php echo $noLicense; ?>>
						无
						</label>
				</div>
			</div>	
		</div>
		<div class="form-group" id = "licenseGroup" style="display:<?php echo $showLicenseDiv;?>;">
		       <div class="col-sm-4">
				<label for="" class="control-label">驾照号码：</label>
				<input class="form-control validate[required]" type="text"  name="driverlicense" value="<?php echo $visa->driverlicense;?>">
			</div>
			<div class="col-sm-4">
				<label for="" class="control-label">获得驾照的时间：</label>
				<input class="form-control validate[required]"  type="text" id="" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="licensegettime" value="<?php echo $visa->licensegettime == '0000-00-00'?'':$visa->licensegettime;?>">
			</div>
			 <div class="col-sm-4">
				<label for="" class="control-label">驾照所属洲：</label>
				<input type="text" class="form-control validate[required]" id="" placeholder="驾照所属洲" name="licensestate" value="<?php echo $visa->licensestate;?>" >
			</div>
		</div>
	</div>
</div>

	<div id="visaGroup" style="display:<?php echo $showAmericaVisaDiv;?>;">
	<div class="well">
     <h4 class="green smaller lighter"> 如果您选择“是”，请继续填写以下内容&nbsp;&nbsp;&nbsp;&nbsp;<span class="red smaller lighter">From :&nbsp;申请人是否曾经获得过美国签证</span>：</h4>
		<div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
			  <div class="col-sm-2">
				<label for="" class="control-label">签证签发日期：</label>
				<input class="form-control validate[groupRequired[gV]]" id="gV1" type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gV1[visadate]" value="<?php echo $this->Getvisa[0]->visadate;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">签证类型：</label>
				<input type="text" class="form-control validate[condRequired[gV1]]" id="" placeholder="最近一次美国签证的签证类型" name="gV1[visatype]" value="<?php echo $this->Getvisa[0]->visatype;?>">
			</div>
			 <div class="col-sm-2">
				<label for="" class="control-label">签证签发地点：</label>
				<input type="text" class="form-control validate[condRequired[gV1]]" id="" placeholder="地址" name="gV1[visaplace]" value="<?php echo $this->Getvisa[0]->visaplace;?>" >
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">签证号码：</label>
				<input type="text" class="form-control validate[condRequired[gV1]]" id="" placeholder="签证号码" name="gV1[visanumber]" value="<?php echo $this->Getvisa[0]->visanumber;?>" >
			</div>
			<div class="col-sm-3" data-rel="tooltip" data-original-title="最近一次美国签证时，在使馆录指纹时录入了双手十个手指的指纹还是两个手指的指纹？">
				<label for="" class="control-label">签证手指个数：</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="十个手指" name="gV1[visafinger]"  >
						十个手指
						</label>
						<label class="radio inline">
						  <input type="radio" value="两个手指" name="gV1[visafinger]" checked="checked" >
						两个手指
						</label>
				</div>
			</div>
		</div>
		<div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
			  <div class="col-sm-2">
				<label for="" class="control-label">签证签发日期：</label>
				<input class="form-control validate[groupRequired[gV]]" id="gV2" type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gV2[visadate]" value="<?php echo $this->Getvisa[1]->visadate;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">签证类型：</label>
				<input type="text" class="form-control validate[condRequired[gV2]]" id="" placeholder="最近一次美国签证的签证类型" name="gV2[visatype]" value="<?php echo $this->Getvisa[1]->visatype;?>">
			</div>
			 <div class="col-sm-2">
				<label for="" class="control-label">签证签发地点：</label>
				<input type="text" class="form-control validate[condRequired[gV2]]" id="" placeholder="地址" name="gV2[visaplace]" value="<?php echo $this->Getvisa[1]->visaplace;?>" >
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">签证号码：</label>
				<input type="text" class="form-control validate[condRequired[gV2]]" id="" placeholder="签证号码" name="gV2[visanumber]" value="<?php echo $this->Getvisa[1]->visanumber;?>" >
			</div>
			<div class="col-sm-3" data-rel="tooltip" data-original-title="最近一次美国签证时，在使馆录指纹时录入了双手十个手指的指纹还是两个手指的指纹？">
				<label for="" class="control-label">签证手指个数：</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="十个手指" name="gV2[visafinger]"  >
						十个手指
						</label>
						<label class="radio inline">
						  <input type="radio" value="两个手指" name="gV2[visafinger]" checked="checked" >
						两个手指
						</label>
				</div>
			</div>
		</div>
		<div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
			<div class="col-sm-2">
				<label for="" class="control-label">签证签发日期：</label>
				<input class="form-control validate[groupRequired[gV]]" id="gV3" type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gV3[visadate]" value="<?php echo $this->Getvisa[2]->visadate;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">签证类型：</label>
				<input type="text" class="form-control validate[condRequired[gV3]]" id="" placeholder="最近一次美国签证的签证类型" name="gV3[visatype]" value="<?php echo $this->Getvisa[2]->visatype;?>">
			</div>
			 <div class="col-sm-2">
				<label for="" class="control-label">签证签发地点：</label>
				<input type="text" class="form-control validate[condRequired[gV3]]" id="" placeholder="地址" name="gV3[visaplace]" value="<?php echo $this->Getvisa[2]->visaplace;?>" >
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">签证号码：</label>
				<input type="text" class="form-control validate[condRequired[gV3]]" id="" placeholder="签证号码" name="gV3[visanumber]" value="<?php echo $this->Getvisa[2]->visanumber;?>" >
			</div>
			<div class="col-sm-3" data-rel="tooltip" data-original-title="最近一次美国签证时，在使馆录指纹时录入了双手十个手指的指纹还是两个手指的指纹？">
				<label for="" class="control-label">签证手指个数：</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="十个手指" name="gV3[visafinger]"  >
						十个手指
						</label>
						<label class="radio inline">
						  <input type="radio" value="两个手指" name="gV3[visafinger]" checked="checked" >
						两个手指
						</label>
				</div>
			</div>
		</div>
		<div class="form-group">
		    <div class="col-sm-5">
				<label for="" class="control-label"> 您的美国签证是否曾经遗失或者被盗？</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="visa"  id = "visaLost" <?php echo $visaLost;?>>
						是
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="visa"  id = "noVisaLost" <?php echo $noVisaLost;?>>
						否
						</label>
				</div>
			</div>	
		</div>
		<div class="form-group" id = "visaLostGroup" style="display:<?php echo $showVisaLostDiv;?>;">
		       <div class="col-sm-4">
				<label for="" class="control-label">您遗失或者被盗的签证的签证号：</label>
				<input class="form-control validate[required]"  type="text"  name="lostvisanumber" value="<?php echo $visa->lostvisanumber;?>">
			</div>
			<div class="col-sm-4">
				<label for="" class="control-label">您遗失或者被盗的签证的签证颁发日期：</label>
				<input class="form-control validate[required]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="lostvisadate" value="<?php echo $visa->lostvisadate=='0000-00-00'?'':$visa->lostvisadate;?>">
			</div>
			
			
		</div>
	
	</div>	
 </div>
   <div id="refusedGroup" style="display:<?php echo $showRefusedDiv;?>;">
      <div class="well">
	      <h4 class="green smaller lighter"> 如果您选择“是”，请继续填写以下内容&nbsp;&nbsp;&nbsp;&nbsp;<span class="red smaller lighter">From :&nbsp;申请人是否曾经被拒签、或者被拒绝入境美国或者入境时被撤回入境申请</span>：</h4>
	      <div class="form-group">
			  <div class="col-sm-7">
				<label for="" class="control-label">曾经被拒签、拒绝入境美国、入境时被撤回入境申请的时间：</label>
				<input class="form-control validate[required]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="refuseddate" value="<?php echo $visa->refuseddate=='0000-00-00'?'':$visa->refuseddate;?>">
			</div>
			<div class="col-sm-5">
				<label for="" class="control-label">您曾经被拒签、拒绝入境美国、入境时被撤回入境申请的原因：</label>
				<input type="text" class="form-control validate[required]" id="" placeholder="您曾经被拒签、拒绝入境美国、入境时被撤回入境申请的原因" name="refusedreason" value="<?php echo $visa->refusedreason;?>">
			</div>
			
		</div>
		  <div class="form-group">
		    <div class="col-sm-6">
				<label for="" class="control-label">您曾经被拒签时所申请的签证类型：</label>
				<input type="text" class="form-control" id="" placeholder="您曾经被拒签时所申请的签证类型" name="refusedvisatype" value="<?php echo $visa->refusedvisatype;?>" >
			</div>
			<div class="col-sm-6">
				<label for="" class="control-label">您被拒绝入境美国或者入境时被撤回入境申请时所持的签证类型：</label>
				<input type="text" class="form-control" id="" placeholder="您被拒绝入境美国或者入境时被撤回入境申请时所持的签证类型"  name="refusedimmigrationvisatype" value="<?php echo $visa->refusedimmigrationvisatype;?>">
			</div>
		  </div>
	  </div>
   </div>
   <div id="logOffGroup" style="display:<?php echo $showLogoffDiv;?>;">
       <div class="well">
	       <h4 class="green smaller lighter"> 如果您选择“是”，请继续填写以下内容&nbsp;&nbsp;&nbsp;&nbsp;<span class="red smaller lighter">From :&nbsp;申请人曾经获得的美国签证是否曾经被注销或者撤销？</span>：</h4>
	      <div class="form-group">
			  <div class="col-sm-7">
				<label for="" class="control-label">您曾经被注销或者撤销的签证的签证颁发时间：</label>
				<input class="form-control validate[required]" type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="logoffvisadate" value="<?php echo $visa->logoffvisadate=='0000-00-00'?'':$visa->logoffvisadate;?>">
			</div>
			<div class="col-sm-5">
				<label for="" class="control-label">您曾经被注销或者撤销的签证的签证号码：</label>
				<input type="text" class="form-control validate[required]" id="" placeholder="您曾经被注销或者撤销的签证的签证号码：" name="logoffvisanumber" value="<?php echo $visa->logoffvisanumber;?>">
			</div>
			
		</div>
		  <div class="form-group">
		    <div class="col-sm-12">
				<label for="" class="control-label">签证注销或撤离原因：</label>
				<input type="text" class="form-control" id="" placeholder="签证注销或撤离原因" name="logoffvisareason" value="<?php echo $visa->logoffvisareason;?>">
			</div>
			
		  </div>
	   </div>
   </div>
<?php
  $goneOther = '';
  $noGoneOther = 'checked="checked"';
  $showGoneOtherDiv = 'none';
  if(!$this->Goneother[0]->getIsNewRecord()){
     $goneOther = 'checked="checked"';
     $noGoneOther = '';
     $showGoneOtherDiv = 'block';
  }
  $refusedByOther = '';
  $noRefusedByOther = 'checked="checked"';
  $showRefusedByOtherDiv = 'none';
  if($visa->refusednation_o !== '' && !$visa->getIsNewRecord()){
     $refusedByOther = 'checked="checked"';
     $noRefusedByOther = '';
     $showRefusedByOtherDiv = 'block';
  }
?>
<div class="well">
      <h4 class="green smaller lighter">2.其他国家</h4>
	  	   <div class="form-group">
			<div class="col-sm-6">
				<label for="" class="control-label">是否存在其他出境记录/申请人是否去过其他国家（除美国外）？</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="goneOther"  id = "goneOther" <?php echo $goneOther;?> >
						是
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="goneOther"  id = "noGoneOther" <?php echo $noGoneOther;?>>
						否
						</label>
				</div>
			</div>
			
			<div class="col-sm-6">
				<label for="" class="control-label">申请人是否曾经被其他国家拒签，或者拒绝入境或入境时被撤销入境申请？</label>
				<br>
				 <div class="controls">
						<label class="radio inline">
						  <input type="radio" value="A" name="refusedByOther"  id = "refusedByOther" <?php echo $refusedByOther?> >
						是
						</label>
						<label class="radio inline">
						  <input type="radio" value="B" name="refusedByOther" id = "noRefusedByOther" <?php echo $noRefusedByOther;?> >
						否
						</label>
				</div>
			</div>
		</div>
	  
</div>
<hr>
<div id="goneOtherGroup" style="display:<?php echo $showGoneOtherDiv;?>;">
     <div class="well">
	      <h4 class="green smaller lighter"> 如果您选择“是”，请继续填写以下内容&nbsp;&nbsp;&nbsp;&nbsp;<span class="red smaller lighter">From :&nbsp;其他出境记录/申请人是否去过其他国家（除美国外）</span>：</h4>
		 <div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
		    <div class="col-sm-3">
				<label for="" class="control-label">所到国家名称：</label>
				<input type="text" class="form-control validate[groupRequired[gO]]" id="gO1" placeholder="曾经所到国家名称" name="gO1[nationname]" value="<?php echo $this->Goneother[0]->nationname;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">出境所持签证类型：</label>
				<input type="text" class="form-control validate[condRequired[gO1]]" id="" placeholder="每次出境所持签证类型" name="gO1[visatype]" value="<?php echo $this->Goneother[0]->visatype;?>">
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">出境的事由：</label>
				<input type="text" class="form-control validate[condRequired[gO1]]" id="" placeholder="每次出境的事由或者目的" name="gO1[reason]" value="<?php echo $this->Goneother[0]->reason;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">出境时间：</label>
				<input class="form-control validate[condRequired[gO1]]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gO1[begintime]" value="<?php echo $this->Goneother[0]->begintime;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">返回时间：</label>
				<input class="form-control validate[condRequired[gO1]]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gO1[backtime]" value="<?php echo $this->Goneother[0]->backtime;?>">
			</div>
		 </div>
		   <div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
		    <div class="col-sm-3">
				<label for="" class="control-label">所到国家名称：</label>
				<input type="text" class="form-control validate[groupRequired[gO]" id="gO2" placeholder="曾经所到国家名称" name="gO2[nationname]" value="<?php echo $this->Goneother[1]->nationname;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">出境所持签证类型：</label>
				<input type="text" class="form-control validate[condRequired[gO2]]" id="" placeholder="每次出境所持签证类型" name="gO2[visatype]" value="<?php echo $this->Goneother[1]->visatype;?>">
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">出境的事由：</label>
				<input type="text" class="form-control validate[condRequired[gO2]]" id="" placeholder="每次出境的事由或者目的" name="gO2[reason]" value="<?php echo $this->Goneother[1]->reason;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">出境时间：</label>
				<input class="form-control validate[condRequired[gO2]]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gO2[begintime]" value="<?php echo $this->Goneother[1]->begintime;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">返回时间：</label>
				<input class="form-control validate[condRequired[gO2]]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gO2[backtime]" value="<?php echo $this->Goneother[1]->backtime;?>">
			</div>
		 </div>
		  <div class="form-group" data-rel="tooltip" data-original-title="若有多条记录，请分别填写">
		    <div class="col-sm-3">
				<label for="" class="control-label">所到国家名称：</label>
				<input type="text" class="form-control validate[groupRequired[gO]" id="gO3" placeholder="曾经所到国家名称" name="gO3[nationname]" value="<?php echo $this->Goneother[2]->nationname;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">出境所持签证类型：</label>
				<input type="text" class="form-control validate[condRequired[gO3]]" id="" placeholder="每次出境所持签证类型" name="gO3[visatype]" value="<?php echo $this->Goneother[2]->visatype;?>">
			</div>
			<div class="col-sm-3">
				<label for="" class="control-label">出境的事由：</label>
				<input type="text" class="form-control validate[condRequired[gO3]]" id="" placeholder="每次出境的事由或者目的" name="gO3[reason]" value="<?php echo $this->Goneother[2]->reason;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">出境时间：</label>
				<input class="form-control validate[condRequired[gO3]]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gO3[begintime]" value="<?php echo $this->Goneother[2]->begintime;?>">
			</div>
			<div class="col-sm-2">
				<label for="" class="control-label">返回时间：</label>
				<input class="form-control validate[condRequired[gO3]]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="gO3[backtime]" value="<?php echo $this->Goneother[2]->backtime;?>">
			</div>
		 </div>
	</div>
</div>
<div id="refusedByOtherGroup" style="display:<?php echo $showRefusedByOtherDiv;?>;">
     <div class="well">
	      <h4 class="green smaller lighter"> 如果您选择“是”，请继续填写以下内容&nbsp;&nbsp;&nbsp;&nbsp;<span class="red smaller lighter">From :&nbsp;申请人是否曾经被其他国家拒签，或者拒绝入境或入境时被撤销入境申请？</span>：</h4>
        <div class="form-group">
		<div class="col-sm-6">
				<label for="" class="control-label">您曾经被拒签、拒绝入境、入境时被撤回入境申请的时间：</label>
				<input class="form-control validate[required]"  type="text" data-type = "date-picker" data-date-format="yyyy-mm-dd" name="refuseddate_o" value="<?php echo $visa->refuseddate_o=='0000-00-00'?'':$visa->refuseddate_o;?>">
			</div>
			<div class="col-sm-6">
				<label for="" class="control-label">您曾经被拒签、拒绝入境、入境时被撤回入境申请的国家：</label>
				<input type="text" class="form-control validate[required]" id="" placeholder="您曾经被拒签、拒绝入境、入境时被撤回入境申请的国家" name="refusednation_o"  value="<?php echo $visa->refusednation_o;?>" >
			</div>
			<div class="col-sm-6">
				<label for="" class="control-label">您曾经被拒签、拒绝入境、入境时被撤回入境申请的原因：：</label>
				<input type="text" class="form-control" id="" placeholder="您曾经被拒签、拒绝入境、入境时被撤回入境申请的原因：" name="refusedreason_o"value="<?php echo $visa->refusedreason_o;?>">
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-6">
				<label for="" class="control-label">您曾经被拒签时所申请的签证类型：</label>
				<input type="text" class="form-control" id="" placeholder="您曾经被拒签时所申请的签证类型" name="refusedvisatype_o" value="<?php echo $visa->refusedvisatype_o;?>">
			</div>
			<div class="col-sm-6">
				<label for="" class="control-label">您被拒绝入境或者入境时被撤回入境申请时所持的签证类型：</label>
				<input type="text" class="form-control" id="" placeholder="您被拒绝入境或者入境时被撤回入境申请时所持的签证类型" name="refusedimmigrationvisatype_o" value="<?php echo $visa->refusedimmigrationvisatype_o;?>">
			</div>
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

	       $('#goneOther').click(function(){
			   $('#goneOtherGroup').show(200); 
			});
			$('#noGoneOther').click(function(){
			   $('#goneOtherGroup').hide(200); 
			});
			$('#refusedByOther').click(function(){
			   $('#refusedByOtherGroup').show(200);
			});
			$('#noRefusedByOther').click(function(){
			   $('#refusedByOtherGroup').hide(200);
			});
	/////////////////
     $('#goneAmerica').click(function(){
	     $('#goneAmericaGroup').show(200);
	 });
	 $('#noGoneAmerica').click(function(){
	     $('#goneAmericaGroup').hide(200);
	 });
	 
	 
	 $('#hasLicense').click(function(){
	     $('#licenseGroup').show(200);
	 });
	 $('#noLicense').click(function(){
	     $('#licenseGroup').hide(200);
	 });
	 //////////////////////
	 $('#hasAmericaVisa').click(function(){
	     $('#visaGroup').show(200);
	 });
	  $('#noAmericaVisa').click(function(){
	     $('#visaGroup').hide(200);
	 });
	  $('#visaLost').click(function(){
	     $('#visaLostGroup').show(200);
	 });
	 $('#noVisaLost').click(function(){
	     $('#visaLostGroup').hide(200);
	 });
	 //////////////////////////
	  $('#hasRefused').click(function(){
	     $('#refusedGroup').show(200);
	 });
	 $('#noRefused').click(function(){
	     $('#refusedGroup').hide(200);
	 });
	 //////////////
	  $('#hasLogoff').click(function(){
	     $('#logOffGroup').show(200);
	 });
	 $('#noLogoff').click(function(){
	     $('#logOffGroup').hide(200);
	 });
	 
  });
</script>