<?php

  include "../dbConnection/connection.php";
  session_start();
  if($_SESSION['myposition'] != 'admin')
  {
    //ob_start();
    //header('Location: ../index.php');
    $url = "http://localhost:4000/index.php";
    echo '<script>window.location="'.$url.'"</script>';
    //ob_end_flush();
    exit();
  }
  $myid = $_SESSION['myid'];
  //echo $myid ;
     

  

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
     <link rel="stylesheet" href="../assets/css/procss.css">
     <link rel="stylesheet" href="../assets/css/notificationstyling.css">

     <!-- Modernizr -->
     <script src="../assets/js/modernizr-2.6.2.min.js"></script>
</head>
<body>

<?php
    include "../HeaderAndFooter/navbar.php";
?>
 
<div class="container">
    <div class="glumain-body" >
    
       
        
        <div class="row gutters-sm"  style="margin-left: 250px ;
            width: 100%;
            height: 700px;
             padding: 100px;">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4><?php print $myid; ?></h4>
                            <a href="shownotification.php" class="notification">
                                <span>Adoption Request</span>
                                <?php 
                                    $sql="select * from FOSTER_REQUEST";  
                                    $stid = oci_parse($connection, $sql);
                                    oci_execute($stid);   
                                    include "../countNumberOfRows.php";
                                    $notifications = $count_rows ;
                                ?>
                                <span class="badge"><?php print $notifications ?></span>
                            </a>
                            <br>
                           <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                            <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                            <button class="btn btn-primary">Follow</button>
                            <button class="btn btn-outline-primary">Message</button>  -->
                        </div>
                    </div>
                </div>
            </div>
              
              
            <br>
            <br>
              
            <form method = 'POST'>
                <div class="glucard mt-3">
                <!--must for frontend-->
                
                    <a href = '../employeeFolder/employeetable.php' class="buttons button1">Employee</a>
                    <a href = '../fosterFolder/fostertable.php' class="buttons button3">Foster Parent</a>
                    <a href = '../childrenFolder/childrentable.php' class="buttons button2">Children</a>
                    <a href = '../donorFolder/donortable.php' class="buttons button5">Donor</a>
                    <a href = '../Expense/expenseTable.php' class="buttons button5">Expenses</a>
                <!--</form>-->

                </div>
            </form>

        </div>
        
           
    </div>
</div>



<br><br>
<?php
    include "../HeaderAndFooter/footer.php";
?>
</body>
</html>