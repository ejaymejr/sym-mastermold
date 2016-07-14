    <div class="grid" id="examSheet">
        <div class="row">
            <div class="span6">
<!--             This is where the questionaire portion -->
            <table class="table bordered condensed ">
				<tr>
					<td class=" text-right span1" colspan="2">
						<H4>ITIL FOUNDATION V3 EXAM SIMULATOR</H4>
					</td>
				</tr>
				<tr>
					<td class="bg-clearBlue text-right "><label></label></td>
					<td class=""><small><strong>
					<?php 
						echo 'Question '. HTMLLib::wysiwygFormat($question);
					?></strong></small></td>
				</tr>
				<?php 
					$selection = array(0 => 'A', 1 => 'B', 2 => 'C' ,3 => 'D');
					$pos = 0;
					$correctAnswer = '';
					$answer = '';
					foreach($answers as $a): 
						if ($a == $answer):
							$correctAnswer = $selection [$pos];
						endif;
				?>
				<tr id="selectionID_<?php echo $selection[$pos]?>" class="" >
					<td class="bg-clearBlue text-right "><label><?php echo $selection [$pos]?></label></td>
					<td class=""><label><small>
						<?php 
						echo $a;
						?>
						</small></label>
					</td>
				</tr>
				<?php 
					$pos++;
					endforeach; 
				?>
				
				<tr>
					<td class="bg-clearBlue text-right "><label>Answer</label></td>
					<td  class="fg-blue" >		
						<button id="btnShowID" class="command-button success span3" >
						    <i class="icon-screen on-left"></i>
						    Show Answer
						    <small><small></small></small>
						</button>
						<script>
							$( "#btnShowID" ).click(function() {
							  $("#selectionID_<?php echo $correctAnswer ?>").addClass(" bg-clearRed ");
							  return;
							});
						</script>
					</td>
				</tr>
				<tr>
					<td class="bg-clearBlue text-right "><label></label></td>
					<td>
						<a href="takeExam?id=<?php echo $id + 1?>" id="start" class="command-button primary span3">
						    <i class="icon-spin on-left"></i>
						    Next Question
						    <small><small></small></small>
						</a>
						<?php 
							//$url =  'loadQuiz.php';
							//echo AjaxLib::AjaxScript('start', $url, '', 'id='.$id, 'examSheet');
						?>
						</td>
				</tr>
				
			</table>
            
            </div>
            
            <div class="span6">
            <?php 
            	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) :
					 ?>
            	<table class="table bordered condensed ">
				<tr class="bg-clearOrange" >
					<td class=" text-right span1 " colspan="2">
						<H4>STUDY NOTES</H4>
					</td>
				</tr>
				<tr>
					<td class="">
						<?php 
								echo HTMLLib::wysiwygFormat($reference);
							
							?>
					</td>
				<tr>
				</tr>
				</table>
				<?php else:	?>
							
            	<table class="table bordered condensed ">
				<tr class="bg-clearOrange">
					<td class=" text-right span1" colspan="2">
						<H4>STUDY NOTES</H4>
					</td>
				</tr>
				<tr>
					<td class="">
						<?php 
								echo HTMLLib::CreateTextArea('reference', HTMLLib::wysiwygTextArea($reference), 'span6', '', 'rows="15"' );
							
							?>
					</td>
					
				<tr>
				<tr>
					<td class="">
						<a href="http://wiki.en.it-processmaps.com/index.php/ITIL_Glossary#ITIL%20Glossary%20A-Z"
							target="_BLANK">Glossary of Terms</a>
						<div id="referenceStatus"></div>
					</td>
				<tr>
					<td>
						<button id="saveReference" class="command-button primary span3">
						    <i class="icon-database on-right"></i>
						    Save This Reference
						    <small><small></small></small>
						</button>
						<?php 
							$url =  'saveQuizReference.php';
							echo AjaxLib::AjaxScript('saveReference', $url, 'reference', 'id='.$id , 'referenceStatus');
						?>
					</td>
				</tr>
				</table>
				<?php endif; ?>
            </div>
        </div>
    </div>
    
            <div class="page-region">
            <div class="page-region-content">
                <div class="span12">
                    <h2>LECTURE SLIDES</h2>
                    <?php
						$location = getcwd() . '/../docs';
						$fnameList = array();
						$ignorefileList = array('.', '..');
						 if ($handle = opendir($location)) {
						   //var_dump($handle);
						   while (false !== ($file = readdir($handle))) {
						          if (!  in_array($file, $ignorefileList) ) {						            
										//$thelist .= '<li><a href="'.$file.'">'.$file.'</a></li>';
										$fnameList[] =  $file; 

						          }
						       }
						  closedir($handle);
						  }
						  
						  asort($fnameList);
						  echo '<table class="bordered condensed table striped" >';
						  foreach($fnameList as $file):
							  echo '<tr><td>
                                	<a href="docs/'. $file.'" target="_BLANK"><i class="icon-pdf "></i> '.$file.'</a>
                            		</td></tr>
						  			';
						  endforeach;
						  echo '</table>';
					?>
	</div>
	</div>
	</div>
	</div>