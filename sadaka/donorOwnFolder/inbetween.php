<?php
session_start();
include "../dbConnection/connection.php";
$idd = $_GET['id'];
$named = $_GET['name'];
$accountd = $_GET['account'];
$phone = $_GET['phone'];
$pass = $_GET['pass'];


$attributes = " '$named','$accountd','$phone',0,'$pass' " ;  
echo $attributes ; 
$tablename = 'DONOR';


//Insert into Donor values('D_'||donor_id_gen.NEXTVAL, 'Fariha' ,'accounts135', '018167', 0,'dbms' );
//include "../mail_a.php";


$sql = "declare
did varchar2(50);
begin
create_donor(did,".$attributes.");
end;";



echo $sql ;
 
$result=oci_parse($connection,$sql);

oci_execute($result);

$sql = "select DONOR_ID from donor";
$result=oci_parse($connection,$sql);
if(oci_execute($result)==false)
{
  echo "This Account has already been verified!";
}
else
{
$max = -1;
while ($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)) {
    
    
    foreach ($row as $item) {
        $xx = (explode("_",$item));
        $k = (int)$xx[1];
        if($k>$max)$max = $k;
            
    }

    
         
}
$idd = 'D_'.strval($max);






/*
$k = 5;


   $result = oci_parse($connection, "begin create_donor(:bind1, :bind2,:bind3, :bind4,:bind5, :bind6); end;");
   oci_bind_by_name($result, ":bind1", $idd , 40);
   oci_bind_by_name($result, ":bind2", $named);
   oci_bind_by_name($result, ":bind3", $accountd);
   oci_bind_by_name($result, ":bind4", $phone);
   oci_bind_by_name($result, ":bind5", $k);
   oci_bind_by_name($result, ":bind6", $pass);

   
   oci_execute($result, OCI_DEFAULT);
*/








//include "../insertindata.php";

$_SESSION['mevalid'] = true;
$_SESSION['myid'] = $idd;
$_SESSION['myposition'] = 'donor';


$url = 'http://localhost:4000/donorOwnFolder/donorOwnProfile.php';
//$url = 'http://localhost:4000/index.php';
echo '<script>window.location="'.$url.'"</script>';
}            



?>