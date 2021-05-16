<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body onload="myfunction()">

<!--preloader starts-->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
<!--preloader ends-->

<!--navigation bar and background starts-->
<div class="bgimage">
    <div class="menu">

        <div class="leftmenu">
            <h4> Banking System </h4>
        </div>

        <div class="rightmenu">
            <ul>
                <li id="fisrtlist">HOME</li>
                <li><a href="customer.php">CUSTOMERS</a></li>
                <li><a href="transfer.php">TRANSFER MONEY</a></li>
                <li><a href="history.php">TRANSACTION HISTORY</a></li>
            </ul>
        </div>

    </div>

    <!--text body-->
    <div class="text">
        <ins>WELCOME TO <br>
            OUR BANKING <br>
            SERVICES</ins><br>
                <ins class="moto">One of the country's top retail bank by deposits and a wholly<br>owned subsidiary of one of the most respected banks in the world.</ins>

    </div>
<!--navigation and background ends-->

    <!--footer starts-->
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
<!--footer ends-->


    <!--prelaoder function starts-->
    <script>
        var preloader = document.getElementById('preloader');
        function myfunction(){
            preloader.style.display='none';
        }
    </script>
<!--preloader function ends-->

</body>
</html>