<!DOCTYPE html>
<html lang="en">
    <?php
        include_once './php/connection.php';

        if(isset($_SESSION['user'])){
            if ($_SESSION['user']['role']=='admin'){
                header('Location:./admin_index.php');
            }else if ($_SESSION['user']['role']=='driver'){
                header('Location:./driver_index.php');
            }
        }else{
            header('Location:./login.php');
        }

        include_once './php/head.php';
    ?>
    <body>
        <header>
            <div id="header">
                <div class="hamburgerMenu">
                    <img id="menu" src="/images/icons/menu.png" alt="menu" onclick="menuButton()">
                </div>
                <div>
                    <a href="index.php"><img id="logo" src="/images/icons/logo.png" alt="logo"></a>
                </div>
            </div>
        </header>
        <main>
            <div class="divider">
                <div id="left">
                    <?php include_once './php/menu.php'; ?>
                </div>
                <div id="right">
                    <?php 
                        $date = new DateTime();
                        $currentDate = $date->format('Y-m-d H:i:s');
                        if(isset($_GET['id'])){
                            $res = mysqli_query($conn, "UPDATE reservations SET ConfirmationDate = '".$currentDate."' WHERE ReservationID = ".$_GET['id']);

                            if($res){
                                echo "<h1 style='color:green'>Successfully Confirmed Booking Request</h1>";
                            }else{
                                echo "<h1 style='color:red'>Error: Failed Confirming Booking Request</h1>"; 
                            }
                        }else{
                            echo "<h1 style='color:red'>Invalid Booking Request</h1>"; 
                        }
                    ?>           
                </div>
                </div>
            </div>
        </main>   
    </body>
</html>