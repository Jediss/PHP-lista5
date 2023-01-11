<?php
    include("header.php");
?>
<div class="container">
    <div class="row">
        <div class="text-center">
            <h2>Logowanie</h2>
            <form action="check_login.php" method="POST">
                Login: <input type="text" name="login" placeholder="Podaj login" required><br>
                Hasło: <input type="password" name="pass" placeholder="Podaj hasło" ><br><br>
                <input class="btn btn-info" type="submit" value="Zaloguj">
            </form>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>