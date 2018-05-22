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