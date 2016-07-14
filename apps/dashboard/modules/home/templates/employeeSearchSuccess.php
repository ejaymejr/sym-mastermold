<?php use_helper('Validation', 'Javascript') ?>
<div class="contentBox">
<?php 
if (isset($pager))
{
    $filename = PagerJson::SearchEmployee($pager, sfContext::getInstance()->getUser()->getUsername());
	$cols = array('seq', 'action', 'employee_no', 'name', 'company', 'account_no', 'joined-date', 'work-schedule');
	echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
}
?>
</div>