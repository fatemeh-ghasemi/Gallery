<?php
require './Includes/init.php';
$login = new Login();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = $login->check($_POST['email'], $_POST['pass']);
    if ($flag) {
        redirect("admin.php");
    } else {
        $msg = "Your email or password is incorrect please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="global.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <?php
        if (isset($msg)) {
            echo '<h3 style="color:red">' . $msg . '</h3>';;
        }
        ?>
        <div>
            <a href="login.php" ><button>Login</button></a>
            <a href="register.php" > <button> Register</button></a>
            <a href="gallery.php" ><button>Gallery</button></a>
        </div>
        <div>

            <form action="" method="post">
                <label>Email : <input type="text" name="email"> </label><br>
                <label>Password : <input type="password" name="pass"> </label><br>
                <input type="submit" name="save">
            </form>
        </div>
    </body>
</html>
