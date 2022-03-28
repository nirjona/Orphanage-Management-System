<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  i<title>Children Information</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

  <!-- Bootsrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Font awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <!-- Owl carousel -->
  <link rel="stylesheet" href="assets/css/owl.carousel.css">

  <!-- Template main Css -->
  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="assets/css/formstyle.css">
  
  <!-- Modernizr -->
  <script src="assets/js/modernizr-2.6.2.min.js"></script>

</head>


<body>



    
  <?php
    include "./HeaderAndFooter/navbar.php";
  ?>

    <div class="wrapper">
        <div class="title">
          Children Registration Form
        </div>
        <div class="form">
            <div class="inputfield">
              <label>Child Name</label>
              <input type="text" class="input">
           </div>  
            <div class="inputfield">
              <label>Gender</label>
              <div class="custom_select">
                <select>
                  <option value="">Select</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
           </div> 
           <div class="inputfield">
              <label>Age</label>
              <input type="text" class="input">
           </div> 
          <div class="inputfield">
              <label>Bed No</label>
              <input type="text" class="input">
           </div> 
          <div class="inputfield">
              <label>Health Condition</label>
              <input type="text" class="input">
           </div> 
           <div class="inputfield">
            <label>Nature</label>
            <input type="text" class="input">
         </div> 
          <div class="inputfield">
              <label>Institute</label>
              <input type="text" class="input">
           </div> 

           <div class="inputfield">
            <label>Class</label>
            <input type="text" class="input">
         </div> 
         <div class="inputfield">
            <label>Addressing Date</label>
            <input type="date" class="input">
         </div> 
           
          <div class="inputfield">
            <input type="submit" value="Register" class="btn" name = "register_child">
          </div>
        </div>
    </div>
    

  <?php
    include "./HeaderAndFooter/footer.php";
  ?>

    
</body>
</html>