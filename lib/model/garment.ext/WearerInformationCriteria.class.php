<?php

class WearerInformationCriteria extends Criteria
{
    protected $critJoin = 'AND';

    function __construct()
    {
        $this->setIgnoreCase(true);
        $req = sfContext::getInstance()->getRequest();
        $criterions = array();
//        $ref = $req->getParameter('complain_date_time', '');
//        if ($ref != '') {
//            $criterions[] = $this->getNewCriterion(CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME, "%$ref%", self::LIKE);
//        }
        $ref = $req->getParameter('number', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(WearerInformationPeer::NUMBER, "%$ref%", self::LIKE);
        }

        $ref = $req->getParameter('name', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(WearerInformationPeer::NAME, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('job_title', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(WearerInformationPeer::JOB_TITLE, "%$ref%", self::LIKE);
        }
        $ref = $req->getParameter('email', '');
        if ($ref != '') {
            $criterions[] = $this->getNewCriterion(WearerInformationPeer::EMAIL, "%$ref%", self::LIKE);
        }
        
        
//        $tos = $req->getParameter('tos', '');
//        $toe = $req->getParameter('toe', '');
//        $toCrit = false;
//        if ($tos != '') {
//            $toCrit = $this->getNewCriterion(CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME, 'DATE(' . CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME . ') >= \'' . $tos . '\'', self::CUSTOM);
//        }
//        if ($toe != '') {
//            $toCrit = $this->getNewCriterion(CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME, 'DATE(' . CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME . ') <= \'' . $toe . '\'', self::CUSTOM);
//        }
//        if ($tos != '' && $toe != '') {
//            if ($tos > $toe) {
//                $dtmp = $tos;
//                $tos = $toe;
//                $toe = $dtmp;
//            }     
//            $toCrit = $this->getNewCriterion(CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME, 'DATE(' . CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME . ') >= \'' . $tos . '\' AND DATE(' . CustomerManagementComplaintFormPeer::COMPLAIN_DATE_TIME . ') <= \'' . $toe . '\'', self::CUSTOM);
//        }
//        if ($toCrit) {
//            $criterions[] = $toCrit;
//        }
                
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
        $hs = sfConfig::get('app_wear_grid_headers');
        $sqlField = $hs->getSqlField();
        $sortOrder = $hs->getSortOrder();
        $this->addDescendingOrderByColumn(WearerInformationPeer::NAME);
    }

}