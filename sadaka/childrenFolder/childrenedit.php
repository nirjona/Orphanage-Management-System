<?php
    include "../dbConnection/connection.php";
    session_start();

    $id= $_GET['id'];
    if($_SESSION['myposition'] != 'admin')
    {
        if($_SESSION['myposition'] == 'employee')
        {
            $myempid = $_SESSION['myid'];
            $sql="select * from CHILDREN_INFORMATION where CHILD_ID = '$id' and EMPLOYEE_ID = '$myempid'";
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            if(!(oci_num_rows($stid)+1))
            {

                $url = 'http://localhost:4000/index.php';
                echo '<script>window.location="'.$url.'"</script>';
                //header('Location: ../index.php');
                //ob_end_flush();
            }
        }
        else 
        {
          $url = 'http://localhost:4000/index.php';
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
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
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
                  <form action='#' method = "POST">
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $name; ?>' name = 'fname'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type='number' class="input" value = <?php print $age; ?> name = 'fage'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bed no</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $bed; ?>' name = 'fbed'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $gen; ?>' name = 'fgen'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Health Condition</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $hc; ?>' name = 'fhealth'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Institution</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $i; ?>' name = 'finstitute'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Class</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type='number' class="input" value = '<?php print $cls; ?>' name = 'fclass'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nature</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $nat; ?>' name = 'fnature'>
                    </div>
                  </div>
                  <?php if($_SESSION['myposition'] == 'admin'){?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Supervisor</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <input type="text" class="input" value = '<?php print $em; ?>' name = 'fempid'>
                        </div>
                    </div>
                  <?php }?>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Addoption ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $adpt; ?>' name = 'fadptid'>
                    </div>
                  </div>
                  

                <input type="submit" value = "Update" name = "update" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                </form>
                <?php
                    if(isset($_POST['update']))
                    {
                        $CHILD_NAME = $_POST['fname'];
                        $CHILD_AGE = $_POST['fage'];
                        $CHILD_BED_NO = $_POST['fbed'];
                        $CHILD_GENDER = $_POST['fgen'];
                        $CHILD_HEALTH_CONDITION = $_POST['fhealth'];
                        $CHILD_INSTITUTION_NAME = $_POST['finstitute'];
                        $CHILD_CLASS = $_POST['fclass'];
                        $CHILD_NATURE = $_POST['fnature'];
                        $EMPLOYEE_ID = 'Garb';
                        if($_SESSION['myposition'] == 'employee')
                        {
                            $EMPLOYEE_ID = $_SESSION['myid'];
                        }
                        else $EMPLOYEE_ID = $_POST['fempid'];
                        
                        $ADOPTION_ID = $_POST['fadptid'];

                        $sql="select * from EMPLOYEE where EMPLOYEE_ID = '$EMPLOYEE_ID' and IF_SUPERVISOR = 1 ";  
                        
                        $stid = oci_parse($connection, $sql);
                        oci_execute($stid);   
                        include "../countNumberOfRows.php";
                        
                        if($count_rows)
                        {
                            $sql="select * from EMPLOYEE where EMPLOYEE_ID = '$EMPLOYEE_ID' and IF_SUPERVISOR = 1 ";  
                            $stid = oci_parse($connection, $sql);
                            oci_execute($stid);   
                            $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
                            $curC =  $row['NO_OF_CHILD_SUPERVISION'];
                            $curC= $curC+1;
                            

                            $sql = "UPDATE CHILDREN_INFORMATION

                            SET CHILD_NAME = '$CHILD_NAME' , CHILD_AGE =  $CHILD_AGE , CHILD_BED_NO = '$CHILD_BED_NO' , CHILD_GENDER = '$CHILD_GENDER' , 
                            CHILD_HEALTH_CONDITION = '$CHILD_HEALTH_CONDITION' , CHILD_INSTITUTION_NAME = '$CHILD_INSTITUTION_NAME',CHILD_CLASS = $CHILD_CLASS,
                            CHILD_NATURE = '$CHILD_NATURE',EMPLOYEE_ID = '$EMPLOYEE_ID',ADOPTION_ID = '$ADOPTION_ID'
                            WHERE CHILD_ID = '$id' ";
                            
                            echo $sql . "<br>"; 

                            $stid = oci_parse($connection, $sql);
                            oci_execute($stid);   


                            $sql = "UPDATE EMPLOYEE

                            SET NO_OF_CHILD_SUPERVISION = $curC 

                            WHERE EMPLOYEE_ID = '$EMPLOYEE_ID' ";
                            echo $row['EMPLOYEE_ID'] . 'gonna be supervising '. $row['NO_OF_CHILD_SUPERVISION'] . " children " . "<br>";

                            
                            
                            echo $sql . "<br>"; 

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

                              
                              
                              echo $sql . "<br>"; 

                              $stid = oci_parse($connection, $sql);
                              oci_execute($stid); 
                            }

                            $url = 'http://localhost:4000/childrenFolder/childrenprofile.php?id='.$id.'&name='.$CHILD_NAME.'&age='.$CHILD_AGE.'&bed='.$CHILD_BED_NO.'&gender='.$CHILD_GENDER.'&health='.$CHILD_HEALTH_CONDITION.'&institute='.$CHILD_INSTITUTION_NAME.'&class='.$CHILD_CLASS.'&nature='.$CHILD_NATURE.'&address='.$addr.'&empid='.$EMPLOYEE_ID.'&adptid='.$ADOPTION_ID;
                            //$url = 'childrentable.php?id='.$id;              
                            echo '<script>window.location="'.$url.'"</script>';
                            


                        }
                        else
                        {
                            echo '<script>alert("Supervisor ID Doesnt exist")</script>';
                        }

                        
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