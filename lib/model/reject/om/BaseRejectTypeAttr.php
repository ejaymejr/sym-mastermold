<?php


abstract class BaseRejectTypeAttr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $type = 'null';


	
	protected $customer = 'null';


	
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

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getCustomer()
	{

		return $this->customer;
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

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RejectTypeAttrPeer::ID;
		}

	} 
	
	public function setType($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v || $v === 'null') {
			$this->type = $v;
			$this->modifiedColumns[] = RejectTypeAttrPeer::TYPE;
		}

	} 
	
	public function setCustomer($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->customer !== $v || $v === 'null') {
			$this->customer = $v;
			$this->modifiedColumns[] = RejectTypeAttrPeer::CUSTOMER;
		}

	} 
	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = RejectTypeAttrPeer::CREATED_BY;
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
			$this->modifiedColumns[] = RejectTypeAttrPeer::DATE_CREATED;
		}

	} 
	
	public function setModifiedBy($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->modified_by !== $v) {
			$this->modified_by = $v;
			$this->modifiedColumns[] = RejectTypeAttrPeer::MODIFIED_BY;
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
			$this->modifiedColumns[] = RejectTypeAttrPeer::DATE_MODIFIED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->type = $rs->getString($startcol + 1);

			$this->customer = $rs->getString($startcol + 2);

			$this->created_by = $rs->getString($startcol + 3);

			$this->date_created = $rs->getTimestamp($startcol + 4, null);

			$this->modified_by = $rs->getString($startcol + 5);

			$this->date_modified = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RejectTypeAttr object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RejectTypeAttrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RejectTypeAttrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RejectTypeAttrPeer::DATABASE_NAME);
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
					$pk = RejectTypeAttrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RejectTypeAttrPeer::doUpdate($this, $con);
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


			if (($retval = RejectTypeAttrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RejectTypeAttrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getType();
				break;
			case 2:
				return $this->getCustomer();
				break;
			case 3:
				return $this->getCreatedBy();
				break;
			case 4:
				return $this->getDateCreated();
				break;
			case 5:
				return $this->getModifiedBy();
				break;
			case 6:
				return $this->getDateModified();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RejectTypeAttrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getType(),
			$keys[2] => $this->getCustomer(),
			$keys[3] => $this->getCreatedBy(),
			$keys[4] => $this->getDateCreated(),
			$keys[5] => $this->getModifiedBy(),
			$keys[6] => $this->getDateModified(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RejectTypeAttrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setType($value);
				break;
			case 2:
				$this->setCustomer($value);
				break;
			case 3:
				$this->setCreatedBy($value);
				break;
			case 4:
				$this->setDateCreated($value);
				break;
			case 5:
				$this->setModifiedBy($value);
				break;
			case 6:
				$this->setDateModified($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RejectTypeAttrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCustomer($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDateCreated($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setModifiedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDateModified($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RejectTypeAttrPeer::DATABASE_NAME);

		if ($this->isColumnModified(RejectTypeAttrPeer::ID)) $criteria->add(RejectTypeAttrPeer::ID, $this->id);
		if ($this->isColumnModified(RejectTypeAttrPeer::TYPE)) $criteria->add(RejectTypeAttrPeer::TYPE, $this->type);
		if ($this->isColumnModified(RejectTypeAttrPeer::CUSTOMER)) $criteria->add(RejectTypeAttrPeer::CUSTOMER, $this->customer);
		if ($this->isColumnModified(RejectTypeAttrPeer::CREATED_BY)) $criteria->add(RejectTypeAttrPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(RejectTypeAttrPeer::DATE_CREATED)) $criteria->add(RejectTypeAttrPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(RejectTypeAttrPeer::MODIFIED_BY)) $criteria->add(RejectTypeAttrPeer::MODIFIED_BY, $this->modified_by);
		if ($this->isColumnModified(RejectTypeAttrPeer::DATE_MODIFIED)) $criteria->add(RejectTypeAttrPeer::DATE_MODIFIED, $this->date_modified);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RejectTypeAttrPeer::DATABASE_NAME);

		$criteria->add(RejectTypeAttrPeer::ID, $this->id);

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

		$copyObj->setType($this->type);

		$copyObj->setCustomer($this->customer);

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
			self::$peer = new RejectTypeAttrPeer();
		}
		return self::$peer;
	}

} 