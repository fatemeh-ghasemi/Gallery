<?php
require './Includes/init.php';
if (!isset($_SESSION['userId'])) {
    redirect("index.php");
}
$user=new User();
$data=$user->select_user_by_id($_SESSION['userId']);
$message=$data['name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="global.css" rel="stylesheet" type="text/css"/>
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
            <a href="upload.php" ><button>Upload</button></a>
        </div>
        <div>
            <?php
            $pic=new Picture();
            $data=$pic->find_pictures_by_userid($_SESSION['userId']);
            foreach ($data as $v) {
                $name = $v['name'];
                $id = $v['id'];
                echo '<table border="2">';
                echo "<tr><th colspan='2'><img src='images/$name' width='100' height='200'></th></tr>";
                echo "<tr><th><a href='edit.php?id=$id'>Edit</a></th>";
                echo "<th><a href='delete.php?id=$id'>Delete</a></th></tr>";
                echo '</table>';
            }
            ?>
        </div>
    </body>
</html>
