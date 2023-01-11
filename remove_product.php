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
        if($_SESSION['logged'] == true)
        {
            $product_id=$_GET['id'];
            mysqli_query($conn, "DELETE FROM products WHERE ID_product='$product_id'");
            header('Location: products.php');
        }
        elseif($_SESSION['logged'] == false)
        {
            mysqli_close($conn);
            echo "Nie jestes zalogowany";
            
        }
    }
    

?>

<?php
/*
    $conn = @new mysqli($dbHost, $dbUserWin, $dbPassWin, $database);

    if($conn -> connect_errno != 0)
    {
        echo "Connection failed: ".$conn -> connect_errno;
    }
    else
    {
        if($_SESSION['logged'] == true)
        {
            if(isset($_POST['submit']))
            {
                $product_name = $_POST['remove'];
                
                $sql = "DELETE FROM products WHERE product_nazwa = '$product_name'";
                if(mysqli_query($conn, $sql))
                {
                    echo "Produkt usuniety";
                }
                else
                {
                    echo "Błąd podczas usuwania".mysqli_error($conn);
                }
                header('Location: index.php');
            }    
            mysqli_close($conn);
        }
        elseif($_SESSION['logged'] == false)
        {
            mysqli_close($conn);
            echo "Nie jestes zalogowany";
            
        }
    }
*/
?>
