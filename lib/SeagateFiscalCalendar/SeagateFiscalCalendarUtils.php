<?php
// $Source$
// $Id$


class SeagateFiscalCalendarUtils
{
    
    function SeagateFiscalCalendarUtils()
    {
    }
    
    
    public static function GetYears()
    {
        return SeagateFiscalCalendarSettingPeer::GetYears();
    }
    
    public static function IsValidYear($yyyy)
    {
        $calYears = self::GetYears();
        
        foreach ($calYears as $year => $start) {
            if ($year == $yyyy) return true;   
        }
        
        return false;
    }
    
    public static function GetStartMonth($yyyy)
    {
        /** deprecated method **/
        /*
        $calYears = sfConfig::get('app_seagate_calendar_years');
        
        $date = false;
        
        foreach ($calYears as $year => $start) {
            if ($year == $yyyy) $date = $start[0];   
        }
        
        return $date;
        */
        return SeagateFiscalCalendarSettingPeer::GetStartMonth($yyyy);
    }
    public static function GetStartDate($yyyy)
    {
        /** deprecated method **/
        /*
        $calYears = sfConfig::get('app_seagate_calendar_years');
        
        $date = false;
        
        foreach ($calYears as $year => $start) {
            if ($year == $yyyy) $date = $start[1];   
        }
        
        return $date;
        return $date;
        */
        return SeagateFiscalCalendarSettingPeer::GetStartDate($yyyy);
    }
    public static function GetQuarterMarks($yyyy)
    {
        return SeagateFiscalCalendarSettingPeer::GetQuarterMarks($yyyy);
        
    }
    public static function GetMonthMarks($yyyy)
    {
        return SeagateFiscalCalendarSettingPeer::GetMonthMarks($yyyy);
        
    }
    public static function GetNbWeek($yyyy)
    {
        return SeagateFiscalCalendarSettingPeer::GetNbWeek($yyyy);
        
    }
    
    
    
    public static function FindSeagateFiscalYear($date)
    {
        $calYears = self::GetYears();
        
        $year = false;
        
        foreach ($calYears as $yyyy => $start) {
            if ($date >= $start[1]) $year = $yyyy;   
        }
        
        return $year;
    }
    
    public static function GetMonthName($m)
    {
        $gregMonth = $m + 6;
        if ($gregMonth > 12) $gregMonth = $gregMonth - 12;
        
        return date('M', mktime(1,1,1,$gregMonth,1,2000));
    }
    public static function GetMonthYearName($m, $y)
    {
        $y = $y - 1;
        $gregMonth = $m + 6;
        if ($gregMonth > 12) {
            $gregMonth = $gregMonth - 12;
            $y = $y + 1;
        }
        
        return date('M Y', mktime(1,1,1,$gregMonth,1,$y));
    }
    
    public static function IsValidWeek($week)
    {
        if (strlen($week) != 7) {
            return false;
        }
        $year = substr($week, 0, 4);
        $week = substr($week, 5);
        
        $ok = true;
        if ($week < 1 || $week > 52) {
            $ok = false;
        }
        
        $calYears = self::GetYears();              
        if (!array_key_exists($year, $calYears)) {
            $ok = false;
        }        
        return $ok;
    }
    
    public static function AddWeek($week, $n)
    {
        $year = substr($week, 0, 4);
        $week = substr($week, 5);
        
        
        for ($i = 1; $i <= $n; $i++) {            
            $week++;
            if ($week > 52) {
                $week = 1;
                $year++;
            }
        }        
        return $year . '-' . str_pad($week, 2, '0', STR_PAD_LEFT);
    }
    public static function SubWeek($week, $n)
    {
        $year = substr($week, 0, 4);
        $week = substr($week, 5);
        
        
        for ($i = 1; $i <= $n; $i++) {            
            $week--;
            if ($week < 1) {
                $week = 52;
                $year--;
            }
        }        
        return $year . '-' . str_pad($week, 2, '0', STR_PAD_LEFT);
    }
    

    public static function IsValidMonth($month)
    {
        if (strlen($month) != 7) {
            return false;
        }
        $year = substr($month, 0, 4);
        $month = substr($month, 5);
        
        $ok = true;
        if ($month < 1 || $month > 12) {
            $ok = false;
        }
        
        $calYears = self::GetYears();              
        if (!array_key_exists($year, $calYears)) {
            $ok = false;
        }        
        return $ok;
    }
    
    public static function AddMonth($month, $n)
    {
        $year = substr($month, 0, 4);
        $month = substr($month, 5);
        
        
        for ($i = 1; $i <= $n; $i++) {            
            $month++;
            if ($month > 12) {
                $month = 1;
                $year++;
            }
        }        
        return $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
    }
    public static function SubMonth($month, $n)
    {
        $year = substr($month, 0, 4);
        $month = substr($month, 5);
        
        
        for ($i = 1; $i <= $n; $i++) {            
            $month--;
            if ($month < 1) {
                $month = 12;
                $year--;
            }
        }        
        return $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
    }
}
