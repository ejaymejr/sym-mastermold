<?php


abstract class BaseWashingMachineDoseCalibrationPeer {

	
	const DATABASE_NAME = 'particle';

	
	const TABLE_NAME = 'washing_machine_dose_calibration';

	
	const CLASS_DEFAULT = 'lib.model.particle.WashingMachineDoseCalibration';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'washing_machine_dose_calibration.ID';

	
	const DATE_TIME = 'washing_machine_dose_calibration.DATE_TIME';

	
	const MACHINE_NO = 'washing_machine_dose_calibration.MACHINE_NO';

	
	const VOLUME_DISPENSED = 'washing_machine_dose_calibration.VOLUME_DISPENSED';

	
	const TIME_TAKEN = 'washing_machine_dose_calibration.TIME_TAKEN';

	
	const REMARKS = 'washing_machine_dose_calibration.REMARKS';

	
	const CHECKED_BY = 'washing_machine_dose_calibration.CHECKED_BY';

	
	const CREATED_BY = 'washing_machine_dose_calibration.CREATED_BY';

	
	const DATE_CREATED = 'washing_machine_dose_calibration.DATE_CREATED';

	
	const MODIFIED_BY = 'washing_machine_dose_calibration.MODIFIED_BY';

	
	const DATE_MODIFIED = 'washing_machine_dose_calibration.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DateTime', 'MachineNo', 'VolumeDispensed', 'TimeTaken', 'Remarks', 'CheckedBy', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (WashingMachineDoseCalibrationPeer::ID, WashingMachineDoseCalibrationPeer::DATE_TIME, WashingMachineDoseCalibrationPeer::MACHINE_NO, WashingMachineDoseCalibrationPeer::VOLUME_DISPENSED, WashingMachineDoseCalibrationPeer::TIME_TAKEN, WashingMachineDoseCalibrationPeer::REMARKS, WashingMachineDoseCalibrationPeer::CHECKED_BY, WashingMachineDoseCalibrationPeer::CREATED_BY, WashingMachineDoseCalibrationPeer::DATE_CREATED, WashingMachineDoseCalibrationPeer::MODIFIED_BY, WashingMachineDoseCalibrationPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'date_time', 'machine_no', 'volume_dispensed', 'time_taken', 'remarks', 'checked_by', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DateTime' => 1, 'MachineNo' => 2, 'VolumeDispensed' => 3, 'TimeTaken' => 4, 'Remarks' => 5, 'CheckedBy' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, ),
		BasePeer::TYPE_COLNAME => array (WashingMachineDoseCalibrationPeer::ID => 0, WashingMachineDoseCalibrationPeer::DATE_TIME => 1, WashingMachineDoseCalibrationPeer::MACHINE_NO => 2, WashingMachineDoseCalibrationPeer::VOLUME_DISPENSED => 3, WashingMachineDoseCalibrationPeer::TIME_TAKEN => 4, WashingMachineDoseCalibrationPeer::REMARKS => 5, WashingMachineDoseCalibrationPeer::CHECKED_BY => 6, WashingMachineDoseCalibrationPeer::CREATED_BY => 7, WashingMachineDoseCalibrationPeer::DATE_CREATED => 8, WashingMachineDoseCalibrationPeer::MODIFIED_BY => 9, WashingMachineDoseCalibrationPeer::DATE_MODIFIED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date_time' => 1, 'machine_no' => 2, 'volume_dispensed' => 3, 'time_taken' => 4, 'remarks' => 5, 'checked_by' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/particle/map/WashingMachineDoseCalibrationMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.particle.map.WashingMachineDoseCalibrationMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = WashingMachineDoseCalibrationPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(WashingMachineDoseCalibrationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::ID);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::DATE_TIME);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::MACHINE_NO);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::VOLUME_DISPENSED);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::TIME_TAKEN);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::REMARKS);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::CHECKED_BY);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::CREATED_BY);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::DATE_CREATED);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::MODIFIED_BY);

		$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(washing_machine_dose_calibration.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT washing_machine_dose_calibration.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(WashingMachineDoseCalibrationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = WashingMachineDoseCalibrationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = WashingMachineDoseCalibrationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return WashingMachineDoseCalibrationPeer::populateObjects(WashingMachineDoseCalibrationPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			WashingMachineDoseCalibrationPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = WashingMachineDoseCalibrationPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return WashingMachineDoseCalibrationPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(WashingMachineDoseCalibrationPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(WashingMachineDoseCalibrationPeer::ID);
			$selectCriteria->add(WashingMachineDoseCalibrationPeer::ID, $criteria->remove(WashingMachineDoseCalibrationPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(WashingMachineDoseCalibrationPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(WashingMachineDoseCalibrationPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof WashingMachineDoseCalibration) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(WashingMachineDoseCalibrationPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(WashingMachineDoseCalibration $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(WashingMachineDoseCalibrationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(WashingMachineDoseCalibrationPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(WashingMachineDoseCalibrationPeer::DATABASE_NAME, WashingMachineDoseCalibrationPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = WashingMachineDoseCalibrationPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(WashingMachineDoseCalibrationPeer::DATABASE_NAME);

		$criteria->add(WashingMachineDoseCalibrationPeer::ID, $pk);


		$v = WashingMachineDoseCalibrationPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(WashingMachineDoseCalibrationPeer::ID, $pks, Criteria::IN);
			$objs = WashingMachineDoseCalibrationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseWashingMachineDoseCalibrationPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/particle/map/WashingMachineDoseCalibrationMapBuilder.php';
	Propel::registerMapBuilder('lib.model.particle.map.WashingMachineDoseCalibrationMapBuilder');
}
