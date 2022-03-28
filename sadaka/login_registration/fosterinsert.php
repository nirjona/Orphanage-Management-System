<?php
    session_start();
    if($_SESSION['mevalid'])
    {
      header('Location: ../index.php');
    }
    include "../dbConnection/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Foster Parent Registration Form</title>
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

<style>
    .wrapper{
        height : 500px;
    }

</style>


<body>



    
  <?php
    include "../HeaderAndFooter/navbar.php";
  ?>

    <div class="wrapper">

        <div class="title">
          Foster Parent registration Form
        </div>
        <div class="form">
            <form action = "fosterinsert.php" method = "POST">
            <div class="inputfield">
              <label>Foster NID : </label>
              <input type="text" class="input" name = 'nid'>
           </div>  
            <div class="inputfield">
              <label>Father Name :</label>
              <input type="text" class="input" name = 'fname'>
           </div> 
           <div class="inputfield">
              <label>Mother Name :</label>
              <input type="text" class="input" name = 'mname'>
           </div> 
          
          <div class="inputfield">
              <label>Phone No :</label>
              <input type="text" class="input" name = 'fphone'>
           </div> 
           <div class="inputfield">
            <label>Address : </label>
            <input type="text" class="input" name = 'faddress'>
           </div> 
          <div class="inputfield">
              <label>Password</label>
              <input type="password" class="input" name = 'fpassword'>
           </div> 

          <div class="inputfield">
            <input type="submit" value="Register" class="btn" name = "register_foster">
          </div>
        </form>

        <?php
        if(isset($_POST['register_foster']))
        {
            //echo 'ni';
            $nid = $_POST['nid'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $fphn = $_POST['fphone']; 
            $fadrs = $_POST['faddress'];
           
            $fpassword = $_POST['fpassword'];

           // $id = 'e' . strval(rand(1,1000)) ; 

            //echo $date ; 
            $attributes = "'$nid' , '$fname','$mname','$fphn','$fadrs', '$password' " ;  
            echo $attributes ; 
            $tablename = 'Foster_Parents';
            include "../insertindata.php";
            $_SESSION['mevalid'] = true;
            $_SESSION['myid'] = $nid;
            $_SESSION['myposition'] = 'foster';
            //$url = '../fosterOwnFolder/fosterOwnProfile.php';
            //print "<a href = '".$url."'> View Profile </a>";

            $url = 'http://localhost:4000/fosterOwnFolder/fosterOwnProfile.php';
            //$url = 'http://localhost:4000/index.php';
            echo '<script>window.location="'.$url.'"</script>';
            

        }
        

    ?>

        </div>
    </div>
    

    


  <?php
    include "../HeaderAndFooter/footer.php";
  ?>

    
</body>
</html>