<?php



class HrEmployeeLeaveSignatureMapBuilder {

	
	const CLASS_NAME = 'lib.model.hr.map.HrEmployeeLeaveSignatureMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('hr');

		$tMap = $this->dbMap->addTable('hr_employee_leave_signature');
		$tMap->setPhpName('HrEmployeeLeaveSignature');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('APPROVAL', 'Approval', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('VERIFIED', 'Verified', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('HR_EMPLOYEE_LEAVE_ID', 'HrEmployeeLeaveId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('DATE_CREATED', 'DateCreated', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('MODIFIED_BY', 'ModifiedBy', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DATE_MODIFIED', 'DateModified', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 