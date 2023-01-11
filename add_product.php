<?php
    session_start();
    include("header.php");
    require_once "connect.php"; 
?>

<style>
    label {display:block;}
    textarea { display:block;}
</style>

<div class="container">
    <form method="POST">
        <h2>Dodawanie produktu</h2>
            <table>
                <tr>
                    <td>
                        <label for='nazwa_txt_box'>Podaj nazwę:</label>
                        <input type='text' id='nazwa_txt_box' name='nazwa_txt_box'>
                    </td>
                <tr>
                    <td>
                        <label for='opis_txt_box'>Podaj opis produktu:</label>
                        <textarea id='opis_txt_box' name='opis_txt_box' cols='50' rows='7'></textarea>
                    </td>
                <tr>
                    <td>
                        <label for='cena_txt_box'>Podaj cenę:</label>
                        <input type='text' id='cena_txt_box' name='cena_txt_box' size='10'>
                    </td>
                <tr>
                    <td>
                        <input type='submit' id='add_button' name='submit_form' value='Dodaj'>
                    </td>
            </table>
    

        <?php
            $conn = @new mysqli($dbHost, $dbUserWin, $dbPassWin, $database);

                if($conn -> connect_errno != 0)
                {
                    echo "Connection failed: ".$conn -> connect_errno;
                }
                else
                {
                    if($_SESSION['logged'] == true)
                    {
                        if($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                            $query = "INSERT INTO products (product_nazwa, product_opis, product_cena) VALUES (?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $query); //przygotowanie zapytania do wykonania na bazie danych

                            $nazwaProd = $_POST['nazwa_txt_box'];
                            $opisProd = $_POST['opis_txt_box'];
                            $cenaProd = $_POST['cena_txt_box'];
                            mysqli_stmt_bind_param($stmt, 'ssd', $nazwaProd, $opisProd, $cenaProd); //polaczenie danych z formularza do wysłania

                            mysqli_stmt_execute($stmt); //wykonanie zapytania

                            mysqli_close($conn);
                        }
                    }
                    elseif($_SESSION['logged'] == false)
                    {
                        mysqli_close($conn);
                        echo "Aby dodać produkt zaloguj się.";
                    }
                }
        ?>
    </form>
</div>