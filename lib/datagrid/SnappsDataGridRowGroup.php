<?php
// $Source$
// $Id$


class SnappsDataGridRowGroup
{
    
    function __construct()
    {
        
    }
    
    protected $htmlId;
    public function getHtmlId() {
        return $this->htmlId;
    }
    public function setHtmlId($v) {
        $this->htmlId = $v;
    }
    protected $htmlClass;
    public function getHtmlClass() {
        return $this->htmlClass;
    }
    public function setHtmlClass($v) {
        $this->htmlClass = $v;
    }

    protected $SN;
    public function getSN() {
        return $this->SN;
    }
    public function setSN($v) {
        $this->SN = $v;
    }
    
    protected $rows;
    public function getRows() {
        return $this->rows;
    }
    public function setRows($v) {
        $this->rows = $v;
    }
}