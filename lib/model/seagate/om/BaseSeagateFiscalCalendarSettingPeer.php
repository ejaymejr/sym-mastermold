<?php


abstract class BaseSeagateFiscalCalendarSettingPeer {

	
	const DATABASE_NAME = 'seagateCommonData';

	
	const TABLE_NAME = 'fiscal_calendar_setting';

	
	const CLASS_DEFAULT = 'lib.model.seagate.SeagateFiscalCalendarSetting';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'fiscal_calendar_setting.ID';

	
	const FISCAL_YEAR = 'fiscal_calendar_setting.FISCAL_YEAR';

	
	const MONTH_START = 'fiscal_calendar_setting.MONTH_START';

	
	const DATE_START = 'fiscal_calendar_setting.DATE_START';

	
	const NB_WEEK = 'fiscal_calendar_setting.NB_WEEK';

	
	const QUARTER_MARK = 'fiscal_calendar_setting.QUARTER_MARK';

	
	const MONTH_MARK = 'fiscal_calendar_setting.MONTH_MARK';

	
	const REMARK = 'fiscal_calendar_setting.REMARK';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FiscalYear', 'MonthStart', 'DateStart', 'NbWeek', 'QuarterMark', 'MonthMark', 'Remark', ),
		BasePeer::TYPE_COLNAME => array (SeagateFiscalCalendarSettingPeer::ID, SeagateFiscalCalendarSettingPeer::FISCAL_YEAR, SeagateFiscalCalendarSettingPeer::MONTH_START, SeagateFiscalCalendarSettingPeer::DATE_START, SeagateFiscalCalendarSettingPeer::NB_WEEK, SeagateFiscalCalendarSettingPeer::QUARTER_MARK, SeagateFiscalCalendarSettingPeer::MONTH_MARK, SeagateFiscalCalendarSettingPeer::REMARK, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fiscal_year', 'month_start', 'date_start', 'nb_week', 'quarter_mark', 'month_mark', 'remark', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FiscalYear' => 1, 'MonthStart' => 2, 'DateStart' => 3, 'NbWeek' => 4, 'QuarterMark' => 5, 'MonthMark' => 6, 'Remark' => 7, ),
		BasePeer::TYPE_COLNAME => array (SeagateFiscalCalendarSettingPeer::ID => 0, SeagateFiscalCalendarSettingPeer::FISCAL_YEAR => 1, SeagateFiscalCalendarSettingPeer::MONTH_START => 2, SeagateFiscalCalendarSettingPeer::DATE_START => 3, SeagateFiscalCalendarSettingPeer::NB_WEEK => 4, SeagateFiscalCalendarSettingPeer::QUARTER_MARK => 5, SeagateFiscalCalendarSettingPeer::MONTH_MARK => 6, SeagateFiscalCalendarSettingPeer::REMARK => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fiscal_year' => 1, 'month_start' => 2, 'date_start' => 3, 'nb_week' => 4, 'quarter_mark' => 5, 'month_mark' => 6, 'remark' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/seagate/map/SeagateFiscalCalendarSettingMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.seagate.map.SeagateFiscalCalendarSettingMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SeagateFiscalCalendarSettingPeer::getTableMap();
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
		return str_replace(SeagateFiscalCalendarSettingPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::ID);

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::FISCAL_YEAR);

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::MONTH_START);

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::DATE_START);

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::NB_WEEK);

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::QUARTER_MARK);

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::MONTH_MARK);

		$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::REMARK);

	}

	const COUNT = 'COUNT(fiscal_calendar_setting.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fiscal_calendar_setting.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SeagateFiscalCalendarSettingPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SeagateFiscalCalendarSettingPeer::doSelectRS($criteria, $con);
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
		$objects = SeagateFiscalCalendarSettingPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SeagateFiscalCalendarSettingPeer::populateObjects(SeagateFiscalCalendarSettingPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SeagateFiscalCalendarSettingPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SeagateFiscalCalendarSettingPeer::getOMClass();
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
		return SeagateFiscalCalendarSettingPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(SeagateFiscalCalendarSettingPeer::ID); 

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
			$comparison = $criteria->getComparison(SeagateFiscalCalendarSettingPeer::ID);
			$selectCriteria->add(SeagateFiscalCalendarSettingPeer::ID, $criteria->remove(SeagateFiscalCalendarSettingPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(SeagateFiscalCalendarSettingPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SeagateFiscalCalendarSettingPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof SeagateFiscalCalendarSetting) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SeagateFiscalCalendarSettingPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(SeagateFiscalCalendarSetting $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SeagateFiscalCalendarSettingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SeagateFiscalCalendarSettingPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SeagateFiscalCalendarSettingPeer::DATABASE_NAME, SeagateFiscalCalendarSettingPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SeagateFiscalCalendarSettingPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SeagateFiscalCalendarSettingPeer::DATABASE_NAME);

		$criteria->add(SeagateFiscalCalendarSettingPeer::ID, $pk);


		$v = SeagateFiscalCalendarSettingPeer::doSelect($criteria, $con);

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
			$criteria->add(SeagateFiscalCalendarSettingPeer::ID, $pks, Criteria::IN);
			$objs = SeagateFiscalCalendarSettingPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSeagateFiscalCalendarSettingPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/seagate/map/SeagateFiscalCalendarSettingMapBuilder.php';
	Propel::registerMapBuilder('lib.model.seagate.map.SeagateFiscalCalendarSettingMapBuilder');
}
