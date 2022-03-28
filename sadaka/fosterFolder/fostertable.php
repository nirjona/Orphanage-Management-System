<?php
    session_start();
    include "../dbConnection/connection.php";
    
    if($_SESSION['myposition'] != 'admin')
    {
      $url = 'http://localhost:4000/index.php';
      //$url = 'http://localhost:4000/index.php';
    //$hu = "http://localhost:4000" . "/childrenFolder/" . $url;
      echo '<script>window.location="'.$url.'"</script>';
    }
    $url = 'ni';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Foster Parent Information</title>
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
      <th scope="col">FOSTER NID</th>
      <th scope="col">FOSTER FATHER NAME</th>
      <th scope="col">FOSTER MOTHER NAME</th>
      <th scope="col">FOSTER PHONE NO</th>
      <th scope="col">FOSTER ADDRESS</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
        $attributes = 'FOSTER_NID,FOSTER_FATHER,FOSTER_MOTHER,FOSTER_PHONE,FOSTER_ADDRESS';
        $tablename = 'Foster_Parents';
        $condition = "";
        include "../fetchandprintfromdata.php";
    ?>
  </tbody>
</table>

  
  
    <form action = "fostertable.php" method = "POST">
      <div class="form">
          <div class="inputfield">
              <label>Foster NID : </label>
              <input type="text" class="input" name = 'fosternid'>
          </div>
          <input type="submit" value = "Search" name = "queryid" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
          
        </div>
    </form>
    


    <?php
    
        if(isset($_POST['queryid']) )
        {
            $inp_id = $_POST['fosternid'];
            $sql="select * from Foster_Parents where FOSTER_NID = '$inp_id'";  
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            include "../countNumOfRows.php";
            
            if($count_rows)
            {
              $stid = oci_parse($connection, $sql);
              oci_execute($stid);   
              $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)    ;
              $unid= $row['FOSTER_NID'];
              $fname= $row['FOSTER_FATHER'];
              $mname= $row['FOSTER_MOTHER'];
              $fphn= $row['FOSTER_PHONE'];
              $fadrs= $row['FOSTER_ADDRESS'];
             
              $url = 'http://localhost:4000/fosterFolder/fosterprofile.php?fnid='.$unid.'&fname='.$fname.'&mname='.$mname.'&fphone='.$fphn.'&faddress='.$fadrs;
              echo '<script>window.location="'.$url.'"</script>';
              //echo $url;
              //$headerurl = "'".'Location:'.$url."'";
              //header_remove(); 
              //header($headerurl);

            }
            
            else
            {
                echo '<h1>mofo</h1>';
            }


        }
        
    ?>




<br>
<br>

    <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>