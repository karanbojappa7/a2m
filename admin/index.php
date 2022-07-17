    <?php
require('scripts/php/db.php');
require('scripts/php/functions.php');

if (!isset($_SESSION['UserData'])) {
    exit(header("location:main.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>A2 Music Admin</title>
        <link rel="icon" href="../style_sheets/pictures/logo-ft.png" type="image/icon type" width="100%" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery-bez@1.0.11/src/jquery.bez.js"></script>
    <script src="scripts/pace.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style_sheets/style.css">
    <style>
    </style>
</head>

<body>


    <div id="mainbox" onclick="openFunction()">&#9776;</div>
    <div id="menu" class="sidemenu">
        <a href="index.php" id="link1" class="tsb c1 fon3">Home</a>
        <a href="mainpage.php" id="link2" class="tsb  c10 fon3">Main Page</a>
        <a href="ytupload.php" id="link3" class="tsb  c10 fon3">Trailer</a>
        <a href="devote.php" id="link4" class="tsb c10 fon3">Devotianal</a>
        <a href="query.php" id="link4" class="tsb c10 fon3">Queries</a>
        <a href="scripts/php/logout.php" id="link5" class="tsb bgc9 c1 bgc9 fon3">Logout</a>
        <div class="col-sm-10 mx-auto pt-5 m-5 navlogo">
            <img src="style_sheets/pictures/prelogo.png" width="100%" class="">
        </div>
        <div class="closebtn" onclick="closeFunction()">&times;</div>
    </div>




    <div class="container ct pb-5 mt-5">
        <div class="col-sm-2 ">
            <img src="../style_sheets/pictures/logo.png" width="100%">
        </div>

        <div class="idtxt text-center fon1 c9 wa">
            Welcome Admin
        </div>
    </div>
    <div class="container ct pb-5 mb-5">
        <div class="row text-center">
            <div class="col-sm-5 p-3  mx-auto">
                <a href="mainpage.php">
                    <div class="box">
                        <div class="fon1">
                            <div class="allhead">View / Insert</div><br> Content to home page
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-5 p-3  mx-auto">
                <a href="ytupload.php">
                    <div class="box">
                        <div class="fon1">
                            <div class="allhead">View / Insert</div><br> New Trailer videos
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-5 p-3 mx-auto">
                <a href="devote.php">
                    <div class="box">
                        <div class="fon1">
                            <div class="allhead">View / Update</div> <br>Devotianal video
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-5 p-3 mx-auto">
                <a href="query.php">
                    <div class="box">
                        <div class="fon1">
                            <div class="allhead">View</div> <br>All Messages and Queries
                        </div>
                    </div>
                </a>
            </div>
            <a>
                <div class="col-sm-4 mx-auto pt-5">
                    <a href="scripts/php/logout.php">
                        <div class="btn btn-block  mx-auto d-block lgout fon1">LOGOUT</div>
                    </a>
                </div>
            </a>
        </div>

    </div>
    <script>
        //$(document).ready(function() {
        //                $.ajax({
        //                    url:"scripts/php/session.php",
        //                    success:function(result){
        //                        $('#sess').php(result);
        //                    }
        //                });             
        //            });




sess();
        function sess() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        document.getElementById("txt").innerHTML = xhr.response;
                    } 
                }
            }
            
            xhr.open('GET', 'scripts/php/session.php');
            xhr.send();
            
        }

    </script>
    <script type="text/javascript" src="scripts/main.js"></script>
</body>

</html>
