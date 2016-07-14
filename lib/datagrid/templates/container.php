<?php
// $Source$
// $Id$

use_helper('Javascript');
sfLoader::loadHelpers(array('PagerNavigation'));

$searchTemplate = isset($searchTemplate) ? $searchTemplate : 'list_header_search';
$pagerTemplate = isset($pagerTemplate) ? $pagerTemplate : 'list_pager';
$headerTemplate = isset($headerTemplate) ? $headerTemplate : 'global/datagrid/header';

$searchContainerID = $this->getHtmlId() . '_search_ ' . XIDX::next();

$this->datagridAjaxOptions = array(
        'url' => $this->getBaseURL(), 
        'update' => $this->getAjaxContainerId(),
        'with' => "'commit=true'",
        'script'    => true,
        'loading'   => 'stop_remote_pager();',
        'before'   => 'showLoader()',
        'complete'  => 'hideLoader()',
        //'before'    => 'new Effect.Appear(\'' . $this->getAjaxContainerId() . '_loading\', {duration:0.1})',
        //'complete'    => 'new Effect.Fade(\'' . $this->getAjaxContainerId() . '_loading\', {duration:0.1})',
        'type'      => 'asynchronous',
        'method'    => 'get');


$all = sfContext::getInstance()->getRequest()->getParameterHolder()->getAll();
unset($all['module']);
unset($all['action']);
unset($all['commit']);
$all['ajaxContainerId'] = $this->getAjaxContainerId();

$tmpQueryString = http_build_query($all); 
$newQueryStringAjax = HTMLForm::TransformQueryStringForAjax($tmpQueryString);
if ($newQueryStringAjax != '') {
    $this->datagridAjaxOptions['with'] = $newQueryStringAjax;
}
//echo $newQueryStringAjax ;



$eventArgumentList = '';
if ($this->rows && sizeof($this->rows)) {
    $rowCount = 0;
    foreach ($this->rows as $row) { 
        
        $rowID = $this->getHtmlId() . '_' . $rowCount;  
        $eventArgs = array();
        foreach ($this->columns as $column) {        
            $colContent = '';
            if (array_key_exists($column->getId(), $row)) {
                $colContent = $row[$column->getId()][0];
            }
            $eventArgs[] = "'" . $column->getId() . "':'" . escape_javascript($colContent) . "'";
            
        }
        $eventArg = "{" . implode(',', $eventArgs) . "}";
        $eventArgumentList .= "\n" . $this->jsObject . ".rows['" . $rowID . "'] = " . $eventArg . ";";
        $rowCount++;
    }
}

echo javascript_tag(
    $this->jsObject . " = new Snapps.DataGrid('" . $this->getHtmlId() . "'); " .
    $eventArgumentList
);    


?>



<div class="defaultGrid dataGridContainer " style="width:100%">
    
    <?php include $this->tplPathNavigation ?>
    <div class="dataGridContent LightHeader <?php echo $this->isAjax ? 'datagridAjaxContent' : '' ?>">    
    <?php
    if ($this->isAjax) {
        echo form_remote_tag($this->datagridAjaxOptions, 'id="' . $this->getAjaxContainerId() . '_searchForm"');
        echo input_hidden_tag('ajaxContainerId', $this->getAjaxContainerId());
    } else {
        echo form_tag($this->getBaseURL(), array('method' => 'get', 'name' => 'FORM_' . $this->getHtmlId()));
    }   
    ?>
    <?php //echo input_hidden_tag('sortBy', $sf_params->get('sortBy')) ?>
    <?php //echo input_hidden_tag('sortOrder', $sf_params->get('sortOrder')) ?>
    
    <table class="dataGridTable" style="width:100%;" cellpadding="4" cellspacing="2" border="0">
    <?php include $this->tplPathHeader ?>    
    <?php include $this->tplPathSearch ?>
    <tbody class="dataGridRows">
    <?php include $this->tplPathRows ?>
    </tbody>
    <?php if ($headerTemplate) //include_partial($headerTemplate, array('hs' => $headers, 'headerBaseURL' => url_for($baseURL), 'searchContainerID' => $searchContainerID)) ?>
    <?php if ($searchTemplate) //include_partial($searchTemplate, array('searchContainerID' => $searchContainerID)) ?>
    <?php if ($pagerTemplate) //include_partial($pagerTemplate, array('pager' => $pager)) ?>
    </table>
    </form>
    
    </div>    
    <?php include $this->tplPathNavigation ?>
</div>

<?php echo javascript_tag('formatFormStyle()') ?>