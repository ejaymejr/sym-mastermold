<?php

/**
 * Subclass for performing query and update operations on the 'namelist_header' table.
 *
 * 
 *
 * @package lib.model.hgas3
 */ 
class NamelistHeaderPeer extends BaseNamelistHeaderPeer
{
	public static function GetDataByDateRange($sdt, $edt)
	{
		$c = new Criteria();
		$c->add(self::DATE_PRINTED, 'date ('.self::DATE_PRINTED.') >= "'.$sdt.'" and date('.self::DATE_PRINTED.') <= "'.$edt.'"', Criteria::CUSTOM );
		$rs = self::doSelect($c);
		$list = array();
		foreach ($rs as $r):
			$list[$r->getId()] = $r->getId();
		endforeach;
		return $list;	
	}
}
