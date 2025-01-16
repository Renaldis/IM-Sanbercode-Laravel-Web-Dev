<?php 
require_once "./animal.php";
require_once "./ape.php";
require_once "./frog.php";

$sheep = new Animal("shaun");
echo "name : " . $sheep->get_name() . "<br>";
echo "legs : " . $sheep->legs . "<br>";
echo "cold blooded : " . $sheep->cold_blooded . "<br><br>";

$sungokong = new Ape("kera sakti");
echo "name : " . $sungokong->name . "<br>";
echo "legs : " . $sungokong->legs . "<br>";
echo "cold blooded : " . $sungokong->cold_blooded . "<br>";
echo "yell : " . $sungokong->yell() . "<br><br>";

$kodok = new Frog("buduk");
echo "name : " . $kodok->name . "<br>";
echo "legs : " . $kodok->legs . "<br>";
echo "cold blooded : " . $kodok->cold_blooded . "<br>";
echo "jump : " . $kodok->jump() . "<br><br>";
?>