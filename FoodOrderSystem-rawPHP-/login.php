<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
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
<?php
include("connection.php");

if(isset($_POST['submit'])) {
    $email= mysqli_real_escape_string($mysqli, $_POST['email']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($email == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM adminstrator WHERE email='$email' AND password= '$pass'")
        or die("Could not execute the select query.");

        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)) {
            $validuser = $row['email'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "<center>";
            echo "<h2 style='color: red;font-size: 150px; margin-top: 300px'>Error!!!</h2>";
            echo "<br/>";
            echo "<a style='font-size: 50px;' href='login'>Go back</a>";
            echo "</center>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: food');
        }
    }
} else {
    ?>
    <section>
        <div class="container">
            <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Adminstrator Login</h4><br></center>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label>email: *</label>
                            <input type="text" class="form-control" name="email" placeholder="your email" required>
                        </div>
                        <div class="form-group">
                            <label>password: *</label>
                            <input type="password" class="form-control" name="password" placeholder="your password" required>
                        </div>

                        <input type="submit" name="submit" class="btn btn-success" value="submit"><br>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <?php
}
?>









<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>