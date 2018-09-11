<?php
if (isset($_POST['submit'])) {
//Create connection
include('database_connection.php');

//Run insert query for chats
$data = array(
    ':username'  => $_POST['username'],
    ':password'  => password_hash($_POST['password'],PASSWORD_DEFAULT),
   );

$query = "
INSERT INTO login 
(username, password) 
VALUES (:username, :password)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 ?>
  <div class="container">
      <br />
<div align="center" class="alert alert-success"><strong>Account has been successfully created</strong></div>
</div>
 <?php
}
}
include('header.php');
?>

 <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Online Chat</a></h3><br />
   <div class="panel panel-default">
      <div class="panel-heading">Create Account</div>
    <div class="panel-body">
     <form method="post" action="register.php">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <label>Username</label>
       <input type="text" name="username" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="password" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="submit" class="btn btn-info" value="Create account" />
       <a href ="login.php" class="btn btn-primary">Login</a>
      </div>
     </form>
    </div>
   </div>
  </div>
    </body>  
</html>