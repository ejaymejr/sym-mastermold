<?php use_helper('Validation', 'Javascript') ?>
<?php 
		$lc = new Criteria();
		$lc->add(HrEmployeeLeaveCreditsPeer::EMPLOYEE_NO, $empno);
		$lc->add(HrEmployeeLeaveCreditsPeer::FISCAL_YEAR, $year);
		$lc->addAscendingOrderByColumn(HrEmployeeLeaveCreditsPeer::LEAVE_TYPE);
		$lcpager = HrEmployeeLeaveCreditsPeer::doSelect($lc);
		
		$lh = new Criteria();
		$lh->add(HrEmployeeLeavePeer::EMPLOYEE_NO, $empno);
		$lh->add(HrEmployeeLeavePeer::FISCAL_YEAR, $year);
		$lh->addAscendingOrderByColumn(HrEmployeeLeavePeer::LEAVE_TYPE);
		$lhpager = HrEmployeeLeavePeer::doSelect($lh);
  	
?>  	
  	
<div class="grid">
 	<div class="row">
 		<div class="">
 			<div class="panel" data-role="panel">
				<div class="panel-header bg-green fg-white">
				LEAVE CREDITS
				</div>
				<div class="panel-content bg-clearBlue"><?php 
				if (isset($lcpager))
				{
				    $filename = portfolioLibrary::LeaveCreditsPager($lcpager);
					$cols = array('seq', 'leave_type', 'allocation', 'consumed', 'balance', 'fiscal_year');
					echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
				}
				?>
				</div>
			</div>	
 		</div>
 	</div>
 	
  	<div class="row">
 		<div class="">
 			<div class="panel" data-role="panel">
				<div class="panel-header  bg-green fg-white">
				LEAVE HISTORY
				</div>
				<div class="panel-content bg-clearBlue">
				<?php 
				if (isset($lhpager))
				{
				    $filename = portfolioLibrary::LeaveHistory($lhpager);
					$cols = array('seq', 'leave', 'from', 'to', 'no_of_days', 'half_day');
					echo PagerJson::AkoDataTableForTicking($cols, $filename); //create the table
				}
				?>
				</div>
			</div>	
 		</div>
 	</div>
 	
 	
</div>