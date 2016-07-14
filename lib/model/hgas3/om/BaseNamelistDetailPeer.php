<?php


abstract class BaseNamelistDetailPeer {

	
	const DATABASE_NAME = 'hgas3';

	
	const TABLE_NAME = 'namelist_detail';

	
	const CLASS_DEFAULT = 'lib.model.hgas3.NamelistDetail';

	
	const NUM_COLUMNS = 25;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'namelist_detail.ID';

	
	const NAMELIST_HEADER_ID = 'namelist_detail.NAMELIST_HEADER_ID';

	
	const TRANS_DATE = 'namelist_detail.TRANS_DATE';

	
	const TAG_ID = 'namelist_detail.TAG_ID';

	
	const USER_FULLNAME = 'namelist_detail.USER_FULLNAME';

	
	const USER_GID = 'namelist_detail.USER_GID';

	
	const JS_SIZE = 'namelist_detail.JS_SIZE';

	
	const BOOT_SIZE = 'namelist_detail.BOOT_SIZE';

	
	const SAFETY_BOOT_SIZE = 'namelist_detail.SAFETY_BOOT_SIZE';

	
	const HOOD_SIZE = 'namelist_detail.HOOD_SIZE';

	
	const BAG_SIZE = 'namelist_detail.BAG_SIZE';

	
	const CELL_NAME = 'namelist_detail.CELL_NAME';

	
	const DEPARTMENT_NAME = 'namelist_detail.DEPARTMENT_NAME';

	
	const TEAM_NAME = 'namelist_detail.TEAM_NAME';

	
	const HANGER_NAME = 'namelist_detail.HANGER_NAME';

	
	const LOCATION = 'namelist_detail.LOCATION';

	
	const JS_CHK = 'namelist_detail.JS_CHK';

	
	const BOOT_CHK = 'namelist_detail.BOOT_CHK';

	
	const SBOOT_CHK = 'namelist_detail.SBOOT_CHK';

	
	const HOOD_CHK = 'namelist_detail.HOOD_CHK';

	
	const BAG_CHK = 'namelist_detail.BAG_CHK';

	
	const CREATED_BY = 'namelist_detail.CREATED_BY';

	
	const DATE_CREATED = 'namelist_detail.DATE_CREATED';

	
	const MODIFIED_BY = 'namelist_detail.MODIFIED_BY';

	
	const DATE_MODIFIED = 'namelist_detail.DATE_MODIFIED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'NamelistHeaderId', 'TransDate', 'TagId', 'UserFullname', 'UserGid', 'JsSize', 'BootSize', 'SafetyBootSize', 'HoodSize', 'BagSize', 'CellName', 'DepartmentName', 'TeamName', 'HangerName', 'Location', 'JsChk', 'BootChk', 'SbootChk', 'HoodChk', 'BagChk', 'CreatedBy', 'DateCreated', 'ModifiedBy', 'DateModified', ),
		BasePeer::TYPE_COLNAME => array (NamelistDetailPeer::ID, NamelistDetailPeer::NAMELIST_HEADER_ID, NamelistDetailPeer::TRANS_DATE, NamelistDetailPeer::TAG_ID, NamelistDetailPeer::USER_FULLNAME, NamelistDetailPeer::USER_GID, NamelistDetailPeer::JS_SIZE, NamelistDetailPeer::BOOT_SIZE, NamelistDetailPeer::SAFETY_BOOT_SIZE, NamelistDetailPeer::HOOD_SIZE, NamelistDetailPeer::BAG_SIZE, NamelistDetailPeer::CELL_NAME, NamelistDetailPeer::DEPARTMENT_NAME, NamelistDetailPeer::TEAM_NAME, NamelistDetailPeer::HANGER_NAME, NamelistDetailPeer::LOCATION, NamelistDetailPeer::JS_CHK, NamelistDetailPeer::BOOT_CHK, NamelistDetailPeer::SBOOT_CHK, NamelistDetailPeer::HOOD_CHK, NamelistDetailPeer::BAG_CHK, NamelistDetailPeer::CREATED_BY, NamelistDetailPeer::DATE_CREATED, NamelistDetailPeer::MODIFIED_BY, NamelistDetailPeer::DATE_MODIFIED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'namelist_header_id', 'trans_date', 'tag_id', 'user_fullname', 'user_gid', 'js_size', 'boot_size', 'safety_boot_size', 'hood_size', 'bag_size', 'cell_name', 'department_name', 'team_name', 'hanger_name', 'location', 'js_chk', 'boot_chk', 'sboot_chk', 'hood_chk', 'bag_chk', 'created_by', 'date_created', 'modified_by', 'date_modified', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'NamelistHeaderId' => 1, 'TransDate' => 2, 'TagId' => 3, 'UserFullname' => 4, 'UserGid' => 5, 'JsSize' => 6, 'BootSize' => 7, 'SafetyBootSize' => 8, 'HoodSize' => 9, 'BagSize' => 10, 'CellName' => 11, 'DepartmentName' => 12, 'TeamName' => 13, 'HangerName' => 14, 'Location' => 15, 'JsChk' => 16, 'BootChk' => 17, 'SbootChk' => 18, 'HoodChk' => 19, 'BagChk' => 20, 'CreatedBy' => 21, 'DateCreated' => 22, 'ModifiedBy' => 23, 'DateModified' => 24, ),
		BasePeer::TYPE_COLNAME => array (NamelistDetailPeer::ID => 0, NamelistDetailPeer::NAMELIST_HEADER_ID => 1, NamelistDetailPeer::TRANS_DATE => 2, NamelistDetailPeer::TAG_ID => 3, NamelistDetailPeer::USER_FULLNAME => 4, NamelistDetailPeer::USER_GID => 5, NamelistDetailPeer::JS_SIZE => 6, NamelistDetailPeer::BOOT_SIZE => 7, NamelistDetailPeer::SAFETY_BOOT_SIZE => 8, NamelistDetailPeer::HOOD_SIZE => 9, NamelistDetailPeer::BAG_SIZE => 10, NamelistDetailPeer::CELL_NAME => 11, NamelistDetailPeer::DEPARTMENT_NAME => 12, NamelistDetailPeer::TEAM_NAME => 13, NamelistDetailPeer::HANGER_NAME => 14, NamelistDetailPeer::LOCATION => 15, NamelistDetailPeer::JS_CHK => 16, NamelistDetailPeer::BOOT_CHK => 17, NamelistDetailPeer::SBOOT_CHK => 18, NamelistDetailPeer::HOOD_CHK => 19, NamelistDetailPeer::BAG_CHK => 20, NamelistDetailPeer::CREATED_BY => 21, NamelistDetailPeer::DATE_CREATED => 22, NamelistDetailPeer::MODIFIED_BY => 23, NamelistDetailPeer::DATE_MODIFIED => 24, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'namelist_header_id' => 1, 'trans_date' => 2, 'tag_id' => 3, 'user_fullname' => 4, 'user_gid' => 5, 'js_size' => 6, 'boot_size' => 7, 'safety_boot_size' => 8, 'hood_size' => 9, 'bag_size' => 10, 'cell_name' => 11, 'department_name' => 12, 'team_name' => 13, 'hanger_name' => 14, 'location' => 15, 'js_chk' => 16, 'boot_chk' => 17, 'sboot_chk' => 18, 'hood_chk' => 19, 'bag_chk' => 20, 'created_by' => 21, 'date_created' => 22, 'modified_by' => 23, 'date_modified' => 24, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hgas3/map/NamelistDetailMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hgas3.map.NamelistDetailMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NamelistDetailPeer::getTableMap();
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
		return str_replace(NamelistDetailPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NamelistDetailPeer::ID);

		$criteria->addSelectColumn(NamelistDetailPeer::NAMELIST_HEADER_ID);

		$criteria->addSelectColumn(NamelistDetailPeer::TRANS_DATE);

		$criteria->addSelectColumn(NamelistDetailPeer::TAG_ID);

		$criteria->addSelectColumn(NamelistDetailPeer::USER_FULLNAME);

		$criteria->addSelectColumn(NamelistDetailPeer::USER_GID);

		$criteria->addSelectColumn(NamelistDetailPeer::JS_SIZE);

		$criteria->addSelectColumn(NamelistDetailPeer::BOOT_SIZE);

		$criteria->addSelectColumn(NamelistDetailPeer::SAFETY_BOOT_SIZE);

		$criteria->addSelectColumn(NamelistDetailPeer::HOOD_SIZE);

		$criteria->addSelectColumn(NamelistDetailPeer::BAG_SIZE);

		$criteria->addSelectColumn(NamelistDetailPeer::CELL_NAME);

		$criteria->addSelectColumn(NamelistDetailPeer::DEPARTMENT_NAME);

		$criteria->addSelectColumn(NamelistDetailPeer::TEAM_NAME);

		$criteria->addSelectColumn(NamelistDetailPeer::HANGER_NAME);

		$criteria->addSelectColumn(NamelistDetailPeer::LOCATION);

		$criteria->addSelectColumn(NamelistDetailPeer::JS_CHK);

		$criteria->addSelectColumn(NamelistDetailPeer::BOOT_CHK);

		$criteria->addSelectColumn(NamelistDetailPeer::SBOOT_CHK);

		$criteria->addSelectColumn(NamelistDetailPeer::HOOD_CHK);

		$criteria->addSelectColumn(NamelistDetailPeer::BAG_CHK);

		$criteria->addSelectColumn(NamelistDetailPeer::CREATED_BY);

		$criteria->addSelectColumn(NamelistDetailPeer::DATE_CREATED);

		$criteria->addSelectColumn(NamelistDetailPeer::MODIFIED_BY);

		$criteria->addSelectColumn(NamelistDetailPeer::DATE_MODIFIED);

	}

	const COUNT = 'COUNT(namelist_detail.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT namelist_detail.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NamelistDetailPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NamelistDetailPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NamelistDetailPeer::doSelectRS($criteria, $con);
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
		$objects = NamelistDetailPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NamelistDetailPeer::populateObjects(NamelistDetailPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NamelistDetailPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NamelistDetailPeer::getOMClass();
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
		return NamelistDetailPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NamelistDetailPeer::ID); 

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
			$comparison = $criteria->getComparison(NamelistDetailPeer::ID);
			$selectCriteria->add(NamelistDetailPeer::ID, $criteria->remove(NamelistDetailPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NamelistDetailPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NamelistDetailPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NamelistDetail) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NamelistDetailPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NamelistDetail $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NamelistDetailPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NamelistDetailPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NamelistDetailPeer::DATABASE_NAME, NamelistDetailPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NamelistDetailPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NamelistDetailPeer::DATABASE_NAME);

		$criteria->add(NamelistDetailPeer::ID, $pk);


		$v = NamelistDetailPeer::doSelect($criteria, $con);

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
			$criteria->add(NamelistDetailPeer::ID, $pks, Criteria::IN);
			$objs = NamelistDetailPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNamelistDetailPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hgas3/map/NamelistDetailMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hgas3.map.NamelistDetailMapBuilder');
}
