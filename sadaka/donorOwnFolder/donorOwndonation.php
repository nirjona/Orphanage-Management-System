<?php
    session_start();
    if($_SESSION['mevalid']!=true)
    {
      header('Location: ../index.php');
    }
    include "../dbConnection/connection.php";
    $donor_id=$_GET['did'];
    //echo $donor_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Donation Form</title>
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
        height : 300px;
    }

</style>


<body>



    
  <?php
    include "../HeaderAndFooter/navbar.php";
    //echo $donor_id;
    $bolod=$donor_id;
    //echo $bolod."Nirjona";
    
  ?>

    <div class="wrapper">

        <div class="title">
            Donation Form
        </div>
        <div class="form">
            <form action = "donorOwndonation.php?did=<?php echo $bolod; ?>" method = "POST">
            <div class="inputfield">
              <label>Donation Amount : </label>
              <input type="text" class="input" name = 'amount'>
           </div>  
           <!-- <div class="inputfield">
              <label>Donation Date : </label>
              <input type="date" class="input" name = 'date'>
           </div>-->  
            <div class="inputfield">
              <label>Donation Phone :</label>
              <input type="text" class="input" name = 'phone'>
           </div> 
           <!--<div class="inputfield">
              <label>Donor Phone :</label>
              <input type="text" class="input" name = 'phoned'>
           </div>--> 
          <div class="inputfield">
           <select name="donationtype">
            <option value = "" placeholder="">Donation Type</option>
            <option value = Individual >Individual</option>
            <option value = Joint >Joint</option>
           </select>
           </div>
         
          <div class="inputfield">
            <input type="submit" value="Donate!" class="btn" name = "donate">
          </div>
        </form>

        <?php
        if(isset($_POST['donate']))
        {   $id='d'.strval(uniqid());
           // $donor_idd=$_GET['did'];
           // echo $donor_idd;
          // echo $bolod;


            $amount = $_POST['amount'];
            $donationdate=date("Y-m-d");
            $phone = $_POST['phone'];
            $donationtype=$_POST["donationtype"];
            $monthyear=strval(date("mY"));
            //$monthyear = "072021";

            $sql = "select * from ACCOUNTT where ACCOUNT_MONTH_YEAR='".$monthyear."'";
            $stid = oci_parse($connection, $sql);
            oci_execute($stid);   
            include "../countNumberOfRows.php";
            if($count_rows)
            {
              $update_account="update ACCOUNTT set TOTAL_EARNING=TOTAL_EARNING+".strval($amount)." ,PRINCIPAL_AMOUNT=PRINCIPAL_AMOUNT+".strval($amount)." where ACCOUNT_MONTH_YEAR='".$monthyear."'";
              echo $update_account;
              $commit1=oci_parse($connection,$update_account);
              oci_execute($commit1);
            }
            else
            {
              $premon = substr($monthyear,0,2);
              $preyear = substr($monthyear,2,4);
              $year = (int)$preyear;
              $ys = strval($year);
              $month = (int)$premon;$month--;
              $ms = strval($month);
              if($premon=='01')
              {
                $year-=1;
                $ys = strval($year);
                $ms = "12";
              }
              if(strlen($ms)==1)$ms = "0".$ms;
              $prmy = $ms . $ys ;

              $sql = "select * from ACCOUNTT where ACCOUNT_MONTH_YEAR='".$prmy."'";
              $stid = oci_parse($connection, $sql);
              oci_execute($stid);   
              $principal_amount = 0;
              include '../countNumberOfRows.php';
              echo $count_rows;echo $prmy;
              if($count_rows)
              {
                $stid = oci_parse($connection, $sql);
                oci_execute($stid);                                                  
                $row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
                $principal_amount = $row['PRINCIPAL_AMOUNT'];
              }
              $principal_amount += $amount;
              $attributes = "'$monthyear',$principal_amount,0,$amount" ;  
              $tablename = 'ACCOUNTT';
              include "../insertindata.php";
            }

            


            $attributes = " '$id','$amount',TO_DATE('$donationdate','YYYY-MM-DD'),'$phone','$donationtype','$monthyear' " ;  
            //echo $attributes ; 
            $tablename = 'DONATION';
           /* $_SESSION['mevalid'] = true;
            $_SESSION['myid'] = $idd;
            $_SESSION['myposition'] = 'donor';*/
            include "../insertindata.php";
            //echo $donor_id;
           /* $tablename="DONOR_DONATION";
            $attributes=" '$donor_id','$id' ";
            include "../insertindata.php";*/
           // echo " Abul".$donor_id;

              $update_donor="update DONOR set FREQUENCY=FREQUENCY+".'1' ." where DONOR_ID='".$donor_id."'";;
              echo $update_donor;
              $commit1=oci_parse($connection,$update_donor);
              oci_execute($commit1);

           


             $values=" '$bolod','$id')";
             $sqll="insert into DONOR_DONATION values(".$values;
             //echo " Abul".$sqll;
             $commit=oci_parse($connection,$sqll);

             oci_execute($commit);

            /*$url = '../donorOwnFolder/donorOwnProfile.php';
            print "<a href = '".$url."'> View Profile </a>";*/

            $url = 'http://localhost:4000/donorOwnFolder/donorOwnProfile.php';
            //$url = 'http://localhost:4000/index.php';
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