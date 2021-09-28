

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel- Photo details</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/fontawesome.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="../public/css/owl.css">
    <link href="../public/css/bootstrap.css" rel="stylesheet">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

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
   <?php 
   include_once('../config/config.php');
   $val = $_GET['ImageID'];
   $ret= mysqli_query($con,"SELECT * FROM  travelimagedetails JOIN travelimage WHERE travelimagedetails.ImageID  = $val AND travelimage.ImageID = $val"); 
   $postName = mysqli_query($con,"Select  UserName,UID from traveluser where UID=(  SELECT UID FROM travelimage WHERE ImageID=$val)");
   
   foreach ($ret as $prod) {
   $country = mysqli_query($con,"Select  * from geocities where GeoNameID=(  SELECT CityCode FROM travelimagedetails WHERE ImageID=$val)");
   }
   $ImageRatings = mysqli_query($con,"SELECT Rating FROM travelimagerating WHERE ImageID=$val");
             
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

   ?>


<?php 
            foreach ($ret as $prod) {
            ?>
    <div class="jumbotron">
        <div class="container">
            <div class="container-fluid tm-container-content tm-mt-80 mt-5" >
                <div class="row mb-4">
                    <h2 class="col-12 tm-text-primary"><?php echo $prod['Title'];?></h2>
                </div>
                <div class="row tm-mb-90">            
                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                        <img src="../public/travel-images/large/<?php 
                                echo $prod['Path'];
                                ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="tm-bg-gray tm-video-details">
                                        
                            <div class="mb-4">


                            <?php foreach ($postName as $aa) {$username=$aa['UserName'];
                                $uuid=$aa["UID"];} ?>

                                
<strong>Posted by<a href="<?php echo 'user.php?UID='.$uuid;?>">  <h3 style="color:BLUE" > <?php echo $username?></strong></h3></a>
                                
                                <h4 class="tm-text-gray-dark mb-3"><strong>Description:</h4>

                                <p><?php echo $prod['Description'];?></p>
                                <h4 class="tm-text-gray-dark mb-3"><strong>City:</h4>
                                <?php foreach ($country as $aAa) { $city=  $aAa['AsciiName'];
                                $id= $aAa['GeoNameID'];
                                } ?>
                           <a href=" <?php echo 'city-details.php?GeoID='.$id;?>" > <p style="color:blue"> <?php echo $city?></p></a>    


                          



                           <h4 class="tm-text-gray-dark mb-3"><strong>Time Zone:</h4>
                           <p> <?php foreach ($country as $aAa) {echo $aAa['TimeZone'];}?></p>

                           <h4 class="tm-text-gray-dark mb-3"><strong>Over All Review</h4>
                           
                        
                               
                                <ul class="starscon">
                                    <?php    
                                     $k=0;  
                                      for($i=0;$i<$average;$i++){
                                        $k++;
                                    ?>  
                                
                                  <li><i class="fa fa-star" style="color: orange"></i></li>


                                <?php }?>  

                                <?php      
                                      for($i=0;$i<5-$k;$i++){
                                    
                                    ?>  
                                
                                  <li><i class="fa fa-star" style="color: black"></i></li>


                                <?php }?>  


                                </ul>
                                <span>Total Reviews (<?php echo $count ?>)</span>
                           
                            </div>

                            <?php 
      
      if (empty(isset($_SESSION['UID'])))  {
        ?>  <span>Login to post review and add to favorite</span>
         <?php
        } else{
            if (!empty(isset($_SESSION['UID']))) {
      ?>
 <span>Post Your  review</span>
 <form method="post" name="signup" >
<div class="rate">
<input type="radio" id="star5" name="star5" value="5" />
<label for="star5" title="text">5 stars</label>
<input type="radio" id="star4" name="star4" value="4" />
<label for="star4" title="text">4 stars</label>
<input type="radio" id="star3" name="star3" value="3" />
<label for="star3" title="text">3 stars</label>
<input type="radio" id="star2" name="star2" value="2" />
<label for="star2" title="text">2 stars</label>
<input type="radio" id="star1" name="star1" value="1" />
<label for="star1" title="text">1 star</label>
</div>
<button style="background-color: #f33f3f;" type="submit" class="btn btn-primary btn-block md5" name="submit">Submit your review</button>
</form>


<?php 

if(!in_array($val, $_SESSION['fav'])){
?>

<span>Add to favourtie</span>
 
<button onclick="checkff()" style="background-color: #f33f3f;" type="submit" class="btn btn-primary btn-block md5" name="submit"><i class="fa fa-heart"></i> Add to favuorite</button>



 <script type="text/javascript">
function checkff()
{
    alert("Added to favourite");
    <?php 

array_push($_SESSION['fav'],$val);


?>
location.reload();
}

</script>
<?php 

}
else{
?>

<span>Remove From favourtie</span>
 
 <button onclick="checkpasss()" style="background-color: #f33f3f;" type="submit" class="btn btn-primary btn-block md5" name="submit"><i class="fa fa-heart"></i> Remove</button>
 
 
 
  <script type="text/javascript">
 function checkpasss()
 {
     
     <?php 
if (($key = array_search($val, $_SESSION['fav'])) !== false) {
    

   unset($_SESSION['fav'][$key]);

 ?>
 alert("Removed favourite");
 location.reload();
 <?php } ?>
 }
 
 </script>
 <?php 
 
 }
 ?>

<?php 
require_once('../config/config.php');

//Code for review 
if(isset($_POST['submit']))
{
    $s1=$_POST['star1'] ?? '';
    $s2=$_POST['star2']?? '';
    $s3=$_POST['star3'] ?? '';
    $s4=$_POST['star4'] ?? '';
    $s5=$_POST['star5']?? '';
$value=0;
if($s1==1){
    $value=1;
}
if($s2==2){
    $value=2;
}
if($s3==3){
    $value=3;
}
if($s4==4){
    $value=4;
}
if($s5==5){
    $value=5;
}


$val = $_GET['ImageID'];

    $msg=mysqli_query($con,"insert into travelimagerating(ImageID,rATING) values('$val','$value')");

if($msg)
{
    echo "<script>alert('Review Posted');</script>";

}
else{
    echo "<script>alert('Error in database');</script>";

}
}
?>




      <?php }} ?>
                        
                        </div>   
                    </div>
                    
                </div>
            
            </div>
            <div class="col-12">
            <h4 class="tm-text-gray-dark mb-3"><strong>Map Location:</h4>
                    <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $prod['Latitude'];; ?>,<?php echo $prod['Longitude']; ?>&output=embed"></iframe>
                        </div>
        </div> 
    </div>
 <?php } ?>
  <?php include('../includes/footer.php') ?>
    
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
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