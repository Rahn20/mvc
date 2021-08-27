<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
*/

declare(strict_types=1);

$_SESSION['yatzyValues'] = $_SESSION['yatzyValues'] ?? null;
$_SESSION['getValuesResult'] = $_SESSION['getValuesResult'] ?? null;
$_SESSION['keepDice'] = $_SESSION['keepDice'] ?? null;
$_SESSION["finale"] = $_SESSION["finale"] ?? null;
$_SESSION["bonus"] = $_SESSION["bonus"] ?? null;
$_SESSION['saveDice'][0] = $_SESSION['saveDice'][0] ?? null;
$_SESSION['saveDice'][1] = $_SESSION['saveDice'][1] ?? null;
$_SESSION['saveDice'][2] = $_SESSION['saveDice'][2] ?? null;
$_SESSION['saveDice'][3] = $_SESSION['saveDice'][3] ?? null;
$_SESSION['saveDice'][4] = $_SESSION['saveDice'][4] ?? null;
$_SESSION['saveDice'][5] = $_SESSION['saveDice'][5] ?? null;

use function Rahn20\Functions\url;
?>

<h1>Yatzy</h1>
<p>Du kan välja spara/behålla dina tärningar, sparar du värdet på tärningar får du börja med 3 slag igen. Du har 3 slag och 5 tärningar. 
    Du kan behålla tärningar och försätta kasta, du har rätt till högst 3 tärningskast, du kan spara de behållande tärningarna efter tredje slaget eller innan, du väljer.
</p>
<form method="post" action="<?= url("/yatzy/play") ?>">
    <p><input type="submit" name="submit" value="Kasta"></p>
    <p><a href="<?= url("/yatzy/destroy")?>"> Nollställ poäng </a> </p>


<?php
if ($_SESSION['yatzyValues']) {
    echo '<p class="dice-utf8">';
    foreach ($_SESSION['yatzyValues'] as $value) {
        echo '<i class="dice-' . $value . '"></i>';
    };
    echo '</p>';

    echo '<select name="select">';
    foreach ($_SESSION['yatzyValues'] as $v) {
        echo '<option name=' . $v . 'value=' . $v . '>' . $v;
    };
    echo '<select>
        <input type="submit" name="submit" value="Behålla">';
    echo "<p>Behålla: " . $_SESSION['keepDice'] . "</p>";

    echo '<select name="values">';
    $i = 1;
    foreach ($_SESSION['getValuesResult'] as $v) {
        echo '<option name=' . $v . 'value=' . $v . '>' . $i . ': ' . $v;
        $i++;
    };
    echo '<select>
        <input type="submit" name="submit" value="Spara"></form>';
};
