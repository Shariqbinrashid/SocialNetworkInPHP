<?php 


include_once('../config/config.php');

    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cities</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../public/css/styles.css" rel="stylesheet" />
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
     

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
                    <a class="nav-link nav-link-2" href="about.php">About us</a>
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
                    <a class="dropdown-item" href="">My Account</a>
                              <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="favourite.php">Favourites</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
        
        </div>
                    
                   
                </li>
<?php }    } 
else{ ?>              
                 <li class="nav-item">
                    <a class="nav-link nav-link-1" href="login.php">Login</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link nav-link-1" href="signup.php">Register</a>
                </li>
                <?php }?>
            </div>
        </div>
    </nav>

<?php } ?>
</header>
<div class="jumbotron"></div>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4"> 
                        <h1>Cities</h1>
                        <h2>Click on city to see details</h2>
                        <div class="cities">
                    <ul id="cities">              
<?php 

$query=mysqli_query($con,"Select * from geocities where GeoNameID= any (SELECT CityCode FROM travelimagedetails)");


while($result=mysqli_fetch_array($query))
{?>
                      <a href="<?php echo 'city-details.php?GeoID='.$result['GeoNameID'];?>">  <li> <?php echo $result["AsciiName"] ?></a>   </li>
<?php } ?>
</ul>  
</div>
                    </div>
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>
         <!-- Bootstrap core JavaScript -->
         <script src="../public/jquery/jquery.min.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>


    <!-- Additional custom Scripts -->
    <script src="../public/js/custom.js"></script>
    <script src="../public/js/owl.js"></script>
    <script src="../public/js/slick.js"></script>
    <script src="../public/js/isotope.js"></script>
    <script src="../public/js/accordions.js"></script>
    </body>
</html>
<?php  ?>