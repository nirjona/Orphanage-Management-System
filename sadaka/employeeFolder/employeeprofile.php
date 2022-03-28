<?php

  include "../dbConnection/connection.php";
  session_start();
  if($_SESSION['myposition'] != 'admin')
  {
    $url = 'http://localhost:4000/index.html';
    //$url = 'http://localhost:4000/index.php';
  //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
    echo '<script>window.location="'.$url.'"</script>';
  }
  $myid = $_SESSION['myid'];
  echo $myid ;

  $id = $_GET['id'];
  $date = $_GET['date'];
  $name = $_GET['name'];
  $department = $_GET['department'];
  $designation = $_GET['designation'];
  $salary = $_GET['salary'];
  $years_of_working = $_GET['years_of_working'];
  $mode = $_GET['mode'];
  if($mode)
  {
    $nocs = $_GET['nocs'];
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
              
              <div class="card mt-3">
              
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
                  
                  <!--date-->
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <a class="btn btn-info " href='employeeedit.php?id=<?php print $id ?>&name=<?php print $name ?>&department=<?php print $department ?>&designation=<?php print $designation ?>&salary=<?php print $salary ?>&years_of_working=<?php print $years_of_working ?>&password=<?php print $password ?>'>Edit Profile</a>
                    </div>
                    <div class="col-sm-6">
                      <form method = "POST">
                          <div class="form">
                              <input type="submit" value = "Delete" name = "delete" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                          </div>
                      </form>
                      <?php
                        if(isset($_POST['delete']))
                        {
                          $sql="update children_information 
                          set EMPLOYEE_ID = NULL
                          where EMPLOYEE_ID = '$id'";  
                          $stid = oci_parse($connection, $sql);
                          oci_execute($stid);   

                          
                          $sql="delete from employee where EMPLOYEE_ID = '$id'";  
                          $stid = oci_parse($connection, $sql);
                          oci_execute($stid);   
                          $url = 'http://localhost:4000/employeeFolder/employeetable.php?id=$id';
                        //$url = 'http://localhost:4000/index.php';
                      //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
                          echo '<script>window.location="'.$url.'"</script>';
                        }
                      ?>
                    </div>
                  </div>
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