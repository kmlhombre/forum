<?php
    include_once('connect.php');
?>
<form method="POST">
    Login: <input type="text" name="login"/><br>
    Hasło: <input type="password" name="passwd"/><br>
    Powtórz hasło: <input type="password" name="passwd2"/><br>
    <input type="submit" value="Zarejestruj"/>
</form>
<?php
    if(isset($_POST['login'], $_POST['passwd'], $_POST['passwd2'])) {
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];
        $passwd2= $_POST['passwd2'];

        if($passwd == $passwd2) {
            $login_query = mysqli_query($connect, "SELECT * FROM `user` WHERE login = '$login'");

            if(mysqli_num_rows($login_query) == 0) {
                $add = mysqli_query($connect, "INSERT INTO `user`(id_user, login, passwd) VALUES ('', '$login', '$passwd')");
                if($add) {
                    echo '  <script>
                                alert("Zarejestrowano pomyślnie");
                                location.href="index.php";
                            </script>';
                }
            }
            else {
                echo '<script>alert("TAKI LOGIN ISTNIEJE JUŻ W BAZIE")</script>';
            }
        }
        else {
            echo '<script>alert("HASŁA NIE SĄ TAKIE SAME")</script>';
        }
    }
?>