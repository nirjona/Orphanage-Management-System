<?php
  $sql="select ";                                                     //query as string
  $sql .=$attributes;
  $sql .=" from ";
  $sql .=$tablename;
  if($condition != "")
  {
    $sql .=" where ";
    $sql .=$condition; 
  }
  //echo $sql;
  $stid = oci_parse($connection, $sql);
    oci_execute($stid);                                                  
?>