<!DOCTYPE html>
<html lang="en">
    <?php
        include_once './php/connection.php';

        if(isset($_SESSION['user'])){
            if ($_SESSION['user']['role']=='driver'){
                header('Location:./driver_index.php');
            }else if ($_SESSION['user']['role']=='passenger'){
                header('Location:./index.php');
            }else if ($_SESSION['user']['AdminType']=='Admin'){
                header('Location:./admin_index.php');
            }
        }else{
            header('Location:./login.php');
        }

        $vehicle = mysqli_query($conn, "SELECT * FROM vhire ");
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
                        
                        <div class="center" style="width: auto;">
                            <h1 style="color: black;">Terminals</h1>
                            <table class="paleBlueRows">
                                <thead>
                                <tr>
                                    <th>Terminal ID</th>
                                    <th>Admin ID</th>
                                    <th>Location Name</th>
                                    <th>City</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        <?php while( $terminalList  = mysqli_fetch_assoc($terminals)) {?>
                                            <tr>
                                                <td><?php echo $terminalList["TerminalID"]; ?></td>
                                                <td><?php echo $terminalList["AdminID"]; ?></td>
                                                <td><?php echo $terminalList["LocationName"]; ?></td>
                                                <td><?php echo $terminalList["City"]; ?></td>
                                            </tr> 
                                        <?php }?> 
                                    </tbody>
                                </tr>
                            </table>
                        </div>
                        <div class="center" style="width: auto;">
                        <h1 style="color: black; margin-top: 2rem">Vehicle In Terminal</h1>
                            <table class="paleBlueRows">
                                <thead>
                                <tr>
                                    <th>Vehicle ID</th>
                                    <th>Driver ID</th>
                                    <th>Plate Number</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Capacity</th>
                                    <th>Weight</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                    <tbody>
                                        <?php while( $VhireItem  = mysqli_fetch_assoc($vehicle)) {?>
                                            <tr>
                                                <td><?php echo $VhireItem["VehicleID"]; ?></td>
                                                <td><?php echo $VhireItem["DriverID"]; ?></td>
                                                <td><?php echo $VhireItem["PlateNumber"]; ?></td>
                                                <td><?php echo $VhireItem["Brand"]; ?></td>
                                                <td><?php echo $VhireItem["Model"]; ?></td>
                                                <td><?php echo $VhireItem["Capacity"]; ?></td>
                                                <td><?php echo $VhireItem["Weight"]; ?></td>
                                                <td><?php echo $VhireItem["Status"]; ?></td>
                                            </tr> 
                                        <?php }?> 
                                    </tbody>
                                </tr>
                            </table>
                        </div>
                   </div>
                </div>      
            </div>

        </main>   
    </body>     
</html>