<?php



class SeagateFiscalCalendarSettingMapBuilder {

	
	const CLASS_NAME = 'lib.model.seagate.map.SeagateFiscalCalendarSettingMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('seagateCommonData');

		$tMap = $this->dbMap->addTable('fiscal_calendar_setting');
		$tMap->setPhpName('SeagateFiscalCalendarSetting');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FISCAL_YEAR', 'FiscalYear', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONTH_START', 'MonthStart', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DATE_START', 'DateStart', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NB_WEEK', 'NbWeek', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('QUARTER_MARK', 'QuarterMark', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('MONTH_MARK', 'MonthMark', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, true, 255);

	} 
} 