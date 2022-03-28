<?php
  include "../dbConnection/connection.php";
  session_start();

 if($_SESSION['myposition'] != 'admin' )
  {
    $url = 'http://localhost:4000index.php';
            //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
    echo '<script>window.location="'.$url.'"</script>';
  }
  
  $donorname= $_GET['dname'];
  $donorphone=$_GET['dphone'];
  $id=$_GET['id'];
  $donorfrequency=$_GET['dfrequency'];
  $donoraccount=$_GET['daccount'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor Profile</title>
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
                      <h4><?php print $donorname; ?></h4>
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
                  <form action='#' method = "POST">
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Donor Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $donorname; ?>' name = 'dn'>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Donor Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="input" value = '<?php print $donorphone; ?>' name = 'dp'>
                    </div>
                  </div>
                  
                <input type="submit" value = "Update" name = "update" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
              
                </form>
                <?php
                    if(isset($_POST['update']))
                    {
                       $donorname=$_POST['dn'];
                       $donorphone=$_POST['dp'];

                        $sql = "UPDATE DONOR
                        SET  DONOR_NAME =  '$donorname' , DONOR_PHONE='$donorphone'
                        WHERE DONOR_ID = '$id' ";
                        $stid = oci_parse($connection, $sql);
                        oci_execute($stid);   
                        if($_SESSION['mevalid']==true)
                        { 
                          $url='http://localhost:4000/donorOwnFolder/donorOwnprofile.php?did='.$id.'&dname='.$donorname.'&daccount='.$donoraccount.'&dphone='.$donorphone.'&dfrequency='.$donorfrequency;
                          //$url = 'http://localhost:4000/childrenFolder/childrenprofile.php?id='.$uid.'&name='.$uname.'&age='.$uage.'&bed='.$ubed.'&gender='.$ugen.'&health='.$uhc.'&institute='.$ui.'&class='.$ucls.'&nature='.$unat.'&address='.$uaddr.'&institute='.$ui.'&empid='.$uem.'&adptid='.$uadpt;
                          //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
                          echo '<script>window.location="'.$url.'"</script>';
                            
                          //print "<a href = '".$urll."'> View Profile </a>";
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