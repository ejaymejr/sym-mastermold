<?php

/**
 * Subclass for performing query and update operations on the 'hr_acro_nano_training_record' table.
 *
 * 
 *
 * @package lib.model.particle
 */ 
class HrAcroNanoTrainingRecordPeer extends BaseHrAcroNanoTrainingRecordPeer
{
    public static function GetPager($cd)
    {
        $startIndex = sfContext::getInstance()->getRequest()->getParameter('startIndex', 0);
        $rowsPerPage = sfContext::getInstance()->getRequest()->getParameter('results', 20);
        $page = (int) ( ($startIndex + 1) / $rowsPerPage);
        if (( ($startIndex + 1) % $rowsPerPage) != 0) {
            $page++;
        }

        $page = sfContext::getInstance()->getRequest()->getParameter('page', 1);

        $c = clone($cd);
        $pager = new sfPropelPager('HrAcroNanoTrainingRecord', $rowsPerPage);

        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
    }    
}
