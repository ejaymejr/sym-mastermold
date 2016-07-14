<?php


abstract class BaseWashingMachineLoadPeer {

	
	const DATABASE_NAME = 'particle';

	
	const TABLE_NAME = 'washing_machine_load';

	
	const CLASS_DEFAULT = 'lib.model.particle.WashingMachineLoad';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'washing_machine_load.ID';

	
	const DATE_TIME = 'washing_machine_load.DATE_TIME';

	
	const MACHINE_NO = 'washing_machine_load.MACHINE_NO';

	
	const WT_SCALE = 'washing_machine_load.WT_SCALE';

	
	const WT_DISPLAY = 'washing_machine_load.WT_DISPLAY';

	
	const REMARKS = 'washing_machine_load.REMARKS';

	
	const VERIFIED_BY = 'washing_machine_load.VERIFIED_BY';

	
	const CREATED_BY = 'washing_machine_load.CREATED_BY';

	
	const DATE_CREATED = 'washing_machine_load.DATE_CREATED';

	
	const MODIFIED_BY = 'washing_machine_load.MODIFIED_BY';

	
	const DATE_MODIFIED = 'washing_machine_load.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DateTime', 'MachineNo', 'WtScale', 'WtDisplay', 'Remarks', 'VerifiedBy', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (WashingMachineLoadPeer::ID, WashingMachineLoadPeer::DATE_TIME, WashingMachineLoadPeer::MACHINE_NO, WashingMachineLoadPeer::WT_SCALE, WashingMachineLoadPeer::WT_DISPLAY, WashingMachineLoadPeer::REMARKS, WashingMachineLoadPeer::VERIFIED_BY, WashingMachineLoadPeer::CREATED_BY, WashingMachineLoadPeer::DATE_CREATED, WashingMachineLoadPeer::MODIFIED_BY, WashingMachineLoadPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'date_time', 'machine_no', 'wt_scale', 'wt_display', 'remarks', 'verified_by', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DateTime' => 1, 'MachineNo' => 2, 'WtScale' => 3, 'WtDisplay' => 4, 'Remarks' => 5, 'VerifiedBy' => 6, 'CreatedBy' => 7, 'DateCreated' => 8, 'ModifiedBy' => 9, 'DateModified' => 10, ),
		BasePeer::TYPE_COLNAME => array (WashingMachineLoadPeer::ID => 0, WashingMachineLoadPeer::DATE_TIME => 1, WashingMachineLoadPeer::MACHINE_NO => 2, WashingMachineLoadPeer::WT_SCALE => 3, WashingMachineLoadPeer::WT_DISPLAY => 4, WashingMachineLoadPeer::REMARKS => 5, WashingMachineLoadPeer::VERIFIED_BY => 6, WashingMachineLoadPeer::CREATED_BY => 7, WashingMachineLoadPeer::DATE_CREATED => 8, WashingMachineLoadPeer::MODIFIED_BY => 9, WashingMachineLoadPeer::DATE_MODIFIED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date_time' => 1, 'machine_no' => 2, 'wt_scale' => 3, 'wt_display' => 4, 'remarks' => 5, 'verified_by' => 6, 'created_by' => 7, 'date_created' => 8, 'modified_by' => 9, 'date_modified' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/particle/map/WashingMachineLoadMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.particle.map.WashingMachineLoadMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = WashingMachineLoadPeer::getTableMap();
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
		return str_replace(WashingMachineLoadPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(WashingMachineLoadPeer::ID);

		$criteria->addSelectColumn(WashingMachineLoadPeer::DATE_TIME);

		$criteria->addSelectColumn(WashingMachineLoadPeer::MACHINE_NO);

		$criteria->addSelectColumn(WashingMachineLoadPeer::WT_SCALE);

		$criteria->addSelectColumn(WashingMachineLoadPeer::WT_DISPLAY);

		$criteria->addSelectColumn(WashingMachineLoadPeer::REMARKS);

		$criteria->addSelectColumn(WashingMachineLoadPeer::VERIFIED_BY);

		$criteria->addSelectColumn(WashingMachineLoadPeer::CREATED_BY);

		$criteria->addSelectColumn(WashingMachineLoadPeer::DATE_CREATED);

		$criteria->addSelectColumn(WashingMachineLoadPeer::MODIFIED_BY);

		$criteria->addSelectColumn(WashingMachineLoadPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(washing_machine_load.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT washing_machine_load.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(WashingMachineLoadPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(WashingMachineLoadPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = WashingMachineLoadPeer::doSelectRS($criteria, $con);
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
		$objects = WashingMachineLoadPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return WashingMachineLoadPeer::populateObjects(WashingMachineLoadPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			WashingMachineLoadPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = WashingMachineLoadPeer::getOMClass();
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
		return WashingMachineLoadPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(WashingMachineLoadPeer::ID); 

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
			$comparison = $criteria->getComparison(WashingMachineLoadPeer::ID);
			$selectCriteria->add(WashingMachineLoadPeer::ID, $criteria->remove(WashingMachineLoadPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(WashingMachineLoadPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(WashingMachineLoadPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof WashingMachineLoad) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(WashingMachineLoadPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(WashingMachineLoad $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(WashingMachineLoadPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(WashingMachineLoadPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(WashingMachineLoadPeer::DATABASE_NAME, WashingMachineLoadPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = WashingMachineLoadPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(WashingMachineLoadPeer::DATABASE_NAME);

		$criteria->add(WashingMachineLoadPeer::ID, $pk);


		$v = WashingMachineLoadPeer::doSelect($criteria, $con);

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
			$criteria->add(WashingMachineLoadPeer::ID, $pks, Criteria::IN);
			$objs = WashingMachineLoadPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseWashingMachineLoadPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/particle/map/WashingMachineLoadMapBuilder.php';
	Propel::registerMapBuilder('lib.model.particle.map.WashingMachineLoadMapBuilder');
}
