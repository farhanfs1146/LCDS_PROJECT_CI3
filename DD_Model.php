<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DD_Model extends CI_Model
{


    public function get_Lfb_Forming()
    {
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d');
        $factoryCode = 'B34007';

        $query = $this->db->query("SELECT 
        SUM(v.TotalChecked) AS TotalChecked, 
        SUM(v.TotalPass) AS TotalPass, 
        SUM(v.Fail) AS Fail,
        t.DateName, 
        v.SystemName, 
        v.CardNO, 
        v.empname, 
        v.ProductionLine
    FROM dbo.View_TM_Article_Wise_Prd_Union v WITH (NOLOCK)
    INNER JOIN dbo.tbl_Inv_Tran_Date t WITH (NOLOCK) 
        ON v.DayID = t.DayNo 
    INNER JOIN dbo.tbl_Pro_Article p WITH (NOLOCK)
        ON v.ClientID = p.ClientID 
        AND v.ModelID = p.ModelID 
        AND v.ArtiD = p.ArtID
    WHERE 
        v.BallType = 'LFB Assembling' 
        AND v.factoryCode = ?
        AND t.DateName BETWEEN CONVERT(DATETIME, ?, 102) 
        AND CONVERT(DATETIME, ?, 102)
    GROUP BY 
        t.DateName, 
        v.SystemName, 
        v.CardNO, 
        v.empname, 
        v.ProductionLine
    ORDER BY t.DateName ASC
", [$factoryCode, "$startDate 00:00:00", "$endDate 00:00:00"]);


return $query->result_array();
//         $query = $this->db->query("SELECT SUM(dbo.View_TM_Article_Wise_Prd_Union.TotalChecked) AS TotalChecked, SUM(dbo.View_TM_Article_Wise_Prd_Union.TotalPass) AS TotalPass, SUM(dbo.View_TM_Article_Wise_Prd_Union.Fail) AS Fail, 
//                          SUM(dbo.View_TM_Article_Wise_Prd_Union.MaterialDefect) AS MaterialDefect, SUM(dbo.View_TM_Article_Wise_Prd_Union.SeamDefect) AS SeamDefect, SUM(dbo.View_TM_Article_Wise_Prd_Union.SeamOverlaping) 
//                          AS SeamOverlaping, SUM(dbo.View_TM_Article_Wise_Prd_Union.Wrinkles) AS Wrinkles, SUM(dbo.View_TM_Article_Wise_Prd_Union.ExcessGlue) AS ExcessGlue, SUM(dbo.View_TM_Article_Wise_Prd_Union.PressureMarks) 
//                          AS PressureMarks, SUM(dbo.View_TM_Article_Wise_Prd_Union.AirBubble) AS AirBubble, SUM(dbo.View_TM_Article_Wise_Prd_Union.HeavyPrintDefect) AS HeavyPrintDefect, 
//                          SUM(dbo.View_TM_Article_Wise_Prd_Union.TouchingPeelingOff) AS TouchingPeelingOff, SUM(dbo.View_TM_Article_Wise_Prd_Union.PrintMisalignment) AS PrintMisalignment, 
//                          SUM(dbo.View_TM_Article_Wise_Prd_Union.WrongeArtwork) AS WrongeArtwork, SUM(dbo.View_TM_Article_Wise_Prd_Union.MoldMark) AS MoldMark, SUM(dbo.View_TM_Article_Wise_Prd_Union.ColourShade) AS ColourShade, 
//                          SUM(dbo.View_TM_Article_Wise_Prd_Union.ValveNozzleMove) AS ValveNozzleMove, SUM(dbo.View_TM_Article_Wise_Prd_Union.DShape) AS DShape, SUM(ISNULL(dbo.View_TM_Article_Wise_Prd_Union.Oversize, 0)) 
//                          AS Oversize, SUM(ISNULL(dbo.View_TM_Article_Wise_Prd_Union.UnderSize, 0)) AS UnderSize, SUM(ISNULL(dbo.View_TM_Article_Wise_Prd_Union.OverWeight, 0)) AS OverWeight, 
//                          SUM(ISNULL(dbo.View_TM_Article_Wise_Prd_Union.UnderWeight, 0)) AS UnderWeight, SUM(dbo.View_TM_Article_Wise_Prd_Union.MissGlue) AS MissGlue, dbo.tbl_Inv_Tran_Date.DateName, 
//                          dbo.View_TM_Article_Wise_Prd_Union.SystemName, dbo.View_TM_Article_Wise_Prd_Union.CardNO, dbo.View_TM_Article_Wise_Prd_Union.empname, dbo.View_TM_Article_Wise_Prd_Union.ProductionLine
// FROM            dbo.View_TM_Article_Wise_Prd_Union INNER JOIN
//                          dbo.tbl_Inv_Tran_Date ON dbo.View_TM_Article_Wise_Prd_Union.DayID = dbo.tbl_Inv_Tran_Date.DayNo INNER JOIN
//                          dbo.tbl_Pro_Article ON dbo.View_TM_Article_Wise_Prd_Union.ClientID = dbo.tbl_Pro_Article.ClientID AND dbo.View_TM_Article_Wise_Prd_Union.ModelID = dbo.tbl_Pro_Article.ModelID AND 
//                          dbo.View_TM_Article_Wise_Prd_Union.ArtiD = dbo.tbl_Pro_Article.ArtID
// WHERE        (dbo.View_TM_Article_Wise_Prd_Union.BallType = 'LFB Assembling') AND (dbo.View_TM_Article_Wise_Prd_Union.factoryCode = 'B34007')
// GROUP BY dbo.tbl_Inv_Tran_Date.DateName, dbo.View_TM_Article_Wise_Prd_Union.SystemName, dbo.View_TM_Article_Wise_Prd_Union.CardNO, dbo.View_TM_Article_Wise_Prd_Union.empname, 

//                          dbo.View_TM_Article_Wise_Prd_Union.ProductionLine
// HAVING        (dbo.tbl_Inv_Tran_Date.DateName BETWEEN CONVERT(DATETIME, '$startDate 00:00:00', 102) AND CONVERT(DATETIME, '$endDate 00:00:00', 102))");


        // return $query->result_array();
    }


    public function get_Competition_Forming()
{
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d');

    $query = $this->db->query("
        SELECT factoryCode, DateName, TotalChecked, TotalPass, Fail, SystemName, CardNO, empname, ProductionLine
        FROM dbo.view_TM_Forming_Proces WITH (NOLOCK) 
        WHERE DateName BETWEEN ? AND ? 
        AND factoryCode = 'B34002'
    ", [$startDate, $endDate]);

    return $query->result_array();
}

public function get_Finale_Forming()
{
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d');

    $query = $this->db->query("
        SELECT factoryCode, DateName, TotalChecked, TotalPass, Fail, SystemName, CardNO, empname, ProductionLine
        FROM dbo.view_TM_Forming_Proces WITH (NOLOCK) 
        WHERE DateName BETWEEN ? AND ? 
        AND factoryCode = 'B34003'
    ", [$startDate, $endDate]);

    return $query->result_array();
}

public function get_Urban_Forming()
{
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d');

    $query = $this->db->query("
        SELECT factoryCode, DateName, TotalChecked, TotalPass, Fail, SystemName, CardNO, empname, ProductionLine
        FROM dbo.view_TM_Forming_Proces WITH (NOLOCK) 
        WHERE DateName BETWEEN ? AND ? 
        AND factoryCode = 'B34004'
    ", [$startDate, $endDate]);

    return $query->result_array();
}

public function get_monthly_Confirmed_Volumes()
{
    $month = date("m");
    $year = date("Y");

    $query = $this->db->query("
        SELECT ClientID, FactoryCode, SUM(TotPlanQty) AS PlanQty, MONTH(PlanDate) AS Month, YEAR(PlanDate) AS Year
        FROM dbo.tbl_Multi_PO_Plan WITH (NOLOCK)
        WHERE NOT FactoryCode IN ('B34005', 'B34006') 
        AND ClientID = 1
        AND MONTH(PlanDate) = ? 
        AND YEAR(PlanDate) = ?
        GROUP BY FactoryCode, MONTH(PlanDate), ClientID, YEAR(PlanDate)
    ", [$month, $year]);

    return $query->result_array();
}

public function get_monthly_Shipped_Volumes()
{
    $month = date("m");
    $year = date("Y");

    $query = $this->db->query("
        SELECT * FROM View_LCD_Shiped_Volume WITH (NOLOCK) 
        WHERE MONTH(PODD) = ? 
        AND YEAR(PODD) = ? ", [$month, $year]);

    return $query->result_array();
}

public function get_monthly_Shipped_VolumesBy_LFB()
{
    $month = date("m");
    $year = date("Y");

    $query = $this->db->query("
        SELECT FactoryCode, SUM(Shipped_Volume) AS Shipped_Volume 
        FROM View_LCD_Shiped_Volume WITH (NOLOCK)
        WHERE MONTH(PODD) = ? 
        AND YEAR(PODD) = ? 
        AND FactoryCode = 'B34007'
        GROUP BY FactoryCode", array($month, $year));

        return $query->result_array();
}


// public function get_monthly_Shipped_VolumesBy_LFB()
// {
//     $month = date("m");
//     $year = date("Y");
//     $query = $this->db->query("SELECT * FROM View_LCD_Shiped_Volume WHERE MONTH(PODD) = ? AND YEAR(PODD) = ? AND FactoryCode = 'B34007'", array($month, $year));
//     return $query->result_array();

// }


public function get_monthly_Shipped_VolumesBy_TMB()
{
    $month = date("m");
    $year = date("Y");

    $query = $this->db->query("
        SELECT FactoryCode, SUM(Shipped_Volume) AS Shipped_Volume 
        FROM View_LCD_Shiped_Volume WITH (NOLOCK)
        WHERE MONTH(PODD) = ? 
        AND YEAR(PODD) = ? 
        AND FactoryCode = 'B34004'
        GROUP BY FactoryCode", array($month, $year));

        return $query->result_array();
}

    // public function get_monthly_Shipped_VolumesBy_TMB()
    // {
    //     $month = date("m");
    //     $year = date("Y");
    //     $query = $this->db->query("SELECT * FROM View_LCD_Shiped_Volume WHERE MONTH(PODD) = ? AND YEAR(PODD) = ? AND FactoryCode = 'B34004'", array($month, $year));
    //     return $query->result_array();

    // }


    public function get_monthly_Shipped_VolumesBy_OMB()
    {
        $month = date("m");
        $year = date("Y");
    
        $query = $this->db->query("
            SELECT FactoryCode, SUM(Shipped_Volume) AS Shipped_Volume 
            FROM View_LCD_Shiped_Volume WITH (NOLOCK)
            WHERE MONTH(PODD) = ? 
            AND YEAR(PODD) = ? 
            AND FactoryCode = 'B34004'
            GROUP BY FactoryCode", array($month, $year));
    
            return $query->result_array();
    }
    
 // public function get_monthly_Shipped_VolumesBy_OMB()
    // {
    //     $month = date("m");
    //     $year = date("Y");
    //     $query = $this->db->query("SELECT * FROM View_LCD_Shiped_Volume WHERE MONTH(PODD) = ? AND YEAR(PODD) = ? AND FactoryCode = 'B34004'", array($month, $year));
    //     return $query->result_array();

    // }



    // getting lfb hourly data profduction
    public function Get_LFB_Hourly_Data($Year, $Month, $Day)
    {

        $query = $this->db->query("SELECT HourName, TotalChecked, TotalPass, Fail
		FROM            dbo.View_LFB_FQ
        WHERE        (DateName = CONVERT(DATETIME, '$Year-$Month-$Day 00:00:00', 102))");

        return $query->result_array();
    }

    public function get_Competition_Forming_Weekly()
    {
        // Get data for the last 7 days (including today)
        $endDate = date('Y-m-d');
        $startDate = date('Y-m-d', strtotime('-6 days'));

        $query = $this->db->query("
            SELECT factoryCode, DateName, TotalChecked, TotalPass, Fail, SystemName, CardNO, empname, ProductionLine
            FROM dbo.view_TM_Forming_Proces
            WHERE (DateName BETWEEN CONVERT(DATETIME, '$startDate 00:00:00', 102) AND CONVERT(DATETIME, '$endDate 23:59:59', 102))
              AND (factoryCode = 'B34002')
        ");

        return $query->result_array();
    }


    public function get_Urban_Forming_Weekly()
    {
        // Get data for the last 7 days (including today)
        $endDate = date('Y-m-d');
        $startDate = date('Y-m-d', strtotime('-6 days'));

        $query = $this->db->query("SELECT factoryCode, DateName, TotalChecked, TotalPass, Fail, SystemName, CardNO, empname, ProductionLine
            FROM dbo.view_TM_Forming_Proces
            WHERE (DateName BETWEEN CONVERT(DATETIME, '$startDate 00:00:00', 102) AND CONVERT(DATETIME, '$endDate 23:59:59', 102))
              AND (factoryCode = 'B34004') ");

        return $query->result_array();
    }

    // public function get_forming_monthly_data($factoryCode, $startDate, $endDate)
    // {
    //     // $query = $this->db->query("SELECT 
    //     //     factoryCode, DateName, TotalChecked, TotalPass, MaterialDefect, SeamDefect, Fail, SeamOverlaping, 
    //     //     Wrinkles, ExcessGlue, PressureMarks, AirBubble, TouchingPeelingOff, PrintMisalignment, WrongeArtwork, 
    //     //     MoldMark, ColourShade, ValveNozzleMove, DShape, 
    //     //     ISNULL(Oversize, 0) AS Oversize, ISNULL(UnderSize, 0) AS UnderSize, ISNULL(OverWeight, 0) AS OverWeight, 
    //     //     ISNULL(UnderWeight, 0) AS UnderWeight, ISNULL(MissGlue, 0) AS MissGlue, SystemName, CardNO, empname, ProductionLine
    //     // FROM dbo.view_TM_Forming_Proces
    //     // WHERE DateName BETWEEN CONVERT(DATETIME, '$startDate 00:00:00', 102) 
    //     //     AND CONVERT(DATETIME, '$endDate 00:00:00', 102)
    //     //     AND factoryCode = '$factoryCode'");


    //     // We don't need to get/fetch all the columns, that's why i am reducing columns which desired now.
    //     $query = $this->db->query("SELECT factoryCode, DateName, TotalChecked, TotalPass, Fail, SystemName, CardNO, empname, ProductionLine
    //     FROM dbo.view_TM_Forming_Proces
    //     WHERE DateName BETWEEN CONVERT(DATETIME, '$startDate 00:00:00', 102) 
    //     AND CONVERT(DATETIME, '$endDate 00:00:00', 102)
    //     AND factoryCode = '$factoryCode'");

    //     return $query->result_array();
    // }

    public function get_forming_monthly_data($factoryCode, $startDate, $endDate)
{
    $query = $this->db->query("
        SELECT factoryCode, DateName, TotalChecked, TotalPass, Fail, SystemName, CardNO, empname, ProductionLine 
        FROM dbo.view_TM_Forming_Proces WITH (NOLOCK)
        WHERE DateName BETWEEN ? AND ?
        AND factoryCode = ?
    ", array($startDate, $endDate, $factoryCode));

    return $query->result_array();
}


//     public function get_Lfb_Forming_monthly_data() // for the purpose to get Current monthl Actual Production and much more.
//     {
//         // Get the first day of the current month and year.
//         $startDate = date('Y-m-01');
//         // Get today's date (current day of the month)
//         $endDate = date('Y-m-d');

//         // Give direct or using variable factory code.
//         $factoryCode = 'B34007';
//         // We don't need to get/fetch all the columns, that's why i am reducing columns which desired now.
//         $query = $this->db->query("SELECT     SUM(dbo.View_TM_Article_Wise_Prd_Union.TotalChecked) AS TotalChecked, SUM(dbo.View_TM_Article_Wise_Prd_Union.TotalPass) AS TotalPass, SUM(dbo.View_TM_Article_Wise_Prd_Union.Fail) AS Fail, 
//                          dbo.tbl_Inv_Tran_Date.DateName
// FROM            dbo.View_TM_Article_Wise_Prd_Union INNER JOIN
//                          dbo.tbl_Inv_Tran_Date ON dbo.View_TM_Article_Wise_Prd_Union.DayID = dbo.tbl_Inv_Tran_Date.DayNo INNER JOIN
//                          dbo.tbl_Pro_Article ON dbo.View_TM_Article_Wise_Prd_Union.ClientID = dbo.tbl_Pro_Article.ClientID AND dbo.View_TM_Article_Wise_Prd_Union.ModelID = dbo.tbl_Pro_Article.ModelID AND 
//                          dbo.View_TM_Article_Wise_Prd_Union.ArtiD = dbo.tbl_Pro_Article.ArtID
// WHERE        (dbo.View_TM_Article_Wise_Prd_Union.BallType = 'LFB Assembling') AND (dbo.View_TM_Article_Wise_Prd_Union.factoryCode = '$factoryCode')
// GROUP BY dbo.tbl_Inv_Tran_Date.DateName
// HAVING        (dbo.tbl_Inv_Tran_Date.DateName BETWEEN CONVERT(DATETIME, '$startDate 00:00:00', 102) AND CONVERT(DATETIME, '$endDate 00:00:00', 102))");
//         return $query->result_array();
//     }

public function get_Lfb_Forming_monthly_data()
{
    // Get the first day and today's date of the current month
    $startDate = date('Y-m-01');
    $endDate = date('Y-m-d');
    $factoryCode = 'B34007';

    $query = $this->db->query("
        SELECT 
            SUM(v.TotalChecked) AS TotalChecked, 
            SUM(v.TotalPass) AS TotalPass, 
            SUM(v.Fail) AS Fail, 
            t.DateName
        FROM dbo.View_TM_Article_Wise_Prd_Union v WITH (NOLOCK)
        INNER JOIN dbo.tbl_Inv_Tran_Date t WITH (NOLOCK) ON v.DayID = t.DayNo
        WHERE v.BallType = 'LFB Assembling' 
        AND v.factoryCode = ? 
        AND t.DateName BETWEEN ? AND ?
        GROUP BY t.DateName
        ORDER BY t.DateName ASC
    ", array($factoryCode, $startDate, $endDate));

    return $query->result_array();
}


    public function get_Competition_Forming_monthly_data()
    {
        // Get the first day of the current month
        $startDate = date('Y-m-01');
        // Get today's date (current day of the month)
        $endDate = date('Y-m-d');
        return $this->get_forming_monthly_data('B34002', $startDate, $endDate);
    }

    public function get_Finale_Forming_monthly_data()
    {
        // Get the first day of the current month
        $startDate = date('Y-m-01');
        // Get today's date (current day of the month)
        $endDate = date('Y-m-d');
        return $this->get_forming_monthly_data('B34003', $startDate, $endDate);
    }

    public function get_Urban_Forming_monthly_data()
    {
        // Get the first day of the current month
        $startDate = date('Y-m-01');
        // Get today's date (current day of the month)
        $endDate = date('Y-m-d');
        return $this->get_forming_monthly_data('B34004', $startDate, $endDate);
    }


//     public function get_day_by_day_lfb_weekly_forming_data(){
//     $endDate = date('Y-m-d'); // Current Date
//     $startDate = date('Y-m-d', strtotime('-6 days')); // 7 days ago
//     $factoryCode = 'B34007';

//     $query = $this->db->query("SELECT 
//         SUM(dbo.View_TM_Article_Wise_Prd_Union.TotalChecked) AS TotalChecked, 
//         SUM(dbo.View_TM_Article_Wise_Prd_Union.TotalPass) AS TotalPass, 
//         FORMAT(dbo.tbl_Inv_Tran_Date.DateName, 'dd-MMM') AS DayWithMonth,
//         dbo.View_TM_Article_Wise_Prd_Union.ProductionLine
//     FROM dbo.View_TM_Article_Wise_Prd_Union 
//     INNER JOIN dbo.tbl_Inv_Tran_Date 
//         ON dbo.View_TM_Article_Wise_Prd_Union.DayID = dbo.tbl_Inv_Tran_Date.DayNo 
//     WHERE 
//         dbo.View_TM_Article_Wise_Prd_Union.BallType = 'LFB Assembling' 
//         AND dbo.View_TM_Article_Wise_Prd_Union.factoryCode = ?
//         AND dbo.tbl_Inv_Tran_Date.DateName 
//             BETWEEN CONVERT(DATETIME, ?, 102) 
//             AND CONVERT(DATETIME, ?, 102)
//     GROUP BY dbo.tbl_Inv_Tran_Date.DateName, dbo.View_TM_Article_Wise_Prd_Union.ProductionLine
//     ORDER BY dbo.tbl_Inv_Tran_Date.DateName ASC, dbo.View_TM_Article_Wise_Prd_Union.ProductionLine ASC
// ", [$factoryCode, "$startDate 00:00:00", "$endDate 23:59:59"]);

//     return $query->result_array(); // Returning the data as an array
    
//     }

public function get_day_by_day_lfb_weekly_forming_data()
{
    $endDate = date('Y-m-d'); // Current Date
    $startDate = date('Y-m-d', strtotime('-6 days')); // 7 days ago
    $factoryCode = 'B34007';

    $query = $this->db->query("
        SELECT 
            SUM(VTA.TotalChecked) AS TotalChecked, 
            SUM(VTA.TotalPass) AS TotalPass, 
            FORMAT(TID.DateName, 'dd-MMM') AS DayWithMonth,
            VTA.ProductionLine
        FROM dbo.View_TM_Article_Wise_Prd_Union VTA WITH (NOLOCK)
        INNER JOIN dbo.tbl_Inv_Tran_Date TID WITH (NOLOCK)
            ON VTA.DayID = TID.DayNo 
        WHERE 
            VTA.BallType = 'LFB Assembling' 
            AND VTA.factoryCode = ?
            AND TID.DateName BETWEEN ? AND ?
        GROUP BY TID.DateName, VTA.ProductionLine
        ORDER BY TID.DateName ASC, VTA.ProductionLine ASC
    ", [$factoryCode, $startDate, $endDate]);

    return $query->result_array(); // Return optimized result
}


//     public function get_day_by_day_Urban_Forming_Weekly()
// {
//     // Get last 7 days (including today)
//     $endDate = date('Y-m-d');
//     $startDate = date('Y-m-d', strtotime('-6 days'));
//     $factoryCode = 'B34004';

//     $query = $this->db->query("
//         SELECT 
//             FORMAT(DateName, 'dd-MMM') AS DayWithMonth, 
//             SUM(TotalChecked) AS TotalChecked, 
//             SUM(TotalPass) AS TotalPass, 
//             SUM(Fail) AS Fail
//         FROM dbo.view_TM_Forming_Proces
//         WHERE 
//             DateName BETWEEN CONVERT(DATETIME, '$startDate 00:00:00', 102) 
//             AND CONVERT(DATETIME, '$endDate 23:59:59', 102)
//             AND factoryCode = '$factoryCode'
//         GROUP BY DateName
//         ORDER BY DateName ASC
//     ");

//     return $query->result_array();
// }

public function get_day_by_day_Urban_Forming_Weekly()
{
    // Get last 7 days (including today)
    $endDate = date('Y-m-d');
    $startDate = date('Y-m-d', strtotime('-6 days'));
    $factoryCode = 'B34004';

    $query = $this->db->query("
        SELECT 
            FORMAT(T.DateName, 'dd-MMM') AS DayWithMonth, 
            SUM(V.TotalChecked) AS TotalChecked, 
            SUM(V.TotalPass) AS TotalPass, 
            SUM(V.Fail) AS Fail
        FROM dbo.view_TM_Forming_Proces V WITH (NOLOCK)
        INNER JOIN dbo.tbl_Inv_Tran_Date T WITH (NOLOCK)
            ON V.DateName = T.DateName
        WHERE 
            T.DateName BETWEEN ? AND ?
            AND V.factoryCode = ?
        GROUP BY T.DateName
        ORDER BY T.DateName ASC
    ", [$startDate, $endDate, $factoryCode]);

    return $query->result_array(); // Return optimized result
}


// public function get_day_by_day_Competition_Forming_Weekly()
// {
//     // Get last 7 days (including today)
//     $endDate = date('Y-m-d');
//     $startDate = date('Y-m-d', strtotime('-6 days'));
//     $factoryCode = 'B34002';

//     $query = $this->db->query("
//         SELECT 
//             FORMAT(DateName, 'dd-MMM') AS DayWithMonth, 
//             SUM(TotalChecked) AS TotalChecked, 
//             SUM(TotalPass) AS TotalPass, 
//             SUM(Fail) AS Fail
//         FROM dbo.view_TM_Forming_Proces
//         WHERE 
//             DateName BETWEEN CONVERT(DATETIME, ?, 102) 
//             AND CONVERT(DATETIME, ?, 102)
//             AND factoryCode = ?
//         GROUP BY DateName
//         ORDER BY DateName ASC
//     ", [$startDate . ' 00:00:00', $endDate . ' 23:59:59', $factoryCode]);

//     return $query->result_array();
// }

public function get_day_by_day_Competition_Forming_Weekly()
{
    // Get last 7 days (including today)
    $endDate = date('Y-m-d');
    $startDate = date('Y-m-d', strtotime('-6 days'));
    $factoryCode = 'B34002';

    $query = $this->db->query("
        SELECT 
            FORMAT(T.DateName, 'dd-MMM') AS DayWithMonth, 
            SUM(V.TotalChecked) AS TotalChecked, 
            SUM(V.TotalPass) AS TotalPass, 
            SUM(V.Fail) AS Fail
        FROM dbo.view_TM_Forming_Proces V WITH (NOLOCK)
        INNER JOIN dbo.tbl_Inv_Tran_Date T WITH (NOLOCK)
            ON V.DateName = T.DateName
        WHERE 
            T.DateName BETWEEN ? AND ?
            AND V.factoryCode = ?
        GROUP BY T.DateName
        ORDER BY T.DateName ASC
    ", [$startDate, $endDate, $factoryCode]);

    return $query->result_array(); // Return optimized result
}

// public function get_day_by_day_Finale_Forming_Weekly()
// {
//     // Get last 7 days (including today)
//     $endDate = date('Y-m-d');
//     $startDate = date('Y-m-d', strtotime('-6 days'));
//     $factoryCode = 'B34003';

//     $query = $this->db->query("
//         SELECT 
//             FORMAT(DateName, 'dd-MMM') AS DayWithMonth, 
//             SUM(TotalChecked) AS TotalChecked, 
//             SUM(TotalPass) AS TotalPass, 
//             SUM(Fail) AS Fail
//         FROM dbo.view_TM_Forming_Proces
//         WHERE 
//             DateName BETWEEN CONVERT(DATETIME, ?, 102) 
//             AND CONVERT(DATETIME, ?, 102)
//             AND factoryCode = ?
//         GROUP BY DateName
//         ORDER BY DateName ASC
//     ", [$startDate . ' 00:00:00', $endDate . ' 23:59:59', $factoryCode]);

//     return $query->result_array();
// }

public function get_day_by_day_Finale_Forming_Weekly()
{
    // Get last 7 days (including today)
    $endDate = date('Y-m-d');
    $startDate = date('Y-m-d', strtotime('-6 days'));
    $factoryCode = 'B34003';

    $query = $this->db->query("
        SELECT 
            FORMAT(T.DateName, 'dd-MMM') AS DayWithMonth, 
            SUM(V.TotalChecked) AS TotalChecked, 
            SUM(V.TotalPass) AS TotalPass, 
            SUM(V.Fail) AS Fail
        FROM dbo.view_TM_Forming_Proces V WITH (NOLOCK)
        INNER JOIN dbo.tbl_Inv_Tran_Date T WITH (NOLOCK)
            ON V.DateName = T.DateName
        WHERE 
            T.DateName BETWEEN ? AND ?
            AND V.factoryCode = ?
        GROUP BY T.DateName
        ORDER BY T.DateName ASC
    ", [$startDate, $endDate, $factoryCode]);

        return $query->result_array(); // Return optimized result
    }

    public function raw_material_available_balanace_or_quantity(){

        $query = $this->db->query("SELECT * FROM View_LCD_Mat_Estimated");
        return $query->result_array();
    }

} // END class DD_Model.

