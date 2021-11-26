var xhttp = new XMLHttpRequest();

function debug(e){
    console.log("Test");
    e.preventDefault();
}

function menuButton(){
    var x = document.getElementById("left");
    if (x.style.display === "flex") {
        x.style.display = "none";
    } else {
        x.style.display = "flex";
    }
}

function filetext(){
    var filename = document.getElementById("fileinput");
    document.getElementById("fileins").innerHTML = filename.value.replace("C:\\fakepath\\", "");
    document.getElementById("fileins").style.borderColor =  "black";
}

function profileUpdate(){
    var x = document.getElementById("imageform");
    var y = document.getElementById("profileform_btn");
    var z = document.getElementById("edit_btn");
    if (x.style.display === "grid") {
        x.style.display = "none";
        y.style.display = "none";
        z.innerHTML = "Edit";
        $("#profileform :input").prop('readonly', true);
    } else {
        x.style.display = "grid";
        y.style.display = "block";
        z.innerHTML = "Cancel";
        $("#profileform :input").prop('readonly', false);
    }
}

function calcFare(){
  var fare = document.getElementById("fare_price").innerHTML;
  var tickets = document.getElementById("t_quantity").value;
  var total = parseFloat(fare) * tickets;
  total = parseFloat(total).toFixed(2);
  if (!isNaN(total)){
    document.getElementById("total_fare").innerHTML = total;
  }
}

function signupSubmit(e){
    var data = $("#signupform").serialize();
    $.ajax({
        type : 'GET',
        url : './php/signup_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["status"] == 200){
                $('#signupform')[0].reset();
                Swal.fire({
                    title: 'SUCCESS!',
                    text: "Account Created Successfully",
                    icon: 'success',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Login'
                }).then((result) => {
                    window.location.href = './login.php';
                })
            }else{
                console.log(res["message"]);
                Swal.fire({
                    title: 'Invalid Input',
                    text: res["message"],
                    icon: 'error',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                });
            }
        }
    });
    e.preventDefault();
}

function loginSubmit(e){
    var data = $("#loginform").serialize();
    $.ajax({
        type : 'GET',
        url : './php/login_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["message"] != ""){
                console.log(res["message"]);
                Swal.fire({
                    title: 'Invalid Input',
                    text: res["message"],
                    icon: 'error',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                });
            }
            if(res["status"] == 200){
                if(res["data"] == "admin" ){
                    window.location.replace('./admin_index.php');
                }else if(res["data"] == "driver"){
                    window.location.replace('./driver_index.php');
                }else if(res["data"] == "passenger"){
                    window.location.replace('./index.php');
                }
            }
        }
    });
    e.preventDefault();
}

function signoutClick(e){
    Swal.fire({
        title: 'Logout',
        text: "Are you sure you want to sign out?",
        imageUrl: './images/icons/exit.png',
        imageWidth: 150,
        imageHeight: 150,
        showCancelButton: true,
        confirmButtonColor: '#3C64B1',
        confirmButtonText: 'Yes',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            var url = "./php/signout_action.php";
            xhttp.open("GET", url, true);
            xhttp.send();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var res = JSON.parse(this.responseText);
                    if(res["status"] == 200){
                        window.location.replace('./login.php');
                    }
                }
            };
        }
    });
}

function searchSubmit(e){
    var data = $("#search").serialize();
    $.ajax({
        type : 'GET',
        url : './php/search_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["message"] != ""){
                console.log(res["message"]);
                Swal.fire({
                    title: 'Invalid Input',
                    text: res["message"],
                    icon: 'error',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                });
            }
            if(res["status"] == 200){
                window.location.replace('./result.php');
            }
        }
    });
    e.preventDefault();
}

function profileSubmit(e){
    var data = $("#profileform").serialize();
    $.ajax({
        type : 'GET',
        url : './php/profile_update.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["message"] != ""){
                console.log(res["message"]);
                Swal.fire({
                    title: 'Invalid Input',
                    text: res["message"],
                    icon: 'error',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                });
            }
            if(res["status"] == 200){
                if(res["data"] == "driver"){
                    window.location.replace('./driver_profile.php');
                }else if(res["data"] == "passenger"){
                    window.location.replace('./profile.php');
                }
            }
        }
    });
    e.preventDefault();
}

function addAdmin(e){
    var data = $("#adminform").serialize();
    $.ajax({
        type : 'GET',
        url : './php/add_admin.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["status"] == 200){
                $('#adminform')[0].reset();
                Swal.fire({
                    title: 'SUCCESS!',
                    text: "Account Created Successfully",
                    icon: 'success',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    window.location.href = './admin_form.php';
                })
            }else{
                console.log(res["message"]);
                Swal.fire({
                    title: 'Invalid Input',
                    text: res["message"],
                    icon: 'error',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                });
            }
        }
    });
    e.preventDefault();
}

function addVehicle(e){
    var data = $("#vehicleform").serialize();
    $.ajax({
        type : 'GET',
        url : './php/add_vehicle.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["status"] == 200){
                $('#vehicleform')[0].reset();
                Swal.fire({
                    title: 'SUCCESS!',
                    text: "Vehicle Added Successfully",
                    icon: 'success',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    window.location.href = './vehicle.php';
                })
            }else{
                console.log(res["message"]);
                Swal.fire({
                    title: 'Invalid Input',
                    text: res["message"],
                    icon: 'error',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                });
            }
        }
    });
    e.preventDefault();
}

function confirmRes(e, id){
    e.preventDefault();
    var data = $("#ticket_confirm").serialize();
    $.ajax({
        type : 'GET',
        url : './php/accept_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["status"] == 200){
                $('#ticket_confirm')[0].reset();
                Swal.fire({
                    title: 'SUCCESS!',
                    text: res["message"],
                    icon: 'success',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    window.location.href = './confirmation.php?id='+id;
                });
            }
        }
    });
    e.preventDefault();
}

function cancelRes(e, id){
    e.preventDefault();
    var data = $("#ticket_cancel").serialize();
    $.ajax({
        type : 'GET',
        url : './php/accept_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["status"] == 200){
                $('#ticket_cancel')[0].reset();
                Swal.fire({
                    title: 'SUCCESS!',
                    text: res["message"],
                    icon: 'success',
                    confirmButtonColor: '#3C64B1',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    window.location.href = './confirmation.php?id='+id;
                });
            }
        }
    });
    e.preventDefault();
}