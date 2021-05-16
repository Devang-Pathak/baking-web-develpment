<!--including database and fetching data-->
<?php
include 'data.php';

if (isset($_POST['submit'])) {
    $form = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $selectQueryFrom = "SELECT * from customer where id=$form";
    $query = mysqli_query($conn, $selectQueryFrom);
    $result1 = mysqli_fetch_array($query);

    $selectQueryTo = "SELECT * from customer where id=$to";
    $query = mysqli_query($conn, $selectQueryTo);
    $result2 = mysqli_fetch_array($query);

    // Checking if the amount is negative
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check insufficient balance.
    else if ($amount > $result1['Amount']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $newbalance = $result1['Amount'] - $amount;
        $updateSenderQuery = "UPDATE customer set Amount=$newbalance where id=$form";
        mysqli_query($conn, $updateSenderQuery);

        $newbalance = $result2['Amount'] + $amount;
        $updateReceiverQuery = "UPDATE customer set Amount=$newbalance where id=$to";
        mysqli_query($conn, $updateReceiverQuery);

        // Insert in transaction history table
        $sender = $result1['Name'];
        $receiver = $result2['Name'];
        $insertQuery = "INSERT INTO `transfers`(`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $insertQuery);

        if ($query) {

            echo '<script>';
            echo 'alert("Payment successfull");window.location="history.php";';
            echo '</script>';
        } else {

            echo '<script>';
            echo 'alert("Something went wrong")';
            echo '</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>

    <!--page content styling-->
    <style type="text/css">
        button{
            border:none;
            border-radius: 8px;
            padding: 10px;
            background: #50BFBF;
            color:white;
            letter-spacing: 1.5px;
            font-size: 15px;
            transition: 0.5s;
        }
        button:hover,h1:hover{
            transform: scale(1.1);
        }
        button:hover{
            background-color:#4C4B4B;
        }


        @media only screen and (orientation:portrait){
            h1{
                font-size: 50px;
            }

        }
        .user-info,.receiver-info h1{
            color: black;
            padding-top: 2%;
            border-width: thin;
            text-align: center;
            position: relative;
            top : 10px;
        }
        .info{
            display: inline-table;
            padding-inline: 75px;
            padding-top: 1%;
            background-color: #fffdfd;
            letter-spacing: 2px;
            border-inline-color: #000000;
            font-size: 16px;
            height: 120px;
            width: 200px;
            text-align: center;
            position: relative;
            top:0px;
        }
        .selectInput-section .select-sender{
            box-sizing: 150px;
            text-align: center;
            letter-spacing: 2px;
            max-inline-size: 25%;
            inline-size: unset;
            padding-inline: 50px;
            margin-inline-start: 37%;
            width: 200px;
            position: relative;
            top: 10px;
        }
        .amountInput-section{
            margin-inline-start: 44%;
            padding-top: 2px;
            position: relative;
            top: 10px;

        }
        .submit{
            margin-inline-start: 47%;
            padding-top: 25px;
            border-color: #50bfbf ;
            font-weight: 500;
            font-size: 25px;
            width: 90px;
        }
        .submit .submit-btn{
            padding:6px 12px;
            border: 0px;
            border-radius: 6px;
            padding: 10px;
            background: #50BFBF;
            color:black;
            letter-spacing: 1.5px;
            font-size: 20px;
            transition: 0.5s;
            position: relative;
            top: 10px;
            left: -30px;
        }
        #ak{
            margin-right: 200px;
            margin-left: -88px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<!--navigation bar and background-->
<div class="bgimage">
    <div class="menu">

        <div class="leftmenu">
            <h4> Banking System </h4>
        </div>

        <div class="rightmenu">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="customer.php">CUSTOMERS</a></li>
                <li id="fisrtlist"><a href="transfer.php">TRANSFER MONEY</a></li>
                <li><a href="history.php">TRANSACTION HISTORY</a></li>
            </ul>
        </div>

    </div>

    <!--fetching data for sender details-->
            <?php
            include 'data.php';
            $sql = "SELECT * FROM customer";
            $result = mysqli_query($conn,$sql);
            ?>
            <div class="container">
                <form action="" method="POST">
                    <div class="sender-info">
                        <?php
                        include 'data.php';
                        $senderId = $_GET['id'];
                        $selectSenderQuery = "SELECT * FROM  customer where id=$senderId";
                        $result = mysqli_query($conn, $selectSenderQuery);
                        $rows = mysqli_fetch_assoc($result);
                        ?>
                        <div class="user-info">
                            <h1 class="heading-user" style="font-family: 'Impact'; font-size: 50px;">Sender Information</h1>
                            <div class="info">
                                <div>
                                    <p><b>NAME</b></p>
                                </div>
                                <div>
                                    <p><?php echo $rows['Name'] ?></p>
                                </div>
                            </div>
                            <div class="info">
                                <div>
                                    <p><b>EMAIL</b></p>
                                </div>
                                <div>
                                    <p><?php echo $rows['Email'] ?></p>
                                </div>
                            </div>
                            <div class="info">
                                <div>
                                    <p><b>AMOUNT</b></p>
                                </div>
                                <div>
                                    <p><?php echo $rows['Amount'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--inserting payee details-->
                    <div class="receiver-info">
                        <?php
                        $selectRemainingUser = "SELECT * FROM customer where id!=$senderId";
                        $result = mysqli_query($conn, $selectRemainingUser);
                        ?>
                        <div class="receiver">
                            <h1 class="trans-heading" style="font-family: 'Impact';">Transfer To</h1>
                            <div class="selectInput-section">
                                <select name="to" class="select-sender" required style="background: #e6ffff;width:2000px;height:30px;text-align:center">
                                    <option value="" disabled selected style="color: black;text-align:center;height:20px">---        Choose    ---</option>
                                    <?php
                                    while ($rows = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?php echo $rows['id'] ?>" style="font-size: 20px;color:black">
                                            <?php echo $rows['Name']; ?>
                                        </option>
                                        <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="amount">
                            <h1 class="trans-heading" style="font-family: 'Impact';">Amount</h1>
                            <div class="amountInput-section">
                                <input type="number" name="amount" id="ak" required style="font-size: 25px;width:300px;">
                            </div>
                        </div>
                        <div class="submit">
                            <input class="submit-btn" type="submit" value="Transfer" name="submit" style="font-family: 'Amatic SC',cursive;">
                        </div>
                    </div>
                </form>
            </div>
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

</body>
</html>