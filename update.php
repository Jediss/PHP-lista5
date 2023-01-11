<?php
    session_start();
    require_once "connect.php";
    $conn = @new mysqli($dbHost, $dbUserWin, $dbPassWin, $database);

    $id = $_GET['id'];

    $nazwa_box = $_POST['nazwa_txt_box_zm'];
    $opis_box = $_POST['opis_txt_box_zm'];
    $cena_box = $_POST['cena_txt_box_zm'];

    mysqli_query($conn, "UPDATE products SET product_nazwa='$nazwa_box', product_opis='$opis_box', product_cena='$cena_box' WHERE ID_product='$id'");
    header('Location: products.php');
?>