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

//define a home route same as the on up above made this for convenience with my nav bar
$f3 -> route('GET /home', function(){
    $GLOBALS['con']->home();
});

////define route for personal info page
$f3 -> route('GET|POST /personal_info', function($f3){
    $GLOBALS['con']->personal_info();
});

//define route for experience page
$f3 -> route('GET|POST /experience', function($f3) {
    $GLOBALS['con']->experience();
    //var_dump($_SESSION['newApp']);
});

//define route for mailing list
$f3 -> route('GET|POST /mailing_list', function($f3){
    if(isset($_SESSION['skip'])){
        $GLOBALS['con']->summary();
        //var_dump($_SESSION['newApp']);

    }else{
        $GLOBALS['con']->mailinglist();
        //var_dump($_SESSION['newApp']);
    }

});

//define route for summary page
$f3 -> route('GET /summary', function($f3){
    $GLOBALS['con']->summary();
    //var_dump($_SESSION['newApp']);
});

// seperate route for mailing list applicaitons
$f3 -> route('GET /summary_', function($f3){
    $GLOBALS['con']->summary_();
    //var_dump($_SESSION['newApp']);
});


//run fat free
$f3->run();



?>