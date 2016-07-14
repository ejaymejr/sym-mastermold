<?php


abstract class BaseNamelistDetail extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $namelist_header_id = 'null';


	
	protected $trans_date;


	
	protected $tag_id = 'null';


	
	protected $user_fullname;


	
	protected $user_gid;


	
	protected $js_size;


	
	protected $boot_size;


	
	protected $safety_boot_size;


	
	protected $hood_size;


	
	protected $bag_size;


	
	protected $cell_name;


	
	protected $department_name;


	
	protected $team_name;


	
	protected $hanger_name;


	
	protected $location;


	
	protected $js_chk;


	
	protected $boot_chk;


	
	protected $sboot_chk;


	
	protected $hood_chk;


	
	protected $bag_chk;


	
	protected $created_by;


	
	protected $date_created;


	
	protected $modified_by;


	
	protected $date_modified;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNamelistHeaderId()
	{

		return $this->namelist_header_id;
	}

	
	public function getTransDate($format = 'Y-m-d H:i:s')
	{

		if ($this->trans_date === null || $this->trans_date === '') {
			return null;
		} elseif (!is_int($this->trans_date)) {
						$ts = strtotime($this->trans_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [trans_date] as date/time value: " . var_export($this->trans_date, true));
			}
		} else {
			$ts = $this->trans_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTagId()
	{

		return $this->tag_id;
	}

	
	public function getUserFullname()
	{

		return $this->user_fullname;
	}

	
	public function getUserGid()
	{

		return $this->user_gid;
	}

	
	public function getJsSize()
	{

		return $this->js_size;
	}

	
	public function getBootSize()
	{

		return $this->boot_size;
	}

	
	public function getSafetyBootSize()
	{

		return $this->safety_boot_size;
	}

	
	public function getHoodSize()
	{

		return $this->hood_size;
	}

	
	public function getBagSize()
	{

		return $this->bag_size;
	}

	
	public function getCellName()
	{

		return $this->cell_name;
	}

	
	public function getDepartmentName()
	{

		return $this->department_name;
	}

	
	public function getTeamName()
	{

		return $this->team_name;
	}

	
	public function getHangerName()
	{

		return $this->hanger_name;
	}

	
	public function getLocation()
	{

		return $this->location;
	}

	
	public function getJsChk()
	{

		return $this->js_chk;
	}

	
	public function getBootChk()
	{

		return $this->boot_chk;
	}

	
	public function getSbootChk()
	{

		return $this->sboot_chk;
	}

	
	public function getHoodChk()
	{

		return $this->hood_chk;
	}

	
	public function getBagChk()
	{

		return $this->bag_chk;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getDateCreated($format = 'Y-m-d H:i:s')
	{

		if ($this->date_created === null || $this->date_created === '') {
			return null;
		} elseif (!is_int($this->date_created)) {
						$ts = strtotime($this->date_created);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_created] as date/time value: " . var_export($this->date_created, true));
			}
		} else {
			$ts = $this->date_created;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getModifiedBy()
	{

		return $this->modified_by;
	}

	
	public function getDateModified($format = 'Y-m-d H:i:s')
	{

		if ($this->date_modified === null || $this->date_modified === '') {
			return null;
		} elseif (!is_int($this->date_modified)) {
						$ts = strtotime($this->date_modified);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_modified] as date/time value: " . var_export($this->date_modified, true));
			}
		} else {
			$ts = $this->date_modified;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::ID;
		}

	} 
	
	public function setNamelistHeaderId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->namelist_header_id !== $v || $v === 'null') {
			$this->namelist_header_id = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::NAMELIST_HEADER_ID;
		}

	} 
	
	public function setTransDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [trans_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->trans_date !== $ts) {
			$this->trans_date = $ts;
			$this->modifiedColumns[] = NamelistDetailPeer::TRANS_DATE;
		}

	} 
	
	public function setTagId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tag_id !== $v || $v === 'null') {
			$this->tag_id = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::TAG_ID;
		}

	} 
	
	public function setUserFullname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_fullname !== $v) {
			$this->user_fullname = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::USER_FULLNAME;
		}

	} 
	
	public function setUserGid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_gid !== $v) {
			$this->user_gid = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::USER_GID;
		}

	} 
	
	public function setJsSize($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->js_size !== $v) {
			$this->js_size = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::JS_SIZE;
		}

	} 
	
	public function setBootSize($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->boot_size !== $v) {
			$this->boot_size = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::BOOT_SIZE;
		}

	} 
	
	public function setSafetyBootSize($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->safety_boot_size !== $v) {
			$this->safety_boot_size = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::SAFETY_BOOT_SIZE;
		}

	} 
	
	public function setHoodSize($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hood_size !== $v) {
			$this->hood_size = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::HOOD_SIZE;
		}

	} 
	
	public function setBagSize($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bag_size !== $v) {
			$this->bag_size = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::BAG_SIZE;
		}

	} 
	
	public function setCellName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cell_name !== $v) {
			$this->cell_name = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::CELL_NAME;
		}

	} 
	
	public function setDepartmentName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->department_name !== $v) {
			$this->department_name = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::DEPARTMENT_NAME;
		}

	} 
	
	public function setTeamName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->team_name !== $v) {
			$this->team_name = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::TEAM_NAME;
		}

	} 
	
	public function setHangerName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hanger_name !== $v) {
			$this->hanger_name = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::HANGER_NAME;
		}

	} 
	
	public function setLocation($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->location !== $v) {
			$this->location = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::LOCATION;
		}

	} 
	
	public function setJsChk($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->js_chk !== $v) {
			$this->js_chk = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::JS_CHK;
		}

	} 
	
	public function setBootChk($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->boot_chk !== $v) {
			$this->boot_chk = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::BOOT_CHK;
		}

	} 
	
	public function setSbootChk($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sboot_chk !== $v) {
			$this->sboot_chk = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::SBOOT_CHK;
		}

	} 
	
	public function setHoodChk($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hood_chk !== $v) {
			$this->hood_chk = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::HOOD_CHK;
		}

	} 
	
	public function setBagChk($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bag_chk !== $v) {
			$this->bag_chk = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::BAG_CHK;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::CREATED_BY;
		}

	} 
	
	public function setDateCreated($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_created] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_created !== $ts) {
			$this->date_created = $ts;
			$this->modifiedColumns[] = NamelistDetailPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = NamelistDetailPeer::MODIFIED_BY;
		}

	} 
	
	public function setDateModified($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_modified] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_modified !== $ts) {
			$this->date_modified = $ts;
			$this->modifiedColumns[] = NamelistDetailPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->namelist_header_id = $rs->getString($startcol + 1);

			$this->trans_date = $rs->getTimestamp($startcol + 2, null);

			$this->tag_id = $rs->getString($startcol + 3);

			$this->user_fullname = $rs->getString($startcol + 4);

			$this->user_gid = $rs->getString($startcol + 5);

			$this->js_size = $rs->getString($startcol + 6);

			$this->boot_size = $rs->getString($startcol + 7);

			$this->safety_boot_size = $rs->getString($startcol + 8);

			$this->hood_size = $rs->getString($startcol + 9);

			$this->bag_size = $rs->getString($startcol + 10);

			$this->cell_name = $rs->getString($startcol + 11);

			$this->department_name = $rs->getString($startcol + 12);

			$this->team_name = $rs->getString($startcol + 13);

			$this->hanger_name = $rs->getString($startcol + 14);

			$this->location = $rs->getString($startcol + 15);

			$this->js_chk = $rs->getString($startcol + 16);

			$this->boot_chk = $rs->getString($startcol + 17);

			$this->sboot_chk = $rs->getString($startcol + 18);

			$this->hood_chk = $rs->getString($startcol + 19);

			$this->bag_chk = $rs->getString($startcol + 20);

			$this->created_by = $rs->getString($startcol + 21);

			$this->date_created = $rs->getTimestamp($startcol + 22, null);

			$this->modified_by = $rs->getString($startcol + 23);

			$this->date_modified = $rs->getTimestamp($startcol + 24, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 25; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NamelistDetail object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NamelistDetailPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NamelistDetailPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NamelistDetailPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NamelistDetailPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NamelistDetailPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = NamelistDetailPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NamelistDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNamelistHeaderId();
				break;
			case 2:
				return $this->getTransDate();
				break;
			case 3:
				return $this->getTagId();
				break;
			case 4:
				return $this->getUserFullname();
				break;
			case 5:
				return $this->getUserGid();
				break;
			case 6:
				return $this->getJsSize();
				break;
			case 7:
				return $this->getBootSize();
				break;
			case 8:
				return $this->getSafetyBootSize();
				break;
			case 9:
				return $this->getHoodSize();
				break;
			case 10:
				return $this->getBagSize();
				break;
			case 11:
				return $this->getCellName();
				break;
			case 12:
				return $this->getDepartmentName();
				break;
			case 13:
				return $this->getTeamName();
				break;
			case 14:
				return $this->getHangerName();
				break;
			case 15:
				return $this->getLocation();
				break;
			case 16:
				return $this->getJsChk();
				break;
			case 17:
				return $this->getBootChk();
				break;
			case 18:
				return $this->getSbootChk();
				break;
			case 19:
				return $this->getHoodChk();
				break;
			case 20:
				return $this->getBagChk();
				break;
			case 21:
				return $this->getCreatedBy();
				break;
			case 22:
				return $this->getDateCreated();
				break;
			case 23:
				return $this->getModifiedBy();
				break;
			case 24:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NamelistDetailPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNamelistHeaderId(),
			$keys[2] => $this->getTransDate(),
			$keys[3] => $this->getTagId(),
			$keys[4] => $this->getUserFullname(),
			$keys[5] => $this->getUserGid(),
			$keys[6] => $this->getJsSize(),
			$keys[7] => $this->getBootSize(),
			$keys[8] => $this->getSafetyBootSize(),
			$keys[9] => $this->getHoodSize(),
			$keys[10] => $this->getBagSize(),
			$keys[11] => $this->getCellName(),
			$keys[12] => $this->getDepartmentName(),
			$keys[13] => $this->getTeamName(),
			$keys[14] => $this->getHangerName(),
			$keys[15] => $this->getLocation(),
			$keys[16] => $this->getJsChk(),
			$keys[17] => $this->getBootChk(),
			$keys[18] => $this->getSbootChk(),
			$keys[19] => $this->getHoodChk(),
			$keys[20] => $this->getBagChk(),
			$keys[21] => $this->getCreatedBy(),
			$keys[22] => $this->getDateCreated(),
			$keys[23] => $this->getModifiedBy(),
			$keys[24] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NamelistDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNamelistHeaderId($value);
				break;
			case 2:
				$this->setTransDate($value);
				break;
			case 3:
				$this->setTagId($value);
				break;
			case 4:
				$this->setUserFullname($value);
				break;
			case 5:
				$this->setUserGid($value);
				break;
			case 6:
				$this->setJsSize($value);
				break;
			case 7:
				$this->setBootSize($value);
				break;
			case 8:
				$this->setSafetyBootSize($value);
				break;
			case 9:
				$this->setHoodSize($value);
				break;
			case 10:
				$this->setBagSize($value);
				break;
			case 11:
				$this->setCellName($value);
				break;
			case 12:
				$this->setDepartmentName($value);
				break;
			case 13:
				$this->setTeamName($value);
				break;
			case 14:
				$this->setHangerName($value);
				break;
			case 15:
				$this->setLocation($value);
				break;
			case 16:
				$this->setJsChk($value);
				break;
			case 17:
				$this->setBootChk($value);
				break;
			case 18:
				$this->setSbootChk($value);
				break;
			case 19:
				$this->setHoodChk($value);
				break;
			case 20:
				$this->setBagChk($value);
				break;
			case 21:
				$this->setCreatedBy($value);
				break;
			case 22:
				$this->setDateCreated($value);
				break;
			case 23:
				$this->setModifiedBy($value);
				break;
			case 24:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NamelistDetailPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNamelistHeaderId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTransDate($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTagId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUserFullname($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUserGid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setJsSize($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBootSize($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSafetyBootSize($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setHoodSize($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setBagSize($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCellName($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDepartmentName($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTeamName($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setHangerName($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setLocation($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setJsChk($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setBootChk($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setSbootChk($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setHoodChk($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setBagChk($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCreatedBy($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDateCreated($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setModifiedBy($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDateModified($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NamelistDetailPeer::DATABASE_NAME);

		if ($this->isColumnModified(NamelistDetailPeer::ID)) $criteria->add(NamelistDetailPeer::ID, $this->id);
		if ($this->isColumnModified(NamelistDetailPeer::NAMELIST_HEADER_ID)) $criteria->add(NamelistDetailPeer::NAMELIST_HEADER_ID, $this->namelist_header_id);
		if ($this->isColumnModified(NamelistDetailPeer::TRANS_DATE)) $criteria->add(NamelistDetailPeer::TRANS_DATE, $this->trans_date);
		if ($this->isColumnModified(NamelistDetailPeer::TAG_ID)) $criteria->add(NamelistDetailPeer::TAG_ID, $this->tag_id);
		if ($this->isColumnModified(NamelistDetailPeer::USER_FULLNAME)) $criteria->add(NamelistDetailPeer::USER_FULLNAME, $this->user_fullname);
		if ($this->isColumnModified(NamelistDetailPeer::USER_GID)) $criteria->add(NamelistDetailPeer::USER_GID, $this->user_gid);
		if ($this->isColumnModified(NamelistDetailPeer::JS_SIZE)) $criteria->add(NamelistDetailPeer::JS_SIZE, $this->js_size);
		if ($this->isColumnModified(NamelistDetailPeer::BOOT_SIZE)) $criteria->add(NamelistDetailPeer::BOOT_SIZE, $this->boot_size);
		if ($this->isColumnModified(NamelistDetailPeer::SAFETY_BOOT_SIZE)) $criteria->add(NamelistDetailPeer::SAFETY_BOOT_SIZE, $this->safety_boot_size);
		if ($this->isColumnModified(NamelistDetailPeer::HOOD_SIZE)) $criteria->add(NamelistDetailPeer::HOOD_SIZE, $this->hood_size);
		if ($this->isColumnModified(NamelistDetailPeer::BAG_SIZE)) $criteria->add(NamelistDetailPeer::BAG_SIZE, $this->bag_size);
		if ($this->isColumnModified(NamelistDetailPeer::CELL_NAME)) $criteria->add(NamelistDetailPeer::CELL_NAME, $this->cell_name);
		if ($this->isColumnModified(NamelistDetailPeer::DEPARTMENT_NAME)) $criteria->add(NamelistDetailPeer::DEPARTMENT_NAME, $this->department_name);
		if ($this->isColumnModified(NamelistDetailPeer::TEAM_NAME)) $criteria->add(NamelistDetailPeer::TEAM_NAME, $this->team_name);
		if ($this->isColumnModified(NamelistDetailPeer::HANGER_NAME)) $criteria->add(NamelistDetailPeer::HANGER_NAME, $this->hanger_name);
		if ($this->isColumnModified(NamelistDetailPeer::LOCATION)) $criteria->add(NamelistDetailPeer::LOCATION, $this->location);
		if ($this->isColumnModified(NamelistDetailPeer::JS_CHK)) $criteria->add(NamelistDetailPeer::JS_CHK, $this->js_chk);
		if ($this->isColumnModified(NamelistDetailPeer::BOOT_CHK)) $criteria->add(NamelistDetailPeer::BOOT_CHK, $this->boot_chk);
		if ($this->isColumnModified(NamelistDetailPeer::SBOOT_CHK)) $criteria->add(NamelistDetailPeer::SBOOT_CHK, $this->sboot_chk);
		if ($this->isColumnModified(NamelistDetailPeer::HOOD_CHK)) $criteria->add(NamelistDetailPeer::HOOD_CHK, $this->hood_chk);
		if ($this->isColumnModified(NamelistDetailPeer::BAG_CHK)) $criteria->add(NamelistDetailPeer::BAG_CHK, $this->bag_chk);
		if ($this->isColumnModified(NamelistDetailPeer::CREATED_BY)) $criteria->add(NamelistDetailPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(NamelistDetailPeer::DATE_CREATED)) $criteria->add(NamelistDetailPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(NamelistDetailPeer::MODIFIED_BY)) $criteria->add(NamelistDetailPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(NamelistDetailPeer::DATE_MODIFIED)) $criteria->add(NamelistDetailPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NamelistDetailPeer::DATABASE_NAME);

		$criteria->add(NamelistDetailPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNamelistHeaderId($this->namelist_header_id);

		$copyObj->setTransDate($this->trans_date);

		$copyObj->setTagId($this->tag_id);

		$copyObj->setUserFullname($this->user_fullname);

		$copyObj->setUserGid($this->user_gid);

		$copyObj->setJsSize($this->js_size);

		$copyObj->setBootSize($this->boot_size);

		$copyObj->setSafetyBootSize($this->safety_boot_size);

		$copyObj->setHoodSize($this->hood_size);

		$copyObj->setBagSize($this->bag_size);

		$copyObj->setCellName($this->cell_name);

		$copyObj->setDepartmentName($this->department_name);

		$copyObj->setTeamName($this->team_name);

		$copyObj->setHangerName($this->hanger_name);

		$copyObj->setLocation($this->location);

		$copyObj->setJsChk($this->js_chk);

		$copyObj->setBootChk($this->boot_chk);

		$copyObj->setSbootChk($this->sboot_chk);

		$copyObj->setHoodChk($this->hood_chk);

		$copyObj->setBagChk($this->bag_chk);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setModifiedBy($this->modified_by);

		$copyObj->setDateModified($this->date_modified);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new NamelistDetailPeer();
		}
		return self::$peer;
	}

} 