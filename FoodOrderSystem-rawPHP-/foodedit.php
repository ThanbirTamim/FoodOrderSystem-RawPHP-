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

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM food WHERE id=$id");

foreach ($result as $res) {
    $name = $res['name'];
    $price = $res['price'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style>
        a{
            color: white;
            text-decoration: none !important;
        }
        a:hover{
            color: white;
            text-decoration: none !important;
        }
    </style>
</head>
<body>
<div class="main">
    <!--edit food process-->
    <div class="form">
        <div class="container">
            <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Update Info of Food</h4><br></center>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form name="form1" action="editaction.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="size" value="1000000">
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                        <div class="form-group">
                            <label >Name: *</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $name;?>" required>
                        </div>
                        <div class="form-group">
                            <label>price: *</label>
                            <input type="text" class="form-control" name="price" value="<?php echo $price;?>" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <input type="submit" name="update" class="btn btn-success" value="Update"><br><br>
                        <button class="btn btn-danger"><a href="/foodprojectrawphp/food">Back</a></button>
<!--                        .htaccess likhar jonno food.php dei nai.....-->
                    </form>
                </div>

            </div>

        </div>
    </div>


</div>




<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>