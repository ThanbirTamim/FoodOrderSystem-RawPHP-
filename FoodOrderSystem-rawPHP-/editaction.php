<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>


<?php
// including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

if(isset($_POST['update']))
{
    $id = $crud->escape_string($_POST['id']);
    $name = $crud->escape_string($_POST['name']);
    $price = $crud->escape_string($_POST['price']);
    $image = $_FILES['image']['name'];
    //image will go in here directory
    $target = "foodimage/".basename($image);


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }


    $result = $crud->execute("UPDATE food SET name='$name',price='$price',image='$image' WHERE id=$id");

    header("Location: food.php");

}
?>
