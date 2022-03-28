<?php

$sql="insert into ";      
$sql .=$tablename;    
$sql .=" values(";                                      
$sql .=$attributes;
$sql .=")";    


echo $sql ;
 
 $result=oci_parse($connection,$sql);

 oci_execute($result);

?>