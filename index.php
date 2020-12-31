<?php
session_start();
 require('..\Resource-Sync\Input\db.php');
 $action = filter_input(INPUT_POST, 'action');
 if ($action === NULL) {
     $action = 'reset';
 } else {
     $action = strtolower($action);
 }
 
switch ($action) {
  case 'reset':
    $text="";
    $username ="";
      $mypassword = "";
      
      
      break;
  case 'login':

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

     
    $sql_query = "select count(*) as cntUser from users where username='".$username."' and password='".$password."'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];
    if($count > 0) {
        $_SESSION['username'] = $username;
        ?><script>location.replace("login/index.html");</script><?php
    } else {
        $text = "Please enter a valid username and password";
    }


break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Assests/images/logo.jpg">
    <title>Phone Shop</title>
    <link rel="stylesheet" href="Assests/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Assests/css/site.css" />
    <script type="module">
      import { Octokit } from "https://cdn.skypack.dev/@octokit/core";
    </script>
</head>
<body>
    <header  >
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container nopadding nomargin" >
                <img src="Assests/images/logo.jpg" alt="fake logo" style="height: 50px; padding: 0 10px;" />
                <a class="navbar-brand" asp-area="" asp-controller="Home" asp-action="Index" style="padding-left: 16px;">Phone Shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                    <ul class="navbar-nav flex-grow-1">
                      <li class="nav-item">
                        <a href="index.php" class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Index">Home</a>
                        </li>
                    
                        <li class="nav-item">
                            <a href="form.php" class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Privacy">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="shop.html" class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Privacy">Shop Now</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div  style="margin:0; padding:0;">
            <div class="s01">
                <form method="post" >
                  <fieldset>
                    <legend style="text-align: center;"><b>Everything for your phone</b></legend>
                  </fieldset>
                 
                  <div class="inner-form">
                  
                    <div class="input-field first-wrap">
                    <input type = "text" name = "username"placeholder="Username" />
                 
                   
                      
                    </div>
                    <div class="input-field second-wrap">
                    <input type = "password" name = "password"placeholder="Password" />
                    </div>
                    <div class="input-field third-wrap">
                  
                          <input type="submit" name="action" value="Login" class="btn-search" >
                         
                    </div>
                    
                  </div>
                  <p style ="color:white; font-size: 30px; text-align:center;" ><?php echo $text; ?></p>
                </form>
              </div>
        </main>
        <section >
            <div class="container1">
                <div class="title">
                    <h3 style="font-size: 350%; padding-left: 140px; padding-top: 30px;"><b>Best phone Deals</b></h3>
                </div>
                <div class ="narrative">
                    <h3 style="font-size: 350%; padding-left: 140px; padding-top: 30px;"><b>Best price
                        guarantee</b></h3>
                </div>
            </div>

            <div class="container2">
                <div class="box1">
                    
                    <a href="https://www.android.com/">  <img src="Assests/images/Android.png" class="img1"/></a>
                  <div style= "text-align: center;">  <h4>Android</h4>
                    <p style="padding-left: 40px; padding-right: 40px; ">Android is a mobile operating system based on a modified version of the
                         Linux kernel and other open source software</p>
                        </div>
                </div>
                <div class="box2">
                   <a href="https://www.apple.com/iphone-12-pro/"> <img src="Assests/images/Apple-logo-black-and-white.png" class="img2" /></a>
                    <h4>Apple</h4>
                    <p style="padding-left: 40px; padding-right: 40px; " >iOS is a mobile operating system created and developed by Apple Inc. exclusively for its hardware.
                       </p>
                </div>
                <div class="box3">
                  <a href="https://www.microsoft.com/en-us/windows/">  <img src="Assests/images/Windows-Logo.png" class="img3"/></a>
                    <h4>Windows</h4>
                    <p style="padding-left: 40px; padding-right: 40px; ">Windows Phone is a discontinued family of mobile operating systems developed by Microsoft
                         for smartphones 
                        as the replacement successor to Windows Mobile and Zune.</p>
                </div>
            </div>
       
        </section>
    
        <h3 style="text-align: center; padding-top: 50px; padding-left: 180px;">  Register Now!</h3>
     
        <a href="form.php"><img src="Assests/images/SignupbuttonA.png" alt="sign up" style="height: 30%; width: 30%; display: block;
        margin-left: auto ;
        margin-right: auto;
        padding-left: 180px;
       " /> </a>
        
    <footer class="border-top footer text-muted">
        <div class="container3">
            &copy; 2020 -Francisco Mesar - <a asp-area="" asp-controller="Home" asp-action="Privacy">Privacy</a>
        </div>
    </footer>
    <script src="Assests/lib/jquery/dist/jquery.min.js"></script>
    <script src="Assests/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assests/js/site.js"></script>
    <script src="Assests/js/Retrieve_Data/GET_Users.js"></script>
    <script src="Assests/js/Retrieve_Data/POST_Users.js"></script>
</body>
</html>

