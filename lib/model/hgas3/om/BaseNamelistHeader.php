<?php


abstract class BaseNamelistHeader extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $date_printed;


	
	protected $company;


	
	protected $cell;


	
	protected $department;


	
	protected $team;


	
	protected $description;


	
	protected $status;


	
	protected $day;


	
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

	
	public function getDatePrinted($format = 'Y-m-d H:i:s')
	{

		if ($this->date_printed === null || $this->date_printed === '') {
			return null;
		} elseif (!is_int($this->date_printed)) {
						$ts = strtotime($this->date_printed);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_printed] as date/time value: " . var_export($this->date_printed, true));
			}
		} else {
			$ts = $this->date_printed;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCompany()
	{

		return $this->company;
	}

	
	public function getCell()
	{

		return $this->cell;
	}

	
	public function getDepartment()
	{

		return $this->department;
	}

	
	public function getTeam()
	{

		return $this->team;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getDay()
	{

		return $this->day;
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
			$this->modifiedColumns[] = NamelistHeaderPeer::ID;
		}

	} 
	
	public function setDatePrinted($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_printed] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_printed !== $ts) {
			$this->date_printed = $ts;
			$this->modifiedColumns[] = NamelistHeaderPeer::DATE_PRINTED;
		}

	} 
	
	public function setCompany($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::COMPANY;
		}

	} 
	
	public function setCell($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cell !== $v) {
			$this->cell = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::CELL;
		}

	} 
	
	public function setDepartment($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->department !== $v) {
			$this->department = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::DEPARTMENT;
		}

	} 
	
	public function setTeam($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->team !== $v) {
			$this->team = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::TEAM;
		}

	} 
	
	public function setDescription($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::DESCRIPTION;
		}

	} 
	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::STATUS;
		}

	} 
	
	public function setDay($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->day !== $v) {
			$this->day = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::DAY;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::CREATED_BY;
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
			$this->modifiedColumns[] = NamelistHeaderPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = NamelistHeaderPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = NamelistHeaderPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->date_printed = $rs->getTimestamp($startcol + 1, null);

			$this->company = $rs->getString($startcol + 2);

			$this->cell = $rs->getString($startcol + 3);

			$this->department = $rs->getString($startcol + 4);

			$this->team = $rs->getString($startcol + 5);

			$this->description = $rs->getString($startcol + 6);

			$this->status = $rs->getString($startcol + 7);

			$this->day = $rs->getString($startcol + 8);

			$this->created_by = $rs->getString($startcol + 9);

			$this->date_created = $rs->getTimestamp($startcol + 10, null);

			$this->modified_by = $rs->getString($startcol + 11);

			$this->date_modified = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NamelistHeader object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NamelistHeaderPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NamelistHeaderPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NamelistHeaderPeer::DATABASE_NAME);
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
					$pk = NamelistHeaderPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NamelistHeaderPeer::doUpdate($this, $con);
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


			if (($retval = NamelistHeaderPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NamelistHeaderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDatePrinted();
				break;
			case 2:
				return $this->getCompany();
				break;
			case 3:
				return $this->getCell();
				break;
			case 4:
				return $this->getDepartment();
				break;
			case 5:
				return $this->getTeam();
				break;
			case 6:
				return $this->getDescription();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getDay();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getDateCreated();
				break;
			case 11:
				return $this->getModifiedBy();
				break;
			case 12:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NamelistHeaderPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDatePrinted(),
			$keys[2] => $this->getCompany(),
			$keys[3] => $this->getCell(),
			$keys[4] => $this->getDepartment(),
			$keys[5] => $this->getTeam(),
			$keys[6] => $this->getDescription(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getDay(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getDateCreated(),
			$keys[11] => $this->getModifiedBy(),
			$keys[12] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NamelistHeaderPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDatePrinted($value);
				break;
			case 2:
				$this->setCompany($value);
				break;
			case 3:
				$this->setCell($value);
				break;
			case 4:
				$this->setDepartment($value);
				break;
			case 5:
				$this->setTeam($value);
				break;
			case 6:
				$this->setDescription($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setDay($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setDateCreated($value);
				break;
			case 11:
				$this->setModifiedBy($value);
				break;
			case 12:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NamelistHeaderPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDatePrinted($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCompany($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCell($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDepartment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTeam($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDay($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDateCreated($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setModifiedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDateModified($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NamelistHeaderPeer::DATABASE_NAME);

		if ($this->isColumnModified(NamelistHeaderPeer::ID)) $criteria->add(NamelistHeaderPeer::ID, $this->id);
		if ($this->isColumnModified(NamelistHeaderPeer::DATE_PRINTED)) $criteria->add(NamelistHeaderPeer::DATE_PRINTED, $this->date_printed);
		if ($this->isColumnModified(NamelistHeaderPeer::COMPANY)) $criteria->add(NamelistHeaderPeer::COMPANY, $this->company);
		if ($this->isColumnModified(NamelistHeaderPeer::CELL)) $criteria->add(NamelistHeaderPeer::CELL, $this->cell);
		if ($this->isColumnModified(NamelistHeaderPeer::DEPARTMENT)) $criteria->add(NamelistHeaderPeer::DEPARTMENT, $this->department);
		if ($this->isColumnModified(NamelistHeaderPeer::TEAM)) $criteria->add(NamelistHeaderPeer::TEAM, $this->team);
		if ($this->isColumnModified(NamelistHeaderPeer::DESCRIPTION)) $criteria->add(NamelistHeaderPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(NamelistHeaderPeer::STATUS)) $criteria->add(NamelistHeaderPeer::STATUS, $this->status);
		if ($this->isColumnModified(NamelistHeaderPeer::DAY)) $criteria->add(NamelistHeaderPeer::DAY, $this->day);
		if ($this->isColumnModified(NamelistHeaderPeer::CREATED_BY)) $criteria->add(NamelistHeaderPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(NamelistHeaderPeer::DATE_CREATED)) $criteria->add(NamelistHeaderPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(NamelistHeaderPeer::MODIFIED_BY)) $criteria->add(NamelistHeaderPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(NamelistHeaderPeer::DATE_MODIFIED)) $criteria->add(NamelistHeaderPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NamelistHeaderPeer::DATABASE_NAME);

		$criteria->add(NamelistHeaderPeer::ID, $this->id);

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

		$copyObj->setDatePrinted($this->date_printed);

		$copyObj->setCompany($this->company);

		$copyObj->setCell($this->cell);

		$copyObj->setDepartment($this->department);

		$copyObj->setTeam($this->team);

		$copyObj->setDescription($this->description);

		$copyObj->setStatus($this->status);

		$copyObj->setDay($this->day);

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
			self::$peer = new NamelistHeaderPeer();
		}
		return self::$peer;
	}

} 