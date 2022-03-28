<?php
    session_start();
    include "../dbConnection/connection.php";
    
    if($_SESSION['myposition']=='admin' || $_SESSION['myposition']=='employee' || $_SESSION['myposition']=='foster')
    {
      if($_SESSION['myposition']=='employee')
      {
        $myid = $_SESSION['myid'];
        $sql="select IF_SUPERVISOR from employee where employee_id = '$myid'";  
        $stid = oci_parse($connection, $sql);
        oci_execute($stid);   
        $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;
        if($row['IF_SUPERVISOR']==0)
        {
          $url = 'http://localhost:4000/index.php';
          //$url = 'http://localhost:4000/childrenFolder/childrentable.php?id=$id';  
          echo '<script>window.location="'.$url.'"</script>';
          //print "Adoption Request Sent , Click <a href = 'childrentable.php?id=$id'> here </a> to get back";
          exit();
        }
      }
    }
    else
    {
      $url = 'http://localhost:4000/index.php';
      //$url = 'http://localhost:4000/childrenFolder/childrentable.php?id=$id';  
      echo '<script>window.location="'.$url.'"</script>';
      exit();
    }
    
    
    $url = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Children Information Table</title>
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
    <?php if($_SESSION['myposition']!='foster'){?>
    <input type="radio" name="MyRadio" value="adopted" id="adopted">Adopted<br> 
    <input type="radio" name="MyRadio" value="orphan" id="orphan" checked>Still Orphan
    <?php } ?>
    
  <table class="table table-hover"> 

    <tr>
    
    <td>
        
    </td>
    <td>
        <!--<form action="ChildrenInfo.php" method="post">-->  
        <input type="text" name="name" value = "" placeholder = "Filter by name">
        <!--</form>-->  
        <!--<input type="submit" name = "ad_id_btn">-->
    </td>
    <td>
        <!--<form action="ChildrenInfo.php" method="post">-->
        <input type="number" name="lwr_age" value = "" placeholder = "Lower bound of age">
        <input type="number" name="upr_age" value = "" placeholder = "Upper bound of age">
        <!--</form>-->
        <!--<input type="submit" name = "age_btn">-->
    </td>
    <td>
        
    </td>
    <td>
        <select name="formGender">
            <option value = "" placeholder="">Gender</option>
            <option value = MALE >Male</option>
            <option value = FEMALE >Female</option>
        </select>
    </td>
    <td>
        
    </td>
    <td>
        <!--<form action="ChildrenInfo.php" method="post">-->  
        <input type="text" name="inst" value = "" placeholder = "Filter by institution name">
        <!--</form>-->  
        <!--<input type="submit" name = "ad_id_btn">-->
    </td>
    <td>
        <!--<form action="ChildrenInfo.php" method="post">--> 
        <input type="number" name="lwr_cls" value = "" placeholder = "From">
        <input type="number" name="upr_cls" value = "" placeholder = "To">
        <!--</form>-->
        <!-- <input type="submit" name = "cls_btn">-->
    </td>
    <?php if($_SESSION['myposition'] != 'employee'){?>
      <td></td><td></td>

      <td>
        <input type="text" name="supid" value = "" placeholder = "Supervisor_ID">
      </td>
    <?php }?>
    <td>
    <input type="submit" value = "View" name = "option" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">

    </td>

    
  </tr>
</form>

  <?php
  $mode = 'orphan';
  if($_SESSION['myposition']!='foster' && isset($_POST['option']))
  {
    $mode = $_POST['MyRadio'];
  }
  ?>

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Bed_no</th>
      <th scope="col">Gender</th>
      <th scope="col">Health Condition</th>
      <th scope="col">Institution Name</th>
      <th scope="col">Class</th>
      <th scope="col">Nature</th>
      <th scope="col">Addressing Date</th>
      <?php if($_SESSION['myposition'] != 'employee'){?>
        <th scope="col">Supervisor</th>
      <?php }?>
      <?php if($mode == 'adopted'){?>
        <th scope="col">Adoption ID</th>
      <?php }?>
    </tr>
  </thead>


  <tbody>


  
    <?php
        $attributes = 'CHILD_ID,CHILD_NAME,CHILD_AGE,CHILD_BED_NO,CHILD_GENDER,CHILD_HEALTH_CONDITION,CHILD_INSTITUTION_NAME,CHILD_CLASS,CHILD_NATURE,ADDRESSING_DATE';
        $tablename = 'CHILDREN_INFORMATION';
        $condition = "";
        if($mode == 'adopted')
        {
          $attributes.=',ADOPTION_ID';
          $condition = ' ADOPTION_ID IS NOT NULL';
        }
        else
        {
          $condition = ' ADOPTION_ID IS NULL';
        }
        if($_SESSION['myposition']=='employee')
        {
          $condition .= " and EMPLOYEE_ID = "."'".$myid."'";
        }
        else
        {
          $attributes.=',EMPLOYEE_ID';
        }
        
        
        //echo '<br>wwwwwwwwwwww ' . $myid.'<br>';
        include "generalquery.php";
        include "../fetchandprintfromdata.php";
        //echo $sql ;
    ?>


  </tbody>
</table>

  
    

    <form action = "childrentable.php" method = "POST">
      <div class="form">
          <div class="inputfield">
              <label>child id : </label>
              <input type="text" class="input" name = 'empid'>
          </div>
          <input type="submit" value = "Search" name = "queryid" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
        </div>
    </form>
    <?php if($_SESSION['myposition'] == 'admin'){?>
      <a href = 'childreninsert.php' > insert </a>
      <!--<input type="submit" value = "insert"= style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;"> </a>-->
    <?php } ?>
    <?php if($_SESSION['myposition'] == 'admin'){?>
     <br> <a href = 'advancedquery.php' > Adoption Details </a>
      <!--<input type="submit" value = "insert"= style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;"> </a>-->
    <?php } ?>


    <?php
    
        if(isset($_POST['queryid']) )
        {
          $inp_id = $_POST['empid'];
          $sql="select * from children_information where CHILD_ID = '$inp_id'";
          if($_SESSION['myposition'] == 'employee')
          {
            $myempid = $_SESSION['myid'];
            $sql="select * from children_information where CHILD_ID = '$inp_id' and EMPLOYEE_ID = '$myempid' ";
          } 
          $stid = oci_parse($connection, $sql);
          oci_execute($stid);   
          include "countNumOfRows.php";
          
          if($count_rows)
          {
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;
            

            $uid= $row['CHILD_ID'];
            $uname= $row['CHILD_NAME'];
            $uage= $row['CHILD_AGE'];
            $ubed= $row['CHILD_BED_NO'];
            $ugen= $row['CHILD_GENDER'];
            $uhc= $row['CHILD_HEALTH_CONDITION'];
            $ui = $row['CHILD_INSTITUTION_NAME'];
            $ucls = $row['CHILD_CLASS'];
            $unat = $row['CHILD_NATURE'];
            $uaddr = $row['ADDRESSING_DATE'];
            $uem = $row['EMPLOYEE_ID'];
            $uadpt = $row['ADOPTION_ID'];
            $url = 'http://localhost:4000/childrenFolder/childrenprofile.php?id='.$uid.'&name='.$uname.'&age='.$uage.'&bed='.$ubed.'&gender='.$ugen.'&health='.$uhc.'&institute='.$ui.'&class='.$ucls.'&nature='.$unat.'&address='.$uaddr.'&institute='.$ui.'&empid='.$uem.'&adptid='.$uadpt;
            //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
            echo '<script>window.location="'.$url.'"</script>';
            //$hu = "'".'Location: '.$url."'";
            //ob_start();
            //header($hu);
            //ob_end_flush();

            //print "<a href = '".$url."'> View Profile </a>";

          }            
          else
          {
              echo '<script>alert("No Data found")</script>';
          }


        }
        
    ?>
  





    <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>