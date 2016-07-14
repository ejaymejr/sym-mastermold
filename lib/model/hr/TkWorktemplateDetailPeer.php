<?php

/**
 * Subclass for performing query and update operations on the 'tk_worktemplate_detail' table.
 *
 * 
 *
 * @package lib.model.hr
 */ 
class TkWorktemplateDetailPeer extends BaseTkWorktemplateDetailPeer
{
	public static function GetWorkTempDetailbyWTNo($no, $hol = null) {
		$c = new Criteria();
		$c->add(TkWorktemplateDetailPeer::TK_WORKTEMPLATE_NO, $no);
		$c->addAscendingOrderByColumn(self::DATE_DET);
		$rs = self::doSelect($c);
		$ddet = array();
		$swor = array();
		$dayn = array();
		foreach($rs as $res)
		{
			$ddet[] = $res->getDateDet();
			//$swor[] = HrHolidayPeer::IsHoliday($res->getDateDet())? 0 : $res->getIsWorking();
			$dayn[] = $res->getDay();
			$swor[] = (in_array($res->getDateDet(), $hol)) ? 0 : $res->getIsWorking();
		}
		return array('index'=>$dayn, 'date'=>$ddet, 'no_hours'=>$swor);
	}

	public static function GetIDbyWTmpNoDate($no, $date) {
		$c = new Criteria();
		$c->add(self::TK_WORKTEMPLATE_NO, $no);
		$c->add(self::DATE_DET, $date);		
		$rs = self::doSelectone($c);
		return $rs;
	}
	
    public static function DeleteWorkTempDetailbyWTNo($no) 
    {
        $c = new Criteria();
        $c->add(TkWorktemplateDetailPeer::TK_WORKTEMPLATE_NO, $no);
        $rs = self::doDelete($c);
    }    
	
    public static function GetOptimizedDatabyWtno($wtno, $fldList)
    {
        $c = new Criteria();
        $c->clearSelectColumns();
        foreach($fldList as $kf=>$vf)
        {
            switch(strtolower($vf))
            {
                case 'tk_worktemplate_no':
                    $c->addSelectColumn(self::TK_WORKTEMPLATE_NO);
                    break;
                case 'is_working':
                    $c->addSelectColumn(self::IS_WORKING);
                    break;
            }
        }
        
        $c->add(self::TK_WORKTEMPLATE_NO, $wtno);
        $rs = self::doSelectRS($c);
        $rs->setFetchMode(ResultSet::FETCHMODE_ASSOC);
        while ($rs->next()) 
        {
            return $rs; // nr of column in select clause
        }
    }
    
    public static function DoEmptyData()
    {
//		$pdo = Propel::getConnection('hr');
//		$pdo->exec("TRUNCATE TABLE tk_worktemplate_detail");
// 		$dbObj = new DbObject();
// 		$dbOjb->DoSQL("TRUNCATE tk_worktemplate_detail");
		Propel::getConnection('hr')->executeUpdate('TRUNCATE TABLE tk_worktemplate_detail');
		return;
    }
        
    public static function GetDataByDayWorktemplate($cday, $wtno)
    {
    	$c = new Criteria();
    	$c->add(self::DAY, $cday);
    	$c->add(self::TK_WORKTEMPLATE_NO, $wtno);
    	$rs = self::doSelectOne($c);
    	return $rs;
    }
    
    public static function isWorking($cday, $wtno)
    {
    	$c = new Criteria();
    	$c->add(self::DATE_DET, $cday);
    	$c->add(self::TK_WORKTEMPLATE_NO, $wtno);
    	$rs = self::doSelectOne($c);
    	$isWorking = $rs? $rs->getIsWorking() : false;
    	return $isWorking;
    }
    
    public static function GetNormalHours($cday, $wtno)
    {
    	$c = new Criteria();
    	$c->add(self::DATE_DET, $cday);
    	$c->add(self::TK_WORKTEMPLATE_NO, $wtno);
    	$rs = self::doSelectOne($c);
    	return $rs;
    }
    
    public static function IsWorkingThisDay($cday, $wtno)
    {
    	$isWorking = false;
//    	var_dump(DateUtils::DUFormat('l', $cday));
//    	exit();
    	if ($wtno == 'NON PUNCHING'):
    		if (DateUtils::DUFormat('l', $cday) == 'Saturday' || DateUtils::DUFormat('l', $cday) == 'Sunday'):
    			$isWorking = 0;
    		else:
    			$isWorking = 8;
    		endif;
    	else:
    			$c = new Criteria();
		    	$c->add(self::DAY, $cday);
		    	$c->add(self::TK_WORKTEMPLATE_NO, $wtno);
		    	$rs = self::doSelectOne($c);
		    	if ($rs):
		    		$isWorking = $rs->getIsWorking();
		    	else:
		    		$isWorking = 0;
		    	endif;
    	endif;
    	return $isWorking;
    }
}
