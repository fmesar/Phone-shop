<?php
require_once('..\Resource-Sync\model\fields.php');
require_once('..\Resource-Sync\model\validate.php');
require('..\Resource-Sync\Input\db.php');
$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('email', 'Must be a valid email address.');
$fields->addField('password', 'Must be at least 6 characters.');
$fields->addField('verify');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state', 'Use 2 character abbreviation.');
$fields->addField('zip', 'Use 5 or 9 digit ZIP code.');
$fields->addField('phone', 'Use 999-999-9999 format.');
$fields->addField('username');
$fields->addField('age');
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = 'reset';
} else {
    $action = strtolower($action);
}

switch ($action) {
    case 'reset':
        $email = '';
        $password = '';
        $verify = '';
        $firstName = '';
        $lastName = '';
        $address = '';
        $city = '';
        $state = '';
        $zip = '';
        $phone = '';
        $username = '';
        $age = '';
        
      //  include 'view/register.php';
        break;
    case 'register':
        // Copy form values to local variables
        $email = trim(filter_input(INPUT_POST, 'email'));
        $password = filter_input(INPUT_POST, 'password');
        $verify = filter_input(INPUT_POST, 'verify');
        $firstName = trim(filter_input(INPUT_POST, 'first_name'));
        $lastName = trim(filter_input(INPUT_POST, 'last_name'));
        $address = trim(filter_input(INPUT_POST, 'address'));
        $city = trim(filter_input(INPUT_POST, 'city'));
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone = filter_input(INPUT_POST, 'phone');
        $username = trim(filter_input(INPUT_POST, 'username'));
        $age = trim(filter_input(INPUT_POST, 'age'));
        // Validate form data
        $validate->email('email', $email);
        $validate->password('password', $password);
        $validate->verify('verify', $password, $verify);
        $validate->text('first_name', $firstName);
        $validate->text('last_name', $lastName);
        $validate->text('address', $address);
        $validate->text('city', $city);
        $validate->state('state', $state);
        $validate->zip('zip', $zip);
        $validate->phone('phone', $phone);
        $validate->username('username', $username);
        $validate->age('age', $age);
        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
          $action = 'reset';
        } else {
       
          $query = "INSERT INTO users(first_name, last_name, address, city, state, zip , email, phone, age, username, password ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($conn, $query) or die(mysqli_error($conn));
          $stmt->bind_param('sssssssssss',$firstName, $lastName, $address, $city, $state, $zip, $email, $phone, $age,  $username, $password);
          $stmt->execute();
          $stmt->close();

          ?><script>location.replace("success.php");</script><?php
         
           
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
    <link rel="stylesheet" href="Assests/css/form.css" />
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
    
    <img src="Assests/images/Almost_there.png" alt="Almost there picture" style="padding-left: 30%;"/> 
    <h1 style="text-align: center;">Please complete your registration</h1>



    <fieldset>
    <form   method="post" >

        <div class="form-row" >
          <div class="col-md-6 mb-3">
          <label>First Name:</label>
        <input type="text" name="first_name" class="form-control" 
               value="<?php echo htmlspecialchars($firstName);?>">
        <?php echo $fields->getField('first_name')->getHTML(); ?><br>
          
          </div>
          <div class="col-md-6 mb-3">
          <label>Last Name:</label>
        <input type="text" name="last_name" class="form-control"
               value="<?php echo htmlspecialchars($lastName);?>">
        <?php echo $fields->getField('last_name')->getHTML(); ?><br>
            <div>
             
            </div>
          </div>
        </div>
        <div class="form-row">
        <div class="col-md-3 mb-3">
        <label>Address:</label>
        <input type="text" name="address" class="form-control"
               value="<?php echo htmlspecialchars($address);?>">
        <?php echo $fields->getField('address')->getHTML(); ?><br>
            <div >
             
            </div>
          </div>
          <div class="col-md-3 mb-3">
          <label>City:</label>
        <input type="text" name="city" class="form-control"
               value="<?php echo htmlspecialchars($city); ?>">
        <?php echo $fields->getField('city')->getHTML(); ?><br>
            <div >
             
            </div>
          </div>
       
          <div class="col-md-3 mb-3">
          <label>State:</label>
        <input type="text" name="state" maxlength="2" class="form-control"
               value="<?php echo htmlspecialchars($state); ?>">
        <?php echo $fields->getField('state')->getHTML(); ?><br>
            <div >
             
            </div>
          </div>
          <div class="col-md-3 mb-3">
          <label>ZIP Code:</label>
        <input type="text" name="zip"  class="form-control"
               value="<?php echo htmlspecialchars($zip); ?>">
        <?php echo $fields->getField('zip')->getHTML(); ?><br>
            <div >
             
            </div>
          </div>
     
            
          </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <label>E-Mail:</label>
              <input type="text" name="email" class="form-control"
               value="<?php echo htmlspecialchars($email);?>">
              <?php echo $fields->getField('email')->getHTML(); ?><br>
              <div >
               
              </div>
            </div>
            <div class="col-md-3 mb-3">
            <label>Phone Number:</label>
        <input type="text" name="phone" class="form-control"
               value="<?php echo htmlspecialchars($phone); ?>">
        <?php echo $fields->getField('phone')->getHTML(); ?><br>
              <div>
               
              </div>
            </div>
            <div class="col-md-3 mb-3">
            <label>Age:</label>
        <input type="text" name="age" class="form-control"
               value="<?php echo htmlspecialchars($age); ?>">
        <?php echo $fields->getField('age')->getHTML(); ?><br>
              <div>
               
              </div>
            </div>
            <div class="col-md-6 mb-3">
            <label>Username:</label>
        <input type="text" name="username" class="form-control"
               value="<?php echo htmlspecialchars($username);?>">
        <?php echo $fields->getField('username')->getHTML(); ?><br>
              <div >
                
              </div>
            </div>
            <div class="col-md-3 mb-3">
            <label>Password:</label>
        <input type="password" name="password" class="form-control"
               value="<?php echo htmlspecialchars($password);?>">
        <?php echo $fields->getField('password')->getHTML(); ?><br>
            <div >
             
            </div>
          </div>
          <div class="col-md-3 mb-3">
          <label>Verify Password:</label>
        <input type="password" name="verify" class="form-control"
               value="<?php echo htmlspecialchars($verify);?>">
        <?php echo $fields->getField('verify')->getHTML(); ?><br>
            <div >
             
            </div>
          </div>


            
        </div>
    
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
            <label class="form-check-label" for="invalidCheck3">
              Agree to terms and conditions
            </label>
            <div  >
            
            </div>
          </div>
        </div>
      
        <label>&nbsp;</label>
        <input type="submit" name="action" value="Register" class="btn-primary">
      </form>

    
    
       
   
    <footer class="border-top footer text-muted">
        <div class="container3">
            &copy; 2020 - Project Resource-Sync - <a asp-area="" asp-controller="Home" asp-action="Privacy">Privacy</a>
        </div>

    </fieldset> 
    </footer>
   
</body>
</html>

