<?php


abstract class BaseAirParticleCountEdwardsGPeer {

	
	const DATABASE_NAME = 'particle';

	
	const TABLE_NAME = 'air_particle_count_edwards_g';

	
	const CLASS_DEFAULT = 'lib.model.particle.AirParticleCountEdwardsG';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'air_particle_count_edwards_g.ID';

	
	const DATE_RECORD = 'air_particle_count_edwards_g.DATE_RECORD';

	
	const TESTER_ID = 'air_particle_count_edwards_g.TESTER_ID';

	
	const HUMIDITY = 'air_particle_count_edwards_g.HUMIDITY';

	
	const TEMPERATURE = 'air_particle_count_edwards_g.TEMPERATURE';

	
	const DIFF_PRESSURE = 'air_particle_count_edwards_g.DIFF_PRESSURE';

	
	const FREQUENCY = 'air_particle_count_edwards_g.FREQUENCY';

	
	const REMARK = 'air_particle_count_edwards_g.REMARK';

	
	const DELETED = 'air_particle_count_edwards_g.DELETED';

	
	const DATE_CREATED = 'air_particle_count_edwards_g.DATE_CREATED';

	
	const DATE_MODIFIED = 'air_particle_count_edwards_g.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DateRecord', 'TesterId', 'Humidity', 'Temperature', 'DiffPressure', 'Frequency', 'Remark', 'Deleted', 'DateCreated', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (AirParticleCountEdwardsGPeer::ID, AirParticleCountEdwardsGPeer::DATE_RECORD, AirParticleCountEdwardsGPeer::TESTER_ID, AirParticleCountEdwardsGPeer::HUMIDITY, AirParticleCountEdwardsGPeer::TEMPERATURE, AirParticleCountEdwardsGPeer::DIFF_PRESSURE, AirParticleCountEdwardsGPeer::FREQUENCY, AirParticleCountEdwardsGPeer::REMARK, AirParticleCountEdwardsGPeer::DELETED, AirParticleCountEdwardsGPeer::DATE_CREATED, AirParticleCountEdwardsGPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'date_record', 'tester_id', 'humidity', 'temperature', 'diff_pressure', 'frequency', 'remark', 'deleted', 'date_created', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DateRecord' => 1, 'TesterId' => 2, 'Humidity' => 3, 'Temperature' => 4, 'DiffPressure' => 5, 'Frequency' => 6, 'Remark' => 7, 'Deleted' => 8, 'DateCreated' => 9, 'DateModified' => 10, ),
		BasePeer::TYPE_COLNAME => array (AirParticleCountEdwardsGPeer::ID => 0, AirParticleCountEdwardsGPeer::DATE_RECORD => 1, AirParticleCountEdwardsGPeer::TESTER_ID => 2, AirParticleCountEdwardsGPeer::HUMIDITY => 3, AirParticleCountEdwardsGPeer::TEMPERATURE => 4, AirParticleCountEdwardsGPeer::DIFF_PRESSURE => 5, AirParticleCountEdwardsGPeer::FREQUENCY => 6, AirParticleCountEdwardsGPeer::REMARK => 7, AirParticleCountEdwardsGPeer::DELETED => 8, AirParticleCountEdwardsGPeer::DATE_CREATED => 9, AirParticleCountEdwardsGPeer::DATE_MODIFIED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date_record' => 1, 'tester_id' => 2, 'humidity' => 3, 'temperature' => 4, 'diff_pressure' => 5, 'frequency' => 6, 'remark' => 7, 'deleted' => 8, 'date_created' => 9, 'date_modified' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/particle/map/AirParticleCountEdwardsGMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.particle.map.AirParticleCountEdwardsGMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AirParticleCountEdwardsGPeer::getTableMap();
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
		return str_replace(AirParticleCountEdwardsGPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::ID);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::DATE_RECORD);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::TESTER_ID);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::HUMIDITY);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::TEMPERATURE);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::DIFF_PRESSURE);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::FREQUENCY);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::REMARK);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::DELETED);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::DATE_CREATED);

		$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(air_particle_count_edwards_g.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT air_particle_count_edwards_g.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AirParticleCountEdwardsGPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AirParticleCountEdwardsGPeer::doSelectRS($criteria, $con);
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
		$objects = AirParticleCountEdwardsGPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AirParticleCountEdwardsGPeer::populateObjects(AirParticleCountEdwardsGPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AirParticleCountEdwardsGPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AirParticleCountEdwardsGPeer::getOMClass();
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
		return AirParticleCountEdwardsGPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AirParticleCountEdwardsGPeer::ID); 

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
			$comparison = $criteria->getComparison(AirParticleCountEdwardsGPeer::ID);
			$selectCriteria->add(AirParticleCountEdwardsGPeer::ID, $criteria->remove(AirParticleCountEdwardsGPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AirParticleCountEdwardsGPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AirParticleCountEdwardsGPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AirParticleCountEdwardsG) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AirParticleCountEdwardsGPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AirParticleCountEdwardsG $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AirParticleCountEdwardsGPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AirParticleCountEdwardsGPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AirParticleCountEdwardsGPeer::DATABASE_NAME, AirParticleCountEdwardsGPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AirParticleCountEdwardsGPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AirParticleCountEdwardsGPeer::DATABASE_NAME);

		$criteria->add(AirParticleCountEdwardsGPeer::ID, $pk);


		$v = AirParticleCountEdwardsGPeer::doSelect($criteria, $con);

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
			$criteria->add(AirParticleCountEdwardsGPeer::ID, $pks, Criteria::IN);
			$objs = AirParticleCountEdwardsGPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAirParticleCountEdwardsGPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/particle/map/AirParticleCountEdwardsGMapBuilder.php';
	Propel::registerMapBuilder('lib.model.particle.map.AirParticleCountEdwardsGMapBuilder');
}
