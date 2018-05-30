<?php
    session_start();
    include_once('connect.php');
?>
<html>
    <head>
        <title>---NAZWA KATEGORII---</title>
        <meta chatset="UTF-8"/>
    <head>
    <body>
        <?php
            mysqli_query($connect, "SET CHARSET utf8");
            mysqli_query($connect, "SET NAMES `utf8` COLLATE `utf8_polish_ci`");
            $id_kategoria = $_GET['id_cat'];

            $query = mysqli_query($connect, "SELECT * FROM `post` WHERE id_kategoria = $id_kategoria ORDER BY data DESC");
            $kategoria = mysqli_query($connect, "SELECT nazwa FROM `kategoria` WHERE id_kategoria = $id_kategoria");

            if($query && $kategoria) {
                if(mysqli_num_rows($query) > 0 && mysqli_num_rows($kategoria)) {
                    $kat = mysqli_fetch_array($kategoria);

                    if($_SESSION['login'] != 0) {
                        echo '<a href="post_add.php?cat='.$id_kategoria.'">Dodaj Post</a><br>';
                    }
                        echo "<h2>".$kat['nazwa']."</h2>";
                    while($row = mysqli_fetch_array($query)) {
                        echo "<h4><a href='post.php?id_post=".$row['id_post']."'>".$row['temat']."</a></h4>";
                    }
                }
            }
        ?>
    </body>
</html>