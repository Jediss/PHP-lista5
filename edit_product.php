<?php
    session_start();
    require_once "connect.php";
    $conn = @new mysqli($dbHost, $dbUserWin, $dbPassWin, $database);
    if($conn -> connect_errno != 0)
            {
                echo "Connection failed: ".$conn -> connect_errno;
            }
            else
            {
                $productID = $_GET['id'];
                $query = "SELECT * FROM products WHERE ID_product = $productID";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);

            }

?>
<style>
    label {display:block;}
    textarea { display:block;}
</style>

<div class="container">
    <form method="POST" action="update.php?id=<?php echo $productID; ?>">
        <h2>Edycja produktu</h2>
            <table>
                <tr>
                    <td>
                        <label for='nazwa_txt_box'>Zmień nazwę:</label>
                        <input type='text' id='nazwa_txt_box' name='nazwa_txt_box_zm' value="<?php echo $row['product_nazwa'] ?>">
                    </td>
                <tr>
                    <td>
                        <label for='opis_txt_box'>Zmień opis produktu:</label>
                        <textarea id='opis_txt_box' name='opis_txt_box_zm' cols='50' rows='7'><?php echo $row['product_opis'] ?></textarea>
                    </td>
                <tr>
                    <td>
                        <label for='cena_txt_box'>Zmień cenę:</label>
                        <input type='text' id='cena_txt_box' name='cena_txt_box_zm' size='10' value="<?php echo $row['product_cena'] ?>">
                    </td>
                <tr>
                    <td>
                        <a href="products.php"><input type='submit' id='edit_button' name='submit_form_zm' value='Edit'></a>
                    </td>
            </table>
    </form>    
        <?php

            if($conn -> connect_errno != 0)
            {
                echo "Connection failed: ".$conn -> connect_errno;
            }
            else
            {
                if($_SESSION['logged'] == true)
                {
                    
                    mysqli_close($conn);
                }
                elseif($_SESSION['logged'] == false)
                {
                    mysqli_close($conn);
                    echo "Nie jestes zalogowany";
                }
            }
        ?>
</div>