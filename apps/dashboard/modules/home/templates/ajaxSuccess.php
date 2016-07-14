<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
<div class="contentBox">
<table class="table bordered">
<tr>
	<td colspan="3" >
		<nav class="breadcrumbs">
			<ul>
			<li><?php echo link_to('<i class="icon-home"></i>','home/index') ?></li>
			<li class=" "><a id="save" href="<?php echo url_for('home/ajax') ?>" class="" >Reset</a></li>
			<li><a href="#">&nbsp;</a></li>
			</ul>
		</nav
	</td>
</tr>
</table>
<table class="bordered table">
<tr>
	<td class="span2 bg-clearBlue"><label>Name</label></td>
	<td class="" ><?php echo HTMLLib::CreateSelect('employee_no', $sf_params->get('employee_no'), $empList,'span5')?></td>
</tr>
<tr >
	<td class="bg-clearBlue"><label>Photo</label></td>
	<td ><div id="DIVPhoto">no photo</div></td>
</tr>
</table>
</div>
<?php echo AjaxLib::AjaxScriptOnChange('employee_no', 'home/ajaxUpdatePhoto', 'employee_no', '', 'DIVPhoto')?>