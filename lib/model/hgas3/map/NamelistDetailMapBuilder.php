<?php



class NamelistDetailMapBuilder {

	
	const CLASS_NAME = 'lib.model.hgas3.map.NamelistDetailMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('hgas3');

		$tMap = $this->dbMap->addTable('namelist_detail');
		$tMap->setPhpName('NamelistDetail');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAMELIST_HEADER_ID', 'NamelistHeaderId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('TAG_ID', 'TagId', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('USER_FULLNAME', 'UserFullname', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('USER_GID', 'UserGid', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('JS_SIZE', 'JsSize', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('BOOT_SIZE', 'BootSize', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('SAFETY_BOOT_SIZE', 'SafetyBootSize', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('HOOD_SIZE', 'HoodSize', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('BAG_SIZE', 'BagSize', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CELL_NAME', 'CellName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DEPARTMENT_NAME', 'DepartmentName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TEAM_NAME', 'TeamName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('HANGER_NAME', 'HangerName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LOCATION', 'Location', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('JS_CHK', 'JsChk', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('BOOT_CHK', 'BootChk', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('SBOOT_CHK', 'SbootChk', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('HOOD_CHK', 'HoodChk', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('BAG_CHK', 'BagChk', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 