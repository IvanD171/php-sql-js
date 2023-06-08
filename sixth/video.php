<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div class="lewy_baner">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div class="prawy_baner">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div class="polecamy">
        <h3>Polecamy</h3>
        <?php
                 $connection = mysqli_connect("localhost","root","root","dane3");
                 if($connection) {
                    $query = mysqli_query($connection,"SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN('18', '22', '23', '25')");

                    while($data = mysqli_fetch_array($query)) {
                        $id = $data['id'];
                        $nazwa = $data['nazwa'];
                        $opis = $data['opis'];
                        $zdjecie = $data['zdjecie'];

                        echo 
                         '<div class="film">
                           <h4>'.$id.'. '.$nazwa.'</h4>
                           <img src="'.$zdjecie.'" alt="film"><br>
                           <p>'.$opis.'</p>
                         </div>';
                    };
                    mysqli_close($connection);
                 }
                ?>
    </div>
    <div class="filmy_fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
                 $connection = mysqli_connect("localhost","root","root","dane3");
                 if($connection) {
                    $query = mysqli_query($connection,"SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12");

                    while($data = mysqli_fetch_array($query)) {
                        $id = $data['id'];
                        $nazwa = $data['nazwa'];
                        $opis = $data['opis'];
                        $zdjecie = $data['zdjecie'];

                        echo 
                         '<div class="film">
                           <h4>'.$id.'. '.$nazwa.'</h4>
                           <img src="'.$zdjecie.'" alt="film"><br>
                           <p>'.$opis.'</p>
                         </div>';
                    };
                    mysqli_close($connection);
                 }
                ?>
    </div>
    <div class="stopka">
        <form action="video.php" method="post">
        Usuń film nr.:<input type="number" name="usun" id=""> <button type="submit">Usuń film</button>
        </form><br>
        Stronę wykonał: Ivan Drobakha
    </div>
    <?php
        $connection = mysqli_connect("localhost","root","root","dane3");
        if($connection) {
            if(isset($_POST['usun'])) {
                $number = $_POST['usun'];
                $query = mysqli_query($connection,"DELETE FROM produkty WHERE id =".$number);
            };
            mysqli_close($connection);
        }
    ?>
</body>
</html>