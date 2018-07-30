<!--insert order to database -->
<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

if(isset($_POST['submit'])) {
    $name = $crud->escape_string($_POST['name']);
    $phone = $crud->escape_string($_POST['phone']);
    $foodname = $crud->escape_string($_POST['foodname']);
    $address = $crud->escape_string($_POST['address']);
    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $time = date("h:i:sa");;


    //insert data to database
    $result = $crud->execute("INSERT INTO ordertable (name,phone,foodname,address,datetime, hourtime) VALUES('$name','$phone','$foodname','$address','$date','$time')");
    header("Location: /foodprojectrawphp/forntpage.php");
}

?>
