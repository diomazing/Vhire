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
                    <div class="right_equal">
                        <!-- This will retrieve in the database all of the routes of each Terminal -->
                        <div class="center_route">
                            <h2>Location 1</h2>
                            <button>Location 1 to Location X</button>
                            <button>Location 1 to Location X</button>
                            <button>More</button>
                        </div>
                        <div class="center_route">
                            <h2>Location 3</h2>
                            <button>Location 3 to Location X</button>
                            <button>Location 3 to Location X</button>
                            <button>More</button>
                        </div>
                        <div class="center_route">
                            <h2>Location 5</h2>
                            <button>Location 5 to Location X</button>
                            <button>Location 5 to Location X</button>
                            <button>More</button>
                        </div>
                    </div>
                    <div class="right_equal">
                        <div class="center_route">
                            <h2>Location 2</h2>
                            <button>Location 2 to Location X</button>
                            <button>Location 2 to Location X</button>
                            <button>More</button>
                        </div>
                        <div class="center_route">
                            <h2>Location 4</h2>
                            <button>Location 4 to Location X</button>
                            <button>Location 4 to Location X</button>
                            <button>More</button>
                        </div>
                        <div class="center_route">
                            <h2>Location 6</h2>
                            <button>Location 6 to Location X</button>
                            <button>Location 6 to Location X</button>
                            <button>More</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>   
    </body>
</html>