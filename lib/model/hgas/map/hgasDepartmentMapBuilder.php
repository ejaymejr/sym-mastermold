<?php



class hgasDepartmentMapBuilder {

	
	const CLASS_NAME = 'lib.model.hgas.map.hgasDepartmentMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('hgas');

		$tMap = $this->dbMap->addTable('department');
		$tMap->setPhpName('hgasDepartment');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TOTAL_HANGER', 'TotalHanger', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_RESERVED', 'TotalReserved', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_ASSIGNED', 'TotalAssigned', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_SLOT_RESERVED', 'TotalSlotReserved', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_SLOT_ASSIGNED', 'TotalSlotAssigned', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_SLOT_PENDING', 'TotalSlotPending', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_SLOT_IN_PROGRESS', 'TotalSlotInProgress', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 