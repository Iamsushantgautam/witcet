<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
     <!-- CSS -->
     <link rel="stylesheet" href="css/nav.css" />
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="js/nav.js" defer></script>
   
    <title>Profile</title>
</head>
<body>

 <!--nav start-->
 
 <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="home.php" class="logo"><img src="images/navlogo.png" alt="img"></a>

      <ul class="nav-links">
    <i class="uil uil-times navCloseBtn"></i>
  <li><a class="nav-a"href="home.php">Home</a></li>
 <li><a class="nav-a" style="color:red;" href="profile.php">Profile</a></li>
 <li><a class="nav-a"href="p/syllabus.html"> syllabus </a></li>
 <li><a class="nav-a"href="p/library.html"> library </a></li>
 <li><a class="nav-a"href="p/notes.html"> Notes </a></li>
 <li><a class="nav-a"href="p/about.html">About Us</a></li>
 <li><a class="nav-a"href="p/contact.html">Contact Us</a></li>
      </ul>

      <i class="uil uil-search search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Search here..." />
      </div>
    </nav><br><br>
    <!-- nav end -->
    


   
<div class="">
       

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
               
                $res_id = $result['Id'];
            }
                      
            ?>

        </div>
    </div>
    

    

    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
           
          </div>

          

          </div>
       </div>

    </main>

<center>
    <?php 
 echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
 ?>
 &nbsp  &nbsp
<a href="php/logout.php"> <button class="btn"> Log Out</button> </a>
</center>

<br><br><br><br><br><br><br><br><br><br><br><br>
 <!-- footer start -->
 <br>
    <footer class="footer">
    <a href="p/about.html" style="color:white;"> <span> About  <span> <a href="p/contact.html" style="color:white;"> &nbsp Contact Us </span> </a></span></a>
      <br><br>
    &copy; 2023 Witcet. All rights reserved.
  </footer>
  <!-- footer end --> 
   
</body>
</html>