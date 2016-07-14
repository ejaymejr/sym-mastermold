<?php

class portfolioLibrary
{
	public static function Loaders()
	{
		return sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
	}
	public static function EmailProcessLog($sendTo = null, $name = null, $url = null, $checkedBy = null)
	{
		$name = $name? $name : 'Team';
		$url = $url ? $url : '';
		$checkedBy = $checkedBy? $checkedBy : '';
		$content = '';
		$content = $content.'
		
				Dear '.$name.',

				Machine Process & Machine Repair Event Log has new entry that requires your attention.

				url: '. $url .'

				Email Sent by: '. $checkedBy .'
				
				Thank you, 
				
				';
		
		$subject = 'PROCESS REPAIR LOG';
		$requestorEmail = 'mcslogger@gmail.com';
		$recipients =  array($sendTo,  $requestorEmail);
		$mail = EmailUtils::GD_SMTPMail(
				$recipients, $subject, $content, true, false, array());
//		var_dump($mail);
//		exit();
	}
	
	public static function SearchEmployee($pager, $user=null)
	{
		$editDel = "";
		$data = array();
		$seq = 0; 
		$editLink = '';
		$deleteLink = '';
		foreach ($pager as $record):
		$seq ++ ;
		$editLink = link_to('Edit', 'home/employeeEdit?id=' . $record->getId());
		$deleteLink = link_to('Delete', 'home/employeeDelete?id=' . $record->getId(),
                    array('confirm' => 'Record [ '. $record->getName() . ' ]  Sure to delete this record?'));
        $actionLink = $editLink ;      
        if ($user == 'emmanuel') $actionLink = $editLink .' | ' . $deleteLink ;
        //$workid = TkDtrmasterPeer::GetWorkSchedulebyEmployeeNo($record->getEmployeeNo());
		$edit = link_to('show', 'home/uploadEdit?id='. $record->getId());
		$editDel = $edit;
		$data[] = array(
				  'seq'=>$seq
				, 'action'=> '<small>'.$actionLink.'<small>'
				, 'employee_no'=> '<small>'.$record->getEmployeeNo() . '<small>'
				, 'name'=> '<small>'.$record->getName().'<small>'
				, 'company'=> '<small>Present Company<small>'
				, 'account_no'=> '<small>'.$record->getAcctNo().'<small>'
				, 'joined-date'=> '<small>'.$record->getCommenceDate().'<small>'
				, 'work-schedule'=> '<small>8 Hours Daily 6 Days a Week<small>'
		);
		endforeach;
		return $data;
	}
	
	public static function LeaveCreditsPager($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0; 
		$editLink = '';
		$deleteLink = '';
		foreach ($pager as $record):
			$seq ++ ;
			$lBalance = $record->getCredits() - $record->getConsumed();
			$data[] = array(
					  'seq'=>$seq
					, 'leave_type'=> '<small>'. $record->getLeaveType() . '<small>'
					, 'allocation'=> '<small>'. $record->getCredits() . '<small>'
					, 'consumed'=> '<small>'. $record->getConsumed() .'<small>'
					, 'balance'=> '<small>'. $lBalance .'<small>'
					, 'fiscal_year'=> '<small>'. $record->getFiscalYear() .'<small>'
					, 'action'=> ''
			);
		endforeach;
		return $data;
	}
	
	public static function LeaveHistory($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0; 
		$editLink = '';
		$deleteLink = '';
		foreach ($pager as $record):
			$seq ++ ;
			$data[] = array(
					  'seq'=>$seq
					, 'leave'=> '<small>'. $record->getLeaveType() . '<small>'
					, 'from'=> '<small>'. $record->getInclusiveDateFrom() . '<small>'
					, 'to'=> '<small>'. $record->getInclusiveDateTo() .'<small>'
					, 'no_of_days'=> '<small>'. $record->getNoDays() .'<small>'
					, 'half_day'=> '<small>'. $record->getHalfDay() .'<small>'
					, 'action'=> ''
			);
		endforeach;
		return $data;
	}
}
