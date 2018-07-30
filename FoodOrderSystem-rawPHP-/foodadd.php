<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>
<head>
    <title></title>
</head>
<body>
<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

if(isset($_POST['submit'])) {
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
        //insert data to database
    $result = $crud->execute("INSERT INTO food(name,price,image) VALUES('$name','$price','$image')");
    header("Location: /foodprojectrawphp/food.php");
}

?>
</body>
</html>