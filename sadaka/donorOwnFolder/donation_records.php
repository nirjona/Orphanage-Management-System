
<?php
     //include "../dbConnection/connection.php";
    // $did=$_GET['did'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Children Information</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

  <!-- Bootsrap -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <!-- Font awesome -->
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

  <!-- Owl carousel -->
  <link rel="stylesheet" href="../assets/css/owl.carousel.css">

  <!-- Template main Css -->
  <link rel="stylesheet" href="../assets/css/style.css">

  <link rel="stylesheet" href="../assets/css/formstyle.css">
  
  <!-- Modernizr -->
  <script src="../assets/js/modernizr-2.6.2.min.js"></script>

</head>


<body>

  
<?php
    //include "../HeaderAndFooter/navbar.php";
?>
 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">DONATION ID</th>
      <th scope="col">DONATION AMOUNT</th>
      <th scope="col">DONATION DATE</th>
     
    </tr>
  </thead>


  <tbody>


  
    <?php
       
        $sql="select DONOR_DONATION.DONATION_ID,DONATION_AMOUNT,DONATION_DATE from DONOR_DONATION inner join DONATION on DONOR_DONATION.DONATION_ID=DONATION.DONATION_ID and DONOR_DONATION.DONOR_ID='$did'";
        $stid = oci_parse($connection, $sql);
        oci_execute($stid);                                                  
        while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
               print '<tr>';
               foreach ($row as $item) {
                
                       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
               }
               print '</tr>';
        }
    ?>


  </tbody>
</table>

    
</body>
</html>