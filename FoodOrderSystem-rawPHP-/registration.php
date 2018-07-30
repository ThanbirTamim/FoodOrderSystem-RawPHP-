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

if(isset($_POST['submit'])) {
    $name = $crud->escape_string($_POST['name']);
    $email = $crud->escape_string($_POST['email']);
    $password = $crud->escape_string($_POST['password']);
    $type = $crud->escape_string($_POST['type']);

    //insert data to database
    $result = $crud->execute("INSERT INTO adminstrator(name,email,password,type) VALUES('$name','$email','$password','$type')");
    header("Location: /foodprojectrawphp/food.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>
        section{
            width: 100%;
            /*background: url("https://www.solofoods.com/sites/default/files/tilted-pink-cupcake-wallpaper.jpg");*/
            background-size: cover;
            background-position: center;
            background: -webkit-linear-gradient(to left, hotpink , transparent); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, hotpink , transparent); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            transition: 2.3s;

        }
    </style>

</head>
<body>
<section>
    <div class="container">
        <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Adminstrator Registration</h4><br></center>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label >Name: *</label>
                        <input type="text" class="form-control" name="name" placeholder="your name" required>
                    </div>
                    <div class="form-group">
                        <label>email: *</label>
                        <input type="email" class="form-control" name="email" placeholder="your email">
                    </div>
                    <div class="form-group">
                        <label>Password: *</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label>Type: *</label>
                        <input type="text" class="form-control" name="type" placeholder="type" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="submit" disabled><br>
                </form>
            </div>

        </div>

    </div>
</section>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>