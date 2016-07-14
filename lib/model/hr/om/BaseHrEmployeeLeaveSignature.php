<?php


abstract class BaseHrEmployeeLeaveSignature extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $approval;


	
	protected $verified;


	
	protected $hr_employee_leave_id;


	
	protected $date_created;


	
	protected $created_by;


	
	protected $modified_by;


	
	protected $date_modified;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getApproval()
	{

		return $this->approval;
	}

	
	public function getVerified()
	{

		return $this->verified;
	}

	
	public function getHrEmployeeLeaveId()
	{

		return $this->hr_employee_leave_id;
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

	
	public function getCreatedBy()
	{

		return $this->created_by;
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

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::ID;
		}

	} 
	
	public function setApproval($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->approval !== $v) {
			$this->approval = $v;
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::APPROVAL;
		}

	} 
	
	public function setVerified($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->verified !== $v) {
			$this->verified = $v;
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::VERIFIED;
		}

	} 
	
	public function setHrEmployeeLeaveId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hr_employee_leave_id !== $v) {
			$this->hr_employee_leave_id = $v;
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::HR_EMPLOYEE_LEAVE_ID;
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
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::DATE_CREATED;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::CREATED_BY;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = HrEmployeeLeaveSignaturePeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->approval = $rs->getString($startcol + 1);

			$this->verified = $rs->getString($startcol + 2);

			$this->hr_employee_leave_id = $rs->getString($startcol + 3);

			$this->date_created = $rs->getTimestamp($startcol + 4, null);

			$this->created_by = $rs->getString($startcol + 5);

			$this->modified_by = $rs->getString($startcol + 6);

			$this->date_modified = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating HrEmployeeLeaveSignature object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HrEmployeeLeaveSignaturePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HrEmployeeLeaveSignaturePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HrEmployeeLeaveSignaturePeer::DATABASE_NAME);
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
					$pk = HrEmployeeLeaveSignaturePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HrEmployeeLeaveSignaturePeer::doUpdate($this, $con);
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


			if (($retval = HrEmployeeLeaveSignaturePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeLeaveSignaturePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getApproval();
				break;
			case 2:
				return $this->getVerified();
				break;
			case 3:
				return $this->getHrEmployeeLeaveId();
				break;
			case 4:
				return $this->getDateCreated();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getModifiedBy();
				break;
			case 7:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeLeaveSignaturePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getApproval(),
			$keys[2] => $this->getVerified(),
			$keys[3] => $this->getHrEmployeeLeaveId(),
			$keys[4] => $this->getDateCreated(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getModifiedBy(),
			$keys[7] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HrEmployeeLeaveSignaturePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setApproval($value);
				break;
			case 2:
				$this->setVerified($value);
				break;
			case 3:
				$this->setHrEmployeeLeaveId($value);
				break;
			case 4:
				$this->setDateCreated($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setModifiedBy($value);
				break;
			case 7:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HrEmployeeLeaveSignaturePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setApproval($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVerified($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHrEmployeeLeaveId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDateCreated($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setModifiedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDateModified($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HrEmployeeLeaveSignaturePeer::DATABASE_NAME);

		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::ID)) $criteria->add(HrEmployeeLeaveSignaturePeer::ID, $this->id);
		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::APPROVAL)) $criteria->add(HrEmployeeLeaveSignaturePeer::APPROVAL, $this->approval);
		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::VERIFIED)) $criteria->add(HrEmployeeLeaveSignaturePeer::VERIFIED, $this->verified);
		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::HR_EMPLOYEE_LEAVE_ID)) $criteria->add(HrEmployeeLeaveSignaturePeer::HR_EMPLOYEE_LEAVE_ID, $this->hr_employee_leave_id);
		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::DATE_CREATED)) $criteria->add(HrEmployeeLeaveSignaturePeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::CREATED_BY)) $criteria->add(HrEmployeeLeaveSignaturePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::MODIFIED_BY)) $criteria->add(HrEmployeeLeaveSignaturePeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(HrEmployeeLeaveSignaturePeer::DATE_MODIFIED)) $criteria->add(HrEmployeeLeaveSignaturePeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HrEmployeeLeaveSignaturePeer::DATABASE_NAME);

		$criteria->add(HrEmployeeLeaveSignaturePeer::ID, $this->id);

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

		$copyObj->setApproval($this->approval);

		$copyObj->setVerified($this->verified);

		$copyObj->setHrEmployeeLeaveId($this->hr_employee_leave_id);

		$copyObj->setDateCreated($this->date_created);

		$copyObj->setCreatedBy($this->created_by);

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
			self::$peer = new HrEmployeeLeaveSignaturePeer();
		}
		return self::$peer;
	}

} 