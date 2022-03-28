<?php
    session_start();
    if($_SESSION['myposition']!='admin')
    {

    $url = 'http://localhost:4000/index.php';
    echo '<script>window.location="'.$url.'"</script>';

    }
    //$url = 'http://localhost:4000/employeeFolder/employeetable.php';
    //$url = 'http://localhost:4000/index.php';
  //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
    //echo '<script>window.location="'.$url.'"</script>';
    
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
        height : 600px;
    }

</style>


<body>



    
  <?php
    include "../HeaderAndFooter/navbar.php";
  ?>

    <div class="wrapper">

        <div class="title">
          Employee registration Form
        </div>
        <div class="form">
            <form action = "employeeinsert.php" method = "POST">
            <div class="inputfield">
              <label>Employee Name : </label>
              <input type="text" class="input" name = 'name'>
           </div>  
            <div class="inputfield">
              <label>Employee Department :</label>
              <input type="text" class="input" name = 'department'>
           </div> 
           <div class="inputfield">
              <label>Employee Designation :</label>
              <input type="text" class="input" name = 'designation'>
           </div> 
          <div class="inputfield">
              <label>Employee Joining Date :</label>
              <input type="date" class="input" name = 'date'>
           </div> 
          <div class="inputfield">
              <label>Salary :</label>
              <input type="text" class="input" name = 'salary'>
           </div> 
           <div class="inputfield">
            <label>Years Of Working : </label>
            <input type="text" class="input" name = 'y_o_w'>
           </div> 
          <div class="inputfield">
              <label>Password</label>
              <input type="password" class="input" name = 'password'>
           </div>
           <div class="inputfield">
              <label>Employee Type </label>
              <input type="radio" name="MyRadio" value=1 id="supervisor" checked>Supervisor<br> 
              <input type="radio" name="MyRadio" value=0 id="employee">Other
           </div>  
           

          <div class="inputfield">
            <input type="submit" value="Register" class="btn" name = "register_employee">
          </div>
        </form>

        <?php
        if(isset($_POST['register_employee']))
        {
          $name = $_POST['name'];
          $department = $_POST['department'];
          $designation = $_POST['designation'];
          $date = $_POST['date']; 
          $salary = $_POST['salary']; if(strlen($salary)==0) $salary = '0';
          $y_o_w = $_POST['y_o_w']; if(strlen($y_o_w)==0) $y_o_w = '0';
          $password = $_POST['password'];
          $mode = $_POST['MyRadio'];
          echo $mode;

          $id = 'e' . strval(date("YmdHis")) ; 

          //echo $date ; 
          $attributes = "'$id' , '$name','$department','$designation',TO_DATE('$date', 'YYYY-MM-DD') , $salary , $y_o_w , '$password' , $mode , 0 " ;  
          //echo $attributes ; 
          $tablename = 'employee';
          include "../insertindata.php";

          $url = 'http://localhost:4000/employeeFolder/employeetable.php?id=$id';
          //$url = 'http://localhost:4000/index.php';
        //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
          echo '<script>window.location="'.$url.'"</script>';
          //print "<a href = 'employeetable.php'>back</a> ";
        }
        

    ?>

        </div>
    </div>
    

    


  <?php
    include "../HeaderAndFooter/footer.php";
  ?>

    
</body>
</html>