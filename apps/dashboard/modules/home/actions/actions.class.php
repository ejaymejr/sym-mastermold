<?php

/**
 * home actions.
 *
 * @package    snapps
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class homeActions extends SnappsActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
    $this->setLayout('layout_index');
    
  }
  
  public function executeStandardFormSearch()
  {
	  	$c = new Criteria();
	  	$c->addAscendingOrderByColumn(HrEmployeePeer::NAME);
	  	$this->pager = 	HrEmployeePeer::doSelect($c);
  }
  	public function executeEmployeeAdd()
	{
		$this->employeeData = new HrEmployee();
		$this->setTemplate('generalInformation' );
	}  
	
	public function executeEmployeeEdit()
	{
		$id = $this->_G('id');
		$data = HrEmployeePeer::retrieveByPK($id);
		if ($data)
		{
			$this->_S('employee_no', $data->getEmployeeNo());
			$this->_S('tax_id', $data->getTaxId());
			$this->_S('sin_id', $data->getSinId());
			$this->_S('name', $data->getName());
			//$this->_S('company', $data->getHrCompanyId());
			$this->_S('team', $data->getTeam());
			//$this->_S('department', HrDepartmentPeer::GetNamebyId($data->getHrCompanyId()));
			$this->_S('birth_place', $data->getBirthPlace());
			$this->_S('date_of_birth', ($data->getDateOfBirth())? $data->getDateOfBirth() : date('Y-m-d'));
			$this->_S('gender', substr($data->getGender(),0,1));
			$this->_S('status', $data->getStatus());
			$this->_S('blood_type', $data->getBloodType());
			$this->_S('home_phone', $data->getTelNo());
			$this->_S('hand_phone', $data->getCellNo());
			$this->_S('street', $data->getStreet());
			$this->_S('block_no', $data->getBldgRoomNo());
			$this->_S('profession', $data->getProfession());
			$this->_S('zipcode', $data->getZipCode());
			$this->_S('country', $data->getCity());
			$this->_S('nationality', $data->getNationality());
			$this->_S('mom_group', $data->getMomGroup());
			$this->_S('race', $data->getRace());
			$this->_S('type_of_employment', $data->getTypeOfEmployment());
			$this->_S('rank_code', $data->getRankCode());
			$this->_S('acct_no', $data->getAcctNo());
			$this->_S('commence_date', ($data->getCommenceDate())? $data->getCommenceDate() : Date('Y-m-d'));
			$this->_S('permit_no', $data->getPermitNo());
			$this->_S('permit_expiry', ($data->getPermitExpiry())? $data->getPermitExpiry() : date('Y-m-d'));
			$this->_S('permit_renew', ($data->getPermitRenew())? $data->getPermitRenew() : date('Y-m-d'));
			$this->_S('passport_expiry', ($data->getPassportExpiry())? $data->getPassportExpiry() : date('Y-m-d'));
			$this->employeeData = $data;
		}
		$this->employeeData = $data;
		$this->setTemplate('generalInformation' );
	}
	
  public function executeAjax()
  {
  	$this->empList = HrEmployeePeer::GetEmployeeNameListAll();
    //$this->forward('default', 'module');
    
  }
  
  public function executeAjaxUpdatePhoto()
  {
    $this->imageName = $this->_G('employee_no') .'.jpg';
  }
  
  public function executeChart()
  {
  	
  }
  
  public function executeReport()
  {
  	
  }
  
  public function executeReportA4()
  {
  		$pdf = new PdfLibrary();
		$pdf->addPage();
		$pdf->PrintHeaderUnknown();
		$pdf->printLn( 13, 55, $pdf->FooterNoLog() );
		$pdf->addPage();
		$pdf->printLn( 13, 55, $pdf->FooterNoLog() );
		$pdf->PrintHeaderUnknown();
		$pdf->closePDF('testing.pdf');
		return sfView::NONE;
  }
  
  public function executeReport3Perforation()
  {
  		$pdf    = new PdfLibrary(array(210, 95));
		$pdf->addPage();
		$pdf->PrintHeaderUnknown();
		$pdf->printLn( 13, 18, $pdf->FooterNoLog() );
		$pdf->addPage();
		$pdf->PrintHeaderUnknown();
		$pdf->printLn( 13, 18, $pdf->FooterNoLog() );
		$pdf->addPage();
		$pdf->PrintHeaderUnknown();
		$pdf->printLn( 13, 18, $pdf->FooterNoLog() );
		$pdf->closePDF('testing.pdf');
		return sfView::NONE;
  }
  
  public function executeReportProtected()
  {
  		$pdf = new PdfLibrary();
		$pdf->addPage();
		$pdf->PrintHeaderUnknown();
		$pdf->printLn( 13, 55, $pdf->FooterNoLog() );
		$pdf->addPage();
		$pdf->printLn( 13, 55, $pdf->FooterNoLog() );
		$pdf->PrintHeaderUnknown();
		$pdf->closePDFProtect('testing.pdf');
		return sfView::NONE;
  }
}
