<?php
// $Source$
// $Id$


$columns = $this->getColumns();
$headerBaseURL = $this->getBaseURL() ? $this->getBaseURL() : false;


$searchEffect = '';
if (isset($searchContainerID)) {
    $searchEffect = 'onclick="$(\'' . $searchContainerID . '\').style.display == \'none\' ' .
                ' ? new Effect.Appear(\'' . $searchContainerID . '\', {duration:0.5}) ' . 
                ' : new Effect.Fade(\'' . $searchContainerID . '\', {duration:0.3});' . 
                ' return false;"';
}
?>
<tr class="dataGridTableHeader header_row">
    <td width="75" nowrap class="dataGridTableHeaderColumn alignLeft alignMiddle" 
        <?php echo $searchEffect ?> style="cursor:pointer"><?php echo HTMLForm::SearchToggle() ?></td>
    
    <?php if ($columns && is_array($columns) && sizeof($columns)) : ?>
    <?php foreach ($columns as $column) : ?>
    <?php if ($column->getDisplay()) : ?>
    <?php
    $hc = $column->getCfHeader();
    $title = $column->getTitle();
    $tdOnClick = '';
    $spanSortOrder = '';
    
    
    $tdClass = 'dataGridTableHeaderColumn';
    if ($column->getSortable()) {        
        $sortOrder = 'ASC';
        $tdClass = 'dataGridTableHeaderColumn sortable-header ' . $hc['class_name'];
        
        if ($this->getSortBy() == $column->getId()) {
            $sortOrder = $this->getSortOrder() == 'ASC' ? 'DESC' : 'ASC';
            $tdClass .= ' current-sort current-sort-' . $this->getSortOrder();
            $spanSortOrder = '<span class="current-sort sort-' . $this->getSortOrder() . '"></span>';
        }
        
        
        $all = sfContext::getInstance()->getRequest()->getParameterHolder()->getAll();
        unset($all['module']);
        unset($all['action']);
            
        $all['sortBy'] = $column->getId();
        $all['sortOrder'] = $sortOrder;
        $all['ajaxContainerId'] = $this->getAjaxContainerId();
        $newQueryString = http_build_query($all); 
        
        $headerURL =  url_for($headerBaseURL) . '?' . $newQueryString;
        
        if ($this->isAjax) {           
            $newQueryStringAjax = HTMLForm::TransformQueryStringForAjax($newQueryString);
            $ajaxOptions = $this->datagridAjaxOptions;
            if ($newQueryStringAjax != '') {
                $ajaxOptions['with'] = $newQueryStringAjax;
            } else {
                unset($ajaxOptions['with']);
            }
            $tdOnClick = 'onclick="' . remote_function($ajaxOptions) . '"';
            
        } else {
            $tdOnClick = 'onclick="showLoader(); window.location=\'' . $headerURL . '\';"';
        }
    }
    ?>    
    <td width="<?php echo $column->getWidth() ? $column->getWidth() : '' ?>" class="<?php echo $tdClass ?> alignLeft" <?php echo $hc['extra_html'] ? $hc['extra_html'] : '' ?> <?php echo $tdOnClick ?>><?php echo $spanSortOrder ?><?php echo $title ?></td>
    <?php endif; ?>
    <?php endforeach; ?>    
    
    <?php else: ?>
    <td width="100" nowrap class="dataGridTableHeaderColumn alignLeft">No column is defined.</td>
    
    <?php endif; ?>
    <td width="100" nowrap class="dataGridTableHeaderColumn alignLeft">&nbsp;</td>
</tr>   
