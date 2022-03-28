<?php

  include "../dbConnection/connection.php";
  session_start();
  
  $myid = $_SESSION['myid'];
  

  $id= $_GET['id'];
 //echo $id ;
  if($_SESSION['myposition'] != 'admin')
  {
      if($_SESSION['myposition'] == 'employee')
      {
          $myempid = $_SESSION['myid'];
          $sql="select * from CHILDREN_INFORMATION where CHILD_ID = '$id' and EMPLOYEE_ID = '$myid'";
          $stid = oci_parse($connection, $sql);
          oci_execute($stid);   
          if(!(oci_num_rows($stid)+1))
          {
            $url = 'http://localhost:4000/index.php';
            //$url = 'childrentable.php?id='.$id;              
            echo '<script>window.location="'.$url.'"</script>';
          }
      }
      else if($_SESSION['myposition'] != 'foster')
      {
        $url = 'http://localhost:4000/index.php';
        //$url = 'childrentable.php?id='.$id;              
        echo '<script>window.location="'.$url.'"</script>';
      }
  }
  $name= $_GET['name'];
  $age= $_GET['age'];
  $bed= $_GET['bed'];
  $gen= $_GET['gender'];
  $hc= $_GET['health'];
  $i = $_GET['institute'];
  $cls = $_GET['class'];
  $nat = $_GET['nature'];
  $addr = $_GET['address'];
  $em = $_GET['empid'];
  $adpt = $_GET['adptid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Profile</title>
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
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $age; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bed no</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $bed; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $gen; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Health Condition</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $hc; ?>
                    </div>
                  </div>
                  <!--date-->
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Institution</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $i; ?>
                    </div>
                  </div>


                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Class</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $cls; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nature</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $nat; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Addressing Date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $addr; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Employee ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $em; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Adoption ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $adpt; ?>
                    </div>
                  </div>
                  <!--date-->
                  <hr>
                  <div class="row">
                  <?php if($_SESSION['myposition'] !='foster'){?>
                    <div class="col-sm-6">
                    <?php
                          $url = 'childrenedit.php?id='.$id.'&name='.$name.'&age='.$age.'&bed='.$bed.'&gender='.$gen.'&health='.$hc.'&institute='.$i.'&class='.$cls.'&nature='.$nat.'&address='.$addr.'&institute='.$i.'&empid='.$em.'&adptid='.$adpt;
                          print "<a class='btn btn-info' href = '".$url."'> Edit </a>";
                      ?>
                    </div>
                    <?php }?>
                    

                    <div class="col-sm-6">
                    <?php if($_SESSION['myposition']=='admin'){?>
                      <form method = "POST">
                          <div class="form">
                              <input type="submit" value = "Delete" name = "delete" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                          </div>
                      </form>

                      <?php
                        if(isset($_POST['delete']))
                        {
                          $sql="delete from children_information where CHILD_ID = '$id'";  
                          $stid = oci_parse($connection, $sql);
                          oci_execute($stid);   
                          if(strlen($em))
                          {
                            $sql="select * from EMPLOYEE where EMPLOYEE_ID = '$em' ";  
                            $stid = oci_parse($connection, $sql);
                            oci_execute($stid);   
                            
                            $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
                            $curC =  $row['NO_OF_CHILD_SUPERVISION'];
                            $curC= $curC-1;

                            $sql = "UPDATE EMPLOYEE

                            SET NO_OF_CHILD_SUPERVISION = $curC 

                            WHERE EMPLOYEE_ID = '$em' ";


                            $stid = oci_parse($connection, $sql);
                            oci_execute($stid); 
                          }
                          //print "<a href = 'childrentable.php?id=$id'>back</a> ";

                          $url = 'http://localhost:4000/childrenFolder/childrentable.php?id=$id';
                          //$url = 'http://localhost:4000/childrenFolder/childrenedit.php?id='.$id.'&name='.$name.'&age='.$age.'&bed='.$bed.'&gender='.$gen.'&health='.$hc.'&institute='.$i.'&class='.$cls.'&nature='.$nat.'&address='.$addr.'&institute='.$i.'&empid='.$em.'&adptid='.$adpt;
                          //$url = 'http://localhost:4000/childrenFolder/childrentable.php';
                          //$url = 'childrentable.php?id='.$id;              
                          echo '<script>window.location="'.$url.'"</script>';
                        }
                      ?>
                      <?php }?>
                      
                      <?php if($_SESSION['myposition']=='foster'){?>
                      <form method = "POST">
                          <div class="form">
                              <input type="submit" value = "Adopt Child" name = "adopt"  style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                          </div>
                      </form>

                      <?php
                        if(isset($_POST['adopt']))
                        {
                          
                          $tablename = 'FOSTER_REQUEST' ;
                          $reqid = 'req' .  strval(rand(1,1000)) ; 
                          $attributes = "'$myid' , '$id','$reqid'" ;
                          include '../insertindata.php';

                          $url = 'http://localhost:4000/childrenFolder/childrentable.php?id=$id';
                          //$url = 'http://localhost:4000/childrenFolder/childrentable.php?id=$id';  
                          echo '<script>window.location="'.$url.'"</script>';
                          //print "Adoption Request Sent , Click <a href = 'childrentable.php?id=$id'> here </a> to get back";
                        }
                      ?>
                      <?php }?>


                    </div>
                    <?php
                    echo"
                    <div class='col-sm-6'>
                      <a class='btn btn-info' href = '../HealthTrack/HealthTrackTable.php?cid=$id'> Health Info </a>
                    </div>
                    ";
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
    <?php
    include "../HeaderAndFooter/footer.php";
  ?>
</body>
</html>