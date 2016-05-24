<?php
require 'Includes/init.php';
if (!isset($_SESSION['userId'])) {
    redirect("index.php");
}
$user=new User();
$data=$user->select_user_by_id($_SESSION['userId']);
$message=$data['name'];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $picture=$_FILES['picture'];
    $newpicture=new Picture();
    $response=$newpicture->upload_new_picture($_SESSION['userId'],$picture,$_POST['describe'],$_POST['category'],$_POST['private']);
    if($response == TRUE){
        redirect("admin.php");
    }
 else {
        echo "Please try again .";
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
            <form action="" method="post" enctype="multipart/form-data">
                <label> Picture :<input type="file" name="picture"></label><br><br>
                <label>Describtion : <textarea name="describe"></textarea></label><br><br>
                <select name="category" id="upload">
                    <?php
                    $result=$db->query("select * from category ");
                    $data=$result->fetch_all(MYSQLI_ASSOC);
                    foreach ($data as $v){
                        echo '<option>'.$v['name'].'</option>';
                    }
                    ?>
                </select><br><br>
                <label> Private :<input type="checkbox" name="private"></label><br><br>
                <input type="submit" value="Save" name="submit">
            </form>
        </div>
    </body>
</html>
