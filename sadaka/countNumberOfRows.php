<?php

    $count_rows =0 ;


    while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) 
    {
        $count_rows++;
    }
    
 ?>