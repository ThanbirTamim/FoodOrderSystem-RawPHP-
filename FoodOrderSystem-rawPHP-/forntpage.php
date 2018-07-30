

<!--getting value from database-->
<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM food";
$result = $crud->getData($query);

$query2 = "SELECT * FROM slideshow";
$slide = $crud->getData($query2);
//echo '<pre>'; print_r($result); exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fornt page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        img{

        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav>
        <div class="logo">
            <a  style="color: black" href="#"><img class="responsive" style="border-radius: 50%; height: 120px; width: 120px;  margin-top: -5px" src="/foodprojectrawphp/photos/logo.jpg"></a>
        </div>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#food">Food</a></li>
            <li><a  href="#order">Order</a></li>
            <li>
                <a class="active" href="#" data-toggle="modal" data-target="#exampleModalCenter" >Payment</a>
            </li>
        </ul>
    </nav>

    <div class="" style="">

        <?php
        foreach ($slide as $key => $res) {
            echo "<img style='width:100%;' class='mySlides img-fluid' class='responsive' alt='Responsive image' src='slideimage/" . $res['image'] . "' >";
        }
        ?>
<!--        <img class="mySlides img-fluid" class="responsive" alt="Responsive image" src="/foodprojectrawphp/photos/c4.jpg" style="width:100% ">-->
<!--        <img class="mySlides img-fluid" class="responsive" alt="Responsive image" src="/foodprojectrawphp/photos/w6.jpg" style="width:100% ">-->
<!--        <img class="mySlides img-fluid" class="responsive" alt="Responsive image" src="/foodprojectrawphp/photos/c6.jpg" style="width:100% ">-->
<!--        <img class="mySlides img-fluid" class="responsive" alt="Responsive image" src="/foodprojectrawphp/photos/w5.jpg" style="width:100% ">-->


    </div>
    <!--<section class="sec1"></section>-->

</div>

<!--About-->
<section id="about" class="about" style="margin-top: 05px; padding: 90px">
    <div class="container">
        <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">About US</h4><br>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <img class="" alt="Responsive image" src="/foodprojectrawphp/slideimage/sl2.jpg" style="width:60%; border-radius: 15%; "><br><br>
                    <img class="" alt="Responsive image" src="/foodprojectrawphp/slideimage/sl3.jpg" style="width:60%; border-radius: 15%; ">
                </div>
                <div class="col-md-6 col-sm-6" style="font-family: 'Cooper Black'">

                    <h4>Why you choice us?</h4>
                    <p style="font-size: 20px">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </center>
    </div>
</section>
<br><br>


<!-- Modal payment -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Payment No: 01521432421 or Scan this Bar Code</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <h3></h3>
                <img alt="Responsive image" src="/foodprojectrawphp/photos/barcode.jpg" style="width:100% ">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--Choose Food-->
<section id="food" class="food" style="margin-top: -40px; padding: 90px">
    <div class="container">
        <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Available Food</h4><br>
            <div class="row">
                <?php
                foreach ($result as $key => $res) {
                    echo '<div class="col-sm-3" style="margin-bottom:10px; padding-bottom: 30px">';
                    echo '<div class="panel panel-success">';
                    echo '<div class="panel-heading"></div>';
                    echo '<div class="panel-body">';
                    echo "<img style='width: 200px; height: 200px; margin-right: 7px; border-radius: 10%;' src='foodimage/" . $res['image'] . "' >";
                    echo '</div>';
                    echo '<div class="panel-footer">';
                    echo $res['name'];
                    echo '<br>';
                    echo $res['price'];
                    echo '<br>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                echo '<br>';
                ?>
            </div>
        </center>
    </div>
</section>




<!--Contact-->
<section id="order" class="order" style="margin-top: 5px; padding: 90px">
    <div class="container">
        <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Place Order</h4><br></center>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="userorderadd.php" method="post" >
                        <div class="form-group">
                            <label >Name: *</label>
                            <input type="text" class="form-control" name="name" placeholder="your name" required>
                        </div>
                        <div class="form-group">
                            <label>Phone: *</label>
                            <input type="text" class="form-control" name="phone" placeholder="your phone" required>
                        </div>
                        <div class="form-group">
                            <label>Food Name: *</label>
                            <input type="text" class="form-control" name="foodname" placeholder="your closeable food name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" placeholder="Enter your address here" id="address" name="address" rows="7"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success" value="submit" onClick="return confirm('Are you sure you want to confirm order?')" ><br>
                    </form>
                </div>

            </div>

    </div>
</section>


<!--Location-->
<section id="location" class="location" style="margin-top: 5px; padding: 90px">
    <div class="container">
        <center><h4 style="font-family: 'Cooper Black'; border: 8px solid midnightblue; padding: 20px; background: aliceblue; border-radius: 50px">Our Location</h4><br></center>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div id="map" >
                    <iframe style="width:100%;height:400px; border:1px solid hotpink" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d912.9599283560104!2d90.3778914!3d23.7530946!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xca184c602901ad04!2sDaffodil+International+University+Library!5e0!3m2!1sen!2sbd!4v1532813859780" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

        </div>

    </div>
</section>




<div class="footer">
    <p>Copyright@Thanbir_Tamim</p>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<!--slide show script-->
<script>
    var myIndex = 0;
    slideshow();


    function slideshow() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(slideshow, 4000); // Change image every 3 seconds
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>

</body>
</html>