<?php

/**
 * Subclass for performing query and update operations on the 'department' table.
 *
 * 
 *
 * @package lib.model.hgas
 */ 
class hgasDepartmentPeer extends BasehgasDepartmentPeer
{
	
    public static function GetDeptList()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(self::NAME);
        $rs = self::doSelect($c);
        $list = array();
        foreach($rs as $r){
            $list[$r->getId()] = $r->getName();
        }
        return $list;
    }
    
    public static function GetNameByIds($IDs)
    {
    	$DIDs = explode(',', $IDs); 
    	$c = new Criteria();
    	$c->add(self::ID, $DIDs, Criteria::IN);
//    	$c->add(self::NAME,'&&||&&', Criteria::CUSTOM);
    	$rs = self::doSelect($c) ;
    	$depts = '';
    	foreach($rs as $r):
    		$depts .= $r->getName() .' | ';
    	endforeach;
    	return $depts;
    }
}
