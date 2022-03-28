<?php

    $stid = oci_parse($connection, $sql);
	oci_execute($stid);                                                  
    $count_rows=0;
    $id;                                                        
    while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
        $id = $row[$sqlID];
   		$count_rows++;
        break ;
	}
    if($count_rows==0)
    {
        echo '<script>alert("Didnt match")</script>';
    }
    else
    {
        $_SESSION['mevalid'] = true;
        $_SESSION['myid'] = $id;
        $_SESSION['myposition'] = $position;
        $_SESSION['expense_type'] = 'STATIONARY';


        $url = 'http://localhost:4000/'.$page;
        echo '<script>window.location="'.$url.'"</script>';

    }

?>