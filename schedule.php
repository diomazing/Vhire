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

        // Fetch all terminal
        $res = mysqli_query($conn, "SELECT * FROM terminal");

        // Terminal Names into Local Array (Separate Query)
        $terminal = mysqli_query($conn, "SELECT * FROM terminal");
        $terminalName = array();
        for($x = 1; $row = mysqli_fetch_assoc($terminal); $x++){
            $terminalName[$x] = $row['LocationName'];
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
                            <h1>Schedule for Month <?php echo Date('F');?>, 2021</h1>
                        </div>
                        <div class="table_div">
                            <!-- This will show all the Terminals and their respective scheduled departure time of the day (iterate from the route table) -->
                        <?php while($terminal = mysqli_fetch_assoc($res)) {
                                $res2 = mysqli_query($conn, "SELECT * FROM trip INNER JOIN route ON trip.RouteID = route.RouteID 
                                                            INNER JOIN vhire ON trip.VehicleID = vhire.VehicleID 
                                                            WHERE route.OriginalTerminalID =".$terminal['TerminalID']);
                            ?>  
                            <table style="margin: 2rem 0">
                                <tr>
                                    <th colspan="7"><?php echo $terminal['LocationName']?></th>
                                </tr>

                        <?php if(mysqli_num_rows($res2) == 0) { 
                            echo "</table>No available trips for now.";

                        } else { 
                            while($trip = mysqli_fetch_assoc($res2)) {?>
                            
                                <tr>
                                    <td class="td_bold"><?php echo $trip['TripID'];?></td>
                                    <td class="td_bold"><?php echo $trip['PlateNumber'];?></td>
                                    <td class="td_location"><?php echo $terminalName[$trip['OriginalTerminalID']]." to ".$terminalName[$trip['DestinationTerminalID']]; ?></td>
                                    <td><?php echo $trip['AvailableSeats'];?></td>
                                    <td class="td_other"><?php echo $trip['EstimatedTimeDeparture']." - ".$trip['EstimatedTimeArrival'];?></td>
                                    <td class="td_other"><?php echo $trip['Fare'];?></td>
                                    <td><a href="/Vhire_Updated/reservation.php/?id=<?php echo $trip['TripID'];?>"><button>+</button></a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        <?php } 
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>   
    </body>
</html>