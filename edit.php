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
    $pic = new Picture();
    $response = $pic->update_picture_information($id, $_POST['op'], $_POST['describ'], $_POST['check']);
    if ($response) {
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
                <table border="2">
                    <tr>
                        <th><img src="Images/<?php echo $picture['name']; ?> " width='100' height='200'></th>
                    </tr>
                    <tr>
                        <th><label>Description :<textarea name="describ"><?php echo $picture['body']; ?></textarea></th>
                    </tr>
                    <tr>
                        <th><label>private  
<?php
$s = '';
if ($picture['private'] == '1') {
    $s = 'checked=""';
}
echo "<input type='checkbox' name='check' $s>";
?></label></th>
                    </tr>
                    <tr>
                        <th>

                            <select name="op">
<?php
$result3 = $db->query("select * from category");
if ($result3 == FALSE) {
    echo $db->error;
}

$data3 = $result3->fetch_all(MYSQLI_ASSOC);

foreach ($data3 as $v) {
    $name = $v['name'];
    $s = '';
    if ($name == $picture['type'])
        $s = 'selected=""';
    echo "<option $s>$name</option>";
}
?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="save">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
