<?php



if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Your Travel Guide">
    <meta name="author" content="">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Travel- Faourites</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../public/css/fontawesome.css">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="../public/css/owl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>



    <!-- Header -->
    

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
                
               
<?php  


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
                    <a class="dropdown-item" href="">Favourites</a>
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
    <!-- Page Content -->
   
    <!-- Banner Ends Here -->
<?php 


include_once('../config/config.php');




?>


 <div class="products">
      <div class="container">
      <h1>Your Favourite Images </h1>
        <div class="row">
          <div class="col-md-12">
           
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
        
    <!-- ALL-->
  
                <?php
                $ret= mysqli_query($con,"SELECT * FROM travelimagedetails ");
                          foreach ($ret as $value) { 
                              $img = $value['ImageID'];
                  $ImageIDref = mysqli_query($con,"SELECT * FROM travelimage WHERE ImageID=$img");
                  $postName = mysqli_query($con,"Select  UserName from traveluser where UID=(  SELECT UID FROM travelimage WHERE ImageID=$img)");
               
                  $ImageRatings = mysqli_query($con,"SELECT Rating FROM travelimagerating WHERE ImageID=$img");
                
                             
                  $sum=0;
                 $count=0;
                 $average =0;
                  foreach ($ImageRatings as $A) {
                    $count++;
                    $sum =$sum+$A['Rating'];
                  
                  }
                  if($count==0){

                  }
                  else{
                    $average =$sum/$count; 
                  }
                 

                  if(in_array($img, $_SESSION['fav'])){


                  
                  ?>
            
                          <div class="col-lg-4 col-md-4 all yay "  >
                            <div class="product-item">
                              <a href="<?php echo 'photo-details.php?ImageID='.$value['ImageID'];?>"> <img src="../public/travel-images/large/<?php foreach ($ImageIDref as $immg) {echo $immg['Path']; }  ?>" alt="Image" class="img-fluid"></a>
                              <div class="down-content">
                                <a href="<?php echo 'photo-details.php?ImageID='.$value['ImageID'];?>"><h4><?php echo $value['Title']; ?></h4></a>
                               
                                <p><?php echo $value['Description']; ?></p>
                                <p style="color:black" ><strong>Posted by <?php foreach ($postName as $aa) {echo $aa['UserName'];}?></strong></p>
                                <ul class="stars">
                                    <?php    
                                     $k=0;  
                                      for($i=0;$i<$average;$i++){
                                        $k++;
                                    ?>  
                                
                                  <li><i class="fa fa-star"></i></li>


                                <?php }?>  

                                <?php      
                                      for($i=0;$i<5-$k;$i++){
                                    
                                    ?>  
                                
                                  <li><i class="fa fa-star" style="color: black"></i></li>


                                <?php }?>  


                                </ul>
                                <span>Reviews (<?php echo $count ?>)</span>
                              </div>
                            </div>
                          </div>


                  <?php } }?>  







                    
                   
                </div>
            </div>
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
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
