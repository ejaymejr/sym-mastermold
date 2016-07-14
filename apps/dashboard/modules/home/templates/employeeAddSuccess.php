<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">

<script>
	$(function(){
		$('.tab-control').tabcontrol({
	    effect: 'fade' // or 'slide'
	    });
	});
</script>
<table class="table bordered">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><?php echo link_to('<i class="icon-home"></i>','home/index') ?></li>
			<li class=" "><a id="save" href="<?php echo url_for('employee/employeeSearch') ?>" class="" >Search Name</a></li>
			<li><a href="#">&nbsp;</a></li>
			</ul>
		</nav
	</td>
</tr>
</table>
	<div class="panel" data-role="panel">
	<div class="panel-header bg-orange fg-white">
		<?php echo $employeeData->getName() ?>
	</div>
	<div class="panel-content">
		<?php include_partial('updateNameEmployeeNo', array('employeeData' => $employeeData)) ?> 
	</div>
	</div>
	<br>
	<div class="tab-control" data-role="tab-control" id="generalInfoTab">
    <ul class="tabs">
    <li class="<?php echo ctab('personal', $sf_params->get('active')) ?>"><a href="#_page_1">PERSONAL</a></li>
    <li class="<?php echo ctab('education', $sf_params->get('active')) ?>"><a href="#_page_2">EDUCATION</a></li>
    <li class="<?php echo ctab('workinfo', $sf_params->get('active')) ?>"><a href="#_page_3">WORK INFO</a></li>
    <li class="<?php echo ctab('leave', $sf_params->get('active')) ?>"><a href="#_page_4">LEAVE</a></li>
    <li class="<?php echo ctab('identity', $sf_params->get('active')); ?>"><a href="#_page_5">IC INFO</a></li>	
    <li class="<?php echo ctab('document', $sf_params->get('active')); ?>"><a href="#_page_6">DOCUMENTS</a></li>
    <li class="<?php echo ctab('resigned', $sf_params->get('active')); ?>"><a href="#_page_7">RESIGNED</a></li>
    
    	
    	
			
    <li class="place-right"><a href="#_page_last"><i class="icon-cog"></i></a></li>
    </ul>
     
    <div class="frames">
    <div class="frame" id="_page_1"><?php include_partial('personal'); ?></div>
    <div class="frame" id="_page_2"><?php include_partial('education'); ?></div>
    <div class="frame" id="_page_3"><?php include_partial('workinfo'); ?></div>
    <div class="frame" id="_page_4"><?php include_partial('leave'); ?></div>
    <div class="frame" id="_page_5"><?php include_partial('identity'); ?></div>
    <div class="frame" id="_page_last">Settings here</div>
    </div>
    </div>
	
</div>
<script>
	$(document).ready( function () {
		<?php //echo '$("#'.$sf_params->get('active').'" ).addClass("active"); ' ;?>
	}); 
</script>

<?php 
function ctab($ctab, $activeTab)
{
	$active = '';
	if ($ctab == $activeTab):
		$active ='active';
	endif;
	return $active;
}
?>