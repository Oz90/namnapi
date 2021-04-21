<?php

// Steg 1 - Ange lämpliga HTTP headers
// Läs mer här: https://stackoverflow.com/questions/10636611/how-does-access-control-allow-origin-header-work
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");
header("Content-Type: application/json; charset=UTF-8");


// Steg 2 - Skapa arrayer
$firstNames =
    ["Åsa", "Mahmud", "Jimmy", "Björn", "Pelle", "Calle", "Nisse", "Jon", "David", "Adam"];
$lastNames =
    ["Öberg", "Al Hakim", "Svensson", "Björndahl", "Lundqvist", "Ibrahimovic", "Karlsson", "Johnsson", "Svensson", "Baserdem"];
$gender =
    ["male", "female"];


// Steg 3 – Skapa 10 namn och spara dessa i en ny array
$names = array();
for ($i = 0; $i < 10; $i++) {
    $name = array(
        "firstname" => $firstNames[rand(0, 9)],
        "lastname" => $lastNames[rand(0, 9)],
        "gender" => $gender[rand(0, 1)],
        "age" => rand(0, 100),
    );
    array_push($names, $name);
}
for ($i = 0; $i < 10; $i++) {
    $email = substr($names[$i]["firstname"], 0, 2) . substr($names[$i]["lastname"], 0, 3) . "@hotmail.com";
    $names[$i]["email"] = $email;
}

// print_r($names);
// die();


// Steg 4 – Konvertera PHP-arrayen ($names) till JSON
$json = json_encode(
    $names,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);
// json_encode — Returns the JSON representation of a value
// http://php.net/manual/en/function.json-encode.php

// Steg 5 – Skicka JSON till klienten
echo $json;
// OBS!
// Ingen extra data får skickas till klienten,
// t.ex. HTML-kod
