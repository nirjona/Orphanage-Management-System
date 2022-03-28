<?php
    session_start();
    if($_SESSION['myposition'] != 'admin')
    {
      $url = 'http://localhost:4000/index.php';
      //$url = 'childrentable.php?id='.$id;              
      echo '<script>window.location="'.$url.'"</script>';
    }
    include "../dbConnection/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Child addressing Form</title>
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
        height : 800px;
    }

</style>


<body>



    
  <?php
    include "../HeaderAndFooter/navbar.php";
  ?>

    <div class="wrapper">

        <div class="title">
           Child addressing Form
        </div>
        <div class="form">
            <form action = "childreninsert.php" method = "POST">
            <div class="inputfield">
              <label>Child Name : </label>
              <input type="text" class="input" name = 'name'>
           </div>  
            <div class="inputfield">
              <label>Child Age :</label>
              <input type="number" class="input" name = 'age'>
           </div> 
           <div class="inputfield">
              <label>Bed no :</label>
              <input type="text" class="input" name = 'bed_no'>
           </div> 
          <div class="inputfield">
              <label>Gender :</label>
              <input type="text" class="input" name = 'gender'>
           </div> 
          <div class="inputfield">
              <label>Health Condition :</label>
              <input type="text" class="input" name = 'hc'>
           </div> 
           <div class="inputfield">
              <label>Institution :</label>
              <input type="text" class="input" name = 'ins'>
           </div> 
           <div class="inputfield">
            <label>Class : </label>
            <input type="number" class="input" name = 'class'>
           </div> 
          <div class="inputfield">
              <label>Nature</label>
              <input type="text" class="input" name = 'nature'>
           </div>
           <div class="inputfield">
              <label>Addressing Date</label>
              <input type="date" class="input" name = 'addr'>
           </div>
           <div class="inputfield">
              <label>Supervisor</label>
              <input type="text" class="input" name = 'emid'>
           </div>
           

          <div class="inputfield">
            <input type="submit" value="Register" class="btn" name = "register_child">
          </div>
        </form>

        <?php
        if(isset($_POST['register_child']))
        {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $bed_no = $_POST['bed_no'];
            $gender = $_POST['gender']; 
            $hc = $_POST['hc']; 
            $ins = $_POST['ins']; 
            $class = $_POST['class']; 
            $nature = $_POST['nature'];
            $date = $_POST['addr'];
            $emid = $_POST['emid'];

            $sql="select * from EMPLOYEE where EMPLOYEE_ID = '$emid' and IF_SUPERVISOR = 1 ";  
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            include "../countNumberOfrows.php";
            if($count_rows)
            {
              $sql="select * from EMPLOYEE where EMPLOYEE_ID = '$emid' and IF_SUPERVISOR = 1 ";  
              $stid = oci_parse($connection, $sql);
              oci_execute($stid);   
                $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
                $curC =  $row['NO_OF_CHILD_SUPERVISION'];
                $curC= $curC+1;

                

                $id = 'ch_' . strval(date("YmdHis")) ; 

                $sql = "UPDATE EMPLOYEE

                SET NO_OF_CHILD_SUPERVISION = $curC

                WHERE EMPLOYEE_ID = '$emid' ";

                echo $sql ; 

                $stid = oci_parse($connection, $sql);
                oci_execute($stid);


                echo $row['EMPLOYEE_ID'] . " name " . $row['EMP_NAME'] . "  has " . $row['NO_OF_CHILD_SUPERVISION'] . " children under supervision" ;

                //echo $date ; 
                $attributes = "'$id','$name',$age,'$bed_no','$gender','$hc','$ins',$class,'$nature',TO_DATE('$date', 'YYYY-MM-DD') , '$emid',''" ;  
                //echo $attributes ; 
                $tablename = 'CHILDREN_INFORMATION';

                $sql = "declare begin create_person('$id','$name',$age,'$bed_no','$gender','$hc','$ins',$class,'$nature',TO_DATE('$date', 'YYYY-MM-DD') , '$emid','') ; end ; ";
                echo $sql ;
 
                $result=oci_parse($connection,$sql);

                oci_execute($result);


                //include "../insertindata.php";

                $url = 'http://localhost:4000/childrenFolder/childrentable.php';

                //$url = 'childrentable.php?id='.$id;              
                echo '<script>window.location="'.$url.'"</script>';

                //print "<a href = 'childrentable.php'>back</a> ";
            }
            else
            {
                echo '<script>alert("Supervisor ID Doesnt exist")</script>';
            }
        }
        

    ?>

        </div>
    </div>
    

    


  <?php
    include "../HeaderAndFooter/footer.php";
  ?>

    
</body>
</html>