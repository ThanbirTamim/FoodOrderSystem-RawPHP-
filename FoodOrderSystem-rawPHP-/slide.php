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
    $image = $_FILES['image']['name'];
    //image will go in here directory
    $target = "slideimage/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    //insert data to database
    $result = $crud->execute("INSERT INTO slideshow(image) VALUES('$image')");
    header("Location: /foodprojectrawphp/slide.php");
}

?>




<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM slideshow";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slide Show</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style>
        body {
            font-family: "Cooper Black", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background: -webkit-linear-gradient(to left, transparent , hotpink); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, transparent , hotpink); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #000;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 160px; /* Same as the width of the sidenav */
            font-size: 18px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        img{
            width: 200px;
            height: 100px;
            margin-right: 7px;
            border-radius: 10%;
        }
    </style>
</head>
<body>
<div class="sidenav">
    <a href="/foodprojectrawphp/forntpage">User Panel</a>
    <a href="/foodprojectrawphp/food">Food</a>
    <a href="/foodprojectrawphp/order">Order</a>
    <a href="/foodprojectrawphp/slide">Slide</a>
    <a href="logout.php">log out</a>
</div>


<div class="main">

    <div class="form">
        <div class="container">
            <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Add Slide Show</h4><br></center>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="slide.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="size" value="1000000">

                        <div class="form-group">
                            <label>Image:</label><br>
                            <input type="file" name="image">
                        </div>
                        <input type="submit" name="submit" class="btn btn-success" value="submit"><br><br>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <div class="food">
        <div class="container">
            <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Available Slide Show</h4><br>
                <?php
                echo '<div class="row">';
                foreach ($result as $key => $res) {

                        echo '<div class="col-sm-4" style="margin-bottom:10px; padding-bottom: 30px">';
                        echo '<div class="panel panel-success">';
                        echo '<div class="panel-heading"></div>';
                        echo '<div class="panel-body">';
                        echo "<img src='slideimage/" . $res['image'] . "' >";
                        echo '</div>';
                        echo '<div class="panel-footer">';
                        echo '<br>';
                        echo "<a href=\"slidedelete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }

                    echo '<br>';

                echo '</div>';
                ?>
            </center>
        </div>
    </div>




</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>