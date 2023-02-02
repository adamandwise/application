<?php


// turn on reporting errors
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();
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


        $f3->reroute('mailing_list');
    }
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/experience.html');
});

$f3 -> route('GET|POST /mailing_list', function($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['javascript'] = $_POST['javascript'];
        $_SESSION['mail[]'] = $_POST['mail[]'];
        $_SESSION['php'] = $_POST['php'];
        $_SESSION['java'] = $_POST['java'];
        $_SESSION['python'] = $_POST['python'];
        $_SESSION['html'] = $_POST['html'];
        $_SESSION['CSS'] = $_POST['CSS'];
        $_SESSION['ReactJs'] = $_POST['ReactJs'];
        $_SESSION['NodeJs'] = $_POST['NodeJs'];

        $_SESSION['saas'] = $_POST['saas'];
        $_SESSION['health'] = $_POST['health'];
        $_SESSION['agtech'] = $_POST['agtech'];
        $_SESSION['hrtech'] = $_POST['hrtech'];
        $_SESSION['indtech'] = $_POST['indtech'];
        $_SESSION['cyber'] = $_POST['cyber'];


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