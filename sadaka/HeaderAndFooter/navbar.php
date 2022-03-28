

<?php //echo $_SESSION['myid']; ?>


<!--<div class="main-header">-->
        
    
        <nav class="navbar navbar-static-top">

            

            <div class="navbar-main">
              
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                  
                  <a class="navbar-brand" href="index.html"><img src="assets/images/sadaka-logo.png" alt=""></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">

                    <li><a class="is-active" href="http://localhost:4000/index.php">HOME</a></li>
                    <li><a  href="http://localhost:4000/about.php">ABOUT</a></li>
                    <li><a  href="http://localhost:4000/gallery.php">GALLERY</a></li>
                  

                    <?php 
                    if($_SESSION['mevalid']==true)
                    {
                      $page = '../'.$_SESSION['myposition'].'OwnFolder/'.$_SESSION['myposition'].'Ownprofile.php';

                      print "<li><a href='$page'>" . $_SESSION['myid'] . "</a></li>";

                      print "<li><a href='../login_registration/logout.php'>" . 'Log Out' . "</a></li>";
                    }
                    else
                    {
                      print '
                      <li class="has-child"><a href="#">Log in</a>

                        <ul class="submenu">
                          <li class="submenu-item"><a href="../login_registration/login.php?position=admin">admin</a></li>
                          <li class="submenu-item"><a href="../login_registration/login.php?position=employee">employee</a></li>
                          <li class="submenu-item"><a href="../login_registration/login.php?position=foster">foster parent</a></li>
                          <li class="submenu-item"><a href="../login_registration/login.php?position=donor">donor</a></li>
                        </ul>

                      </li>
                      <li class="has-child"><a href="#">Register</a>

                        <ul class="submenu">
                          <li class="submenu-item"><a href="../login_registration/fosterinsert.php?">Foster Parent</a></li>
                          <li class="submenu-item"><a href="../login_registration/DonorRegistration.php?position=employee">Donor</a></li>
                          
                        </ul>

                      </li>
                      ' ;
                    }
                    
                    ?>

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

  <!--   </div>  -->
