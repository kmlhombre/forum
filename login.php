<?php
    session_start();
?>
<html>
    <head>
    </head>
    <body>
        <?php
            include_once('connect.php');
            echo '<a href="register.php">Zarejestruj się</a><br>';
        ?>
        <form method="POST">
            Login: <input type="text" name="login"/><br>
            Hasło: <input type="password" name="passwd"/><br>
            <input type="submit" value="ZALOGUJ"/>
        </form>

        <?php
            if(isset($_POST['login'], $_POST['passwd'])) {
                $login = $_POST['login'];
                $passwd = $_POST['passwd'];

                $query = mysqli_query($connect, "SELECT * FROM `user` WHERE login='$login'");

                if(mysqli_num_rows($query) != 0) {
                    $user = mysqli_fetch_array($query);
                    if($user['passwd'] == $passwd) {
                        if($user['ranga'] == 'a') {
                            $_SESSION['admin'] = 1;
                        }
                        else {
                            $_SESSION['admin'] = 0;
                        }
                        $_SESSION['login'] = $user['id_user'];
                        echo '<script>location.href="index.php"</script>';
                    }
                    else {
                        echo '<script>alert("Hasło niepoprawne")</script>';
                    }
                }
                else {
                    echo '<script>alert("Konto nie istnieje")</script>';
                }
            }
        ?>
    </body>
</html>