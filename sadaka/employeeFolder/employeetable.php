<?php
    session_start();
    include "../dbConnection/connection.php";
    
    if($_SESSION['myposition'] != 'admin')
    {
      header('Location: ../index.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Employee Query Table</title>
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


<body>

  
<?php
    include "../HeaderAndFooter/navbar.php";
?>
<form method="POST">
    <input type="radio" name="MyRadio" value="supervisor" id="supervisor" checked>Supervisor<br> 
    <input type="radio" name="MyRadio" value="employee" id="employee">Other
    <input type="submit" value = "View" name = "option" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
</form>

<?php
  $mode = 'supervisor';
  if(isset($_POST['option']))
  {
    $mode = $_POST['MyRadio'];
  }
?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Department</th>
      <th scope="col">Designation</th>
      <th scope="col">Joining Date</th>
      <th scope="col">Salary</th>
      <th scope="col">Years of working</th>
      <?php if($mode == 'supervisor'){?>
        <th scope="col">Number of children</th>
      <?php }?>
    </tr>
  </thead>
  <tbody>
    <?php
        $attributes = 'EMPLOYEE_ID,EMP_NAME,EMP_DEPARTMENT,EMP_DESIGNATION,EMP_JOINING_DATE,SALARY,YEARS_OF_WORKING';
        $condition = "";
        if($mode == 'supervisor')
        {
          $attributes.=',NO_OF_CHILD_SUPERVISION';
          $condition = ' IF_SUPERVISOR = 1';
        }
        else
        {
          $condition = ' IF_SUPERVISOR = 0';
        }
        $tablename = 'employee';
        
        include "../fetchandprintfromdata.php";
    ?>
  </tbody>
</table>

  
  
    <form action = "employeetable.php" method = "POST">
      <div class="form">
          <div class="inputfield">
              <label>employee id : </label>
              <input type="text" class="input" name = 'empid'>
          </div>
          <input type="submit" value = "Search" name = "queryid" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
          
        </div>
    </form>
    <a href = 'employeeinsert.php'><input type="submit" value = "insert" name = "insert" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;"></a> 
    


    <?php
    
        if(isset($_POST['queryid']) )
        {
            $inp_id = $_POST['empid'];
            $sql="select * from employee where EMPLOYEE_ID = '$inp_id'";  
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            include "../countNumOfRows.php" ;
            if($count_rows)
            {
              $sql="select * from employee where EMPLOYEE_ID = '$inp_id'";  
              $stid = oci_parse($connection, $sql);
              oci_execute($stid);   
              $stid = oci_parse($connection, $sql);
              oci_execute($stid); 
              $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;
              $uid= $row['EMPLOYEE_ID'];
              $uname= $row['EMP_NAME'];
              $udept= $row['EMP_DEPARTMENT'];
              $udes= $row['EMP_DESIGNATION'];
              $usal= $row['SALARY'];
              $uy= $row['YEARS_OF_WORKING'];
              $date = $row['EMP_JOINING_DATE'];
              $url = 'http://localhost:4000/employeeFolder/employeeprofile.php?id='.$uid.'&name='.$uname.'&department='.$udept.'&designation='.$udes.'&salary='.$usal.'&years_of_working='.$uy.'&date='.$date;
              if($row['IF_SUPERVISOR'])
              {
                $nocs = $row['NO_OF_CHILD_SUPERVISION'];
                $url.='&nocs='.$nocs;
              }
              $url.='&mode='.$row['IF_SUPERVISOR'];
              //$url = 'http://localhost:4000/employeeFolder/employeetable.php?id=$id';
              //$url = 'http://localhost:4000/index.php';
            //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
              echo '<script>window.location="'.$url.'"</script>';
              print "<a href = '".$url."'> View Profile </a>";
              
            }
            else
            {
               // echo '<h1>mofo</h1>';
            }


        }
        
    ?>






    <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>