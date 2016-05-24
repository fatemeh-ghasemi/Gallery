<?php
require 'Includes/init.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="global.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <div>

            <a href="login.php" ><button>Login</button></a>
            <a href="register.php" > <button> Register</button></a>
            <a href="register.php" ><button>Gallery</button></a>
            <a href="admin.php" ><button>Admin</button></a>
        </div>
        <div>
            <form action="" method="post">
                <select name="op">
                    <?php
                    $result = $db->query("select * from category");
                    if ($result == FALSE) {
                        echo $db->error;
                    }
                    $data = $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($data as $v) {
                        $name = $v['name'];
                        echo "<option>$name</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="submit" value="Show">
            </form>
        </div>
        <div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $pictures=new Picture();
                $data = $pictures->get_pictures_for_gallery( $_REQUEST['op'], '0');
                foreach ($data as $v) {
                    $name = $v['name'];
                    $userid = $v['userid'];
                    $user=new User();
                    $username=$user->select_user_by_id($userid);

                    echo '<table border="2">';
                    echo "<tr><th><img src='images/$name' width='100' height='200'></th></tr>";
                    echo '<tr><th> Photo by : '.$username['name'].'</th></tr>';
                    echo '</table>';
                }
            }
            ?>
        </div>
    </body>
</html>
