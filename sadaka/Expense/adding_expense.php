<?php

$expense_id="exp_".strval(date("YmdHis"));
            $expense_type=$_POST['expense_type'];
            $expense_amount=(float)$_POST['amount'];
            $expense_month_year=strval(date("mY"));
            //$expense_month_year="012022";
            $expense_date=date("Y-m-d");
            //echo $expense_date ;

            $amount = $_POST['amount'];
            $monthyear=$expense_month_year;

            $sql = "select * from ACCOUNTT where ACCOUNT_MONTH_YEAR='".$monthyear."'";
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            include "../countNumberOfRows.php";
            if($count_rows)
            {
              $update_account="update ACCOUNTT set TOTAL_EXPENSE=TOTAL_EXPENSE+".strval($amount)." ,PRINCIPAL_AMOUNT=PRINCIPAL_AMOUNT-".strval($amount)." where ACCOUNT_MONTH_YEAR='".$monthyear."'";
              //echo $update_account;
              $commit1=oci_parse($connection,$update_account);
              oci_execute($commit1);
            }
            else
            {
              $premon = substr($monthyear,0,2);
              $preyear = substr($monthyear,2,4);
              $year = (int)$preyear;
              $ys = strval($year);
              $month = (int)$premon;$month--;
              $ms = strval($month);
              if($premon=='01')
              {
                $year-=1;
                $ys = strval($year);
                $ms = "12";
              }
              if(strlen($ms)==1)$ms = "0".$ms;
              $prmy = $ms . $ys ;

              $sql = "select * from ACCOUNTT where ACCOUNT_MONTH_YEAR='".$prmy."'";
              $stid = oci_parse($connection, $sql);
              oci_execute($stid);   
              $principal_amount = 0;
              include '../countNumberOfRows.php';
              if($count_rows)
              {
                $stid = oci_parse($connection, $sql);
                oci_execute($stid); 
                $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
                $principal_amount = $row['PRINCIPAL_AMOUNT'];
              }

              $query = "select sum(SALARY) from EMPLOYEE";
              $stid = oci_parse($connection, $query);
              oci_execute($stid);
              $row=0;
              $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC) ;
              $sal = $row['SUM(SALARY)'];
              $amount += $sal;


              $principal_amount -= $amount;
              $attributes = "'$monthyear',$principal_amount,$amount,0" ;  
              $tablename = 'ACCOUNTT';
              include "../insertindata.php";


              


              
              $expense_id[6] = 0;$expense_id[7] = 1;
              $expense_id='sal_'.$expense_id;
              $expense_date[8] = 0;
              $expense_date[9] = 1;

              $sql="insert into EXPENSE(EXPENSE_ID,EMPLOYEE_SALARY,ACCOUNT_MONTH_YEAR,EXPENSE_DATE) values('$expense_id','$sal','$expense_month_year',TO_DATE('$expense_date','YYYY-MM-DD'))";
              $commit=oci_parse($connection,$sql);
              oci_execute($commit);
              

            }
            $sql="insert into EXPENSE(EXPENSE_ID,$expense_type,ACCOUNT_MONTH_YEAR,EXPENSE_DATE) values('$expense_id','$expense_amount','$expense_month_year',TO_DATE('$expense_date','YYYY-MM-DD'))";
            $commit=oci_parse($connection,$sql);
            oci_execute($commit);

?>