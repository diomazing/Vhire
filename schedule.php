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
                    <div class="center3">
                        <div class="title2">
                            <!-- This will show the Schedule for today -->
                            <h1>Schedule for Month XX, 2021</h1>
                        </div>
                        <div class="table_div">
                            <!-- This will show all the Terminals and their respective scheduled departure time of the day (iterate from the route table) -->
                            <table>
                                <tr>
                                    <th colspan="7">Location 1</th>
                                </tr>
                                <tr>
                                    <td class="td_bold">1</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>11</td>
                                    <td class="td_other">8:00 - 8:30</td>
                                    <td class="td_other">PHP 100</td>
                                    <td><a href="/Vhire_Updated/reservation.php/?id=1"><button>+</button></a></td>
                                </tr>
                                <tr>
                                    <td class="td_bold">2</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>12</td>
                                    <td>9:00 - 9:30</td>
                                    <td>PHP 100</td>
                                    <td><button>+</button></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th colspan="7">Location 2</th>
                                </tr>
                                <tr>
                                    <td class="td_bold">1</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>11</td>
                                    <td class="td_other">8:00 - 8:30</td>
                                    <td class="td_other">PHP 100</td>
                                    <td><button>+</button></td>
                                </tr>
                                <tr>
                                    <td class="td_bold">2</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>12</td>
                                    <td>9:00 - 9:30</td>
                                    <td>PHP 100</td>
                                    <td><button>+</button></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th colspan="7">Location 3</th>
                                </tr>
                                <tr>
                                    <td class="td_bold">1</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>11</td>
                                    <td class="td_other">8:00 - 8:30</td>
                                    <td class="td_other">PHP 100</td>
                                    <td><button>+</button></td>
                                </tr>
                                <tr>
                                    <td class="td_bold">2</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>12</td>
                                    <td>9:00 - 9:30</td>
                                    <td>PHP 100</td>
                                    <td><button>+</button></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th colspan="7">Location 4</th>
                                </tr>
                                <tr>
                                    <td class="td_bold">1</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>11</td>
                                    <td class="td_other">8:00 - 8:30</td>
                                    <td class="td_other">PHP 100</td>
                                    <td><button>+</button></td>
                                </tr>
                                <tr>
                                    <td class="td_bold">2</td>
                                    <td class="td_bold">ABC 123</td>
                                    <td class="td_location">Location X to Location X</td>
                                    <td>12</td>
                                    <td>9:00 - 9:30</td>
                                    <td>PHP 100</td>
                                    <td><button>+</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>   
    </body>
</html>