<?php

  include "../dbConnection/connection.php";
  session_start();
  if($_SESSION['myposition'] != 'admin')
  {
    $url = "http://localhost:4000/index.php";
    echo '<script>window.location="'.$url.'"</script>';
  }
  $myid = $_SESSION['myid'];
  echo $myid ;

  $rid = $_GET['rid'];
  $cid = $_GET['child'];
  $fid = $_GET['foster'];


    $sql="select * from children_information where CHILD_ID = '$cid' ";          
    $stid = oci_parse($connection, $sql);
    oci_execute($stid);   
    $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;

    $cid= $row['CHILD_ID'];
    $name= $row['CHILD_NAME'];
    $age= $row['CHILD_AGE'];
    $bed= $row['CHILD_BED_NO'];
    $gen= $row['CHILD_GENDER'];
    $hc= $row['CHILD_HEALTH_CONDITION'];
    $i = $row['CHILD_INSTITUTION_NAME'];
    $cls = $row['CHILD_CLASS'];
    $nat = $row['CHILD_NATURE'];
    $addr = $row['ADDRESSING_DATE'];
    $em = $row['EMPLOYEE_ID'];




    $sql="select * from FOSTER_PARENTS where FOSTER_NID = '$fid' ";          
    $stid = oci_parse($connection, $sql);
    oci_execute($stid);   
    $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;

    $nid = $row['FOSTER_NID'];
    $fname = $row['FOSTER_FATHER'];
    $mname = $row['FOSTER_MOTHER'];
    $fphn = $row['FOSTER_PHONE'];
    $fadrs = $row['FOSTER_ADDRESS'];
    $fpass = $row['FOSTER_PASSWORD'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
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
                      <h4><?php print $fname; ?></h4>
                      
                    <!--  <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
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
                      <h6 class="mb-0">NID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php print $fid; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Foster Father Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $fname; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Foster Mother Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $mname; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Foster Phone No</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $fphn; ?>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Foster Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $fadrs; ?>
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


  <br><br><br>


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
                     <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
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
                     <?php print $cid; ?>
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


                  
                


                  
                </div>
              </div>

              <hr>

                <div class="row">
                <form method = "POST">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Court Reference</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <input type="text" class="input" value = '' name = 'cf'>
                    </div>
                    <div class="col-sm-6">
                      
                          <div class="form">
                            <input type="submit" value = "Accept" name = "accept" value="Input Button" style = "background-color: #5cdb5c;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                          </div>
                      
                    </div>
                    </form>
                </div>
                
                  <div class="row">
                  <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                      <form method = "POST">
                          <div class="form">
                              <input type="submit" value = "Decline" name = "decline" value="Input Button" style = "background-color: #ff0021;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                          </div>
                      </form>
                      <?php
                      
                        if(isset($_POST['accept']) || isset($_POST['decline']))
                        {
                            $adpid = 'adpt_' . $rid ;
                            $sql="delete from foster_request where REQUEST_ID = '$rid'";  
                            $stid = oci_parse($connection, $sql);
                            oci_execute($stid);   


                            if(isset($_POST['accept']))
                            {
                                
                                $cf = $_POST['cf'];
                                $date = date('Y/m/d');
                                $attributes = "'$adpid' , '$fid','$cf',TO_DATE('$date', 'YYYY-MM-DD') " ;  
                                $tablename = 'ADOPTION';
                                include "../insertindata.php";

                                $sql="update children_information 
                                set EMPLOYEE_ID = NULL , ADOPTION_ID = '$adpid' 
                                where CHILD_ID = '$cid'";  
                                $stid = oci_parse($connection, $sql);
                                oci_execute($stid);
                                include "../fixSup.php";

                            }

                            $url = "http://localhost:4000/adminOwnFolder/shownotification.php";
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




    <?php
    include "../HeaderAndFooter/footer.php";
  ?>
</body>
</html>