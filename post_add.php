<?php
    session_start();
    include_once('connect.php');
?>
<html>
    <head>
        <meta chatset="UTF-8"/>
    <head>
    <body>
        <?php
            mysqli_query($connect, "SET CHARSET utf8");
            mysqli_query($connect, "SET NAMES `utf8` COLLATE `utf8_polish_ci`");
        ?>
        <form method="POST">
            Temat: <input type="text" name="temat"/><br>
            Treść: <textarea name="tresc"></textarea><br>
            <input type="submit" value="Dodaj"/>
        </form>
        <?php
            if(isset($_GET['cat'], $_SESSION['login'], $_POST['temat'], $_POST['tresc'])) {
                $data = date("Y-m-d");
                $kategoria = $_GET['cat'];
                $user = $_SESSION['login'];
                $temat = $_POST['temat'];
                $tresc = $_POST['tresc'];

                $add = mysqli_query($connect, 
                "INSERT INTO `post`(id_post, temat, tresc, id_user, data, id_kategoria) 
                VALUES ('', '$temat', '$tresc', $user, '$data', $kategoria)");

                echo '<script>location.href = "category.php?id_cat='.$kategoria.'"</script>';
            }
        ?>
    </body>
</html>