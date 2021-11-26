<?php
    include_once 'connection.php';

    $retVal = "";
    $isValid = true;
    $status = 400;

    if(!isset($_GET['id'])){
        header('Location:./result.php');
    }else{
        $trip_id = $_GET['id'];
    }
        // $queryTrip = "SELECT * FROM " --> unfinished Query
    if($trip_id){
        // $insertTripReserve = "INSERT INTO reservations SET " --> unfinished Query
    }
    // $res_id = trim($_GET['res_id']);
    // $res_status = trim($_GET['res_status']);

    // if($res_status == "Accepted"){
    //     $retVal = "Ticket has been accepted.";
    // }else{
    //     $retVal = "Ticket has been cancelled.";
    // }

    // if($isValid){
    //     date_default_timezone_set('Asia/Manila');
    //     $today = date("Y-m-d h:i:s A");
    //     $updateRes = "UPDATE Reservations SET `Status`='$res_status', ConfirmationDate='$today' WHERE ReservationID='$res_id'";
    //     if(mysqli_query($conn,$updateRes)){
    //         $status = 200;
    //     }
    // }   

    $myObj = array(
        'status' => $status,
        'message' => $retVal  
    );
    
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $conn->close();
?>