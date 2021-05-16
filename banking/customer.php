<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body  onload="myfunction()">

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<!--including database connection-->
<?php include  'data.php';
$query = "SELECT * FROM customer";
$result  = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
?>

<!--navigation bar and background-->
<div class="bgimage">
    <div class="menu">

        <div class="leftmenu">
            <h4> Banking System </h4>
        </div>

        <div class="rightmenu">
            <ul>
                <li ><a type="button" href="index.php">HOME</a></li>
                <li id="fisrtlist">CUSTOMERS</li>
                <li><a type="button"  href="transfer.php">TRANSFER MONEY</a></li>
                <li><a type="button" href="history.php">TRANSACTION HISTORY</a></li>
            </ul>
        </div>
    </div>

<!--table creation-->
    <div class="container" style="margin-top : 1%;  margin-bottom : 2%; width : 100%;">
        <table class="table table-striped table-hover ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">AMOUNT</th>
            </tr>
            </thead>
            <tbody>

            <!--inserting database data into table-->
            <?php  if($row >0){
                while($rows = mysqli_fetch_assoc($result)){
                    $id = $rows['id'];
                    $name = $rows['Name'];
                    $email = $rows['Email'];
                    $amount  = $rows['Amount'];

                    echo'<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$amount.'</td>
    </tr>';
                }
            }
            ?>

            </tbody>
        </table>
    </div>

<!--footer-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ins>Banking System</ins>
                    <ins>Made By: Devang Pathak</ins>
                    <ins><a href="#">GRIMAY2021</a>
                        Web Development & Designing Internship</ins>
                </div>
                <div class="footer-col">
                    <h4>About Us</h4>
                    <ins>This is a website for transferring money online safely</ins>
                </div>
                <div class="footer-col">
                    <h4>Contact Us Today</h4>
                    <ins>
                        Call Us 666 777 888 OR 111 222 333<br></ins>
                    <ins>  Send an Email on <a href="mailto:#">contact@bank.com</a><br></ins>
                    <ins> Visit Us xyz Street- abc 22222<br>
                        Somewhere in Nowhere
                    </ins>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--preloader function-->
    <script>
        var preloader = document.getElementById('preloader');
        function myfunction(){
            preloader.style.display='none';
        }
    </script>

</body>
</html>