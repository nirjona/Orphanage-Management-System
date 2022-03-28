<?php
    session_start();
    include "../dbConnection/connection.php";

    $cid = $_GET['cid'];
    //echo $cid;
    
    /*if($_SESSION['myposition'] != 'admin')
    {
      header('Location: ../index.php');
      
    }
    $url = 'nihon';*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Health Information</title>
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
    include "../HeaderAndFooter/navbar.php";
?>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">HEALTH ISSUE</th>
      <th scope="col">APPOINTMENT DATE</th>
      <th scope="col">HOSPITAL NAME</th>
      <th scope="col">DOCTOR</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
        $attributes = 'HEALTH_ISSUE,APPOINTMENT_DATE,HOSPITAL_NAME,DOCTOR';
        $tablename = 'HEALTH_HISTORY';
       // $condition = "inner join HEALTH_TRACK on HEALTH_TRACK.CHILD_ID='".$child_id."'";  //child id received from _POST
      // $condition = " inner join CHILDREN_HEALTH_TRACK on CHILDREN_HEALTH_TRACK.CHILD_ID='$cid'";  //child id received from _POST 
      $condition = " inner join CHILDREN_HEALTH_TRACK on CHILDREN_HEALTH_TRACK.CHILD_ID='$cid' and HEALTH_HISTORY.PATIENT_ID=CHILDREN_HEALTH_TRACK.PATIENT_ID"; 
      include "../fetchandprintfromdata.php";
    ?>
  </tbody>
</table>

  <br><br><br><br><br><br><br><br>
  <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>