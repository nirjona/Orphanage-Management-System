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
  <title>Children Information</title>
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
      <th scope="col">Foster NID</th>
      <th scope="col">fathers name</th>
      <th scope="col">Mothers Name</th>
      <th scope="col">Phone no</th>
      <th scope="col">Child ID</th>
      <th scope="col">Child Name</th>
      <th scope="col">Adoption ID</th>
      
    </tr>
  </thead>


  <tbody>


  
    <?php
  
        $sql = "select foster_NID, foster_father,foster_mother, foster_phone,child_id, child_name, adoption_id 
        from adoption join foster_parents using(foster_NID)
         join children_information using(adoption_id)";

         $stid = oci_parse($connection, $sql);
         oci_execute($stid);                                                  
            $count_rows=0;                                                        //this variable is used to count the number of rows
            while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) 
            {
                print '<tr>';
                foreach ($row as $item) 
                {
                
                        print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                }
                print '</tr>';
                    $count_rows++;
            }
      
       oci_close($connection);
    
    ?>


  </tbody>
</table>

  
    

<a href = 'childrentable.php' > Back </a>


    <?php
        $url = 'http://localhost:4000/childrenFolder/childrentable.php?id=$id';
       // echo '<script>window.location="'.$url.'"</script>';
            
    ?>
  





    <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>