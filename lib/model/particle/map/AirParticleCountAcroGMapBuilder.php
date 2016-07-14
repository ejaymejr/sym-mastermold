<?php



class AirParticleCountAcroGMapBuilder {

	
	const CLASS_NAME = 'lib.model.particle.map.AirParticleCountAcroGMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('particle');

		$tMap = $this->dbMap->addTable('air_particle_count_acro_g');
		$tMap->setPhpName('AirParticleCountAcroG');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DATE_RECORD', 'DateRecord', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TESTER_ID', 'TesterId', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('HUMIDITY', 'Humidity', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('TEMPERATURE', 'Temperature', 'double', CreoleTypes::FLOAT, true, null);

		$tMap->addColumn('DIFF_PRESSURE', 'DiffPressure', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FREQUENCY', 'Frequency', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('DELETED', 'Deleted', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 