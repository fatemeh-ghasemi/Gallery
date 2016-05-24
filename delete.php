<?php
require 'Includes/init.php';

if (!isset($_SESSION['userId'])) {
    redirect("index.php");
}
$user=new User();
$data=$user->select_user_by_id($_SESSION['userId']);
$message=$data['name'];

$id=$_REQUEST['id'];
$pictures=new Picture();
$picture =$pictures->find_picture_by_id($id);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_REQUEST['confirm'] == "Yes") {
        $name = $picture['name'];
        $pic=new Picture();
        $pic->delete_picture($id, $name);
        redirect("admin.php");
    } else {
        redirect("admin.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="global.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
         <h3>
           Welcom <?php echo $message;?>
        </h3>
        <div>

            <a href="login.php" ><button>Login</button></a>
            <a href="register.php" > <button> Register</button></a>
            <a href="gallery.php" ><button>Gallery</button></a>
        </div>
        <div>
            <form action="" method="post">
                <h2>Do you want to delete this item ?</h2>
                <input type="submit" name="confirm" value="Yes">
                <input type="submit" name="confirm" value="No">
            </form>
        </div>
    </body>
</html>
