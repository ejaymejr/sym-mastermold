<?php



class Pms1232abQuarterlyMapBuilder {

	
	const CLASS_NAME = 'lib.model.inspection.map.Pms1232abQuarterlyMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('inspection');

		$tMap = $this->dbMap->addTable('pms_1232ab_quarterly');
		$tMap->setPhpName('Pms1232abQuarterly');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TRANS_DATE', 'TransDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MACHINE_NO', 'MachineNo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('QUARTER', 'Quarter', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DATE_COMPLETED', 'DateCompleted', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DUE_DATE', 'DueDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CDA_FILTER', 'CdaFilter', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DI_WATER_FILTER', 'DiWaterFilter', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('INITIAL', 'Initial', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 