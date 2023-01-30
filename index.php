<!--Adam Wise
SDEV 328 Full Stack Development
1.21.23
Job Application1
-->
<?php


// turn on reporting errors
ini_set('display_errors',1);
error_reporting(E_ALL);


//require the autoload file
require_once('vendor/autoload.php');

//instantiate the f3 Base Class( or the fat-free object)
$f3 = Base::instance();

//define a default route(328/application) with anonymous function
$f3 -> route('GET /', function(){
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/home.html');
});


$f3 -> route('GET /personal_info', function(){
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/personal_info.html');
});

$f3 -> route('GET /home', function(){
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/home.html');
});

$f3 -> route('GET /experience', function(){
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/experience.html');
});

$f3 -> route('GET /mailing_list', function(){
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/mailing_list.html');
});


//run fat free
$f3->run();



?>