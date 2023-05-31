<?php
session_start(); //ya ema yamel session jdida wala ykamel fi wahda mawjouda deja
// to get the user's first name:
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql= "SELECT * from user where id= {$_SESSION["user_id"]}";
    $result=$mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html>
<head>

   
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Food</title>

</head>

<body>
<div class="logo-container">
        <img src="images/logoFoodFrenzy.png" alt="">
    </div>

    <?php if (isset($user)): ?>

<div class="auth-wrapper">
    <div class="auth-inner">
        <div class="text-frame">
            <p> Hello, <?= $user["firstname"] ?>. You're logged in! </p>
        </div>
        <div class="content">
            <a class="info-btn1" href="logout.php"> Log out </a>
            <a class="info-btn2"  href="page.html"> Start </a>
        </div>
    </div>
</div>


<?php else: ?>
    <div class="auth-wrapper">
        <div class="auth-inner">
            <div class="text-frame">
                <p><em> “Food is symbolic of love when words are inadequate.” </em></p>
            </div>

            <div class="content">
                <a class="info-btn1"  href="login.php" >login</a>
                <a class="info-btn2" href="signup.html">signup</a>
            </div>
        </div>
    </div>
<?php endif; ?>



</body>
</html>


<!-- 

<!DOCTYPE html>
<html>

<head>
    <title>share your recipe</title>
    <link href="index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
   
    <div class="logo-container">
        <img src="logo11.png" alt="">
    </div>

    <div class="auth-wrapper ">
        <div class="auth-inner">
            <div class="text-frame">
                 <p>“Food is symbolic of love when words are inadequate.”</p>
            </div>
            <div class="content">
                <a class="info-btn1"  href="login.html" >login</a>
                <a class="info-btn2" href="signup.html">signup</a>
            </div>
        </div>
    </div>

</body>

</html>




 -->