<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Your Travel Guide">
    <meta name="author" content="">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Travel-About</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../public/css/fontawesome.css">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="../public/css/owl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>
  

    

    <header class="">
 <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand" href="../index.php"><h2>Travel<em>OO</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 " aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="contact.php">Contact us</a>
                </li>

                <li class="nav-item">
                <form action="search.php">
                    <input class=".earch-container" type="text" placeholder="Search.." name="search">
                    <button id="search" type="submit"><i class="fa fa-search"></i></button>
                </form>
                </li>
                
               
<?php session_start();


include_once($_SERVER['DOCUMENT_ROOT'].'/TravelWebsite/config/config.php');
if (isset($_SESSION['UID']) && strlen($_SESSION['UID']==0)) {
  header('location:helpers/logout.php'); ?>

<?php  } else{
    
?>

<?php 
if (!empty(isset($_SESSION['UID']))) {
 
 
  
 
$userid=$_SESSION['UID'];
$query=mysqli_query($con,"SELECT traveluser.*, traveluserdetails.* FROM traveluser JOIN traveluserdetails WHERE traveluser.UID='$userid' AND traveluserdetails.UID='$userid'");
while($result=mysqli_fetch_array($query))
{?>  

                <li class="nav-item dropdown ">
                   
                   
                
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $result['FirstName'].' '.$result['LastName']; ?>
        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="myaccount.php">My Account</a>
                              <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="favourite.php">Favourites</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
        
        </div>
                    
                   
                </li>
<?php }    } 
else{ ?>              
                 <li class="nav-item">
                    <a class="nav-link nav-link-1" href="pages/login.php">Login</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link nav-link-1" href="pages/signup.php">Register</a>
                </li>
                <?php }?>
            </div>
        </div>
    </nav>

<?php } ?>
</header>

   
      
 <!-- Page Content -->
<div class="jumbotron"></div>
    <div class=" container-fluid tm-mt-80  header-text">
<h2 class="text-center" >About Project</h2>

      


      
    </div>
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Project made by </h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_01.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Shariq bin Rashid</h4>
             
              </div>
            </div>
          </div>
          
          
    </div>


   






    <?php include('../includes/footer.php'); ?>


    <!-- Bootstrap core JavaScript -->
    <script src="../public/jquery/jquery.min.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>


    <!-- Additional custom Scripts -->
    <script src="../public/js/custom.js"></script>
    <script src="../public/js/owl.js"></script>
    <script src="../public/js/slick.js"></script>
    <script src="../public/js/isotope.js"></script>
    <script src="../public/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; 
      function clearField(t){                  
      if(! cleared[t.id]){                     
          cleared[t.id] = 1; 
          t.value='';         
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
