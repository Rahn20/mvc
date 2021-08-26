<?php

/**
 * Sidkontroll för dice
*/

use Rahn20\Dice\Dice;
use Rahn20\Dice\DiceHand;
use Rahn20\Dice\GraphicalDice;

use function Rahn20\Functions\{
   renderView,
   sendResponse
};

$submit = $_POST["submit"] ?? null;
$options = $_POST["select"] ?? null;
$player = $_SESSION['player'] ?? null;
$computer = $_SESSION['computer'] ?? null;
$rounds = $_SESSION['rounds'] ?? null;
$playerPoints = $_SESSION['playerPoints'] ?? null;
$computerPoints = $_SESSION['computerPoints'] ?? null;
$gDice = null;

if ($submit == "Stanna") {
    $_SESSION['hand'] = null;

    while ($computer < 21 && $_SESSION['result'] == null) {
        $dice = new Dice();
        $dice->roll();
        $roll = $dice->getLastRoll();
        $graphic = new GraphicalDice();
        $gDice .= $graphic->graphic($roll);
        $_SESSION['graphic'] = $gDice;

        $_SESSION['hand'] .= $roll . ", ";
        $computer = $_SESSION['computer'] + $roll;
        $_SESSION['computer'] = $computer;
    }
    $_SESSION['hand'] = rtrim($_SESSION['hand'], ',\ ');

    if ($computer == 21) {
        $_SESSION['result'] = "Dator vinner";
    } elseif ($computer > 21) {
        $_SESSION['result'] = "Du vinner";
    } elseif ($player < $computer && $computer < 21) {
        $_SESSION['result'] = "Dator vinner";
    } elseif ($player > $computer && $player < 21) {
        $_SESSION['result'] = "Du vinner";
    } elseif ($player == $computer) {
        $_SESSION['result'] = "Dator vinner";
    }
} elseif ($submit == "Kasta") {
    if ($player < 21 && $_SESSION['result'] == null) {
        $graphic = new GraphicalDice();
        $diceHand = new DiceHand((int)$options);
        $_SESSION["hand"] =  $diceHand->getLastRoll();
        $sum = $diceHand->theSum();

        $player = $_SESSION['player'] + $sum;
        $_SESSION['player'] = $player;

        $gDice .= $graphic->graphic((int)$_SESSION["hand"]);
        $_SESSION['graphic'] = $gDice;

        if ((int)$options == 2) {
            $gDice .= $graphic->graphic((int)$_SESSION["hand"][3]);
            $_SESSION['graphic'] = $gDice;
        }
    }
}

if ($player == 21) {
    $_SESSION['result'] = "Grattis!! Du vann";
} elseif ($player > 21) {
    $_SESSION['result'] = "Du förlorade";
}

if ($submit == "Ny runda") {
    $rounds .= $_SESSION['result'] . ", ";
    $_SESSION['rounds'] = $rounds;

    if ($_SESSION['result'] == "Dator vinner") {
        $computerPoints += $_SESSION['computer'];
        $_SESSION['computerPoints'] = $computerPoints;
    } elseif ($_SESSION['result'] == "Grattis!! Du vann" || $_SESSION['result'] == "Du vinner") {
        $playerPoints += $_SESSION['player'];
        $_SESSION['playerPoints'] = $playerPoints;
    }

    $_SESSION['result'] = null;
    $_SESSION['hand'] = null;
    $_SESSION['player'] = null;
    $_SESSION['computer'] = null;
    $_SESSION['graphic'] = null;
};

$body = renderView("layout/dice.php");
sendResponse($body);
