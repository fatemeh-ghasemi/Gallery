<?php
require 'Includes/init.php';
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = new User();
    $msg = $user->register($_POST['name'], $_POST['pass'], $_POST['email']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="global.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <div>
            <a href="login.php" ><button>Login</button></a>
            <a href="register.php" > <button> Register</button></a>
            <a href="gallery.php" ><button>Gallery</button></a>
        </div>
        <div>
            <h2 style="color: green"><?php echo $msg; ?></h2><br><br>
            <form method="post" action="">
                <label>Name : <input type="text" name="name"></label><br>
                <label>Email : <input type="text" name="email"></label><br>
                <label>Password : <input type="password" name="pass"></label><br>
                <input type="submit" name="submit" value="Save">
            </form>
        </div>
    </body>
</html>
