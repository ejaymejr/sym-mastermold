<?php
// $Source$
// $Id$
  
?>
    <div class="dataGridNavigation alignRight">    
    
    <div class="dataGridPagination">    
    <?php 
    if ($this->isAjax) {
        echo pager_navigation_remote($this->pager, $this->datagridAjaxOptions);    
    } else {
        echo pager_navigation($this->pager, $this->baseURL, array('query_string' => $_SERVER['QUERY_STRING']));    
    }
    ?>
    </div>    

    <b><?php echo $this->pager->getNbResults()  ?></b> <?php echo $this->pager->getNbResults() > 1 ? 'records' : 'record' ?>
    | <b><?php echo $this->pager->getLastPage() ?></b> <?php echo $this->pager->getLastPage() > 1 ? 'pages' : 'page' ?>
    &nbsp; &nbsp;    
    
    </div>
    