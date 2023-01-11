<?php
    session_start();
    include("header.php");
    require_once "connect.php";
?>

<!DOCTYPE html>
    <html>

        <head>
            <title>Image Upload</title>
            
            <link rel="stylesheet" type="text/css" href="style.css" />
        </head>
        
        <body>
            <div id="container">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="file" name="uploadfile" value="" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                    </div>
                </form>
            </div>
        </body>
    </html>

    <?php
        if(isset($_POST['upload']))
        {
            $productID = $_GET['id'];
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "./image/".$filename;

            $conn = @new mysqli($dbHost, $dbUserWin, $dbPassWin, $database);

            $query = "UPDATE products SET product_foto='$filename' WHERE ID_product=$productID";
            mysqli_query($conn, $query);

            if(move_uploaded_file($tempname, $folder))
            {
                echo "<h3>Obraz załadowany poprawnie!</h3>";
            }
            else
            {
                echo "<h3>Error! Obraz nie zostal zaladowany.</h3>";
            }

        }
    ?>