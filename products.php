<?php
    session_start();
    include("header.php");
    require_once "connect.php";
?>

<style>
    td{
        padding-right: 10px;
    }
    th{
        padding-right: 10px; 
    }
</style>

<div class="container">
    <?php
        
        $conn = @new mysqli($dbHost, $dbUserWin, $dbPassWin, $database);

        if($conn -> connect_errno != 0)
        {
            echo "Connection failed: ".$conn -> connect_errno;
        }
        else
        {
            if($_SESSION['logged'] == false)
            {
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);
                echo '<h3>Tabela produktów</h3>';

                echo "<table>";
                    echo "<tr>
                            <th>ID produktu</th><th>Nazwa</th><th>Opis</th><th>Cena</th><th>Zdjecie</th><th>Akcje</th>
                        </tr>";
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$row['ID_product']."</td>";
                        echo "<td>".$row['product_nazwa'].""."</td>";
                        echo "<td>".$row['product_opis']."</td>";
                        echo "<td>".$row['product_cena']."</td>";
                        echo "<td>".$row['product_foto']."</td>";
                        echo "<td>"."[unavailable]"."</td>";
                    }
                echo "</table>";
            }
            elseif($_SESSION['logged'] == true)
            {
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);
                echo '<h3>Tabela produktów</h3>';
                echo "<a href='add_product.php'><input type='button' name='submit' value='Dodaj produkt'></a>";
                
                echo "<table>";
                    echo "<tr>
                            <th>ID produktu</th><th>Nazwa</th><th>Opis</th><th>Cena</th><th>Zdjecie</th><th>Akcje</th>
                        </tr>";
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$row['ID_product']."</td>";
                        echo "<td>".$row['product_nazwa']."</td>";
                        echo "<td>".$row['product_opis']."</td>";
                        echo "<td>".$row['product_cena']."</td>";
                        echo "<td>".$row['product_foto']."<a href='upload_img.php?id=".$row['ID_product']."'><input type='button'       name='submit' id='button_img' value='Dodaj zdjęcie'></a>".' ';
                            if(!empty($row['product_foto']))
                            {
                                echo "<img src='./image/".$row['product_foto']."' height='50' width='50'/>";
                            }
                        echo "</td>";
                        
                        echo "<td>".
                                "<a href='edit_product.php?id=".$row['ID_product']."'><input type='button' name='submit' id='button_edit' value='Edytuj'></a>".' '.
                                "<a href='remove_product.php?id=".$row['ID_product']."><input type='button' name='submit' id='button_usun' value='Usun'>Usun</a>".
                            "</td>";
                    }
                echo "</table>";
            }

            $conn -> close();
        }
    ?>
</div>

<?php
    include("footer.php");
?>