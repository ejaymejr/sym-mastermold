<?php

/**
 * Subclass for performing query and update operations on the 'hr_employee_leave' table.
 *
 *
 *
 * @package lib.model.hr
 */
class HrEmployeeLeavePeer extends BaseHrEmployeeLeavePeer
{
    const CUSTOM = "CUSTOM";
    
    public static function GetPager($cd)
    {        
        $startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
        $rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 100);
        $page = (int) ( ($startIndex + 1) / $rowsPerPage);
        if (( ($startIndex + 1) % $rowsPerPage) != 0) {
            $page++;
        }
        
        $page = sfContext::getInstance()->getRequest()->getParameter('page', 1); 
        
        $c = clone($cd);
        $pager = new sfPropelPager('HrEmployeeLeave', $rowsPerPage);                    
                    
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }  
        
    public static function EmpLeaveSearch($xpg){
        //$c = new HrEmployeeCriteria(HrEmployeePeer::CHINESE_NAME);
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::DATE_FILED);
        $pager = new sfPropelPager('HrEmployeeLeave', 20);
        $pager->setCriteria($c);
        $pager->setPage($xpg);
        $pager->init();
        return array('pager'=>$pager, 'count'=>self::doCount($c) );
    }

    public static function GetAllDateLeaveType($emp) {
        $c = new Criteria();
        $c->add(self::EMPLOYEE_NO, $emp);
        $c->add(self::HR_LEAVE_ID, 5, Criteria::NOT_EQUAL);     //--------------- do not retrieve leave without pay
        $rs = self::doSelect($c);
        $leave = array('from'=>array(), 'to'=>array(), 'leave_type'=>array(), 'half_day'=>array());
        foreach($rs as $res)
        {
            $leave['from'][]       = $res->getInclusiveDateFrom();
            $leave['to'][]         = $res->getInclusiveDateto();
            $leave['leave_type'][] = $res->getLeaveType();
            $leave['half_day'][]   = $res->getHalfDay();
            $leave['id'][]         = $res->getId();
        }
        return $leave;
    }
    
//    public static function GetAllDateLeaveTypeByYear($emp) {
//        $c = new Criteria();
//        $c->add(self::EMPLOYEE_NO, $emp);
//        $c->add(self::HR_LEAVE_ID, 5, Criteria::NOT_EQUAL);     //--------------- do not retrieve leave without pay
//        $rs = self::doSelect($c);
//        $leave = array('from'=>array(), 'to'=>array(), 'leave_type'=>array(), 'half_day'=>array());
//        foreach($rs as $res)
//        {
//            $leave['from'][]       = $res->getInclusiveDateFrom();
//            $leave['to'][]         = $res->getInclusiveDateto();
//            $leave['leave_type'][] = $res->getLeaveType();
//            $leave['half_day'][]   = $res->getHalfDay();
//            $leave['id'][]         = $res->getId();
//        }
//        return $leave;
//    }

    public static function GetAllDatabyYear($yr) {
        $c = new Criteria();
        $c->add(self::INCLUSIVE_DATEFROM,  'YEAR(DATE(' . self::INCLUSIVE_DATEFROM . ')) >= \'' . $yr . '\' OR YEAR(DATE(' . self::INCLUSIVE_DATETO . ')) = \'' . $yr . '\'', self::CUSTOM);
        $c->add(self::HR_LEAVE_ID, 5, Criteria::NOT_EQUAL);     //--------------- do not retrieve leave without pay
        //$c->add(self::APPROVED, '&& || &&', Criteria::CUSTOM);
        $rs = self::doSelect($c);
        $leave = array('from'=>array(), 'to'=>array(), 'leave_type'=>array(), 'half_day'=>array(), 'id'=>array(), 'employee_no'=>array());
        foreach($rs as $res)
        {
            $leave['from'][]       = $res->getInclusiveDateFrom();
            $leave['to'][]         = $res->getInclusiveDateto();
            $leave['leave_type'][] = $res->getLeaveType();
            $leave['half_day'][]   = $res->getHalfDay();
            $leave['id'][]         = $res->getId();
            $leave['employee_no'][]= $res->getEmployeeNo();
        }
        return $leave;
    }
        
    
    public static function GetEmployeeNoPerMonth($cdt) 
    {
    	$sdt = DateUtils::DUFormat('Y-m-01' , $cdt);
    	$edt = DateUtils::DUFormat('Y-m-t', $cdt);
    	$c = new Criteria();
    	$c->add(self::INCLUSIVE_DATEFROM,  '(DATE(' . self::INCLUSIVE_DATEFROM . ')) >= \'' . $sdt . '\' OR (DATE(' . self::INCLUSIVE_DATETO . ')) = \'' . $sdt . '\'', self::CUSTOM);
    	$c->add(self::INCLUSIVE_DATETO,  '(DATE(' . self::INCLUSIVE_DATETO . ')) >= \'' . $edt . '\' OR (DATE(' . self::INCLUSIVE_DATETO . ')) = \'' . $edt . '\'', self::CUSTOM);
    	$c->addAscendingOrderByColumn(self::NAME);
	   	//$c->add(self::APPROVED, '&& || &&', Criteria::CUSTOM);
    	$rs = self::doSelect($c);
    	$list = array();
    	foreach($rs as $res)
    	{
    		$list[$res->getEmployeeNo()] = $res->getName();
    	}
    	return $list;
    }
    
    public static function GetCountLeaveType($lId, $fiscal)
    {
        $el = new criteria();
        $el->add(HrEmployeeLeavePeer::HR_LEAVE_ID , $lId);
        $el->add(HrEmployeeLeavePeer::FISCAL_YEAR , $fiscal);
        $cnt = HrEmployeeLeavePeer::doCount($el);
        return $cnt;
    }
    
    //public static function GetCountLeaves($empno, $leaveType, $fiscal=null, $month=null)
    public static function GetCountLeaves($empno, $leaveType, $fiscal=null)
    {
        $c = new criteria();
        $c->add(self::EMPLOYEE_NO   , $empno);
        $c->add(self::HR_LEAVE_ID   , $leaveType);
        $c->add(self::FISCAL_YEAR   , $fiscal);
        $tot = 0;        
        $rs = self::doSelect($c);
        foreach($rs as $rec)
        {
            $tot = $tot + $rec->getNoDays();
        }
        return $tot;
    }

    public static function GetCountPaidLeaves($empno, $fiscal=null)
    {
        $c = new criteria();
        $c->add(self::EMPLOYEE_NO   , $empno);
        $c->add(self::HR_LEAVE_ID   , '1', Criteria::NOT_EQUAL);  //MC
        $c->add(self::HR_LEAVE_ID   , '6', Criteria::NOT_EQUAL);  //Unpaid Leave
        $c->add(self::FISCAL_YEAR   , $fiscal);
        $tot = 0;        
        $rs = self::doSelect($c);
        foreach($rs as $rec)
        {
            $tot = $tot + $rec->getNoDays();
        }
        return $tot;

    }
    
	public static function IsDuplicate($empno, $fiscal, $sdt, $edt){
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->add(self::FISCAL_YEAR, $fiscal);
		
		$nc1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ') >= \'' . $sdt . '\' AND DATE(' . self::INCLUSIVE_DATEFROM . ') <= \'' . $edt . '\'', self::CUSTOM);
		$nc2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') >= \'' . $sdt . '\' AND DATE(' . self::INCLUSIVE_DATETO . ') <= \'' . $edt . '\'', self::CUSTOM);
		
		$nc = $nc1->addOr($nc2);
		$c->addAnd($nc);
		//$c->add(self::IC_NO, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		
		return ($rs ? 'DUPLICATE' : NULL); 
	}

	
	public static function IsOnleave($empno, $cdt){
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$nc1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ') <= \'' . $cdt . '\'', self::CUSTOM);
		$nc2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') >= \'' . $cdt . '\'', self::CUSTOM);
		$nc = $nc1->addAnd($nc2);
		$c->addAnd($nc);
		
		$rs = self::doSelectOne($c);
		return ($rs); 
	}
	
	public static function IsOnleaveByName($name, $cdt){
		$c = new Criteria();
		$c->add(self::NAME, $name);
		$nc1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ') <= \'' . $cdt . '\'', self::CUSTOM);
		$nc2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') >= \'' . $cdt . '\'', self::CUSTOM);
		$nc = $nc1->addAnd($nc2);
		$c->addAnd($nc);
	
		$rs = self::doSelectOne($c);
		return ($rs);
	}

	public static function IsOnMCleave($empno, $sdt, $edt){
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->add(self::LEAVE_TYPE, 'Medical Leave');
		$s1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ')>= \'' . $sdt . '\'', self::CUSTOM);
		$s2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') <= \'' . $edt . '\'', self::CUSTOM);
		$e1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ') >= \'' . $sdt . '\'', self::CUSTOM);
		$e2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') <= \'' . $edt . '\'', self::CUSTOM);
		$start = $s1->addAnd($s2);
		$end = $e1->addAnd($e2);
		$start->addOr($end);
		$c->addAnd($start);
		//$c->add(self::IC_NO, '&& || &&' , Criteria::CUSTOM);
		$rs = self::doSelectOne($c);
		return ($rs? true : false);
	}
		
	public static function GetAppliedLeave($empno, $cdt){
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$nc1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ') <= \'' . $cdt . '\'', self::CUSTOM);
		$nc2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') >= \'' . $cdt . '\'', self::CUSTOM);
		$nc = $nc1->addAnd($nc2);
		$c->addAnd($nc);
		$rs = self::doSelectOne($c);
		return $rs ? $rs->getLeaveType() : ''; 
	}
	
	public static function GetOptimizedDatabyEmployeeNo($empNo, $fldList)
	{
		$c = new Criteria();
		$c->clearSelectColumns();
		$c->add(self::EMPLOYEE_NO, $empNo);
		foreach($fldList as $kf=>$vf)
		{
			switch(strtolower($vf))
			{
				case 'id':
					$c->addSelectColumn(self::ID);
					break;
				case 'name':
					$c->addSelectColumn(self::NAME);
					break;
				case 'verified_by':
					$c->addSelectColumn(self::VERIFIED_BY);
					break;					
				case 'date_verified':
					$c->addSelectColumn(self::DATE_VERIFIED);
					break;					
				case 'approved_by':
					$c->addSelectColumn(self::APPROVED_BY);
					break;					
				case 'date_approved':
					$c->addSelectColumn(self::DATE_APPROVED);
					break;					
				default:
					break;
			}
		}

		$rs = self::doSelectRS($c);
		$rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
		while ($rs->next())
		{
			return $rs; // nr of column in select clause
		}
	}
		
	public static function GetNameToolTipVerified($ID)
	{
		$data = self::retrieveByPK($ID);
		return '<a href="#" class="tt">'.$data->getVerified().'<span class="tooltip">
		<span class="top"></span><span class="middle">
		Verified By: '.$data->getVerifiedBy()
		.' <br /> Date : '.$data->getDateVerified()
		.'</span>
		<span class="bottom"></span></span></a>';
	}	
	
	public static function GetNameToolTipApproved($ID)
	{
		$data = self::retrieveByPK($ID);
		return '<a href="#" class="tt">'.$data->getApproved().'<span class="tooltip">
		<span class="top"></span><span class="middle">
		Approved By: '.$data->getApprovedBy()
		.' <br /> Date : '.$data->getDateApproved()
		.'</span>
		<span class="bottom"></span></span></a>';
	}	
		
	public static function ConvertToLeaveEntry($dtarr, $dtrmaster)
	{
		//sort the dates
		$dates = array();
		$dtx = array();
		$k = 0;
		$dtarrVal = '';
		foreach($dtarr as $k=>$dtarrVal):
			$dtx[strtotime($dtarrVal)] = $dtarrVal;
		endforeach;
		ksort($dtx);
		foreach($dtx as $k=>$dtarrVal):
		if (($dtarrVal) <> ''):
			$dates[] = trim($dtarrVal);
		endif;
		endforeach;
		
		if (sizeof($dates) <= 0 ) return;
		//map the dates
		
		$isWorking = false;
		$isHoliday = false;
		$curdate = DateUtils::DUFormat('Y-m-01', $dates[0]);
		$calDates = array();
		$tempVal = false;
		for($x=0; $x<= DateUtils::DUFormat('t', $curdate) - 1 ; $x++):
			$current = DateUtils::AddDate($curdate, $x );
			$isHoliday = HrHolidayPeer::IsHoliday($current);
			$isWorking = TkWorktemplateDetailPeer::isWorking($current, $dtrmaster->getTkWorktemplateNo());
			if (in_array($current, $dates )):
				if ($dtrmaster->getTkWorktemplateNo() == 'NON PUNCHING'  ):
					$tempVal = ( DateUtils::DUFormat('l', $current) == 'Sunday')? 'N' : 'Y';
					$calDates[ $current ] = $isHoliday? 'N' : $tempVal;
				else:
					$tempVal = $isWorking? 'Y' : 'N';
					$calDates[ $current ] = $isHoliday? 'N' : $tempVal;
				endif;
			else:
				$calDates[ $current ] = 'N';
			endif;
			
		endfor;
		
		$sdt = '';
		$edt = '';		
		$odt = '';
		$leave = array();
		foreach($calDates as $dt => $onLeave):
			if ($onLeave == 'Y'):
				if (! $sdt):
					$sdt = $dt;
					$edt = $dt;
					$odt = '';
				else:
					$edt = $dt;
				endif;
				/* LEE FONG LIN AUGUST 12-31, 2013 HOSPITALIZATION LEAVE */
				$leave[$sdt] = $edt;  
			else:
				if ($sdt && $edt):
					if ( DateUtils::DUFormat('l', $dt) == 'Sunday'):
					else:
						//$leave[$sdt] = $edt;
						$sdt = '';
						$edt = '';					
					endif;
				endif;
			endif;
			//echo $dt . ' ' . $onLeave . '<br>';
			//
		endforeach;
//		 		var_dump($leave);
// 		 		exit();
		return $leave;
	}
	
	public static function GetEmployeeListPerDay($cdt, $company=null)
	{
		$c = new Criteria();
		$c->add(self::INCLUSIVE_DATEFROM,  '(DATE(' . self::INCLUSIVE_DATEFROM . ')) <= \'' . $cdt . '\' and (DATE(' . self::INCLUSIVE_DATETO . ')) >= \'' . $cdt . '\'', self::CUSTOM);
		$c->addAscendingOrderByColumn(self::NAME);
		$c->addJoin(self::EMPLOYEE_NO, HrEmployeePeer::EMPLOYEE_NO);
		if ($company) $c->add(HrEmployeePeer::HR_COMPANY_ID, $company);
		//$c->add(self::APPROVED, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$list = array();
		foreach($rs as $res)
		{
			$list[$res->getName()] =   $res->getLeaveType();
		}
		return $list;
	}
	
	public static function GetLeaveLegendColor($leave)
	{
		$cClass = '';
		switch( strtolower($leave) ) :
			case 'annual leave':
				$cClass = "leaveColorAnnual";
				break;
			case 'child care':
				$cClass = "leaveColorChildCare";
				break;
			case 'compassionate leave':
				$cClass = "leaveColorCompassionateLeave";
				break;
			case 'medical leave':
				$cClass = "leaveColorMedical";
				break;
			case 'leave without pay':
				$cClass = "leaveColorWithoutPay";
				break;
			case 'hospitalization leave':
				$cClass = "leaveColorHospitalization";
				break;
			case 'maternity leave':
				$cClass = "leaveColorMaternityLeave";
				break;
			default:
				$cClass = "leaveColorDefault";
				break;
		endswitch;
		return $cClass;
	}
	
	public static function GetLeaveLegend()
	{
		$leaveList = HrLeavePeer::GetLeaveType();
		$msg = '';
		foreach($leaveList as $leave):
			$cClass = HrEmployeeLeavePeer::GetLeaveLegendColor($leave);
			$msg .= '<div class="calendarNames "><div class="leaveLegend '.$cClass.'"></div>&nbsp;&nbsp;&nbsp;'.substr($leave, 0, 20) .'</div>';
		endforeach;
		return $msg;
	}
	
	public static function IsOnLeaveGetDays($empno, $sdt, $edt, $leaveType){
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$c->add(self::LEAVE_TYPE, $leaveType);
		$s1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ')>= \'' . $sdt . '\'', self::CUSTOM);
		$s2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') <= \'' . $edt . '\'', self::CUSTOM);
		$e1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ') >= \'' . $sdt . '\'', self::CUSTOM);
		$e2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') <= \'' . $edt . '\'', self::CUSTOM);
		$start = $s1->addAnd($s2);
		$end = $e1->addAnd($e2);
		$start->addOr($end);
		$c->addAnd($start);
		//$c->add(self::IC_NO, '&& || &&' , Criteria::CUSTOM);
		$rs = self::doSelectOne($c);
		return $rs ? $rs->getNoDays() : 0;
	}
	
	public static function GetLeaveDetail($empno, $cdt){
		$c = new Criteria();
		$c->add(self::EMPLOYEE_NO, $empno);
		$nc1 = $c->getNewCriterion(self::INCLUSIVE_DATEFROM,  'DATE(' . self::INCLUSIVE_DATEFROM . ') <= \'' . $cdt . '\'', self::CUSTOM);
		$nc2 = $c->getNewCriterion(self::INCLUSIVE_DATETO,  'DATE(' . self::INCLUSIVE_DATETO . ') >= \'' . $cdt . '\'', self::CUSTOM);
		$nc = $nc1->addAnd($nc2);
		$c->addAnd($nc);
		$rs = self::doSelectOne($c);
		return $rs;
	}
	
}
