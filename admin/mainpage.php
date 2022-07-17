    <?php
require('scripts/php/db.php');
require('scripts/php/functions.php');

if (!isset($_SESSION['UserData'])) {
    exit(header("location:main.php"));
}
?>
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
    <!-- ..start..   -->

    <div id="mainbox" onclick="openFunction()">&#9776;</div>
    <div id="menu" class="sidemenu">
        <a href="index.php" id="link1" class="tsb c10 fon3">Home</a>
        <a href="mainpage.php" id="link2" class="tsb  c1 fon3">Main Page</a>
        <a href="ytupload.php" id="link3" class="tsb  c10 fon3">Trailer</a>
        <a href="devote.php" id="link4" class="tsb c10 fon3">Devotianal</a>
        <a href="query.php" id="link4" class="tsb c10 fon3">Queries</a>
        <a href="scripts/php/logout.php" id="link5" class="tsb bgc9 c1 bgc9 fon3">Logout</a>
        <div class="col-sm-10 mx-auto pt-5 m-5 navlogo">
            <img src="style_sheets/pictures/prelogo.png" width="100%" class="">
        </div>
        <div class="closebtn" onclick="closeFunction()">&times;</div>
    </div>



<div class="container ct mt-5 pb-5">
    <div class="col-sm-2 ">
        <img src="../style_sheets/pictures/logo.png" width="100%">
    </div>

    <div class="idtxt text-center pl-5 pr-5 pb-5 fon1 c9">
        Insert Data to Landing page
    </div>
    <div align="center" class=" ">
        <div class="col-sm-2">
            <button type="button" name="add" id="add" class="btn but btn-block btn-success" target="#myModal">Insert</button>
        </div>
    </div>
    </div>

        <div class="col-sm-8 mx-auto">
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <h4 class="modal-title">Insert Image</h4>
                        <!--                            <button type="button" class="close" data-dismiss="modal">×</button>-->
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                </div>
                <div class="col-sm-8 mx-auto d-block">
                    <div class="modal-body">
                        <form id="image_form" method="post" enctype="multipart/form-data" class="pt-5" style="height: 100vh ;">


                            <div class="form-group mt-5">
                                <label>Title</label>
                                <input type="text" name="fptitle" class="form-control" id="fptitle" placeholder="Title">
                            </div>

                            <div class="form-group ">
                                <label>Head</label>
                                <input type="text" name="fphead" class="form-control" id="fphead" placeholder="Head">
                            </div>

                            <div class="form-group ">
                                <label>Link</label>
                                <input type="text" name="fpbtn" class="form-control" id="fpbtn" placeholder="Link">
                            </div>

                            <input type="file" name="fpimg" id="fpimg" /></p><br />
                            <input type="hidden" name="action" id="action" value="insert" />
                            <input type="hidden" name="image_id" id="image_id" />
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-primary btn-round" />
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <div class="container ct mb-5">
            <div id="image_data">
            </div>
        </div>






    <script>
        $(document).ready(function() {
            fetch_data();

            function fetch_data() {
                var action = "fetch";
                $.ajax({
                    url: "scripts/php/fpprocess.php",
                    method: "POST",
                    data: {
                        action: action
                    },
                    success: function(data) {
                        $('#image_data').html(data);
                    }
                })
            }
            $('#add').click(function() {
                $('#myModal').modal('show');
                $('#image_form')[0].reset();
                $('.modal-title').text("Insert Image");
                $('#image_id').val('');
                $('#action').val('insert');
                $('#insert').val('Insert');
            });
            $('#image_form').submit(function(event) {
                event.preventDefault();
                var fptitle = $('#fptitle').val();
                var fphead = $('#fphead').val();
                var fpbtn = $('#fpbtn').val();
                var image_name = $('#fpimg').val();
                if (image_name == '') {
                    alert("Please Select Image");
                    return false;
                } else {
                    var extension = $('#fpimg').val().split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert("Invalid Image File");
                        $('#fpimg').val('');
                        $('#fptitle').val('');
                        $('#fphead').val('');
                        $('#fpbtn').val('');


                        return false;
                    } else {
                        $.ajax({
                            url: "scripts/php/fpprocess.php",
                            method: "POST",
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                alert(data);
                                fetch_data();
                                $('#image_form')[0].reset();
                                $('#myModal').modal('hide');

                            }


                        });
                    }
                }
            });

            $(document).on('click', '.update', function() {
                $('#image_id').val($(this).attr("id"));
                $('#action').val("update");
                $('.modal-title').text("Update Image");
                $('#insert').val("Update");
                $('#myModal').modal("show");
            });
            $(document).on('click', '.delete', function() {
                var image_id = $(this).attr("id");
                var action = "delete";
                if (confirm("Are you sure you want to remove this image from database?")) {
                    $.ajax({
                        url: "scripts/php/fpprocess.php",
                        method: "POST",
                        data: {
                            image_id: image_id,
                            action: action
                        },
                        success: function(data) {
                            alert(data);
                            fetch_data();
                        }
                    })
                } else {
                    return false;
                }
            });

        });

    </script>

    <script type="text/javascript" src="scripts/main.js"></script>
</body>

</html>
