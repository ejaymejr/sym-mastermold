<?php


abstract class BaseSeagateFiscalCalendarSetting extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fiscal_year = 0;


	
	protected $month_start = 7;


	
	protected $date_start;


	
	protected $nb_week = 52;


	
	protected $quarter_mark = 'null';


	
	protected $month_mark = 'null';


	
	protected $remark = 'null';

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFiscalYear()
	{

		return $this->fiscal_year;
	}

	
	public function getMonthStart()
	{

		return $this->month_start;
	}

	
	public function getDateStart($format = 'Y-m-d')
	{

		if ($this->date_start === null || $this->date_start === '') {
			return null;
		} elseif (!is_int($this->date_start)) {
						$ts = strtotime($this->date_start);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_start] as date/time value: " . var_export($this->date_start, true));
			}
		} else {
			$ts = $this->date_start;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNbWeek()
	{

		return $this->nb_week;
	}

	
	public function getQuarterMark()
	{

		return $this->quarter_mark;
	}

	
	public function getMonthMark()
	{

		return $this->month_mark;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::ID;
		}

	} 
	
	public function setFiscalYear($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fiscal_year !== $v || $v === 0) {
			$this->fiscal_year = $v;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::FISCAL_YEAR;
		}

	} 
	
	public function setMonthStart($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->month_start !== $v || $v === 7) {
			$this->month_start = $v;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::MONTH_START;
		}

	} 
	
	public function setDateStart($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_start] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_start !== $ts) {
			$this->date_start = $ts;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::DATE_START;
		}

	} 
	
	public function setNbWeek($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->nb_week !== $v || $v === 52) {
			$this->nb_week = $v;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::NB_WEEK;
		}

	} 
	
	public function setQuarterMark($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->quarter_mark !== $v || $v === 'null') {
			$this->quarter_mark = $v;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::QUARTER_MARK;
		}

	} 
	
	public function setMonthMark($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->month_mark !== $v || $v === 'null') {
			$this->month_mark = $v;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::MONTH_MARK;
		}

	} 
	
	public function setRemark($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v || $v === 'null') {
			$this->remark = $v;
			$this->modifiedColumns[] = SeagateFiscalCalendarSettingPeer::REMARK;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fiscal_year = $rs->getInt($startcol + 1);

			$this->month_start = $rs->getInt($startcol + 2);

			$this->date_start = $rs->getDate($startcol + 3, null);

			$this->nb_week = $rs->getInt($startcol + 4);

			$this->quarter_mark = $rs->getString($startcol + 5);

			$this->month_mark = $rs->getString($startcol + 6);

			$this->remark = $rs->getString($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SeagateFiscalCalendarSetting object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SeagateFiscalCalendarSettingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SeagateFiscalCalendarSettingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SeagateFiscalCalendarSettingPeer::DATABASE_NAME);
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
					$pk = SeagateFiscalCalendarSettingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SeagateFiscalCalendarSettingPeer::doUpdate($this, $con);
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


			if (($retval = SeagateFiscalCalendarSettingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SeagateFiscalCalendarSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFiscalYear();
				break;
			case 2:
				return $this->getMonthStart();
				break;
			case 3:
				return $this->getDateStart();
				break;
			case 4:
				return $this->getNbWeek();
				break;
			case 5:
				return $this->getQuarterMark();
				break;
			case 6:
				return $this->getMonthMark();
				break;
			case 7:
				return $this->getRemark();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SeagateFiscalCalendarSettingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFiscalYear(),
			$keys[2] => $this->getMonthStart(),
			$keys[3] => $this->getDateStart(),
			$keys[4] => $this->getNbWeek(),
			$keys[5] => $this->getQuarterMark(),
			$keys[6] => $this->getMonthMark(),
			$keys[7] => $this->getRemark(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SeagateFiscalCalendarSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFiscalYear($value);
				break;
			case 2:
				$this->setMonthStart($value);
				break;
			case 3:
				$this->setDateStart($value);
				break;
			case 4:
				$this->setNbWeek($value);
				break;
			case 5:
				$this->setQuarterMark($value);
				break;
			case 6:
				$this->setMonthMark($value);
				break;
			case 7:
				$this->setRemark($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SeagateFiscalCalendarSettingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFiscalYear($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonthStart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDateStart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNbWeek($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQuarterMark($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonthMark($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRemark($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SeagateFiscalCalendarSettingPeer::DATABASE_NAME);

		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::ID)) $criteria->add(SeagateFiscalCalendarSettingPeer::ID, $this->id);
		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::FISCAL_YEAR)) $criteria->add(SeagateFiscalCalendarSettingPeer::FISCAL_YEAR, $this->fiscal_year);
		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::MONTH_START)) $criteria->add(SeagateFiscalCalendarSettingPeer::MONTH_START, $this->month_start);
		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::DATE_START)) $criteria->add(SeagateFiscalCalendarSettingPeer::DATE_START, $this->date_start);
		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::NB_WEEK)) $criteria->add(SeagateFiscalCalendarSettingPeer::NB_WEEK, $this->nb_week);
		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::QUARTER_MARK)) $criteria->add(SeagateFiscalCalendarSettingPeer::QUARTER_MARK, $this->quarter_mark);
		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::MONTH_MARK)) $criteria->add(SeagateFiscalCalendarSettingPeer::MONTH_MARK, $this->month_mark);
		if ($this->isColumnModified(SeagateFiscalCalendarSettingPeer::REMARK)) $criteria->add(SeagateFiscalCalendarSettingPeer::REMARK, $this->remark);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SeagateFiscalCalendarSettingPeer::DATABASE_NAME);

		$criteria->add(SeagateFiscalCalendarSettingPeer::ID, $this->id);

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

		$copyObj->setFiscalYear($this->fiscal_year);

		$copyObj->setMonthStart($this->month_start);

		$copyObj->setDateStart($this->date_start);

		$copyObj->setNbWeek($this->nb_week);

		$copyObj->setQuarterMark($this->quarter_mark);

		$copyObj->setMonthMark($this->month_mark);

		$copyObj->setRemark($this->remark);


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
			self::$peer = new SeagateFiscalCalendarSettingPeer();
		}
		return self::$peer;
	}

} 