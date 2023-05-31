<?php 

$invalid_info = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if ( password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            $_SESSION["user_id"]=$user["id"];
            header("Location: index.php");
            exit;
        }
    }
    $invalid_info=true; 
}



?>



<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="login.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
  

    <script src="script.js"></script>
 <div class="auth-wrapper ">
    <div class="auth-inner">
    <div class="card" >
        <div class="card-body">

        <form class="form-signup" method="post">
            <div class="logo-container">
                <img src="images/logoFoodFrenzy.png" alt="Logo du site web" style="height: 100px;" style="width:120px">
              </div>
          
            <h2 class="card-title">Hello!</h2>
            <p>Login to your account</p>
            <?php if ($invalid_info): ?> 
            <em style="color:red " > Invalid Login Info. Please retry.</em> 
            <?php endif; ?>
       
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email Address">

            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">

            </div>
            <input type="submit" class="btn btn-success btn-block" name="btn" value="Login">
            <div class="form-group ">
                <label>
                  You don't have an account? <a href="signup.html"> Resgiter Now</a> 
                </label>
               
            </div>
        </form>
    </div>
</div>
</div>
</div>
</body>

</html>