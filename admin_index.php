<!DOCTYPE html>
<html lang="en">
    <?php
        include_once './php/connection.php';

        if(isset($_SESSION['user'])){
            if ($_SESSION['user']['role']=='driver'){
                header('Location:./driver_index.php');
            }else if ($_SESSION['user']['role']=='passenger'){
                header('Location:./index.php');
            }else if ($_SESSION['user']['AdminType']=='SuperAdmin'){
                header('Location:./super_admin.php');
            }
        }else{
            header('Location:./login.php');
        }

        $terminals = mysqli_query($conn, "SELECT * FROM terminal");
        include_once './php/head.php';
    ?>
      <body>
        <header>
            <div id="header">
                <div class="hamburgerMenu">
                    <img id="menu" src="./images/icons/menu.png" alt="menu" onclick="menuButton()">
                </div>
                <div>
                    <a href="super_admin.php"><img id="logo" src="./images/icons/logo.png" alt="logo"></a>
                </div>
            </div>
        </header>
        <main>
            <div class="divider">
                <div id="left">
                    <?php include_once './php/super_menu.php'; ?>
                </div>
                <div id="right">
                   <div class="center">
                        <div class="title">
                            <h1>Welcome, <?php echo $_SESSION['user']['FirstName']; ?>!</h1>
                        </div>
                        <!-- <div class="center_img">
                            <img id="loginlogo" src="./images/icons/logo2.png" alt="logo">
                        </div> -->
                    <?php 
                        while($terminal = mysqli_fetch_assoc($terminals)){  

                            $result = mysqli_query($conn, "SELECT CONCAT(vhire.Brand,' ',vhire.Model,' ',PlateNumber) AS VehicleName,
                                                    trip.RouteID, 
                                                    CONCAT(driver.FirstName,' ',driver.LastName) AS DriverName,
                                                    trip.EstimatedTimeDeparture AS EstimatedTimeDeparture,
                                                    trip.EstimatedTimeArrival AS EstimatedTimeArrival,
                                                    trip.Status AS Status,
                                                    trip.TripID AS TripID
                                                    FROM trip 
                                                    INNER JOIN route ON trip.RouteID = route.RouteID 
                                                    INNER JOIN vhire ON vhire.VehicleID = trip.VehicleID 
                                                    INNER JOIN driver ON driver.DriverID = vhire.DriverID
                                                    WHERE route.OriginalTerminalID =".$terminal['TerminalID']."
                                                    ORDER BY trip.EstimatedTimeDeparture
                                                    ");      
                            $tripCount = mysqli_num_rows($result);
                            $result2 = mysqli_query($conn,"SELECT * FROM reservations 
                                                            INNER JOIN customer ON reservations.CustomerID = customer.CustomerID
                                                            INNER JOIN trip ON reservations.TripID = trip.TripID
                                                            INNER JOIN route ON trip.RouteID = route.RouteID
                                                            WHERE route.OriginalTerminalID = ".$terminal['TerminalID']);
                            $reservationCount = mysqli_num_rows($result2);
                    ?>
                        <div class="center">
                            <?php if(mysqli_num_rows($result) == 0){ 
                                echo "<div class='center'>
                                <h1 style='color: black;'>".$terminal['LocationName']."</h1><hr><br><br>
                                <h2 style='color: black;'>Trips<hr><br><br>
                                <h2 style='color: red;'>Sorry No Available Trips for this Terminal</h2>
                                </div>";
                            }else{ ?>
                            <h1 style="color: black;"><?php echo $terminal['LocationName'];?></h1><hr>
                            <h2 style="color: black;"><?php echo $tripCount;?> Available Trips </h2>
                            <table class="paleBlueRows">
                                <thead>
                                <tr>
                                    <th>Trip ID</th>
                                    <th>Vehicle Name</th>
                                    <th>Route ID</th>
                                    <th>Driver Name</th>
                                    <th>Estimated Time Departure</th>
                                    <th>Estimated Time Arrival</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tr>
                                    <tbody>
                                        <?php while($trip = mysqli_fetch_assoc($result)){?>
                                            <tr>
                                                <td><?php echo $trip["TripID"]; ?></td>
                                                <td><?php echo $trip["VehicleName"]; ?></td>
                                                <td><?php echo $trip["RouteID"]; ?></td>
                                                <td><?php echo $trip["DriverName"]; ?></td>
                                                <td><?php echo $trip["EstimatedTimeDeparture"]; ?></td>
                                                <td><?php echo $trip["EstimatedTimeArrival"]; ?></td>
                                                <td><?php echo $trip["Status"]; ?></td>
                                            </tr> 
                                        <?php } ?>
                                    </tbody>
                                </tr>
                            </table>
                            <?php } ?>

                            <?php if(mysqli_num_rows($result2) == 0){ 
                                    echo "<div class='center'>
                                    <h2 style='color: black;'> Reservations </h2><hr><br><br>
                                    <h2 style='color: red;'>Sorry No Available Reservations for this Terminal</h2>
                                    </div>";
                                }else{                                
                            ?>
                                <h2 style='color: black;'><?php echo $reservationCount;?> Reservations </h2><hr><br><br>
                                <table class="paleBlueRows">
                                    <thead>
                                    <tr>
                                        <th>Reservation ID</th>
                                        <th>Customer Name</th>
                                        <th>TripID</th>
                                        <th>Quantity</th>
                                        <th>BookedDate</th>
                                        <th>ConfirmationDate</th>
                                        <th>Total Fare</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <tbody>
                                            <?php while($reservation = mysqli_fetch_assoc($result2)){?>
                                                <tr>
                                                    <td><?php echo $reservation["ReservationID"]; ?></td>
                                                    <td><?php echo $reservation["FirstName"]." ".$reservation["LastName"]; ?></td>
                                                    <td><?php echo $reservation["TripID"]; ?></td>
                                                    <td><?php echo $reservation["Quantity"]; ?></td>
                                                    <td><?php echo $reservation["BookedDate"]; ?></td>
                                                    <td><?php echo ($reservation["ConfirmationDate"])? $reservation["ConfirmationDate"]:"Not yet confirmed"; ?></td>
                                                    <td><?php echo $reservation["TotalFare"]; ?></td>
                                                    <td><?php echo $reservation["Status"]; ?></td>
                                                </tr> 
                                            <?php } ?>
                                        </tbody>
                                    </tr>
                                </table>             
                            <?php } ?>    
                        </div>
                    <?php 
                           
                        }
                    ?>
                   </div>
                </div>      
            </div>

        </main>   
    </body>     
</html>