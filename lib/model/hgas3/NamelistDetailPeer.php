<?php

/**
 * Subclass for performing query and update operations on the 'namelist_detail' table.
 *
 * 
 *
 * @package lib.model.hgas3
 */ 
class NamelistDetailPeer extends BaseNamelistDetailPeer
{
	
	public static function CheckDuplicateName($tagID, $headerID)
	{
		$c = new Criteria();
		$c->add(self::TAG_ID, $tagID);
		$c->add(self::NAMELIST_HEADER_ID, $headerID);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByNamelistHeaderID($headerID)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerID);
		//$c->setLimit(1);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByHeaderIDByDate($headerID, $cdate)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerID);
		$c->add(self::TRANS_DATE, $cdate);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByHeaderIDByDateAddedOnly($headerID, $cdate)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerID);
		$c->add(self::TAG_ID, null, Criteria::ISNULL);
		$c->add(self::TRANS_DATE, $cdate);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByHeaderId($headerIDs)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerIDs, Criteria::IN);
		//$c->addGroupByColumn(self::TAG_ID ." CASE " . self::TAG_ID . " is not NULL  then 1 else 0 end" );
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		//$c->add(self::USER_GID, '391899');
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByHeaderIdByTransDate($headerIDs, $transDate)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerIDs, Criteria::IN);
		$c->add(self::TRANS_DATE, $transDate);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetAllData()
	{
		$c = new Criteria();
		$c->addDescendingOrderByColumn(self::TRANS_DATE);
		$c->addGroupByColumn(self::NAMELIST_HEADER_ID);
		$c->addGroupByColumn(self::TRANS_DATE);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function CountByHeaderIdByDate($headerID, $cdate)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerID);
		$c->add(self::TRANS_DATE, $cdate);
		$msg = '';
		$cnt = 0;
		$proc = 0;
		$rs = self::doSelect($c);
		foreach($rs as $r):
			$cnt ++;
			if ($r->getJsChk() || $r->getBootChk() || $r->getSbootChk()) $proc++ ;
		endforeach;
		return $proc . '/'. $cnt;
	}
	
	public static function IsArticleChecked($gid, $cday)
	{
		$sdt = $cday; 
		$edt = DateUtils::AddDate($cday, 6);
		$c = new Criteria();
		$c->add(self::USER_GID, $gid);
		$c->add(self::TRANS_DATE, "date( ".self::TRANS_DATE.") >= '".$sdt."' and date ( ".self::TRANS_DATE." ) <= '".$edt."' ", Criteria::CUSTOM);
		//$c->add(self::ID, '&& || &&', Criteria::CUSTOM);
		$rs = self::doSelect($c);
		$js = false;
		$boot = false;
		$sboot = false;
		foreach($rs as $r):
			if ($r->getJsChk()) $js = 'OK';
			if ($r->getBootChk()) $boot = 'OK';
			if ($r->getSbootChk()) $boot = 'OK';
		endforeach;
		return array('js' => $js, 'boot'=> $boot);
	}
	
	public static function IsArticleCheckedFromPager($detail, $gid, $weekno, $seagateCalendar, $seagateCalendarUtil,  $fiscal)
	{
		$js = '';
		$boot = '';
		foreach($detail as $r):
			if ($r->getUserGid() == $gid ):
				$week = $seagateCalendar->findWeek(DateUtils::DUFormat('Y-m-d', $r->getTransDate()) );
				if ($week == $weekno) :
					if ($r->getJsChk()) $js = '<small>OK</small>';
					if ($r->getBootChk()) $boot = '<small>OK</small>';
					if ($r->getSbootChk()) $boot = '<small>OK</small>';
				endif;
			endif;
		endforeach;
		return array('js' => $js, 'boot'=> $boot);
	}
	
	public static function GetDataByHeaderIdByDateRangeGroupByTagID($headerID, $sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerID);
		$c->add(self::TRANS_DATE, 'date ('.self::TRANS_DATE.') >= "'.$sdt.'" and date('.self::TRANS_DATE.') <= "'.$edt.'"', Criteria::CUSTOM );
		//$c->add(self::USER_GID, '399901');
		$c->addAscendingOrderByColumn(self::ID);
		$c->addGroupByColumn(self::TAG_ID);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByHeaderIdByDateRange($headerID, $sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::NAMELIST_HEADER_ID, $headerID);
		$c->add(self::TRANS_DATE, 'date ('.self::TRANS_DATE.') >= "'.$sdt.'" and date('.self::TRANS_DATE.') <= "'.$edt.'"', Criteria::CUSTOM );
		$rs = self::doSelect($c);
		return $rs;
	}
	
}
