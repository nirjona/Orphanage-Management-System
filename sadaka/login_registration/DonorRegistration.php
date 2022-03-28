<?php
    session_start();
    if($_SESSION['mevalid'])
    {
      $url = 'http://localhost:4000/index.php';
      echo '<script>window.location="'.$url.'"</script>';
    }
    include "../dbConnection/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Employee registration Form</title>
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
        height : 450px;
    }

</style>


<body>



    
  <?php
    include "../HeaderAndFooter/navbar.php";
  ?>

    <div class="wrapper">

        <div class="title">
              Donor registration Form
        </div>
        <div class="form">
            <form action = "DonorRegistration.php" method = "POST">
            <div class="inputfield">
              <label>Donor Email : </label>
              <input type="email" class="input" name = 'email'>
           </div>  
            <div class="inputfield">
              <label>Donor Name : </label>
              <input type="text" class="input" name = 'named'>
           </div>  
            <div class="inputfield">
              <label>Donor Account :</label>
              <input type="text" class="input" name = 'accd'>
           </div> 
           <div class="inputfield">
              <label>Donor Phone :</label>
              <input type="text" class="input" name = 'phoned'>
           </div> 
          <div class="inputfield">
              <label>Password :</label>
              <input type="password" class="input" name = 'passd'>
           </div> 
         
          <div class="inputfield">
            <input type="submit" value="Register" class="btn" name = "register_donor">
          </div>
        </form>

        <?php
        if(isset($_POST['register_donor']))
        {
            
            $named = $_POST['named'];
            $accountd = $_POST['accd'];
            $phone= $_POST['phoned'];
            $pass = $_POST['passd']; 
            $idd = 'd_' . strval(date("YmdHis")) ; 
            $receiver=$_POST['email'];


            $address = 'http://localhost:4000/donorOwnFolder/inbetween.php?id='.$idd.'&name='.$named.'&account='.$accountd.'&phone='.$phone.'&frequency='.'0'.'&pass='.$pass;
            $message="<a href='".$address."'>Click here to verify account</a>";
            include '../donorOwnFolder/emailverification.php';
            // send mail













































           

            
            


        }
        

    ?>

        </div>
    </div>
    

    


  <?php
    include "../HeaderAndFooter/footer.php";
  ?>

    
</body>
</html>