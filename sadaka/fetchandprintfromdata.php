<?php
  $sql="select ";                                                     //query as string
  $sql .=$attributes;
  $sql .=" from ";
  $sql .=$tablename;
  if($tablename == 'HEALTH_HISTORY')
  {
    $sql .= $condition;
  }
  else if($condition != "")
  {
    $sql .=" where ";
    $sql .=$condition; 
  }
  //echo $sql;
  $stid = oci_parse($connection, $sql);
	oci_execute($stid);                                                  
  $count_rows=0;                                                        //this variable is used to count the number of rows
  while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   		print '<tr>';
   		foreach ($row as $item) {
            
       			print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   		}
   		print '</tr>';
                $count_rows++;
	}
 
 oci_close($connection);
 
?>