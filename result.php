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
                        <!-- The form will call search_action.php which will search for the route -->
                        <form id="search" class="search_form" method="GET" onsubmit="searchSubmit(event)" >
                            <div class="form_div">
                                <div class="select_div">
                                    <label for="origin">From:</label>
                                    <select name="origin" id="origin">

                                        <?php                                       
                                            echo    "<option value=".$_SESSION['origin']['TerminalID']." selected hidden>
                                                        ".$_SESSION['origin']['LocationName']."
                                                    </option>";

                                            $select = "SELECT * FROM Terminal"; 
                                            $query= mysqli_query($conn, $select);
                                            if(mysqli_num_rows($query) > 0){
                                                while( $row = mysqli_fetch_assoc($query) ){
                                                    echo "<option value=".$row['TerminalID'].">".$row['LocationName']."</option>";
                                                }
                                            }
                                        ?>

                                    </select>
                                </div>
                                <div class="select_div">
                                    <label for="destination">To:</label>
                                    <select name="destination" id="destination">

                                        <?php
                                            echo    "<option value=".$_SESSION['destination']['TerminalID']." selected hidden>
                                                        ".$_SESSION['destination']['LocationName']."
                                                    </option>";

                                            $select = "SELECT * FROM Terminal"; 
                                            $query= mysqli_query($conn, $select);
                                            if(mysqli_num_rows($query) > 0){
                                                while( $row = mysqli_fetch_assoc($query) ){
                                                    echo "<option value=".$row['TerminalID'].">".$row['LocationName']."</option>";
                                                }
                                            }
                                        ?>

                                    </select>
                                </div>
                                <div class="select_div">
                                    <label for="time">Time:</label>
                                    <select name="time">

                                        <?php
                                            echo    "<option value=".$_SESSION['time']." selected hidden>
                                                        ".$_SESSION['time']."
                                                    </option>";
                                        ?>

                                        <option value="5:00 - 5:59 AM">5:00 - 5:59 AM</option>
                                        <option value="6:00 - 6:59 AM">6:00 - 6:59 AM</option>
                                        <option value="7:00 - 7:59 AM">7:00 - 7:59 AM</option>
                                        <option value="8:00 - 8:59 AM">8:00 - 8:59 AM</option>
                                        <option value="9:00 - 9:59 AM">9:00 - 9:59 AM</option>
                                        <option value="10:00 - 10:59 PM">10:00 - 10:59 PM</option>
                                        <option value="11:00 - 11:59 PM">11:00 - 11:59 PM</option>
                                        <option value="12:00 - 12:59 PM">12:00 - 12:59 PM</option>
                                        <option value="1:00 - 1:59 PM">1:00 - 1:59 PM</option>
                                        <option value="2:00 - 2:59 PM">2:00 - 2:59 PM</option>
                                        <option value="3:00 - 3:59 PM">3:00 - 3:59 PM</option>
                                        <option value="4:00 - 4:59 PM">4:00 - 4:59 PM</option>
                                        <option value="5:00 - 5:59 PM">5:00 - 5:59 PM</option>
                                        <option value="6:00 - 6:59 PM">6:00 - 6:59 PM</option>
                                        <option value="7:00 - 7:59 PM">7:00 - 7:59 PM</option>
                                        <option value="8:00 - 8:59 PM">8:00 - 8:59 PM</option>
                                        <option value="9:00 - 9:59 PM">9:00 - 9:59 PM</option>
                                        <option value="10:00 - 10:59 PM">10:00 - 10:59 PM</option>
                                    </select>
                                </div>
                                <button value="search" name="search">Search</button>
                            </div>   
                        </form>
                        <div class="table_div3">
                            <!-- This will show available vehicles according to the origin, destination, departure time, and number of available seats  -->
                            <table>
                                <tr>
                                    <th class='td_other'>Origin</th>
                                    <th class='td_other'>Destination</th>
                                    <th class='t_other'>Departure Time</th>
                                    <th class='t_other'>Vhire No.</th>
                                    <th class='t_other'>Available Seats</th>
                                    <th class='t_other'>Fare Price</th>
                                    <th class='t_other'></th>
                                </tr>
                                
                                <!-- This will show the trips based on the route (Origin - Destination), time, and available seats  -->
                                <?php
                                    // GET TIME
                                    $parts = preg_split('/ /', $_SESSION['time'], -1, PREG_SPLIT_OFFSET_CAPTURE);

                                    date_default_timezone_set("Hongkong");
                                    $day = date("Y/m/d");

                                    $time = $parts[0][0] . $parts[3][0];
                                    $time2 = $parts[2][0] . $parts[3][0];
                                    $d = strtotime($day . $time);
                                    $d2 = strtotime($day . $time2);
                                    $l_time = date("Y-m-d h:i:sa", $d);
                                    $r_time = date("Y-m-d h:i:sa", $d2);

                                    $r_select = "SELECT * FROM `Route` WHERE OriginalTerminalID=".$_SESSION['origin']['TerminalID']." AND DestinationTerminalID=".$_SESSION['destination']['TerminalID'].""; 
                                    $r_query = mysqli_query($conn, $r_select);
                                    $route = mysqli_fetch_assoc($r_query);

                                    $select = "SELECT * FROM Trip WHERE RouteID=".$route['RouteID']." AND EstimatedTimeDeparture>='$l_time' AND EstimatedTimeDeparture<='$r_time'";
                                    $query= mysqli_query($conn, $select);
                                    if(mysqli_num_rows($query) > 0){
                                        while( $row = mysqli_fetch_assoc($query) ){

                                            $date = $row['EstimatedTimeDeparture'];
                                            $dtime = new DateTime($date);

                                            echo    "<tr>
                                                        <td class='td_other'>".$_SESSION['origin']['LocationName']."</td>
                                                        <td class='td_other'>".$_SESSION['destination']['LocationName']."</td>
                                                        <td class='t_other'>".$dtime->format('h:i A')."</td>
                                                        <td class='t_other'>".$row['VehicleID']."</td>
                                                        <td class='t_other'>".$row['AvailableSeats']."</td>
                                                        <td class='t_other'>".$route['Fare']."</td>
                                                        <td class='t_other'><a href='reservation.php?id=".$row['TripID']."' class='result_button'><button>+</button></a></td>
                                                    </tr>";
                                        }
                                    }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>   
    </body>
</html>