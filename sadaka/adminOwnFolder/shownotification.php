<?php
    session_start();
    include "../dbConnection/connection.php";
    
    if($_SESSION['myposition'] != 'admin')
    {
      $url = "http://localhost:4000/index.php";
      echo '<script>window.location="'.$url.'"</script>';
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ADOPTION REQUEST</title>
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
      <th scope="col">REQUEST_ID</th>
      <th scope="col">FOSTER_NID</th>
      <th scope="col">CHILD_ID</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $attributes = 'REQUEST_ID,FOSTER_NID,CHILD_ID';
        $condition = "";

        $tablename = 'FOSTER_REQUEST';
        
        include "../fetchandprintfromdata.php";
    ?>
  </tbody>
</table>

  
  
    <form action = "shownotification.php" method = "POST">
      <div class="form">
          <div class="inputfield">
              <label>Request id : </label>
              <input type="text" class="input" name = 'requested'>
          </div>
          <input type="submit" value = "Search" name = "queryid" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
          
        </div>
    </form>
    


    <?php
    
        if(isset($_POST['queryid']) )
        {
            $inp_id = $_POST['requested'];
            $sql="select * from foster_request where REQUEST_ID = '$inp_id'";  
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            
            include "../countNumOfRows.php" ;
            if(oci_num_rows($stid)+1)
            {
              $sql="select * from foster_request where REQUEST_ID = '$inp_id'";  
              $stid = oci_parse($connection, $sql);
              oci_execute($stid);   
              
              $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
              
              $rid= $row['REQUEST_ID'];
              $foster= $row['FOSTER_NID'];
              $child= $row['CHILD_ID'];
              $url = 'http://localhost:4000/adminOwnFolder/confirmation.php?rid='.$rid.'&foster='.$foster.'&child='.$child;
              echo '<script>window.location="'.$url.'"</script>';

              //print "<a href = '".$url."'> View Details </a>";
            }
            else
            {
                echo '<h1>mofo</h1>';
            }


        }
        
    ?>






    <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>