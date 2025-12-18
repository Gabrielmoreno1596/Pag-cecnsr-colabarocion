<?php
$map = require __DIR__ . "/data/supplies-map.php";

$gradeKey = $_GET["grade"] ?? "1";
if (!isset($map[$gradeKey])) {
    $gradeKey = "1";
}

$gradeMeta = $map[$gradeKey];
$dataFile  = $gradeMeta["file"];

$dataAvailable = true;
$data = [
    "year" => "2026",
    "title" => "Lista de ǧtiles",
    "mineduc" => [],
    "others" => [],
    "specialties" => [],
    "note" => [],
    "all_students" => []
];

if (is_readable($dataFile)) {
    $json = file_get_contents($dataFile);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $data = array_merge($data, $decoded);
    } else {
        $dataAvailable = false;
    }
} else {
    $dataAvailable = false;
}

$dataHasItems = false;

if (!empty($data["sections"]) && is_array($data["sections"])) {
    foreach ($data["sections"] as $sec) {
        if (!empty($sec["items"])) {
            $dataHasItems = true;
            break;
        }
    }
} else {
    $dataHasItems = !empty($data["mineduc"])
        || !empty($data["others"])
        || !empty($data["specialties"])
        || !empty($data["all_students"])
        || !empty($data["entregar_ninas"])
        || !empty($data["entregar_ninos"]);
}
include __DIR__ . "/components/header.php";
include __DIR__ . "/components/grade-selector.php";
include __DIR__ . "/components/list-view.php";
