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
                        <a href="index.html" class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Index">Home</a>
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
    <a href="shop.html"><img src="Assests/images/pexels-vitalko-1573723.jpg" alt="sign up" style="height: 80%; width: 100%; display: block;
      
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