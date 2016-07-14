<?php

/**
 * Subclass for performing query and update operations on the 'file_detail' table.
 *
 * 
 *
 * @package lib.model.manage
 */ 
class FileDetailPeer extends BaseFileDetailPeer
{
	public static function GetDataByBatchId($bID)
	{
		$c = new Criteria();
		$c->add(self::BATCH_ID, $bID);
		$rs = self::doSelect($c);
		return $rs;
	}
	
	public static function GetDataByFilename($fname)
	{
		$c = new Criteria();
		$c->add(self::FILE_NAME, $fname);
		$rs = self::doSelectOne($c);
		return $rs;
	}
	
	public static function GetDescriptionByFilename($fname)
	{
		$c = new Criteria();
		$c->add(self::FILE_NAME, $fname);
		$rs = self::doSelectOne($c);
		return $rs? $rs->getDescription() : '';
	}
	
	
	public static function GetSentEmailStatus($garmentList)
	{
		$c = new Criteria();
		$c->add(self::GARMENT_CODE, $garmentList, Criteria::IN);
		$rs = self::doSelect($c);
		$sent = '';
		$xsent = 0;
		$xusent = 0;
		$total = 0;
		$status = array('sent'=>0, 'unsent'=>0, 'total'=>0);
		foreach($rs as $r):
			$total ++;
			if (EmailHistoryPeer::GetDataByFileDetailId ($r->getId() ) ):
				$xsent ++;
			else:
				$xusent ++;
			endif;
		endforeach;
		$status['sent'] = $xsent;
		$status['unsent'] = $xusent;
		$status['total'] = $total;
		return $status;
	}

    public static function GetDataByToken($token)
    {
    	$c = new Criteria();
    	$c->addJoin(self::ID, EmailHistoryPeer::FILE_DETAIL_ID);
    	$c->add(EmailHistoryPeer::EMAIL_TOKEN, $token);
    	$rs = self::doSelect($c);
    	return $rs;
    }
    
    public static function GetDataByEmail($email)
    {
    	$c = new Criteria();
    	$c->addJoin(self::ID, EmailHistoryPeer::FILE_DETAIL_ID);
    	$c->add(EmailHistoryPeer::EMAIL_ADDRESS, $email);
    	$rs = self::doSelect($c);
    	return $rs;
    }
    
    public static function GetDataByGarmentCode($garment_code)
    {
    	$c = new Criteria();
    	//$c->addJoin(self::GARMENT_CODE, PhotoDetailPeer::GARMENT_CODE);
    	$c->add(self::GARMENT_CODE, $garment_code);
    	$rs = self::doSelect($c);
    	return $rs;
    }
    
    public static function GetDataByCustomer($customer)
    {
    	
    	$c = new Criteria();
    	$c->addJoin(self::GARMENT_CODE, PhotoDetailPeer::GARMENT_CODE);
    	$c->add(PhotoDetailPeer::NAME, $customer);
    	$rs = self::doSelect($c);
    	return $rs;
    }
    
    public static function GetDataByCustomerList($customer)
    {
    	$batchList = PhotoDetailPeer::GetBatchIDByName($customer);
    	$c = new Criteria();
    	$c->add(self::BATCH_ID, $batchList, Criteria::IN);
    	$rs = self::doSelect($c);
    	return $rs;
    }
    
	public static function DeleteFile($fileName)
	{
		$c = new Criteria();
		$c->add(self::FILE_NAME, $fileName);
		$rs = self::doDelete($c);
		return $rs;
	}
	
	public static function GetImagesByBatchID($BID)
	{
		$c = new Criteria();
		$c->add(self::BATCH_ID, $BID);
		$rs = self::doSelect($c);
		$images = array();
		foreach($rs as $r):
			$images[$r->getFilename()] = $r->getDescription();
		endforeach;
		return $images;
	}
	
	public static function GetImagesTokenID($token)
	{
    	$c = new Criteria();
    	$c->addJoin(self::ID, EmailHistoryPeer::FILE_DETAIL_ID);
    	$c->add(EmailHistoryPeer::EMAIL_TOKEN, $token);
    	$rs = self::doSelect($c);
		$images = array();
		foreach($rs as $r):
			$images[$r->getFilename()] = $r->getDescription();
		endforeach;
		return $images;
	}
	
	public static function GetEmailStatus($batchID)
	{
		$c = new Criteria();
		$c->add(self::BATCH_ID, $batchID);
		$rs = self::doSelect($c);
		$sent = '';
		$xsent = 0;
		$xusent = 0;
		$total = 0;
		$status = array('sent'=>0, 'unsent'=>0, 'total'=>0);
		foreach($rs as $r):
			$total ++;
			if (EmailHistoryPeer::GetDataByFileDetailId ($r->getId() ) ):
				$xsent ++;
			else:
				$xusent ++;
			endif;
		endforeach;
		$status['sent'] = $xsent;
		$status['unsent'] = $xusent;
		$status['total'] = $total;
		return $status;
	}
	
	public static function GetImageTag($company, $fileID, $opt=null)
	{
		return '<img alt="'.$fileID.'" src="'.sfConfig::get('http_intranet').'micronclean/uploadedImages/' . $company .'/'. $fileID. '" '.$opt.' >' ;
	}
	
	public static function GetFileCountByBatchID($batchID)
	{
		$c = new Criteria();
		$c->add(self::BATCH_ID, $batchID);
		//$rs = self::doSelect($c);
		$rs = self::doCount($c);
		return $rs;
	}
	
	public static function GetFilenameByBatchID($BID)
	{
		$c = new Criteria();
		$c->add(self::BATCH_ID, $BID);
		$rs = self::doSelect($c);
		$files = array();
		foreach($rs as $r):
			$files[$r->getFilename()] = $r->getFilename();
		endforeach;
		return $files;
	}
	
	public static function GetFilenameForEmailByBatchID($BID)
	{
		$c = new Criteria();
		$c->add(self::BATCH_ID, $BID);
		$c->add(self::SEND_EMAIL, 'YES');
		$rs = self::doSelect($c);
		$files = array();
		foreach($rs as $r):
		$files[$r->getFilename()] = $r->getFilename();
		endforeach;
		return $files;
	}
	
	public static function GetDataByBatchIdForEmail($bID)
	{
		$c = new Criteria();
		$c->add(self::BATCH_ID, $bID);
		$c->add(self::SEND_EMAIL, 'YES');
		$rs = self::doSelect($c);
		return $rs;
	}
}
