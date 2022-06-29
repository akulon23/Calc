<?php
use Application\Engine;
require __DIR__ . "/vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>
    <meta name="description" content="Kalkulator stworzony przez Adriannę Kulon">
    <meta name="keywords" content="kalkulator, liczenie">
    <meta name="author" content="Fsociety">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<form method="post">
    <div id="container">
        <header>
            <h1>Kalkulator</h1>
        </header>
        <div class="row-container">
            <div class="row">
                <div>
                    <div class="number">
                        <label>Liczba 1 <input type="number" name="number1" step="1" value="0"></label>
                    </div>
                    <div class="number">
                        <label> Liczba 2 <input type="number" name="number2" step="1" value="0"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box">
                    <p> Jakie działanie wykonać? </p>
                    <form method="post">
                        <div><label> <input type="checkbox" name="operation-type[]" value="add"> dodawanie </label>
                        </div>
                        <div><label> <input type="checkbox" name="operation-type[]" value="sub"> odejmowanie </label>
                        </div>
                        <div><label> <input type="checkbox" name="operation-type[]" value="multip"> mnożenie </label>
                        </div>
                        <div><label> <input type="checkbox" name="operation-type[]" value="divide"> dzielenie </label>
                        </div>
                        <div><label> <input type="checkbox" name="operation-type[]" value="5"> potęgowanie </label>
                        </div>
                </div>
            </div>
        </div>
        <div id="submit">
            <input type="submit" value="Oblicz">
            <input type="reset" value="Wyczyść">
        </div>
    </div>
</form>
<?php
$engine = new Engine();
$engine->start();
?>
</body>
</html>