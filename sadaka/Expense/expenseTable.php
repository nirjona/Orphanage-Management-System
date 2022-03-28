<?php
    session_start();
    include "../dbConnection/connection.php";
    
    if(!($_SESSION['myposition']=='admin' || $_SESSION['myposition']=='employee' ))
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
  <title>Expenses</title>
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
    Expense type :
    <select name="expense_type">
        <option value = STATIONARY >Stationary</option>
        <option value = FOOD >Food</option>
        <option value = MEDICINE >Medicine</option>
        <option value = CLOTHES >Cloth</option>
        <option value = EDUCATION >Education</option>
        <option value = EMPLOYEE_SALARY >Employee's Salary</option>
        <option value = EXTRA_EXPENSES >Others Expenses</option>
    </select>
  <table class="table table-hover"> 

    <tr>
    
    <td>
        <!--<form action="ChildrenInfo.php" method="post">--> 
        <input type="date" name="lwr_date" value = "" placeholder = "From">
        <input type="date" name="upr_date" value = "" placeholder = "To">
        <!--</form>-->
        <!-- <input type="submit" name = "cls_btn">-->
    </td>
    <td>
        <input type="submit" value = "View" name = "option" value="Input Button" style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
    </td>
    
  </tr>
</form>
<?php 
  if(isset($_POST['option']))
  {
    $mode = $_POST['expense_type']; 
  }
  else
  {
    $mode = $_SESSION['expense_type']; 
  }


?>

  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col"><?php echo $mode;?></th>
    </tr>
  </thead>


  <tbody>


  
    <?php
        $attributes = 'EXPENSE_DATE,'.$mode;
        $tablename = 'EXPENSE';
        $condition = "";
        
        $condition = $mode . ' IS NOT NULL';

        include "generalquery.php";
        include "../fetchandprintfromdata.php";
        //echo $sql ;
    ?>


  </tbody>
</table>

  
    

    
    <?php if($_SESSION['myposition'] == 'admin') {?>
      <a href = 'expenses_accessed_by_admin.php' > insert </a>
      <!--<input type="submit" value = "insert"= style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;"> </a>-->
    <?php } ?>

    <?php if($_SESSION['myposition'] == 'employee') {?>
      <a href = 'dailyexpenseentry.php' > insert </a>
      <!--<input type="submit" value = "insert"= style = "background-color: #1F45FC;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;"> </a>-->
    <?php } ?>


    




    <?php
    include "../HeaderAndFooter/footer.php";

  ?>
    
</body>
</html>