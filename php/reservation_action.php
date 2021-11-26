<?php
    function create_reservation($custID,$tripID,$quantity,$booked,$fare){
        $conn = mysqli_connect("localhost","root","","Vhire_Booking");

        $res = mysqli_query($conn, "INSERT INTO reservations(CustomerID,TripID,Quantity,BookedDate,TotalFare) 
                            VALUES ($custID,$tripID,$quantity,'$booked',$fare)");

        return $res;
    }
?>