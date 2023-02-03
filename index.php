<?php


// turn on reporting errors
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();
//<!--Adam Wise
//SDEV 328 Full Stack Development
//1.21.23
//Job Application1
//-->
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


$f3 -> route('GET|POST /personal_info', function($f3){

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['phone'] = $_POST['phone'];

        //redirect to summary page
        $f3->reroute('experience');
    }
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/personal_info.html');
});

$f3 -> route('GET /home', function(){
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/home.html');
});

$f3 -> route('GET|POST /experience', function($f3){

    if($_SERVER['REQUEST_METHOD'] =='POST'){
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['exp'] = $_POST['radio-group'];
        $_SESSION['relocate'] = $_POST['relocate'];
        $_SESSION['gitHub'] = $_POST['gitHub'];


        $f3->reroute('mailing_list');
    }
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/experience.html');
});

$f3 -> route('GET|POST /mailing_list', function($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['mail'] = implode(". ", $_POST['mail']);
        //redirect to summary page
        $f3->reroute('summary');
    }
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/mailing_list.html');
});
$f3 -> route('GET /summary', function(){
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/summary.html');
});


//run fat free
$f3->run();



?>