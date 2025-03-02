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
    <title>Change Profile</title>
</head>
<body>

<!--nav start-->
 
<nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="home.php" class="logo"><img src="images/navlogo.png" alt="img"></a>

      <ul class="nav-links">
    <i class="uil uil-times navCloseBtn"></i>
  <li><a class="nav-a"href="home.php">Home</a></li>
 <li><a class="nav-a"href="profile.php">Profile</a></li>
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
   
       

       
   
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
               

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                 
                }

            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

        <!--        <div class="field input">
                    <label for="pasword">Password</label>
                    <input type="password" name="password" id="password" value="<?php echo $res_Password; ?>" autocomplete="off" >
                </div> -->
                
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>

                
              <!--  <a href="php/logout.php"> <button class="btn">Log Out</button> </a> -->
            
                
            </form>
        </div>
        <?php } ?>

      </div>
     



     
    </body>
</html>