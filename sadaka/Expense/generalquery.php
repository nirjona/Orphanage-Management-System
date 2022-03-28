<?php

//echo '<BR>im in<BR>';
    if(isset($_POST['option']))
    {
        //echo '<BR>set<BR>';
        
        $pldate=$_POST['lwr_date']; 
        $pudate=$_POST['upr_date'];  
        if(strlen($pldate) || strlen($pudate))
        {
            
            if(strlen($pldate))
            {
                $condition = $condition." and "; 
                $condition = $condition." EXPENSE_DATE >= "."to_date('" . $pldate . "','YYYY-MM-DD')";
                
            }
            if(strlen($pudate))
            {
                $condition = $condition." and "; 
                $condition = $condition." EXPENSE_DATE <= "."to_date('" . $pudate . "','YYYY-MM-DD')";
            }
        }
    }


?>
