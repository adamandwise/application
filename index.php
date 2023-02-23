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
require_once ('model/validation.php');
require_once('model/data-layer.php');

/* all validation for personal information works!!!!
echo validFirstName("asd") ? "first name valid" : "  first not valid";
echo '<p>';
echo validLastName("asd") ? " last valid" : "last  not valid";
echo '<p>';
echo validGitHub("github.com/") ? " github valid" : "github  not valid";
echo '<p>';
echo validEmail("Adamandwise@gmail.com") ? "email valid" : "email not valid" ;
echo '<p>';
echo validPhone("2533423424") ? "phone valid" : "phone not valid" ;
echo '<p>';
*/

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

        //validation firstname
        $fname = trim($_POST['fname']);
        if(validFirstName($fname)){
            $_SESSION['fname'] = $fname;
        } else{
            $f3->set('errors["fname"]',
            'First name cannot contain any numbers.');
        }

        //validation lastname
        $lname = trim($_POST['lname']);
        if(validFirstName($lname)){
            $_SESSION['lname'] = $lname;
        } else{
            $f3->set('errors["lname"]',
                'Last name cannot contain any numbers.');
        }

        //validate email
        $email = trim($_POST['email']);
        if(validEmail($email)){
            $_SESSION['email'] = $email;
        } else{
            $f3->set('errors["email"]',
            'Email addresses must contain an @ symbol.');
        }

        //validate phone
        $phone = $_POST['phone'];
        if(validPhone($phone)){
            $_SESSION['phone'] = $phone;
        } else{
            $f3->set('errors["phone"]','Phone numbers must be in the format of 555-555-5555');
        }



       // $_SESSION['fname'] = $_POST['fname'];
        //$_SESSION['lname'] = $_POST['lname'];
        //$_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['phone'] = $_POST['phone'];

        //redirect to summary page if the form has been posted
        // if there are no errors we can reroute
        if(empty($f3->get('errors'))){
            $f3->reroute('experience');
        }
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

        //validation bio
        $bio = trim($_POST['bio']);
        if(validBio($bio)){
            $_SESSION['bio'] = $bio;
        } else{
            $f3->set('errors["bio"]',
                'Your Biography must contains more than 25 characters.');
        }

        //validation experience
        $exp = $_POST['exp'];
        if(validExp($exp)){
            $_SESSION['exp'] = $exp;
            echo 'exp is valid';
        } else{
            $f3->set('errors["exp"]',
                'You must choose a value specified.');
        }

        //validate relocate
        $relocate = $_POST['relocate'];
        if(validRelocate($relocate)){
            $_SESSION['relocate'] = $relocate;
            echo 'relocate is valid';
        } else{
            $f3->set('errors["relocate"]',
                'Please choose a specified value.');
        }

        //validate github
        $gitHub = $_POST['gitHub'];
        if(validGitHub($gitHub)){
            $_SESSION['gitHub'] = $gitHub;
        } else{
            $f3->set('errors["gitHub"]','A valid github address starts with "github.com/"');
        }


        /*
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['exp'] = $_POST['radio-group'];
        $_SESSION['relocate'] = $_POST['relocate'];
        $_SESSION['gitHub'] = $_POST['gitHub'];
        */

        if(empty($f3->get('errors'))){
            $f3->reroute('mailing_list');
        }

    }

    // add data to the hive
    $f3->set('xp',getExp());
    $f3->set('relo',getRelocate());

    //instantiate a view
    $view = new Template();
    echo $view -> render('views/experience.html');
});

$f3 -> route('GET|POST /mailing_list', function($f3){

    // huge problem here now, mailing list only posts PHP for some reason idk.
    // need to work it out and fix my repeats on the html summary as well
    //generally kind of los ton this one

    $f3->set('mailing',getMail());
    $f3->set('vert',getVert());

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['mail'])) {

        $mail = ($_POST['mail']);
        if(validSelectionsJobs($mail)){
            //$_SESSION['mail'] = $mail;
            $_SESSION['mail'] = implode(", ", $mail);
        } else {
            $f3->set('errors["mail"]', 'Please choose a job from the mailing list');
        }
    }

    if(isset($_POST['vertical'])) {
        $vertical = ($_POST['vertical']);
        if(validSelectionsVerticals($vertical)){
            //$_SESSION['vertical'] = $vertical;
            $_SESSION['vertical'] = implode(", ", $vertical);

        } else {
            $f3->set('errors["vertical"]', 'Please choose a vertical from the list');
        }
    }
        // $_SESSION['mail'] = implode(", ", $_POST['mail']);
        //$_SESSION['vertical'] = implode(", ", $_POST['vertical']);

        if(empty($f3->get('errors'))){
            $f3->reroute('summary');
        }

        //redirect to summary page
        $f3->reroute('summary');
    }

    //instantiate a view
    $view = new Template();
    echo $view -> render('views/mailing_list.html');
});
$f3 -> route('GET /summary', function($f3){

    var_dump($_SESSION['mail']);
    var_dump($_SESSION['vertical']);
    //instantiate a view
    $view = new Template();
    echo $view -> render('views/summary.html');


    //destroy the session
    session_destroy();
});


//run fat free
$f3->run();



?>