<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="baner">
        <div class="lewy-baner">
            <img src="1logo.png" alt="meteo">
        </div>
        <div class="srodkowy-baner">
            <h1>Prognoza dla Wrocławia</h1>
        </div>
        <div class="prawy-baner">
            <p>maj, 2019 r.</p>
        </div>
    </div>
    <div class="glowny">
        <table>
            <tr>
                <td class="nagl">DATA</td>
                <td class="nagl">TEMPERATURA W NOCY</td>
                <td class="nagl">TEMPERATURA W DZIEŃ</td>
                <td class="nagl">OPADY [mm/h]</td>
                <td class="nagl">CIŚNIENIE [hPa]</td>
            </tr>
            <?php
            $polaczenie = mysqli_connect("localhost","root","root","prognoza");
            if($polaczenie) {
                $zapytanie = mysqli_query($polaczenie,"SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy");
                while($rzad = mysqli_fetch_array($zapytanie)) {
                    echo "<tr>
                    <td>$rzad[data_prognozy]</td>
                    <td>$rzad[temperatura_noc]</td>
                    <td>$rzad[temperatura_dzien]</td>
                    <td>$rzad[opady]</td>
                    <td>$rzad[cisnienie]</td>
                    </tr>";
                }
                mysqli_close($polaczenie);
            }
            ?>
        </table>
    </div>
    <div class="lewy">
        <img src="1obraz.jpg" alt="Polska, Wrocław">
    </div>
    <div class="prawy">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div class="stopka">
        <p>Stronę wykonał: Ivan Drobakha</p>
    </div>
</body>
</html>