<?php

  include "../dbConnection/connection.php";
  session_start();
  if($_SESSION['mevalid'] == false)
  {
    $url = 'http://localhost:4000/index.php';
    //$url = 'http://localhost:4000/index.php';
  //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
    echo '<script>window.location="'.$url.'"</script>';
  }
  $myid = $_SESSION['myid'];
  //echo $myid ;
  $sql = "select * from employee where EMPLOYEE_ID = '$myid'";
  $stid = oci_parse($connection, $sql);
  oci_execute($stid);   
  $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);   

  
  $id = $row['EMPLOYEE_ID'];
  $name = $row['EMP_NAME'];
  $password = $row['EMPLOYEE_PASSWORD'];
  $department = $row['EMP_DEPARTMENT'];
  $designation = $row['EMP_DESIGNATION'];
  $salary = $row['SALARY'];
  $years_of_working = $row['YEARS_OF_WORKING'];
  $date = $row['EMP_JOINING_DATE'];
  $nocs = $row['NO_OF_CHILD_SUPERVISION'];
  $mode = $row['IF_SUPERVISOR'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Own Profile</title>
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
     
     <!-- Modernizr -->
     <script src="../assets/js/modernizr-2.6.2.min.js"></script>
</head>
<body>

<?php
    include "../HeaderAndFooter/navbar.php";
?>
 
<div class="container">
    <div class="glumain-body">
    
       
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php print $name; ?></h4>
                    <!--  <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>  -->
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
        
            <div class="col-md-8">
              <div class="glucard mb-3">
                <div class="glucard-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php print $id; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $name; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Department</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $department; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Designation</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $designation; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Salary</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $salary; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Years of working</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $years_of_working; ?>
                    </div>
                  </div>
                  <!--date-->
                  <hr>
                <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Joining date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $date; ?>
                    </div>
                </div>
                  <?php if($mode){?>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Number of children under supervision</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php print $nocs; ?>
                      </div>
                    </div>

                    <hr>
                      <div class="col-sm-6">
                        <a class="btn btn-info " href='../childrenFolder/childrentable.php'>View Children Under Supervision</a>
                      </div>
                      
                  <?php }?>
                  <div class="col-sm-3">
                        <a class="btn btn-info " href='employeeOwnedit.php?id=<?php print $id ?>&name=<?php print $name ?>&department=<?php print $department ?>&designation=<?php print $designation ?>&salary=<?php print $salary ?>&years_of_working=<?php print $years_of_working ?>&password=<?php print $password ?>'>Edit Profile</a>
                  </div>
                  <div class="col-sm-3">
                        <a class="btn btn-info " href='../Expense/expenseTable.php'>Expenses</a>
                  </div>

                <!--date-->
                </div>
              </div>

      
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
    <?php
    include "../HeaderAndFooter/footer.php";
  ?>
</body>
</html>