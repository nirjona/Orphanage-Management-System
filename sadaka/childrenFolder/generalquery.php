<?php

//echo '<BR>im in<BR>';
    if(isset($_POST['option']))
    {
       // echo '<BR>set<BR>';
        
        $pname=$_POST['name'];  //unset($_POST['qname']);
        $plage=$_POST['lwr_age'];  /*unset($_POST['lwr_age']);*/  $puage=$_POST['upr_age'];  //unset($_POST['upr_age']);
        $pinst=$_POST['inst'];  //unset($_POST['inst']);
        $plcls=$_POST['lwr_cls'];  /*unset($_POST['lwr_cls']);*/  $pucls=$_POST['upr_cls'];  //unset($_POST['upr_cls']);
        $pgen=$_POST['formGender'];  //unset($_POST['formGender']);
        $supid = "";
        //echo '<br>bruh ' . $supid.'<br>';
        if($_SESSION['myposition']=='employee')
        {
            $supid = $myid;
            
        }
        else
        {
            $supid = $_POST['supid'];
            
        }
        
        if(strlen($pname))
        {
            $condition .= " and CHILD_NAME = "."'".$pname."'";
        }
        if(strlen($supid))
        {
            $condition .= " and EMPLOYEE_ID = "."'".$supid."'";
        }
        if(strlen($pgen))
        {
            $condition .= " and CHILD_GENDER = "."'".$pgen."'";
        }
        if(strlen($pinst))
        {
            $condition .= " and CHILD_INSTITUTION_NAME = "."'".$pinst."'";
        }
        if(strlen($plage) || strlen($puage))
        {
            
            if(strlen($plage))
            {
                $condition .= " and CHILD_AGE >= ".$plage;
            }
            if(strlen($puage))
            {
                $condition .= " and CHILD_AGE <= ".$puage;
            }
        }
        if(strlen($pucls) || strlen($plcls))
        {
            
            if(strlen($plcls))
            {
                $condition .= " and CHILD_CLASS >= ".$plcls;
            }
            if(strlen($pucls))
            {
                $condition .= " and CHILD_CLASS <= ".$pucls;
            }
        }
    }


?>
