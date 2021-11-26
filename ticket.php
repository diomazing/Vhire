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
                    <div class="center4">
                        <div class="title2">
                            <h1>Ticket History</h1>
                        </div>
                        <div class="button_div">
                            <!-- This will show the Ticket history of the users (iterate from the reservations table) -->
                            <button>
                                <table>
                                    <tr>
                                        <td>Location 1 to Location X</td>
                                        <td>PHP 100.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sched: 8:00 - 8:30 Date: 2021-01-01 Origin: Location 1</td>
                                        <td>Order No. 123</td>
                                    </tr>
                                </table>
                            </button>
                            <button>
                                <table>
                                    <tr>
                                        <td>Location 1 to Location X</td>
                                        <td>PHP 100.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sched: 8:00 - 8:30 Date: 2021-01-01 Origin: Location 1</td>
                                        <td>Order No. 123</td>
                                    </tr>
                                </table>
                            </button>
                            <button>
                                <table>
                                    <tr>
                                        <td>Location 1 to Location X</td>
                                        <td>PHP 100.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sched: 8:00 - 8:30 Date: 2021-01-01 Origin: Location 1</td>
                                        <td>Order No. 123</td>
                                    </tr>
                                </table>
                            </button>
                            <button>
                                <table>
                                    <tr>
                                        <td>Location 1 to Location X</td>
                                        <td>PHP 100.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sched: 8:00 - 8:30 Date: 2021-01-01 Origin: Location 1</td>
                                        <td>Order No. 123</td>
                                    </tr>
                                </table>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>   
    </body>
</html>