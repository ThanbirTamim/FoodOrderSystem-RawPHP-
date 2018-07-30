<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>


<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//getting id of the data from url
$id = $crud->escape_string($_GET['id']);

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $crud->delete($id, 'food');

if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:food.php");
}
?>

