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
    //$this->setLayout('layout_index');
    
  }
  
  public function executeTakeExam()
  {
  	$question = '';
  	$selection_a = '';
  	$selection_b = '';
  	$selection_c = '';
  	$selection_d = '';
  	$answer = '';
  	
  	$isRandom = 0; //false
  	$id = $this->_G('id')? $this->_G('id') : 1;
  	if (! $isRandom ):
  		$sql = "select * from itil_foundation_question where id = '".$id."' LIMIT 0,1 ";
  	else:
  		$sql = "select * from itil_foundation_question ordery by rand() LIMIT 0,1";
  	endif;
  	$res = HrLib::ExecuteITILSQL('', $sql);
  	$ids = array();
  	$answers = array();
  	$shuffleAnswers = array();
  	$reference = '';
  	while ($res->next()): 
  		$id = $res->getString('id');
  		$question = $res->getString('question');
  		$answers[] = $res->getString('selection_a');
  		$answers[] = $res->getString('selection_b');
  		$answers[] = $res->getString('selection_c');
  		$answers[] = $res->getString('selection_d');
  		$answer = $res->getString('selection_' . strtolower($res->getString('answer' ) ) );
  		$reference = $res->getString('reference');  	
  		//shuffle($answers);
  	endwhile;
  	//var_dump($answers);
  	//exit();
  	$this->question = $question;
  	$this->answers = $answers;
  	$this->id = $id;
  	$this->reference = $reference;
	}
	
}
