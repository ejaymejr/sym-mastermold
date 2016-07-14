<?php use_helper('Validation', 'Javascript') ?>
<?php
$sector = array('manufacturing'=>' -MANUFACTURING-', 'service'=>' -SERVICE-');
$pass = array( 'WP-PRC'=>' -WP PRC-', 'WP-M'=>' -WP MALAYSIAN-', 'SP'=> ' -SPASS-', 'EP'=>' -EPASS-', 'PEP'=>' -PEPASS-', 'L'=>' -LOCAL-');
?>
<table class="table bordered">
	<tr>
		<td class="bg-lime alignRight fg-white" colspan="3" >IC INFORMATION</td>
	</tr>
	<tr>
		<td  class="bg-clearBlue alignRight span3" nowrap><label>Sector<label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('sector');
		echo HTMLLib::CreateSelect('sector', $sf_params->get('sector'), $sector, 'span3');
		echo input_tag('id',  $sf_params->get('id'), 'type=hidden');
		echo "<span class='negative'>&nbsp;&nbsp;</span>"; ?></td>
	</tr>
	<tr>
		<td  class="bg-clearBlue alignRight" nowrap><label>Occupation</label></td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('occupation');
		echo HTMLLib::CreateInputText('occupation',  $sf_params->get('occupation'));
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
	</tr>
	<tr>
		<td  class="bg-clearBlue alignRight" nowrap>Pass Number</td>
		<td class="FORMcell-right" nowrap><?php
		//echo $sf_params->get('pass_type');
		echo HTMLForm::Error('pass_type');
		echo HTMLLib::CreateSelect('pass_type', $sf_params->get('pass_type') , $pass, 'span3');
		echo HTMLLib::CreateInputText('pass_no',  $sf_params->get('pass_no'), 'span3');
		?></td>
	</tr>

	<tr>
		<td  class="bg-clearBlue alignRight" nowrap>Date of
		Application</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('date_of_application');
		echo HTMLLib::CreateDateInput('date_of_application', $sf_params->get('date_of_application'), 'span2');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
	</tr>
	<tr>
		<td  class="bg-clearBlue alignRight" nowrap>Date of Issue</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('date_of_issue');
		echo HTMLLib::CreateDateInput('date_of_issue', $sf_params->get('date_of_issue'), 'span2');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
	</tr>
	<tr>
		<td  class="bg-clearBlue alignRight" nowrap>Date of Expiry</td>
		<td class="FORMcell-right" nowrap><?php
		echo HTMLForm::Error('date_of_expiry');
		echo HTMLLib::CreateDateInput('date_of_expiry', $sf_params->get('date_of_expiry'), 'span2');
		echo "<span class='negative'>&nbsp;&nbsp; </span>"; ?></td>
	</tr>


	<tr>
		<td class="" nowrap></td>
		<td class="FORMcell-right" nowrap><input type="submit" name="identity"
			value=" Save " class="success"></td>
	</tr>
</table>

<div id="divBorder">
<table width="100%" class="FORMtable" border="0" cellpadding="4"
	cellspacing="0">
	<tr>
		<td colspan="2" height="25" width="100" nowrap>
		<div class="tk-style53 alignCenter">
		<h2>IDENTIFICATION CARD HISTORY</h2>
		</div>
		</td>
	</tr>
	<tr>
		<td><?php
//		$gridVars = array(
//				    'searchTemplate' => '',
//				    'pagerTemplate' => 'iccard_pager_list',
//				    'baseURL' => $sf_request->getModuleAction(),
//				    'pager' => $icpager,
//				    'searchContainerID' => XIDX::next(),
//				    'headers' => sfConfig::get('app_iccard_grid_headers')
//		);
//		include_partial('global/datagrid/container', $gridVars);
		?></td>
	</tr>
</table>
</div>
