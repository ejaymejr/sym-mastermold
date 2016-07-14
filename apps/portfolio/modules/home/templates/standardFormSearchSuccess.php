<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<table class="table bordered">
<tr>
	<td colspan="3" >
	<nav class="breadcrumbs">
		<ul>
			<li><?php echo link_to('<i class="icon-home"></i>','home/index') ?></li>
			<li><?php echo link_to('Add New Employee','home/employeeAdd') ?></li>
			<li class="active"><a href="#">&nbsp;</a></li>
		</ul>
	</nav>
	</td>
</tr>
</table>
<?php 
if (isset($pager))
{
    $filename = portfolioLibrary::SearchEmployee($pager, sfContext::getInstance()->getUser()->getUsername());
	$cols = array('seq', 'action', 'employee_no', 'name', 'company', 'account_no', 'joined-date', 'work-schedule');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
</div>