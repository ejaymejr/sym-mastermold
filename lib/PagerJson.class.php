<?php
/*
 *
* This is the working code on how it appears in HTML Format
*
*
*
<table class="table striped hovered dataTable" id="dataTables-1">
<thead>
<tr>
<th class="text-left">Action</th>
<th class="text-left">Seq</th>
<th class="text-left">Send To</th>
<th class="text-left">Date Sent</th>
<th class="text-left">Sent By</th>
<th class="text-left">Token</th>
</tr>
</thead>

<tbody>
</tbody>

<tfoot>
<tr>
<th class="text-left">Action</th>
<th class="text-left">Seq</th>
<th class="text-left">Send To</th>
<th class="text-left">Date Sent</th>
<th class="text-left">Sent By</th>
<th class="text-left">Token</th>
</tr>
</tfoot>
</table>
<?php
$fileID = HrLib::randomID(20).'.json';
$filename = PagerJson::UploadEdit_EmailPager($fileID, $pager);
?>
<script>
$(function(){
		$('#dataTables-1').dataTable( {
				"bProcessing": true,
				"sAjaxSource": "<?php echo $filename ?>",
				"aoColumns": [
{ "mData": "action" } ,
{ "mData": "seq" } ,
{ "mData": "send_to" },
{ "mData": "date_sent" },
{ "mData": "sent_by" },
{ "mData": "token" }
				]
				} );
		});
</script>

*/
class PagerJson
{
	//const TEST_SERVER_DIRECTORY = '/opt/httpd/htdocs_i/symfony/snapps-micronclean/web/json/';
	//const PROD_SERVER_DIRECTORY = '/opt/sites/ext/app.microncleansingapore.com/symfony/snapps-micronclean/web/json/';
	const TEST_SERVER_DIRECTORY = '/opt/httpd/htdocs_i/symfony/snapps-micronclean/web/json/';
	
	public static function _H()
	{
		//$highlightRow = sfContext::getInstance()->getP
		$highlightRow = sfContext::getInstance()->getRequest()->getParameter('HID');
		echo '<script>
			$(document).ready(function() {
				$("#tr_'.$highlightRow.'").addClass("info ");
			});
			</script>
		';
	}
	
	public function var_dump($vars)
	{
		echo "<pre>";
	    print_r($vars); // or var_dump($data);
	    echo "</pre>";
	}

	public static function Highlight($elementID)
	{
		//$highlightRow = sfContext::getInstance()->getP
		$highlightRow = sfContext::getInstance()->getRequest()->getParameter('HID');
		echo '<script>
			$(document).ready(function() {
				$("#tr_'.$highlightRow.'").addClass("info ");
			});
			</script>
		';
	}
	
	
	public static function CamelCase($str) {
	    $i = array("-","_");
	    $str = preg_replace('/([a-z])([A-Z])/', "\\1 \\2", $str);
	    $str = preg_replace('@[^a-zA-Z0-9\-_ ]+@', '', $str);
	    $str = str_replace($i, ' ', $str);
	    $str = str_replace(' ', '', ucwords(strtolower($str)));
	    $str = strtolower(substr($str,0,1)).substr($str,1);
	    $str = ucfirst($str); //upper case first character
	    return $str;
	}
	
	public static function TableHeaderFooter($cols = null, $jsonData=null, $showRow = null, $totalRecord=null)
	{
		$dataTableID = HrLib::randomID(10);
		if (!$cols || !$jsonData):
			return 'no columns specified / filename.json required!';
		endif;
		$mess = '';

		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
					<br><p class="fg-green"><small>*Note: To Remove the Boxes Goto Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"</small></p>
					<script type="text/javascript">
//						 $(window).load(function(){
//							$("#clickToExcel").click(function() { 
//								var dtltbl = $("#table_2").html();     
//								window.open("data:application/vnd.ms-excel," + $("# mytbl").html());
//							});
//						}); 
						
						function ExportToExcel(mytblId)
					    {
					        var htmltable= document.getElementById(mytblId);
					        var html = htmltable.outerHTML;
							// MS OFFICE 2003  : data:application/vnd.ms-excel
							// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
					        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
					    }
					    
					    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
					</script>
				 ';
		
		$mess .= '
				<table class="table striped hovered dataTable" id="'.$dataTableID.'">
                <thead>
                <tr>';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th class="text-left"><small>'.$header.'<small></th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                <tr>';
      
				foreach($cols as $col):
					 $searchNameID = 'search_'.$col;
					 $searchValue = $col ;
                	 $mess .= '<th class="text-left">
                	 			<div class="input-control text">	
                	 				<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'"/>
                	 			</div>
                	 		</th>';
                endforeach;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
        
        $totalRecord = $totalRecord ?  $showRow .', 25, 50, ' . $totalRecord : 100;
		$jsonData = substr($jsonData, 1, strlen($jsonData) - 2);
		$shownumberOfRows = $totalRecord;
		
        $mess .= '<script>
	        $(function(){
	         	var asInitVals = new Array();
	        	var oTable = $("#'.$dataTableID.'").dataTable( {
	        		"bProcessing": true,
	        		"sPaginationType": "full_numbers",
	        		"aLengthMenu": ['.$shownumberOfRows.'],
	        		'.$jsonData.',
	        		"oLanguage": {
         				"sSearch": "General Search:"},
	        		"aoColumns": [
	        		';
        			foreach($cols as $col):
		        	    $mess .= '{ "mData": "'.$col.'" } ,';
	     			endforeach;
	     $mess .= '   		
	     		]
	        	} );
	     		
	     		$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
					oTable.fnFilter( this.value, $("tfoot input").index(this) );
				} );

				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
	        });
	        </script>';
		return $mess;
	}
	
	public static function AkoDataTable($cols, $pagerArray, $title=null, $tfoot=null)
	{
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$mess = '';
		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
			<br><p class="fg-green"><small>*Note: To Remove the Boxes Goto Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"</small></p>
			<script type="text/javascript">
				function ExportToExcel(mytblId)
			    {
			        var htmltable= document.getElementById(mytblId);
			        var html = htmltable.outerHTML;
					// MS OFFICE 2003  : data:application/vnd.ms-excel
					// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
			        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
			    }
			    
			    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
			</script>
		 ';
		
		$shownumberOfRows = "10, 20, 100," .sizeof($pagerArray);
		$mess .= '
		<script >
			$(document).ready(function() {
				var asInitVals = new Array();
				var oTable = $("#'.$dataTableID.'").dataTable({
					"bProcessing": true,
					"aLengthMenu": ['.$shownumberOfRows.'],
					"oLanguage": {
         				"sSearch": "General Search:"},
	        		"sPaginationType": "full_numbers"
					});
					     		$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
				
				oTable.fnFilter( this.value, $("tfoot input").index(this) );
				/*oTable.fnFilter( this.value, $("tfoot select").index(this) );*/
				} );

				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
			} );
		</script>';
		$mess .= '
				<table class="table bordered hovered" id="'.$dataTableID.'">
                <thead>
               	';
        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h3 class="fg-white">'.$title.'</h3></td></tr>';
        $mess .= '
                <tr class="" >';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th class="text-left  ">'.$header.'</th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
        //populate data here
        if ($tfoot):
	        foreach($tfoot as $k=>$footer):
	        	${"opt_" . $k} = array(''=>'');
	        	${"search_" . $k} = '';
	        endforeach;
        endif;
        
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $trID = 'tr_' . strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= (strtolower($head) <> 'action') ? '<td>'. $actualValue[$head] .'</td>' : '<td class="alignCenter">'. $actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';
		foreach($cols as $col):
			 $searchNameID = 'search_'.$col;
			 $searchValue = $col ;
			 if (false): // (isset($tfoot[$col])):
			 	 $mess .= '<th class="text-left">
	                 		<div class="input-control select">	
	                 			'.select_tag("search_". $col , options_for_select(${"opt_" . $col}, 'test' ) ).'
	                 		</div>
	                 	    </th>';
			 else:
	             $mess .= '<th class="text-left">
	                 		<div class="input-control text">	
	                 			<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'"/>
	                 		</div>
	                 	   </th>';
             endif;
        endforeach;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}
	
	public static function AkoDataTableForTicking($cols, $pagerArray, $title=null, $tfoot=null)
	{
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$tfoot = $tfoot? $tfoot : $cols;
		$mess = '';
		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
			<br><p class="text-info"><small>
			<small>*Note Office 2003 To Remove the Boxes: Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"<br></small>
			<small>*Note Office 2007 To Remove the Boxes: Office Button > Excel Option > Popular : Tick "Show Developer Tab..."</small>
			</small></p>
			<script type="text/javascript">
				function ExportToExcel(mytblId)
			    {
			        var htmltable= document.getElementById(mytblId);
			        var html = htmltable.outerHTML;
					// MS OFFICE 2003  : data:application/vnd.ms-excel
					// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
			        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
			    }
			    
			    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
			</script>
		 ';

		$shownumberOfRows = "10, 20, 100," .sizeof($pagerArray);
		$mess .= '
		<script >
			$(document).ready(function() {
				var asInitVals = new Array();
				var '.$dataTableID.' = $("#'.$dataTableID.'").dataTable({
					"bProcessing": true,
					"aLengthMenu": ['.$shownumberOfRows.'],
					"bFilter": true,
					"oLanguage": {
         				"sSearch": "General Search:"},
	        		"sPaginationType": "full_numbers"
					});
				';
		$searchPos = 0;
		foreach($cols as $searchPos => $col):
			$searchNameID = 'search_'.$col.'_'.$dataTableID;
			if ($tfoot):
				//$searchPos = in_array($col, $tfoot);
				
				if (in_array($col, $tfoot)):
				$mess .=	'$("#'.$searchNameID.'").change( function () {
								'.$dataTableID.'.fnFilter( this.value, '. $searchPos .' );
							} );
							';
				endif;
			else:
				$mess .=	'$("#'.$searchNameID.'").keyup( function () {
								'.$dataTableID.'.fnFilter( this.value, '. $searchPos .' );
							} );
						';
			endif;
		endforeach;
		$mess .='
//				$("tfoot input").keyup( function () {
//					'.$dataTableID.'.fnFilter( this.value, $("tfoot select").index(this) );
//				} );
//				
//				$("tfoot select").change( function () {
//					'.$dataTableID.'.fnFilter( this.value );
//				} );
//	
//				$("tfoot input").each( function (i) {
//					asInitVals[i] = this.value;
//				} );
//					
//				$("tfoot input").focus( function () {
//					if ( this.className == "search_init" )
//					{
//						this.className = "";
//						this.value = "";
//					}
//				} );
//				
//				$("tfoot input").blur( function (i) {
//					if ( this.value == "" )
//					{
//						this.className = "search_init";
//						this.value = asInitVals[$("tfoot input").index(this)];
//					}
//				} );
//				
								
			});
		</script>';
		$mess .= '
				<table class="table bordered hovered" id="'.$dataTableID.'">
                <thead>
               	';
        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h3 class="fg-white">'.$title.'</h3></td></tr>';
        $mess .= '
                <tr class="" >';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th class="text-left  ">'.$header.'</th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
		$footerArray = array(''=>'');
		if ($tfoot):
		foreach($tfoot as $tfootname):
			foreach($pagerArray as $nothing => $actualValue):
				$actualValue = strip_tags ($actualValue[$tfootname]);
				$footerArray[$tfootname][''] = '';
				$footerArray[$tfootname][$actualValue] = $actualValue;
			endforeach;
		endforeach;
		endif;
        //self::var_dump($footerArray);
        //exit();
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $trID = 'tr_' . strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= (strtolower($head) <> 'action') ? '<td>'. $actualValue[$head] .'</td>' : '<td class="alignCenter">'. $actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';
		foreach($cols as $col):
			 $searchNameID = 'search_'.$col.'_'.$dataTableID;
			 $searchValue = $col ;
			 //var_dump(in_array($col, $tfoot) );
			 if ($tfoot): 
			 	 if(in_array($col, $tfoot)):
			 	 $mess .= '<th class="text-left">
	                 		<div class="input-control select">	
	                 			'.select_tag("search_". $col , options_for_select($footerArray[$col], '' ), 'id='. $searchNameID ).'
	                 		</div>
	                 	    </th>';
			 	 endif;
			 else:
	             $mess .= '<th class="text-left">
	                 		<div class="input-control text">	
	                 			<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'" id="'.$searchNameID.'"/>
	                 		</div>
	                 	   </th>';
             endif;
        endforeach;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}	

	public static function AkoPager($cols, $pagerArray, $title=null, $tfoot=null, $norows=null)
	{
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$tfoot = $tfoot? $tfoot : $cols;
		$mess = '';
		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
			<br><p class="text-info"><small>
			<small>*Note Office 2003 To Remove the Boxes: Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"<br></small>
			<small>*Note Office 2007 To Remove the Boxes: Office Button > Excel Option > Popular : Tick "Show Developer Tab..."</small>
			</small></p>
			<script type="text/javascript">
				function ExportToExcel(mytblId)
			    {
			        var htmltable= document.getElementById(mytblId);
			        var html = htmltable.outerHTML;
					// MS OFFICE 2003  : data:application/vnd.ms-excel
					// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
			        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
			    }
			    
			    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
			</script>
		 ';
		$shownumberOfRows = "10, 20, 100, " .sizeof($pagerArray);
		if ($norows):
			$shownumberOfRows = $norows.", ".sizeof($pagerArray);
		endif;
		
		$mess .= '
		<script >
			$(document).ready(function() {
				var asInitVals = new Array();
				var '.$dataTableID.' = $("#'.$dataTableID.'").dataTable({
					"bProcessing": true,
					"aLengthMenu": ['.$shownumberOfRows.'],
					"bFilter": true,
					"oLanguage": {
         				"sSearch": "General Search:"},
	        		"sPaginationType": "full_numbers"
					});
				';
		$searchPos = 0;
		foreach($cols as $searchPos => $col):
			$searchNameID = 'search_'.$col.'_'.$dataTableID;
			if ($tfoot):
				//$searchPos = in_array($col, $tfoot);
				
				if (in_array($col, $tfoot)):
				$mess .=	'$("#'.$searchNameID.'").change( function () {
								'.$dataTableID.'.fnFilter( this.value, '. $searchPos .' );
							} );
							';
				endif;
			else:
				$mess .=	'$("#'.$searchNameID.'").keyup( function () {
								'.$dataTableID.'.fnFilter( this.value, '. $searchPos .' );
							} );
						';
			endif;
		endforeach;
		$mess .='
//				$("tfoot input").keyup( function () {
//					'.$dataTableID.'.fnFilter( this.value, $("tfoot select").index(this) );
//				} );
//				
//				$("tfoot select").change( function () {
//					'.$dataTableID.'.fnFilter( this.value );
//				} );
//	
//				$("tfoot input").each( function (i) {
//					asInitVals[i] = this.value;
//				} );
//					
//				$("tfoot input").focus( function () {
//					if ( this.className == "search_init" )
//					{
//						this.className = "";
//						this.value = "";
//					}
//				} );
//				
//				$("tfoot input").blur( function (i) {
//					if ( this.value == "" )
//					{
//						this.className = "search_init";
//						this.value = asInitVals[$("tfoot input").index(this)];
//					}
//				} );
//				
								
			});
		</script>';
		$mess .= '
				<table class="table bordered hovered condensed striped" id="'.$dataTableID.'">
                <thead>
               	';
        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h4 class="fg-white">'.$title.'</h4></td></tr>';
        $mess .= '
                <tr class="" >';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th id="td_'.$col.'" class="text-center td_'.$col.'" ><small>'.$header.'</small></th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
		$footerArray = array(''=>'');
		if ($tfoot):
			foreach($tfoot as $tfootname):
				foreach($pagerArray as $nothing => $actualValue):
					$actualValue = strip_tags ($actualValue[$tfootname]);
					$footerArray[$tfootname][''] = '';
					$footerArray[$tfootname][$actualValue] = $actualValue;
				endforeach;
			endforeach;
		endif;
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $recID = $actualValue['record_id']? strip_tags($actualValue['record_id']) : $seq++; 
        $trID = 'tr_'.$recID; //. strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= (strtolower($head) <> 'action') ? '<td id="td_'.$head.'" class="td_'.$head.'" nowrap>'. $actualValue[$head] .'</td>' : '<td class="alignCenter">'. $actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';
        if (sizeof($pagerArray) > 0): // show footer if there are database records;
		foreach($cols as $col):
			 $searchNameID = 'search_'.$col.'_'.$dataTableID;
			 $searchValue = $col ;
			 //var_dump(in_array($col, $tfoot) );
			 if ($tfoot): 
			 	 if(in_array($col, $tfoot)):
			 	 $mess .= '<th class="text-left">
	                 		<div class="input-control select">	
	                 			'.select_tag("search_". $col , options_for_select($footerArray[$col], '' ), 'id='. $searchNameID ).'
	                 		</div>
	                 	    </th>';
			 	 endif;
			 else:
	             $mess .= '<th class="text-left">
	                 		<div class="input-control text">	
	                 			<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'" id="'.$searchNameID.'"/>
	                 		</div>
	                 	   </th>';
             endif;
        endforeach;
        endif;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}	
	
	
	
	public static function AkoTableForDropDownSelect($cols, $pagerArray, $title=null, $tfoot=null)
	{
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$tfoot = $tfoot? $tfoot : $cols;
		$mess = '';
		$shownumberOfRows = "10";
		$mess .= "
		<script type=\"text/javascript\">
			$(document).ready(function() {
				var asInitVals = new Array();
				var ".$dataTableID." = $(\"#".$dataTableID."\").dataTable({
					\"bProcessing\": true,
					\"aLengthMenu\": [".$shownumberOfRows."],
					\"bFilter\": true,
					\"oLanguage\": {
         				\"sSearch\": \"Search:\"},
	        		\"sPaginationType\": \"full_numbers\"
				});			
			});
		</script>";
		$mess .= '
				<table class="table bordered hovered bg-white" id="'.$dataTableID.'">
                <thead>
               	';
        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h3 class="fg-white">'.$title.'</h3></td></tr>';
        $mess .= '
                <tr class="" >';
				foreach($cols as $col):
					 $header = self::CamelCase($col);
                	 $mess .= '<th class="text-left  bg-white">'.$header.'</th>';
                endforeach;
        $mess .= '
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
		$footerArray = array(''=>'');
		if ($tfoot):
		foreach($tfoot as $tfootname):
			foreach($pagerArray as $nothing => $actualValue):
				$actualValue = strip_tags ($actualValue[$tfootname]);
				$footerArray[$tfootname][''] = '';
				$footerArray[$tfootname][$actualValue] = $actualValue;
			endforeach;
		endforeach;
		endif;
        //self::var_dump($footerArray);
        //exit();
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $trID = 'tr_' . strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= (strtolower($head) <> 'action') ? '<td>'. $actualValue[$head] .'</td>' : '<td class="alignCenter">'. $actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';

        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}	
	
	public static function DataTableForNamelist($cols, $pagerArray, $cdate, $title=null, $tfoot=null)
	{
		$seagateCalendarUtil = new SeagateFiscalCalendarUtils();
		$seagateCalendar = new SeagateFiscalCalendar( $seagateCalendarUtil->FindSeagateFiscalYear($cdate) );	
		$weekno = ($seagateCalendar->findWeek($cdate));
		$dataTableID = HrLib::randomID(10);
		self::_H();
		$mess = '';
		$mess .= '  <a id="clickToExcel" href=javascript:ExportToExcel("'.$dataTableID.'") class="button success " ><i class="icon-file-excel"></i> Export To Excel</a>
			<br><p class="fg-green"><small>*Note: To Remove the Boxes Goto Excel and Tools > Customize > Toolbars : Tick "Exit Design Mode"</small></p>
			<script type="text/javascript">
				function ExportToExcel(mytblId)
			    {
			        var htmltable= document.getElementById(mytblId);
			        var html = htmltable.outerHTML;
					// MS OFFICE 2003  : data:application/vnd.ms-excel
					// MS OFFICE 2007  : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
			        window.open("data:application/vnd.ms-excel," + encodeURIComponent(html));
			    }
			    
			    //http://codeglogic.blogspot.sg/2012/11/export-html-table-to-excel-javascript.html
			</script>
		 ';
		$shownumberOfRows = sizeof($pagerArray);
		$mess .= '
		<script >
			$(document).ready(function() {
				var asInitVals = new Array();
				var oTable = $("#'.$dataTableID.'").dataTable({
					"bProcessing": true,
					"aLengthMenu": ['.$shownumberOfRows.'],
					"oLanguage": {
         				"sSearch": "General Search:"},
	        		"sPaginationType": "full_numbers"
					});
					     		$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
				
				oTable.fnFilter( this.value, $("tfoot input").index(this) );
				/*oTable.fnFilter( this.value, $("tfoot select").index(this) );*/
				} );

				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
			} );
		</script>';
		$mess .= '
				<table class="table bordered hovered" id="'.$dataTableID.'">
                <thead>
               	';
//        if ($title) $mess .= '<tr  ><td class="bg-teal" colspan="'.sizeof($cols).'" ><h3 class="fg-white">'.$title.'</h3></td></tr>';
//        $mess .= '
//                <tr class="" >';
//				foreach($cols as $col):
//					 $header = self::CamelCase($col);
//                	 $mess .= '<th class="text-left  ">'.$header.'</th>';
//                endforeach;
        $mess .= '
                </tr>
                <tr class="bg-clearBlue">
                	<td rowspan="2">Seq</td>
                	<td rowspan="2">Gid</td>
                	<td rowspan="2">Name</td>
                	<td rowspan="2">Js</td>
                	<td rowspan="2">Boot</td>
                	<td rowspan="2">SBoot</td>
               		<td colspan="2" class="alignCenter">Week '. $weekno .'</td>
               		<td colspan="2" class="alignCenter">Week '. ($weekno + 1) .'</td>
               		<td colspan="2" class="alignCenter">Week '. ($weekno + 2) .'</td>
               		<td colspan="2" class="alignCenter">Week '. ($weekno + 3) .'</td>
                	<td rowspan="2">Cell</td>
                	<td rowspan="2">Dept</td>
                	<td rowspan="2">Shift</td>
                </tr>
                <tr class="bg-clearBlue">
                    <td>J</td>
                	<td>B</td>
                	<td>J</td>
                	<td>B</td>
                	<td>J</td>
                	<td>B</td>
                	<td>J</td>
                	<td>B</td> 
                </tr>
                </thead>
                <tbody class="striped" >
                ';
        
        //populate data here
        if ($tfoot):
	        foreach($tfoot as $k=>$footer):
	        	${"opt_" . $k} = array(''=>'');
	        	${"search_" . $k} = '';
	        endforeach;
        endif;
        
        $seq = 1;
        foreach($pagerArray as $nothing => $actualValue):
        $trID = 'tr_' . strip_tags ($actualValue['seq']);
        $mess .= '
			<tr class="" id="'.$trID.'" >';
	       	foreach($cols as $head ):
	       		$mess .= '<td>'.$actualValue[$head] .'</td>';
	       		if (isset($tfoot[$head])): 
					${"opt_" . $head}[$actualValue[$head]] = ($actualValue[$head]);
	       		endif;
	       	endforeach;
       	$mess .= '</tr>';
       	endforeach;
//       	var_dump($search_cell);
//       	exit();
//		$mess .= '
//			<tr class="gradeX">
//				<td>Trident</td>
//				<td>Internet
//					 Explorer 4.0</td>
//				<td>Win 95+</td>
//				<td class="center">4</td>
//				<td class="center">X</td>
//			</tr>
//		var_dump($tfoot);
//		exit();
		sfLoader::loadHelpers(array('Url', 'Text', 'Tag'));
		$mess .= '
			</tbody>
            <tfoot>
            <tr>';
        $dom = '';
		foreach($cols as $col):
			 $searchNameID = 'search_'.$col;
			 $searchValue = $col ;
			 if (false): // (isset($tfoot[$col])):
			 	 $mess .= '<th class="text-left">
	                 		<div class="input-control select">	
	                 			'.select_tag("search_". $col , options_for_select(${"opt_" . $col}, 'test' ) ).'
	                 		</div>
	                 	    </th>';
			 else:
	             $mess .= '<th class="text-left">
	                 		<div class="input-control text">	
	                 			<input type="text" name="'.$searchNameID.'" class="search_init" placeholder="'.$searchValue.'"/>
	                 		</div>
	                 	   </th>';
             endif;
        endforeach;
        $mess .= '
                </tr>
                </tfoot>
            </table>
				';
		return $mess;	
	}

	
	
	public static function UploadEdit_EmailPager($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		// this is the main detail
		foreach ($pager as $record):
			$seq ++ ;
			$token = link_to($record->getEmailToken(),'photo/view?token='. $record->getEmailToken(),'target="_BLANK"');
			$fileDetail = FileDetailPeer::retrieveByPK($record->getFileDetailId());
			$data[] = array(
					  'seq'=>$seq
					, 'action'=>$editDel
					, 'send_to'=> $record->getEmailAddress()
					, 'date_sent'=> $record->getEmailDate()
					, 'sent_by'=> $record->getCreatedBy()
					, 'file#'=> $fileDetail->getFileName()
					, 'token'=> $token 
					);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
// 		$filename = self::TEST_SERVER_DIRECTORY . $fileID;
// 		$handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
// 		fwrite($handle, json_encode($jsonfile));
// 		fclose($handle);
// 		return sfConfig::get('http_intranet').'micronclean/json/'.$fileID;
	}
	
	
	public static function Upload_RejectPager($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$edit = link_to('Edit', 'photo/uploadEdit?id='. $record->getId());
		$editDel = $edit .' | '. 
			link_to('Delete', 'photo/uploadEdit?id='. $record->getId(),
                    array('confirm' => 'Sure to delete this record?')); 
			
		$data[] = array(
				  'seq'=>$seq
				, 'action'=>$editDel
				, 'date'=> $record->getTransDate()
				, 'company'=> $record->getName()
				, 'department'=> $record->getDepartment()
				, 'shift'=> $record->getShift()
				, 'garment'=> $record->getGarment()
				, 'color'=> $record->getColor()
				, 'size'=> $record->getSize()
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
// 		$filename = self::TEST_SERVER_DIRECTORY . $fileID;
// 		$handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
// 		fwrite($handle, json_encode($jsonfile));
// 		fclose($handle);
// 		return sfConfig::get('http_intranet').'micronclean/json/'.$fileID;
	}
	
	public static function EmailManager_Pager($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		//$editDel = "Edit | Delete";
		// this is the main detail
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl = 'photo/emailManagerEdit?id='. $record->getId();
		$edit = link_to('Edit', $editUrl);
		$hintPos = ' data-hint-position="top"'; //data-hint-position="top | bottom | left | right"
		$hinttxt = ' data-hint="Shift/Department|'.EmailContactPeer::GetHint($record->getEmailAddress()).'"';
		//$email = "<a href='".$editUrl."'" .$hintPos.$hinttxt." >".$record->getEmailAddress()."</a>";
		$email = link_to($record->getEmailAddress(), $editUrl, array("data-hint-position"=>"top", "data-hint"=>"Shift/Department|".EmailContactPeer::GetHint($record->getEmailAddress()) ) );
				
		$editDel = $edit;
		$data[] = array(
				  'seq'=>$seq
				, 'action'=>$editDel
				, 'email'=> $email
				, 'company'=> '' //$record->getCompany()
				, 'department'=> '' //$record->getDepartment()
				, 'shift'=> '' //$record->getShift()
				, 'website'=> $record->getWebsite()
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
// 		$filename = self::TEST_SERVER_DIRECTORY . $fileID;
// 		$handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
// 		fwrite($handle, json_encode($jsonfile));
// 		fclose($handle);
// 		return sfConfig::get('http_intranet').'micronclean/json/'.$fileID;
	}
	
	public static function SearchReject_Pager($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		//$editDel = "Edit | Delete";
		// this is the main detail
		foreach ($pager as $record):
		$seq ++ ;
		$edit = link_to('show', 'photo/uploadEdit?id='. $record->getId());
		$editDel = $edit;
		$data[] = array(
				  'seq'=>$seq
				, 'action'=>$editDel
				, 'date'=> $record->getTransDate()
				, 'company'=> $record->getName()
				, 'department'=> $record->getDepartment()
				, 'shift'=> $record->getShift()
				, 'garment'=> $record->getGarment()
				, 'color'=> $record->getColor()
				, 'size'=> $record->getSize()
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
// 		$filename = self::TEST_SERVER_DIRECTORY . $fileID;
// 		$handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
// 		fwrite($handle, json_encode($jsonfile));
// 		fclose($handle);
// 		return sfConfig::get('http_intranet').'micronclean/json/'.$fileID;
	}
	
	public static function EmailReject($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		$chkboxID = '';
		$chkbox = '';
		$mail = '';
		$photoCnt = 0;
		foreach ($pager as $record):
			//echo $record->getName() . ' - ' . $record->getId();
			$fileDetail = FileDetailPeer::GetDataByBatchIdForEmail($record->getBatchId());
			$seq ++ ;
			$triggerID = 'trigger_'.$record->getId();
			$chkboxID = 'chkbox_' . $record->getId();
			$chkbox = '
				<div class="input-control checkbox">
				<label>
					<input type="checkbox" id="'.$chkboxID.'" name="'.$chkboxID.'" />
					<span class="check"></span>
				</label>
				</div>
				';
			
			$emailTxt = EmailToDeptPeer::GetEmailAddress($record->getName(), $record->getDepartment(), $record->getShift());
			
			$mail = '<i class="icon-mail"
			    style="background: #004050;
			    color: white;
			    padding: 5px;
			    border-radius: 50%"></i>
				' . self::ShowMessageBox($triggerID, $fileDetail, $emailTxt);
			
			
			
			$company = '<a href="#"
						    data-hint="Reciepient|'.$emailTxt.'"
						    data-hint-position="top">
						        '.$record->getName().'
						</a>';
			
			$edit   = link_to('Edit', 'photo/uploadEdit?id='. $record->getId());
			
			$delete = link_to('Delete', 'photo/uploadDelete?id='. $record->getId(),
							array('confirm' => 'Sure to delete this record? <' . $record->getName() . '>'));
			$sentCount = 0;
			foreach($fileDetail as $fDetail):
				if (EmailHistoryPeer::IsEmailed($fDetail->getId())) $sentCount++;
			endforeach;
			$actionLink =$edit .' | '. $delete.' | ' . link_to($mail,'#',array('id'=>$triggerID));
			$editDel = $actionLink;
			$sentMessage = ($sentCount > 0? '<sup class="bg-orange fg-white" > sent </sup>' : '' );
			$data[] = array(
					  'seq'=>'<small>'.trim($seq).'<small>'
					, 'send' => $chkbox . $sentMessage
					, 'action'=>'<small>'.$editDel.'<small>'
					, 'date'=> '<small>'.$record->getDateCreated().'<small>'
					, 'company'=> '<small>'.$company.'<small>'
					, 'department'=> '<small>'.$record->getDepartment().'<small>'
					, 'shift'=> '<small>'.$record->getShift().'<small>'
					, 'garment'=> '<small>'.$record->getGarment().'<small>'
					, 'sent'=> '<small>'.$sentCount .'/'.sizeof($fileDetail) .'<small>'
			);

		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
// 		$filename = self::TEST_SERVER_DIRECTORY . $fileID;
// 		$handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
// 		fwrite($handle, json_encode($jsonfile));
// 		fclose($handle);
// 		return sfConfig::get('http_intranet').'micronclean/json/'.$fileID;
		
// 		$edit = '<button id="createWindow" class="button">Create Window</button>';
// 		$edit .= '
// 						<script type="text/javascript">
// 					 	$(function(){
// 						$("#createWindow").on("click", function(){
// 								$.Dialog({
// 								shadow: true,
// 								overlay: false,
// 								icon: "<span class="icon-rocket"></span>",
// 								title: "Title",
// 								width: 500,
// 								padding: 10,
// 								content: "Window content here"
// 								});
// 							});
// 					   	});
// 						</script>
// 					';
	}
	
	public static function EmailRejectPager($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		$chkboxID = '';
		$chkbox = '';
		$mail = '';
		$photoCnt = 0;
		foreach ($pager as $record):
			//echo $record->getName() . ' - ' . $record->getId();
			$fileDetail = FileDetailPeer::GetDataByBatchIdForEmail($record->getBatchId());
			$seq ++ ;
			$triggerID = 'trigger_'.$record->getId();
			$chkboxID = 'chkbox_' . $record->getId();
			$chkbox = '
				<div class="input-control checkbox">
				<label>
					<input type="checkbox" id="'.$chkboxID.'" name="'.$chkboxID.'" />
					<span class="check"></span>
				</label>
				</div>
				';
			
			$emailTxt = EmailToDeptPeer::GetEmailAddress($record->getName(), $record->getDepartment(), $record->getShift());
			
			/* $mail = '<i class="icon-mail"
			    style="background: #004050;
			    color: white;
			    padding: 5px;
			    border-radius: 50%"></i> */
			
			$mail = 'email' . self::ShowMessageBox($triggerID, $fileDetail, $emailTxt);
			
			
			
			$company = '<a href="#"
						    data-hint="Reciepient|'.$emailTxt.'"
						    data-hint-position="top">
						        '.$record->getName().'
						</a>';
			
			$edit   = link_to('Edit', 'photo/uploadEdit?id='. $record->getId());
			
			$delete = link_to('Delete', 'photo/uploadDelete?id='. $record->getId(),
							array('confirm' => 'Sure to delete this record? <' . $record->getName() . '>'));
			$sentCount = 0;
			foreach($fileDetail as $fDetail):
				if (EmailHistoryPeer::IsEmailed($fDetail->getId())) $sentCount++;
			endforeach;
			$actionLink =$edit .' | '. $delete.' | ' . link_to($mail,'#',array('id'=>$triggerID));
			$editDel = $actionLink;
			$sentMessage = ($sentCount > 0? '<sup class="bg-orange fg-white" > sent </sup>' : '' );
			$data[] = array(
					  'seq'=>'<small>'.trim($seq).'<small>'
					, 'send' => $chkbox . $sentMessage
					, 'action'=>'<small>'.$editDel.'<small>'
					, 'date'=> '<small>'.$record->getDateCreated().'<small>'
					, 'company'=> '<small>'.$company.'<small>'
					, 'department'=> '<small>'.$record->getDepartment().'<small>'
					, 'shift'=> '<small>'.$record->getShift().'<small>'
					, 'garment'=> '<small>'.$record->getGarment().'<small>'
					, 'sent'=> '<small>'.$sentCount .'/'.sizeof($fileDetail) .'<small>'
					, 'record_id'=> '<small>'.$record->getId() .'<small>'
			);

		endforeach;
		return $data;
	}
	
	public static function ShowMessageBox($triggerID, $fileDetail, $emailList)
	{
		
		$emails = array();
		foreach($fileDetail as $r):
			$emails[] = $r->getFileName();
		endforeach;
		$message = '';
		$message =  '
		<script>
		$("#'.$triggerID.'").on("click", function(){
			$.Dialog({
				shadow: true,
				overlay: true,
				flat: false,
				draggable: true,
				icon: "<span class=icon-mail></span>",
				title: "Title",
				width: 500,
				padding: 10,
				content: "",
				padding: 10,
				onShow: function(_dialog){
					var content = 
						"<form method=\'post\' action=\'sendEmail\' enctype=\'multipart/form-data\'> " +
						"<div class=\'form-actions\'>" +
						"<button class=\'button primary\'>Send Email</button> "+
						"<button class=\'button\' type=\'button\' onclick=\'$.Dialog.close()\'>Cancel</button> "+
						"</div><br>"+
						"<table class=\'table bordered striped \'><tr>"+
						"<td>ATTACHMENT(s):</td>" +
						"<td>RECIPIENT(s): </td>" +
						"</tr><tr><td>"+
						';
						foreach($emails as $email):
							$message .=  '
							"<div class=\'input-control checkbox\'>" +
							"<input type=\'checkbox\' name=\''.$email.'\' checked/>" + 
							"<span class=\'check\'></span><small>'.$email.'</small></div></br>"+ 
							';
						endforeach;
						$message .=  '
						"</td><td><small>'.$emailList.'</small></td></tr></table>" +
						';
						
						$message .=  '
						"</form>";
					$.Dialog.title("Email Sending Manager");
					$.Dialog.content(content);
					$.Metro.initInputs();
				}
			});
		});
		</script>
		';
		return $message;
	}
	
	
	public static function SearchNamelist($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = 'seagate/createNamelist?id='. $record->getId();
		$printUrl = 'seagate/printNamelist?id='. $record->getId();
		$edit  = link_to('Create', $editUrl);
		$print = link_to('Print', $printUrl);
		$editDel = $edit ;
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'description'=> '<small>'.$record->getDescription().'</small>'
				, 'cell'=> '<small>'.$record->getCell().'</small>'
				, 'department'=> '<small>'.$record->getDepartment().'</small>'
				, 'team'=> '<small>'.$record->getTeam().'</small>'
				, 'date'=> '<small>'.$record->getDatePrinted().'</small>'
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
	}
	

	
	public static function SearchSupplierDocument($pager)
	{
		//$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editLink = link_to('Edit', 'documentChange/supplierDocumentEdit?id=' . $record->getId());
  
		$deleteLink = link_to('Delete', 'documentChange/supplierDocumentDelete?id=' . $record->getId(),
		                    array('confirm' => 'Record [ '.$record->getDocumentNo() . ' ]  Sure to delete this record?')); 
		
		$editDel = $editLink .' | '.$deleteLink;
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'date_time'=> '<small>'.$record->getDateTime().'</small>'
				, 'company'=> '<small>'.$record->getCompany().'</small>'
				, 'document'=> '<small>'.$record->getDocumentNo().'</small>'
				, 'title'=> '<small>'.$record->getDocumentTitle().'</small>'
				, 'review'=> '<small>'.$record->getReviewBy().'</small>'
				, 'approve'=> '<small>'.$record->getApproved().'</small>'
				, 'scr_status'=> '<small>'.$record->getScrStatus().'</small>'
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
	}
	
	public static function SearchSupplierDocumentFile($pager)
	{
		//$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
  		$downloadLink = link_to($record->getFilename(), 'documentChange/Download?path=' . $record->getFilename() ); 
		$deleteLink   = link_to('Delete', 'documentChange/supplierDocumentFileDelete?id=' . $record->getId(),
		                    array('confirm' => 'Record [ '.$record->getFilename() . ' ]  Sure to delete this record?')); 
		
		$editDel = $deleteLink;
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'date_time'=> '<small>'.$record->getDateTime().'</small>'
				, 'filename'=> '<small>'.$downloadLink.'</small>'
				, 'mime_type'=> '<small>'.$record->getMimeType().'</small>'
				, 'size'=> '<small>'. round($record->getSize()/1000000, 2) . ' MB</small>'
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
	}
	
	public static function SearchSupplierDocumentApprove($pager)
	{
		//$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editLink = link_to('Approve', 'documentChange/supplierDocumentApprove?id=' . $record->getId());
		$editDel = $editLink ;
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<small>'.$editDel.'</small>'
				, 'date_time'=> '<small>'.$record->getDateTime().'</small>'
				, 'company'=> '<small>'.$record->getCompany().'</small>'
				, 'document'=> '<small>'.$record->getDocumentNo().'</small>'
				, 'title'=> '<small>'.$record->getDocumentTitle().'</small>'
				, 'review'=> '<small>'.$record->getReviewBy().'</small>'
				, 'approve'=> '<small>'.$record->getApproved().'</small>'
				, 'scr_status'=> '<small>'.$record->getScrStatus().'</small>'
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
	}
	
	public static function SearchNameTag($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;
		
		foreach ($pager as $record):
		$seq ++ ;
		$location = '';
		//$editLink = link_to('Delete', 'seagate/deleteName?id='. $record->getId());
		$editLink = HTMLLib::CreateCheckBox('chk_' . $record->getId(), '', 'checked');
		$editDel = $editLink ;
		$location = $record->getCellName().' | shift: '. $record->getTeamName() . ' | ' . $record->getDepartmentName() . ' | ' . $record->getHangerName();
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<label>'.$editDel.'</label>'
				, 'gid'=> '<small>'.$record->getUserGid().'</small>'
				, 'name'=> '<span class="fg-darkEmerald">'.$record->getUserFullname().'</span>'
				, 'js_size'=> '<span class="fg-darkEmerald">'.$record->getJumpsuitSize().'</span>'
				, 'boot_size'=> '<span class="fg-darkEmerald">'.$record->getBootiesSize().'</span>'
				, 'location'=> '<small>'.$location.'</small>'
				, 'cell'=> '<small>'.$record->getCellName().'</small>'
				, 'dept'=> '<small>'.$record->getDepartmentName().'</small>'
				, 'shift'=> '<small>'.$record->getTeamName().'</small>'
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
	}
	
	public static function SearchNameDetail($pager)
	{
		$editDel = "";
		$data = array();
		$seq = 0;		
		foreach ($pager as $record):
		$seq ++ ;
		$added =  ($record->getTagId()? '' :  '<sup class="bg-orange fg-white">added</sup>' );
		$location = '';
		$deleteLink   = link_to('Delete', 'seagate/deleteNamelist?id=' . $record->getId().'&headerID='. $record->getNamelistHeaderId(),
		              array('confirm' => 'Record [ '.$record->getUserFullname() . ' ]  Sure to delete this record?')); 
		$editDel = $deleteLink ;
		$location = $record->getCellName().' | shift: '. $record->getTeamName() . ' | ' . $record->getDepartmentName() . ' | ' . $record->getHangerName();
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>'<label>'.$editDel.'</label>'
				, 'gid'=> '<small>'.$record->getUserGid().'</small>'
				, 'name'=> '<span class="fg-darkEmerald">'.$record->getUserFullname().' '. $added. '</span>'
				, 'js_size'=> '<span class="fg-darkEmerald">'.$record->getJsSize().'</span>'
				, 'boot_size'=> '<span class="fg-darkEmerald">'.$record->getBootSize().'</span>'
				, 'location'=> '<small>'.$location.'</small>'
				, 'cell'=> '<small>'.$record->getCellName().'</small>'
				, 'dept'=> '<small>'.$record->getDepartmentName().'</small>'
				, 'shift'=> '<small>'.$record->getTeamName().'</small>'
		);
		endforeach;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
	}
	

	
	protected function CreateCheckBox($id, $label, $chkd=null, $span=null)
	{
		return '
			<div class="input-control checkbox '.$span.' ">
				<label>
				<input id="'.$id.'" name="'.$id.'" type="checkbox"  '.$chkd.' />
				<span class="check"></span>
				'.$label.'	
				<label>
			</div>
		';
	}
	
	public static function ProcesNamelistDetail($pager, $headerID, $cdate)
	{
		$editDel = "";
		$data = array();
		$seq = 0;		
		foreach ($pager as $record):
		$seq ++ ;
		$jsChk = '';
		$bootChk = '';
		$sbootChk = '';

		$jsAjax    = AjaxLib::AjaxScript('js_'. $record->getId(), 'seagate/saveProcessedNamelist' , 'js_'. $record->getId(), '', 'DIVJS_'. $record->getId() ); 
		$bootAjax  = AjaxLib::AjaxScript('boot_'. $record->getId(), 'seagate/saveProcessedNamelist' , 'boot_'. $record->getId(), '', 'DIVBOOT_'. $record->getId() );
		$sbootAjax = AjaxLib::AjaxScript('sboot_'. $record->getId(), 'seagate/saveProcessedNamelist' , 'sboot_'. $record->getId(), '', 'DIVSBOOT_'. $record->getId() ); 
		
		$loadUrl = $_SERVER['SCRIPT_NAME'] .'/' ;	
		if ($record->getJsSize()):
			$jsChk = '<div class="input-control checkbox  ">
						<label>
						<input id="js_' . $record->getId().'" name="js_' . $record->getId().'" type="checkbox"  '.($record->getJsChk() == 'on' ? 'checked=checked' : '').' />
						<span class="check"></span>
						'.$record->getJsSize().'	
						<label>
					</div>
					';
		endif;
		
		if ($record->getSafetyBootSize()):
			$sbootChk = '<div class="input-control checkbox  ">
					<label>
					<input id="sboot_' . $record->getId().'" name="sboot_' . $record->getId().'" type="checkbox"  '.($record->getSbootChk() == 'on' ? 'checked=checked' : '').' />
					<span class="check"></span>
					'.$record->getSafetyBootSize().'	
					<label>
				</div>';
		endif;
		
		if ($record->getBootSize()):
			$bootChk = '<div class="input-control checkbox  ">
					<label>
					<input id="boot_' . $record->getId().'" name="boot_' . $record->getId().'" type="checkbox" '.($record->getBootChk() == 'on' ? 'checked=checked' : '').'  />
					<span class="check"></span>
					'.$record->getBootSize().'	
					<label>
				</div>';
		endif;
		$delete = '';
		if (substr($record->getTagId(), 0, 4) == 'ADD_' ):
			$delete = '<sup>'. link_to(' Delete', 'seagate/deleteNameFromNamelist?id='. $headerID.'&cdate='. $cdate.'&detID='. $record->getId(),
	                    array('confirm' => 'Sure to delete this record?')) . '</sup>'; 
	    endif;
        $name = $record->getUserFullname() ;
        $nameDetail = $name . $delete;
        
		$location = '';
		$location = $record->getCellName().' | shift: '. $record->getTeamName() . ' | ' . $record->getDepartmentName() . ' | ' . $record->getHangerName();
		$data[] = array(
				  'seq'=>$seq
				, 'gid'=> $record->getUserGid()
				, 'js_size'=> $jsAjax . '<div id="DIVJS_'. $record->getId().'">'.$jsChk.'</div>'
				, 'boot_size'=> $bootAjax . '<div id="DIVBOOT_'. $record->getId().'">'.$bootChk.'</div>' 
				, 'sboot_size'=> $sbootAjax . '<div id="DIVSBOOT_'. $record->getId().'">'.$sbootChk.'</div>' 
				, 'name'=> $nameDetail
				, 'cell'=> $record->getCellName()
				, 'department'=> $record->getDepartmentName()
				, 'team'=> $record->getTeamName()
				, 'location'=> $location
		);
		endforeach;
		return $data;
		$jsonfile['aaData'] = $data;
		return json_encode($jsonfile);
	}
	
	public static function SearchTemplate($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = 'seagate/templateEdit?id='. $record->getId();
		$deleteUrl  = 'seagate/templateDelete?id='. $record->getId();
		$isActive = true;
		$chkboxID = 'chkbox_' . $record->getId();
		$chkbox = '
			<div class="input-control checkbox">
			<label>
				<input type="checkbox" id="'.$chkboxID.'" name="'.$chkboxID.'" />
				<span class="check"></span>
			</label>
			</div>
			';
		$div = 'DIV_'.$chkboxID;
		//echo AjaxLib::AjaxScript($chkboxID, url_for(''), $chkboxID, '', $div );
		$editDel = link_to('Edit', $editUrl) .' | '. link_to('Delete', $deleteUrl,
                    								array('confirm' => 'Sure to delete this record?'));
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>$editDel
				, 'day'=>'<small>'.$record->getDay().'</small>'
				, 'status'=>'<small><div id="'.$div.'">'.$record->getStatus().'</div></small>'
				, 'description'=> '<small>'.$record->getDescription().'</small>'
				, 'cell'=> '<small>'.$record->getCell().'</small>'
				, 'department'=> '<small>'.$record->getDepartment().'</small>'
				, 'team'=> '<small>'.$record->getTeam().'</small>'
				, 'lastUpdate'=> '<small>'.$record->getDateModified().'</small>'
		);
		endforeach;
		return $data;
//		$jsonfile['aaData'] = $data;
//		return json_encode($jsonfile);
	}
	
	public static function SearchToPrint($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
		$seq ++ ;
		$editUrl  = 'seagate/updateWeeks?id='. $record->getId();
		$isActive = true;
		$chkboxID = 'chkbox_' . $record->getId();
		$div = 'DIV_'.$chkboxID;
		$editDel = link_to('Print', $editUrl) ;
		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'action'=>$editDel
				, 'day'=>'<small>'.$record->getDay().'</small>'
				, 'status'=>'<small><div id="'.$div.'">'.$record->getStatus().'</div></small>'
				, 'description'=> '<small>'.$record->getDescription().'</small>'
				, 'cell'=> '<small>'.$record->getCell().'</small>'
				, 'department'=> '<small>'.$record->getDepartment().'</small>'
				, 'team'=> '<small>'.$record->getTeam().'</small>'
				, 'lastUpdate'=> '<small>'.$record->getDateModified().'</small>'
		);
		endforeach;
		return $data;
	}
	
	public static function NamelistHistory($pager)
	{
		$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
			$seq ++ ;
			$editUrl  = 'seagate/prepareNamelist?id='. $record->getNamelistHeaderId().'&cdate=' . $record->getTransDate();
			$edit  = link_to('Process', $editUrl);
			$editDel = $edit ;
			$r = NamelistHeaderPeer::retrieveByPK($record->getNamelistHeaderId());
			$data[] = array(
					  'seq'=>'<small>'.$seq.'</small>'
					, 'action'=>'<small>'.$editDel.'</small>'
					, 'count'=>'<small>'. NamelistDetailPeer::CountByHeaderIdByDate($record->getNamelistHeaderId(), $record->getTransDate()) .'</small>'
					, 'description'=> '<small>'.$r->getDescription().'</small>'
					, 'cell'=> '<small>'. hgasCellPeer::GetNameByIds($r->getCell()) .'</small>'
					, 'department'=> '<small>'. hgasDepartmentPeer::GetNameByIds($r->getDepartment()).'</small>'
					, 'team'=> '<small>'.hgasTeamPeer::GetNameByIds($r->getTeam()).'</small>'
					, 'date'=> '<small>'.$record->getTransDate().'</small>'
			);
		endforeach;
		return $data;
//		$jsonfile['aaData'] = $data;
//		return json_encode($jsonfile);
	}
	
	public static function PrintNameDetail($pager, $cdate, $detail)
	{
		$editDel = "";
		$data = array();
		$seq = 0;		
		$seagateCalendarUtil = new SeagateFiscalCalendarUtils();
		$fiscal = $seagateCalendarUtil->FindSeagateFiscalYear($cdate);
		$seagateCalendar = new SeagateFiscalCalendar( $fiscal );
		$week = $seagateCalendar->findWeek($cdate);
		$maxWeek = SeagateFiscalCalendarSettingPeer::GetNbWeek($fiscal);
		
		foreach ($pager as $record):
		$seq ++ ;
		$added =  ($record->getTagId()? '' :  '<sup class="bg-orange fg-white">added</sup>' );
		$location = '';
		$deleteLink   = link_to('Delete', 'seagate/deleteNamelist?id=' . $record->getId().'&headerID='. $record->getNamelistHeaderId(),
		              array('confirm' => 'Record [ '.$record->getUserFullname() . ' ]  Sure to delete this record?')); 
		$editDel = $deleteLink ;
		$location = $record->getCellName().' | shift: '. $record->getTeamName() . ' | ' . $record->getDepartmentName() . ' | ' . $record->getHangerName();
		$j1=$j2=$j3=$j4='';
		$b1=$b2=$b3=$b4='';
		
			if  ( $week <= $maxWeek ):
				$article = NamelistDetailPeer::IsArticleCheckedFromPager($detail, $record->getUserGid(), $week, $seagateCalendar, $seagateCalendarUtil,  $fiscal );
				$j1 = $article['js'];
				$b1 = $article['boot'];
			endif;
			
			if  ( $week + 1 <= $maxWeek ):
				$article = NamelistDetailPeer::IsArticleCheckedFromPager($detail, $record->getUserGid(), ($week + 1), $seagateCalendar, $seagateCalendarUtil,  $fiscal );
				$j2 = $article['js'];
				$b2 = $article['boot'];			
			endif;
			if  ( $week + 2 <= $maxWeek ):
				$article = NamelistDetailPeer::IsArticleCheckedFromPager($detail, $record->getUserGid(), ($week + 2), $seagateCalendar, $seagateCalendarUtil,  $fiscal );
				$j3 = $article['js'];
				$b3 = $article['boot'];			
			endif;
			if  ( $week + 3 <= $maxWeek ):
				$article = NamelistDetailPeer::IsArticleCheckedFromPager($detail, $record->getUserGid(), ($week + 3), $seagateCalendar, $seagateCalendarUtil,  $fiscal );
				$j4 = $article['js'];
				$b4 = $article['boot'];			
			endif;


		$data[] = array(
				  'seq'=>'<small>'.$seq.'</small>'
				, 'gid'=> '<small>'.$record->getUserGid().'</small>'
				, 'name'=> '<small>'.'<span class="fg-darkEmerald">'.$record->getUserFullname().' '. $added. '</span></small>'
				, 'js'=> '<small>'.'<span class="fg-darkEmerald">'.$record->getJsSize().'</span></small>'
				, 'boot'=> '<small>'.'<span class="fg-darkEmerald">'.$record->getBootSize().'</span></small>'
				, 's_boot'=> '<small>'.'<span class="fg-darkEmerald">'.$record->getSafetyBootSize().'</span></small>'							
				, 'cell'=> '<small>'.$record->getCellName().'</small>'
				, 'dept'=> '<small>'.$record->getDepartmentName().'</small>'
				, 'shift'=> '<small>'.$record->getTeamName().'</small>'
				,'J1' => $j1
				,'B1' => $b1
				,'J2' => $j2
				,'B2' => $b2
				,'J3' => $j3
				,'B3' => $b3
				,'J4' => $j4
				,'B4' => $b4
				);	

		endforeach;
		unset($seagateCalendar);
		unset($seagateCalendarUtil);
		return $data;
	}
	
	//kebot
	public static function ProcessNamelist($pager, $cdate)
	{
		//$fileID = HrLib::randomID(20).'.json';
		$editDel = "";
		$data = array();
		$seq = 0;
		foreach ($pager as $record):
			$seq ++ ;
			$editUrl  = 'seagate/prepareNamelist?id='. $record->getId().'&cdate=' . $cdate;
			$printUrl = 'seagate/updateWeeks?id='. $record->getId().'&cdate=' . $cdate;
			$edit  = link_to('Process', $editUrl);
			$print = link_to('Print', $printUrl);
			$editDel = $edit;
			$detailInfo = NamelistDetailPeer::GetDataByHeaderIDByDate($record->getId(), $cdate);
			$created = '';
			$edited = '';
			if ($detailInfo):
				$edited =  '<small>'.$record->getDateModified().'</small>';
				$created = '<small>'.$record->getDateCreated().'</small>';
			else:
				$edited = '<small class="error" >'.'No Entry'.'</small>';
			endif;
			$data[] = array(
					  'seq'=>'<small>'.$seq.'</small>'
					, 'action'=>'<small>'.$editDel.'</small>'
					, 'count'=>'<small>'. NamelistDetailPeer::CountByHeaderIdByDate($record->getId(), $cdate) .'</small>'
					, 'description'=> '<small>'.$record->getDescription().'</small>'
					, 'cell'=> '<small>'.hgasCellPeer::GetNameByIds($record->getCell()).'</small>'
					, 'department'=> '<small>'.hgasDepartmentPeer::GetNameByIds($record->getDepartment()).'</small>'
					, 'team'=> '<small>'.hgasTeamPeer::GetNameByIds($record->getTeam()).'</small>'
					, 'date'=> $created
					, 'edited'=> $edited
			);
		endforeach;
		return $data;
//		$jsonfile['aaData'] = $data;
//		return json_encode($jsonfile);
	}

}
