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
                    <img id="menu" src="./images/icons/menu.png" alt="menu" onclick="menuButton()">
                </div>
                <div>
                    <a href="index.php"><img id="logo" src="./images/icons/logo.png" alt="logo"></a>
                </div>
            </div>
        </header>
        <main>
            <div class="divider">
                <div id="left">
                    <?php include_once './php/menu.php'; ?>
                </div>
                <div id="right">
                    <!-- This will show ticket information and it is where users can cancel the reservations -->
                    <div id="right_left">
                        <div class="table_div2">
                            <table>
                                <tr>
                                    <th colspan="2">Location 1</th>
                                </tr>
                                <tr>
                                    <td class="td_bold">Vehicle Plate No.</td>
                                    <td>ABC 123</td>
                                </tr>
                                <tr>
                                    <td class="td_bold">Terminal</td>
                                    <td>Location 1</td>
                                </tr>
                                <tr>
                                    <td class="td_bold">Time</td>
                                    <td>8:00 - 8:30 am</td>
                                </tr>
                                <tr>
                                    <td class="td_bold">Quantity</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td class="td_bold">Fare Price</td>
                                    <td>PHP 100.00</td>
                                </tr>
                                <tr>
                                    <td class="td_bold">Total Amount</td>
                                    <td>PHP 100.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a href="#" class="button_blue"><button>Cancel</button></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- This will show ticket log ( ticket number, confirmed date, departure time, ride confirmed) -->
                    <div id="right_right">
                        <div class="ticket">
                            <div class="ticket_img">
                                <img id="vhire" src="./images/icons/vhire2.png" alt="vhire">
                            </div>
                            <div class="ticket_details">
                                <div class="ticket_gap">
                                    <h2>Booking Details</h2>
                                </div>
                                <div>
                                    <h2>Order Number</h2>
                                    <h2>#123</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="ticket_img">
                                <img id="dot" src="./images/icons/dot.png" alt="dot">
                            </div>
                            <div class="ticket_details">
                                <div class="ticket_gap">
                                    <h2>Booking Confirmed</h2>
                                    <p>MM-DD-YYYYY</p>
                                </div>
                                <div class="ticket_gap">
                                    <h2>Vehicle Available</h2>
                                    <p>MM-DD-YYYYY</p>
                                </div>
                                <div class="ticket_gap">
                                    <h2>Ride Confirmed</h2>
                                    <p>MM-DD-YYYYY</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>   
    </body>
</html>