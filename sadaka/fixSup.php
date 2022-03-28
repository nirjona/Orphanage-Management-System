<?php
$stat = true;
$sql="select * from EMPLOYEE where EMPLOYEE_ID = '$em' and IF_SUPERVISOR = 1";          
$stid = oci_parse($connection, $sql);
oci_execute($stid);   
include "countNumberOfRows.php";

if($count_rows>0)
{
  $sql="select * from children_information where EMPLOYEE_ID = '$em' ";          
  $stid = oci_parse($connection, $sql);
  oci_execute($stid);   
  include "countNumberOfRows.php";
  


  $sql="update EMPLOYEE 
  set NO_OF_CHILD_SUPERVISION = $count_rows
  where EMPLOYEE_ID = '$em'";  
  $stid = oci_parse($connection, $sql);
  oci_execute($stid); 
}
else if($em != NULL)
{
    $stat = false;
    echo '<script>alert("Supervisor ID doesnt exist")</script>';
}

?>