<?php
    session_start();
    if($_SESSION['myposition']!='employee' )
    {
      header('Location: ../index.php');
    }
    include "../dbConnection/connection.php";
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Expense Entry Form</title>
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
            Donation Form
        </div>
        <div class="form">
            <form action = "dailyexpenseentry.php" method = "POST">
            
            <div class="inputfield">
           <select name="expense_type">
            <option value = "" placeholder="">Expense Fields</option>
            <option value = STATIONARY >Stationary</option>
            <option value = FOOD >Food</option>
            <option value = MEDICINE >Medicine</option>
            <option value = CLOTHES >Cloth</option>
            <option value = EDUCATION >Education</option>
            <option value = EXTRA_EXPENSES >Others Expenses</option>
           </select>
           </div>


            <div class="inputfield">
              <label>Amount : </label>
              <input type="text" class="input" name = 'amount'>
           </div>  
           <div class="inputfield">
            <input type="submit" value="Add Expense" class="btn" name = "addexpense">
          </div>
          <div class="inputfield">
            <input type="submit" value="BACK" class="btn" name = "BACK">
          </div>
        </form>

        <?php
        if(isset($_POST['addexpense']))
        {
            include 'adding_expense.php';
        }
        if(isset($_POST['BACK']))
        {   
            include 'adding_expense.php';
            $url = 'http://localhost:4000/Expense/expenseTable.php';
            echo '<script>window.location="'.$url.'"</script>';

        }
        

    ?>

        </div>
    </div>
    

    


  <?php
    include "../HeaderAndFooter/footer.php";
  ?>

    
</body>
</html>