<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div class="baner">
        <h2>Oblicz wskaźnik BMI</h2>
    </div>
    <div class="logo">
        <img src="wzor.png" alt="liczymy BMI">
    </div>
    <div class="lewy">
        <img src="rys1.png" alt="zrzuć kalorie!">
    </div>
    <div class="prawy">
        <h1>Podaj dane</h1>
        <form action="waga.php" method="POST">
          Waga:
          <input type="number" name="waga" id=""><br>
          Wzrost [cm]:
          <input type="number" name="wzrost" id=""><br>
          <button type="submit">Licz BMI i zapisz wynik</button>
        </form>
        <?php
         $connection = mysqli_connect("localhost","root","root","egzamin");
           $waga = $_POST["waga"];
           $wzrost = $_POST["wzrost"];
         if($connection && ($waga || $wzrost)) {
            $bmi = $waga/($wzrost*$wzrost)*10000;
            $bmi_id = "";
            echo "Twoja waga: ".$waga." Twój wzrost: ".$wzrost."<br>
            BMI wynosi: ".$bmi;
            switch ($bmi) {
                case $bmi >= 0 && $bmi <= 18:
                    $bmi_id = 1;
                    break;
                case $bmi >= 19 && $bmi <= 25:
                    $bmi_id = 2;
                    break;
                case $bmi >= 26 && $bmi <= 30:
                    $bmi_id = 3;
                    break;
                case $bmi >= 31 && $bmi <= 100:
                    $bmi_id = 4;
                    break;
            }            
            $question = mysqli_query($connection,"INSERT INTO wynik (bmi_id,data_pomiaru,wynik) VALUES($bmi_id,NOW(),$bmi)");
         }
         mysqli_close($connection);
        ?>
    </div>
    <div class="glowny">
        <table>
            <tr>
                <td>lp.</td>
                <td>Interpretacja</td>
                <td>zaczyna się od...</td>
            </tr>
            <?php
             $connection = mysqli_connect("localhost","root","root","egzamin");
             if($connection) {
                $question = mysqli_query($connection,"SELECT id, informacja, wart_min FROM bmi;");
                while($data = mysqli_fetch_array($question)) {
                    echo "<tr>
                    <td>".$data['id']."</td>
                    <td>".$data['informacja']."</td>
                    <td>".$data['wart_min']."</td>
                  </tr>";
                }
             }
             mysqli_close($connection);
            ?>
        </table>
    </div>
    <div class="stopka">
      Autor: Ivan Drobakha
      <a href="rys1.png">Wynik działania kwerendy 2</a>
    </div>
</body>
</html>