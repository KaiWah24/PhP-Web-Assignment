<?php
$servername = "localhost";
$username = "kaiwah";
$password = "123456";
$dbname = "kaiwah";

// Create connection
$dbc = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}

function getGenderList() {
    return ['M'=>'Male','F'=>'Female'];
}
function getGender($g) {
    $genders = getGenderList();
    if(array_key_exists($g, $genders)) {
        return $genders[$g];
    } else {
        return NULL;
    }
}
function getProgramList() {
    return ['FT'=>'Information Technology',
        'IS'=>'Information System','IB'=>'Information Business'];
}
function getProgram($p) {
    $program = getProgramList();
    if(array_key_exists($p, $program)) {
        return $program[$p];
    } else {	
        return NULL;
    }
}

function getGameList(){
                                    
return ["G1"=>"Valorant",
        "G2" => "PUBG",
        "G3" => "CS:GO",
        "G4" => "Mobile Legends",
        "G5" => "League of Legends"
        ];
}

function getGame($l) {
    $gameList = getGameList();
    if(array_key_exists($l, $gameList)) {
        return $gameList[$l];
    } else {	
        return NULL;
    }
}
function getVenueList(){
                                    
return ["V1"=>"CyberSport Arena",
        "V2" => "Jinyun Culture Stadium",
        "V3" => "Mariynskiy Park",
        "V4" => "Hero Arena",
        "V5" => "Spodek Arena"
        ];
}

function getVenue($v) {
    $venue = getVenueList();
    if(array_key_exists($v, $venue)) {
        return $venue[$v];
    } else {	
        return NULL;
    }
}


