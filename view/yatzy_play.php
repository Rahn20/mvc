<?php

/**
 * Sidkontroll för yatzy
 */

use Rahn20\Dice\DiceHand;

use function Rahn20\Functions\{
   renderView,
   sendResponse
};

$submit = $_POST["submit"] ?? null;
$options = $_POST["select"] ?? null;
$res = $_POST["values"] ?? null;

$_SESSION['number'] = $_SESSION["number"] ?? 0;
$_SESSION['counter'] = $_SESSION["counter"] ?? 0;

$values = $_SESSION['yatzyValues'] ?? null;
$getValuesResult = $_SESSION['getValuesResult'] ?? null;

$saveDice = $_SESSION["saveDice"] ?? null;
$keepDice = $_SESSION["keepDice"] ?? null;

$_SESSION["finale"] = $_SESSION["finale"] ?? null;
$_SESSION["bonus"] = $_SESSION["bonus"] ?? null;


function roll($values, $keepDice)
{
    $_SESSION['number'] += 1;

    $diceHand = new DiceHand(5);

    if ($values != null) {
        $diceHand = new DiceHand(count($values));
    }

    $diceHand->getLastRoll();

    $values = $diceHand->values();
    $_SESSION['yatzyValues'] = $values;

    $listOption = explode(",", $keepDice);
    $diceHand->getAllValues();
    $getValuesResult = $diceHand->result($listOption);
    $_SESSION['getValuesResult'] = $getValuesResult;
}

function keep($values, $keepDice, $options)
{
    $keepDice .= $options;
    $_SESSION['keepDice'] = $keepDice . ", ";

    $getIndex = array_search($options, $values);
    unset($values[$getIndex]);
    $index = array_values($values);
    $_SESSION['yatzyValues'] = $index;
}

function save($res, $saveDice)
{
    $count = explode(":", $res);

    if ($saveDice[$count[0] - 1] == null) {
        $_SESSION['counter'] += 1;
        $saveDice[$count[0] - 1] = $count[1];
        $_SESSION['saveDice'] = $saveDice;
    }

    $_SESSION['number'] = 0;

    if ($_SESSION['counter'] == 6) {
        $_SESSION["finale"] = array_sum($saveDice);
        $_SESSION['number'] = 4;
        $_SESSION["bonus"] = 0;

        if ($_SESSION["finale"] >= 63) {
            $_SESSION["bonus"] = 50;
        }
    }

    $_SESSION['keepDice'] = null;
    $_SESSION['yatzyValues'] = null;
    $_SESSION['getValuesResult'] = null;
}

if ($submit == "Kasta" && $_SESSION['number'] <= 2) {
    roll($values, $keepDice);
} elseif ($submit == "Behålla" && $_SESSION['number'] <= 2) {
    keep($values, $keepDice, $options);
} elseif ($submit == "Spara" && $_SESSION['number'] <= 3) {
    save($res, $saveDice);
}

$body = renderView("layout/yatzy.php");
sendResponse($body);
