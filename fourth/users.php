<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div class="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </div>
    <div class="lewy">
        <h4>Użytkownicy</h4>
        <?php
          $connection = mysqli_connect("localhost","root","root","dane4");
          if($connection) {
            $question = mysqli_query($connection,"SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;");
            while ($data = mysqli_fetch_array($question)) {
                $wiek = date("Y") - $data['rok_urodzenia'];
                echo $data['id'].". ".$data['imie']." ".$data['nazwisko'].", ".$wiek." lata <br>";
            }
          }
          mysqli_close($connection);
        ?>
        <a href="settings.html">Inne ustawienia</a>
    </div>
    <div class="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="" method="post">
            <input type="number" name="id_osoby" id=""><br>
            <button type="submit">ZOBACZ</button>
            <hr>
        </form>
        <?php
          $connection = mysqli_connect("localhost","root","root","dane4");
           if($connection) {
            $question = mysqli_query($connection,"SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, hobby.nazwa
             FROM osoby INNER JOIN hobby ON Hobby_id = hobby.id WHERE osoby.id = ".$_POST['id_osoby']);
             $data = mysqli_fetch_array($question);
             echo "<h2>".$_POST['id_osoby'].". ".$data["imie"]." ".$data["nazwisko"]."</h2>".
             '<img src="'.$data["zdjecie"].'" alt = "'.$_POST["id_osoby"].'"> <br>'.
             "<p>Rok urodzenia: ".$data['rok_urodzenia']."</p> <br>
             <p>Opis: ".$data['opis']."</p> <br>
             <p>Hobby: ".$data['nazwa']."</p>";
           }
        ?>
    </div>
    <div class="stopka">
       Stronę wykonał: Ivan Drobakha
    </div>
</body>
</html>