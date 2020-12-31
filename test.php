<?php
 require('..\Resource-Sync\Input\db.php');
 $action = filter_input(INPUT_POST, 'action');
 if ($action === NULL) {
     $action = 'reset';
 } else {
     $action = strtolower($action);
 }
 
switch ($action) {
  case 'reset':
    
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
    } else {
        echo "Invalid username and password";
    }



break;
}



?>

                         

<form method="post" >
                  <fieldset>
                    <legend style="text-align: center;"><b>Everything for your phone</b></legend>
                  </fieldset>
                 
                  <div class="inner-form">
                  
                    <div class="input-field first-wrap">
                    <input type = "text" name = "username" placeholder = "Username" />
                 
                   
                      
                    </div>
                    <div class="input-field second-wrap">
                    <input type = "password" name = "password" placeholder = "Password" />
                    </div>
                    <div class="input-field third-wrap">
                  
                          <input type = "submit" name="action" value="Login" class="btn-search" >
                         
                    </div>
                  </div>
</form>