<?php
    session_start();
    include "../dbConnection/connection.php";
    
    if($_SESSION['myposition'] != 'admin')
    {
      $url = 'http://localhost:4000/index.php';
      //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
      echo '<script>window.location="'.$url.'"</script>';
    }
    $url = 'nihon';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Donors Information</title>
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


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Donar Id</th>
      <th scope="col">Donar Name</th>
      <th scope="col">Donar Account</th>
      <th scope="col">Donar Phone</th>
      <th scope="col">Frequency Of Donation</th>
     <!-- <th scope="col">Salary</th>
      <th scope="col">Years of working</th>-->
    </tr>
  </thead>
  <tbody>
    <?php
        $attributes = 'DONOR_ID,DONOR_NAME,DONOR_ACCOUNT,DONOR_PHONE,FREQUENCY';
        $tablename = 'DONOR';
        $condition = "";
        include "../fetchandprintfromdata.php";
    ?>
  </tbody>
</table>

  
  
    <form action = "donortable.php" method = "POST">
      <div class="form">
          <div class="inputfield">
              <label>Donor id : </label>
              <input type="text" class="input" name = 'donorid'>
          </div>
          <input type="submit" value = "Search" name = "dqueryid" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
          
        </div>
    </form>
    


    <?php
    
        if(isset($_POST['dqueryid']) )
        {
         if(isset($_POST['donorid']))
            {$inp_id = $_POST['donorid'];
             $sql="select * from DONOR where DONOR_ID = '$inp_id'";  
             $stid = oci_parse($connection, $sql);
             oci_execute($stid);   
             include "../countNumberOfRows.php";

            if($count_rows)
            {
              $sql="select * from DONOR where DONOR_ID = '$inp_id'";  
              $stid = oci_parse($connection, $sql);
              oci_execute($stid);   
              $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;
              $did=$row['DONOR_ID'];
             // echo $did;
              $dname=$row['DONOR_NAME'];
              //echo $dname;
              $dphn=$row['DONOR_PHONE'];
              $dacc=$row['DONOR_ACCOUNT'];
              $dfreq=$row['FREQUENCY'];
              
              $url = 'http://localhost:4000/donorfolder/donorprofile.php?did='.$did.'&dname='.$dname.'&daccount='.$dacc.'&dphone='.$dphn.'&dfrequency='.$dfreq;
            //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
              echo '<script>window.location="'.$url.'"</script>';
                            
              //print "<a href = '".$urll."'> View Donor Profile </a>";
              //echo $url;
              //$headerurl = "'".'Location:'.$url."'";
              //header_remove(); 
              //header($headerurl);

            }
            
            else
            {
                echo '<script>alert("No such result!")</script>';
            }
         }
         else 
         {
            echo '<script>alert("Please Enter the Donor Id!")</script>';
         }


        }
        
    ?>






    <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>