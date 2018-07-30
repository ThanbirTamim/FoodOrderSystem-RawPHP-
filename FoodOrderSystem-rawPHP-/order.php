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

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM ordertable ORDER BY id DESC LIMIT 15";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order</title>
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
            margin-left: 200px; /* Same as the width of the sidenav */
            font-size: 16px; /* Increased text to enable scrolling */
            padding: 0px 10px;
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

    <div class="food">
        <div class="container">
            <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Recent Order</h4><br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($result as $key => $res) {
                        $date = $res['datetime'];
                        $hour= $res['hourtime'];
                        $name = $res['name'];
                        $phone = $res['phone'];
                        $foodname = $res['foodname'];
                        $address = $res['address'];
                        echo '<tr>';
                        echo '<th scope="row">';
                            echo $date;
                        echo '</th>';
                        echo '<td>';
                            echo $hour;
                        echo '</td>';
                        echo '<td>';
                            echo $name;
                        echo '</td>';
                        echo '<td>';
                            echo $phone;
                        echo '</td>';
                        echo '<td>';
                            echo $foodname;
                        echo '</td>';
                        echo '<td>';
                            echo $address;
                        echo '</td>';

                    echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
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