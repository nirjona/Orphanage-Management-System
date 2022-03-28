
<?php
    session_start();
    $position = $_GET['position'];
   // echo $position;
    include "../dbConnection/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Log in</title>
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
  .wrapper
  {
    height : 200px;
  }
</style>



<body>


    
  <?php
    include "../HeaderAndFooter/navbar.php";
  ?>

    <div class="wrapper">
        <div class="title">
          Log in form
        </div>

          <form method="POST">
            <div class="inputfield">
              <label>UserId</label>
              <input type="text" class="input" name = 'id'>
            </div>  
            
           <div class="inputfield">
              <label>Password</label>
              <input type="password" class="input" name = 'password'>
           </div> 
          
          <div class="inputfield">
            <input type="submit" value="Login" class="btn" name = "login">
          </div>
        </form>
        <?php
          $sqlID = '';
          $sqlPass = '';
          if(isset($_POST['login']))
          {
            $id = $_POST['id'];
            $pass = $_POST['password'];
            
            $page = $position.'OwnFolder/'.$position.'Ownprofile.php';
            
            if($position == 'admin')
            {
                $sqlID = 'ADMIN_ID';
                $sqlPass = 'ADMIN_PASSWORD';
            }
            if($position == 'employee')
            {
                $sqlID = 'EMPLOYEE_ID';
                $sqlPass = 'EMPLOYEE_PASSWORD';
            }
            if($position == 'donor')
            {
                $sqlID = 'DONOR_ID';
                $sqlPass = 'DONOR_PASSWORD';
            }
            if($position == 'foster')
            {
                $sqlID = 'FOSTER_NID';
                $sqlPass = 'FOSTER_PASSWORD';
                $sql = "select $sqlID , $sqlPass from foster_parents where $sqlID = '$id' and $sqlPass = '$pass'" ;
            }
            else
            {
              $sql = "select $sqlID , $sqlPass from $position where $sqlID = '$id' and $sqlPass = '$pass'" ;
              if($position == 'donor')
              {
                  $sql = "select * from $position where $sqlID = '$id' and $sqlPass = '$pass'" ;
              }
            }
            include 'validitycheck.php' ;
          }



        ?>



    </div>
    

  <?php
    include "../HeaderAndFooter/footer.php";
  ?>

    
</body>
</html>