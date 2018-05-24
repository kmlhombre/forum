<?php
    session_start();
?>
<html>
    <head>

    </head>
    <body>
        <?php
            include_once('connect.php');
            mysqli_query($connect, "SET CHARSET utf8");
            mysqli_query($connect, "SET NAMES `utf8` COLLATE `utf8_polish_ci`");
            $id_post = $_GET['id_post'];

            $query = mysqli_query($connect, "SELECT * FROM `post` WHERE id_post = $id_post");

            if($query) {
                if(mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_array($query)) {
                        $autor = mysqli_query($connect, "SELECT login FROM `user` WHERE id_user = ".$row['id_user']);
                        $autor_r = mysqli_fetch_array($autor);
                        echo "TEMAT: ".$row['temat']."<br>";
                        echo "AUTOR: ".$autor_r['login']."<br>";
                        echo "TREŚĆ: ".$row['tresc']."<br>";
                        echo "DATA: ".$row['data']."<br>";
                        if($row['status'] == 1) {
                            echo "KOMENTUJ";
                        }
                    }
                }
            }
        ?>
    </body>
</html>