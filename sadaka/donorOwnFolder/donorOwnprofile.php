<?php
  //$url = 'donorOwnProfile.php?did='.$uid.'&dname='.$uname.'&daccount='.$acc.'&dfrequency='.$freq;
  include "../dbConnection/connection.php";
  session_start();
  if($_SESSION['myposition']!='donor')
  {
    $url = 'http://localhost:4000/index.php';
  //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
    echo '<script>window.location="'.$url.'"</script>';
  }
  $myid = $_SESSION['myid'];
  $sql = "select * from DONOR where DONOR_ID ='$myid'";        
  $stid = oci_parse($connection, $sql);
  oci_execute($stid);   
  
  $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;
  //echo $myid ;

  $donor_id = $row['DONOR_ID'];
  $donor_name= $row['DONOR_NAME'];
 
  $donor_account = $row['DONOR_ACCOUNT'];
  $donor_phone=$row['DONOR_PHONE'];
 
  $donation_frequency=$row['FREQUENCY'];
  $dpass=$row['DONOR_PASSWORD'];
  if($donation_frequency=='') 
  {
    $donation_frequency='0';
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
                      <!--<h4><?php //print $name; ?></h4>-->
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
                      <h6 class="mb-0">Donor Id</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php print $donor_id; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Donor Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $donor_name; ?>
                    </div>
                  </div>




                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Donor Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php print $donor_phone; ?>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Donor Account</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $donor_account; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Donation Frequency</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php print $donation_frequency; ?>
                    </div>
                  </div>
                 
                 <hr>
                  <div class="row">
                   <div class="col-sm-6">
                      
                      <a class="btn btn-info " href='../donorFolder/donoredit.php?id=<?php print $donor_id ?>&dname=<?php print $donor_name ?>&dphone=<?php print $donor_phone ?>&daccount=<?php print $donor_account ?>&dfrequency=<?php print $donation_frequency ?>'>Edit</a>
                    </div>
                    <div class="col-sm-6">
                      <form method = "POST">
                          <div class="form">
                              <input type="submit" value = "Donate Now!" name = "donate" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                          </div>
                      </form>
                      <?php
                        if(isset($_POST['donate']))
                        {
                          $url = 'http://localhost:4000/donorOwnFolder/donorOwndonation.php?did='.$myid;
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
    $did=$donor_id;
    include "donation_records.php";
    include "../HeaderAndFooter/footer.php";
  ?>
</body>
</html>