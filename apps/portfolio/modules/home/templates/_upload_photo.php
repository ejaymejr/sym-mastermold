<?php use_helper('Validation', 'Javascript') ?>
<?php echo AjaxLib::AjaxScript('upload_photo', 'employee/ajaxPhotoUpload', 'employee_photo,record_id', null, 'DIVUploadPhoto' ); ?>
<table class="table bordered bg-white" >
	<tr height="250">
		<td>
		<?php 
 		
		$myphoto = HrEmployeePeer::GetPhoto($id);
		echo link_to(image_tag('employee/' . $myphoto,'size="230x300"'),'#', 'id="uploadPhoto" ') ;
		echo input_tag('record_id', $id, 'type=hidden');
		?></center>
		</td>
	</tr>
	<tr>
		<td><?php 
		echo HTMLLib::CreateFileSelect('employee_photo', 'span4');
		//echo input_file_tag('employee_photo', array('size'=>50));
		//echo submit_tag('upload', array('onclick'=>remote_function($ajaxUploadHeader) . ';return false;', 'style'=>'cursor:pointer', 'class'=> "submit-button", 'id' => 'upload_photo'));
		
		?>
		</td><!--
	</tr>	
		<td>
			<?php echo HTMLLib::CreateSubmitButton('upload_photo', 'upload'); ?>
		</td>
	<tr>
--></table>