

    <header class="">
 <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand" href="~/index.php'"><h2>Travel<em>OO</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 " aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="pages/about.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="pages/contact.php">Contact us</a>
                </li>

                <li class="nav-item">
                <form action="pages/search.php">
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
                    <a class="dropdown-item" href="pages/myaccount.php">My Account</a>
                              <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages/favourite.php">Favourites</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages/logout.php">Logout</a>
        
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