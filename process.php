<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных с формы
    $name = htmlspecialchars($_POST["name"]);
    $intelligence = (int)$_POST["intelligence"];
    $artefacts = (int)$_POST["artefacts"];
    $anomalies_skill = (int)$_POST["anomalies"];
    $anomaly = $_POST["anomaly"];
    $detector = $_POST["detector"];
    $location = $_POST["location"];

}