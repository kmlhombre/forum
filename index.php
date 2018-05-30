<?php
    session_start();
    if(isset($_GET['wyloguj'])) {
        if($_GET['wyloguj'] == 1) {
            $_SESSION['login'] = 0;
            $_SESSION['admin'] = 0;
            echo '<script>location.href="index.php"</script>';
        }
    }
?>
<html>
    <head>
        <title>Strona Główna</title>
        <meta chatset="UTF-8"/>
    <head>
    <body>
        <?php
            include_once('connect.php');
            mysqli_query($connect, "SET CHARSET utf8");
            mysqli_query($connect, "SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 

            if(!isset($_SESSION['login'])) {
                $_SESSION['login'] = 0;
            }
            if($_SESSION['login'] == 0) {
                echo '<a href="login.php">Zaloguj</a><br>';
                echo '<a href="register.php">Zarejestruj się</a>';
            }
            else {
                echo '<a href="index.php?wyloguj=1">Wyloguj</a>';
            }

            $query = mysqli_query($connect, "SELECT * FROM `dzial` ORDER BY id_dzial ASC");

            if($query) {
                if(mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_array($query)) {
                        echo "<h1>".$row['nazwa']."</h1><br>";
                        $query2 = mysqli_query($connect, "SELECT * FROM `kategoria` WHERE id_dzial = ".$row['id_dzial']." ORDER BY id_kategoria ASC");
                        if($query2) {
                            if(mysqli_num_rows($query2) > 0) {
                                while($row2 = mysqli_fetch_array($query2)) {
                                    echo "<h3><a href='category.php?id_cat=".$row2['id_kategoria']."'>".$row2['nazwa']."</a></h3><br>";
                                }
                            }
                        }
                    }
                }
            }
        ?>
    </body>
</html>