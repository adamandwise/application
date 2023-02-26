<?php


// turn on reporting errors
ini_set('display_errors',1);
error_reporting(E_ALL);

//<!--Adam Wise
//SDEV 328 Full Stack Development
//1.21.23
//Job Application1
//-->
//require the autoload file
require_once('vendor/autoload.php');
session_start();
//require_once ('model/validation.php');
//require_once('model/data-layer.php');


//instantiate the f3 Base Class( or the fat-free object)
$f3 = Base::instance();


//instantiate a controller class
$con = new Controller($f3);

//define a default route(328/application) with anonymous function
$f3 -> route('GET /', function(){
    $GLOBALS['con']->home();
});


$f3 -> route('GET|POST /personal_info', function($f3){
    $GLOBALS['con']->personal_info();
});

$f3 -> route('GET /home', function(){
    $GLOBALS['con']->home();
});

$f3 -> route('GET|POST /experience', function($f3) {
    $GLOBALS['con']->experience();
});
$f3 -> route('GET|POST /mailing_list', function($f3){
    $GLOBALS['con']->mailinglist();
});
$f3 -> route('GET /summary', function($f3){

    $GLOBALS['con']->summary();
});


//run fat free
$f3->run();



?>