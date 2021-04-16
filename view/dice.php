<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
*/

declare(strict_types=1);

use function Rahn20\Functions\url; 

$_SESSION['hand'] = $_SESSION['hand'] ?? null;
$_SESSION['player'] = $_SESSION['player'] ?? null;
$_SESSION['computer'] = $_SESSION['computer'] ?? null;
$_SESSION['result'] = $_SESSION['result'] ?? null;
$_SESSION['graphic'] = $_SESSION['graphic'] ?? null;
$_SESSION['rounds'] = $_SESSION['rounds'] ?? null;
$_SESSION['playerPoints'] = $_SESSION['playerPoints'] ?? null;
$_SESSION['computerPoints'] = $_SESSION['computerPoints'] ?? null;
?>

<h1>Game 21</h1>
<p>Välkommen till spelet Game 21</p>
<p>Hur många tärningar vill du spela med?</p>

<form method="post" action="<?= url("/play") ?>">
    <select name='select'>
        <option name="1" value="1"> ett
        <option name="2" value="2"> två
    <select>
    <p>
        <input type="submit" name="submit" value="Kasta">
        <input type="submit" name="submit" value="Stanna">
        <input type="submit" name="submit" value="Ny runda">     
    </p>
    <p><a href="<?= url("/dice/destroy")?>"> Nollställ poäng </a> </p>
</form> 


<p class="dice-utf8"><?php
if ($_SESSION['graphic']) {
    $i = 0;
    while ($i <= strlen($_SESSION['graphic'])) {?> 
        <i class="<?= substr($_SESSION['graphic'], $i, 6) ?> "></i><?php
        $i += 6;
    }
}?> </p>

<p><?= $_SESSION['hand'] ?> </p>
<p>Spelarens poäng: <?= $_SESSION['player']  ?> </p>
<p>Datorns poäng: <?= $_SESSION['computer']  ?> </p>

<h1><?= $_SESSION['result']  ?> </h1>

<p>Spelrunda: <?= $_SESSION['rounds']  ?> </p>
<p>Totalt spelare poäng: <?= $_SESSION['playerPoints']  ?> </p>
<p>Totalt dator poäng: <?= $_SESSION['computerPoints']  ?> </p>


