<?php

class PhotoDetailLikeCriteria extends Criteria
{
    protected $critJoin = 'AND';
    
    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
        //$this->addJoin(PhotoDetailPeer::GARMENT_CODE, GarmentinformationPeer::GARMENT_CODE);
        //$this->addGroupByColumn(PhotoDetailPeer::NAME);
        //$this->addGroupByColumn(PhotoDetailPeer::GARMENT_CODE);
        
        
        if ($req->getParameter('customer', '') ):
	        $ref = $req->getParameter('customer');
	        $criterions[] = $this->getNewCriterion(PhotoDetailPeer::NAME,  "%$ref%", Criteria::LIKE);
		endif;
		if ($req->getParameter('department', '') ):
			$ref = $req->getParameter('department');
			$criterions[] = $this->getNewCriterion(PhotoDetailPeer::DEPARTMENT,   "%$ref%", Criteria::LIKE);
		endif;
		if ($req->getParameter('shift', '') ):
			$ref = $req->getParameter('shift');
			$criterions[] = $this->getNewCriterion(PhotoDetailPeer::SHIFT,   "%$ref%", Criteria::LIKE);
		endif;
        if ($req->getParameter('garment', '') ):
	        $ref = $req->getParameter('garment');
	        $criterions[] = $this->getNewCriterion(PhotoDetailPeer::GARMENT,   "%$ref%", Criteria::LIKE);
		endif;	
        if ($req->getParameter('size', '') ):
	        $ref = $req->getParameter('size');
	        $criterions[] = $this->getNewCriterion(PhotoDetailPeer::SIZE,   "%$ref%", Criteria::LIKE);
		endif;		
        if ($req->getParameter('color', '') ):
	        $ref = $req->getParameter('color');
	        $criterions[] = $this->getNewCriterion(PhotoDetailPeer::COLOR,  "%$ref%", Criteria::LIKE);
		endif;	
        if ($req->getParameter('xwash', '') ):
	        $ref = $req->getParameter('xwash');
	        $criterions[] = $this->getNewCriterion(PhotoDetailPeer::NO_OF_TIMES_WASH,  PhotoDetailPeer::GetTimesWashArgsForCriteria($ref), Criteria::CUSTOM);
		endif;
//	    if ($ref != '') {
//         $criterions[] = $this->getNewCriterion(PhotoDetailPeer::NAME, "%$ref%", self::LIKE);   
//        }
//var_dump( $req->getParameter('customer', ''));
        if (sizeof($criterions)) {
            
            $this->add($criterions[0]);
            for ($i = 1; $i < sizeof($criterions); $i++) {
                if ($this->critJoin == 'AND') {
                    $this->addAnd($criterions[$i]);
                } else {
                    $this->addOr($criterions[$i]);                    
                }
            }
        }        
         
        $hs = sfConfig::get('app_search_criteria_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        if ($sqlField) {
            if ($sortOrder == 'ASC') {
                $this->addAscendingOrderByColumn($sqlField);
            } else {
                $this->addDescendingOrderByColumn($sqlField);                
            }
        } else {            
        	
            $this->addDescendingOrderByColumn(PhotoDetailPeer::DATE_CREATED);
        }
    }
    
}