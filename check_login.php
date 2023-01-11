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
        $login = mysqli_real_escape_string($conn ,$_POST['login']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $pass_md5 = md5($pass);


        $sql = "SELECT * FROM users WHERE users_login = '$login' AND users_haslo = '$pass_md5'";
        
        if($result = @$conn->query($sql))
        {
            if(mysqli_num_rows($result) > 0)
                {//logowanie poprawne
                    $_SESSION['logged'] = true;
                    $row = $result->fetch_assoc();  //fetch_assoc - tablica asocjacyjna z tablicy user(indeks jest słowny a nie numeryczny)
                    //$name = $row['users_imie'];
                    //echo "Witaj ".$name;
                    header('Location: products.php');
                    //Czyszczenie wyjetych rekordów z bazy
                    $result->close();

                }
            else
                {//login i haslo nie sa poprawne
                    echo "Login lub/i haslo nie jest poprawne";
                    $_SESSION['logged'] = false;
                }
        }
        $conn -> close();
    }
 
?>
