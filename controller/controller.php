<?php

class Controller
{
    private $_f3;


    function __construct($f3){
        $this->_f3 = $f3;
    }


    function home()
    {
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/home.html');
    }

    function personal_info()
    {

        //if form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //validation firstname
            $fname = trim($_POST['fname']);
            if(Validate::validFirstName($fname)){
                $_SESSION['fname'] = $fname;
            } else{
                $this->_f3->set('errors["fname"]',
                    'First name cannot contain any numbers.');
            }

            //validation lastname
            $lname = trim($_POST['lname']);
            if(Validate::validFirstName($lname)){
                $_SESSION['lname'] = $lname;
            } else{
                $this->_f3->set('errors["lname"]',
                    'Last name cannot contain any numbers.');
            }

            //validate email
            $email = trim($_POST['email']);
            if(Validate::validEmail($email)){
                $_SESSION['email'] = $email;
            } else{
                $this->_f3->set('errors["email"]',
                    'Email addresses must contain an @ symbol.');
            }

            //validate phone
            $phone = $_POST['phone'];
            if(Validate::validPhone($phone)){
                $_SESSION['phone'] = $phone;
            } else{
                $this->_f3->set('errors["phone"]','Phone numbers must be in the format of 555-555-5555');
            }

            $_SESSION['state'] = $_POST['state'];
            $_SESSION['phone'] = $_POST['phone'];

            //redirect to summary page if the form has been posted
            // if there are no errors we can reroute
            if(empty($this->_f3->get('errors'))){
                $this->_f3->reroute('experience');
            }
        }
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/personal_info.html');
    }

    function experience()
    {
        if($_SERVER['REQUEST_METHOD'] =='POST'){

            //validation bio
            $bio = trim($_POST['bio']);
            if(Validate::validBio($bio)){
                $_SESSION['bio'] = $bio;
            } else{
                $this->_f3->set('errors["bio"]',
                    'Your Biography must contains more than 25 characters.');
            }

            //validation experience
            $exp = $_POST['exp'];
            if(Validate::validExp($exp)){
                $_SESSION['exp'] = $exp;
                echo 'exp is valid';
            } else{
                $this->_f3->set('errors["exp"]',
                    'You must choose a value specified.');
            }

            //validate relocate
            $relocate = $_POST['relocate'];
            if(Validate::validRelocate($relocate)){
                $_SESSION['relocate'] = $relocate;
                echo 'relocate is valid';
            } else{
                $this->_f3->set('errors["relocate"]',
                    'Please choose a specified value.');
            }

            //validate github
            $gitHub = $_POST['gitHub'];
            if(Validate::validGitHub($gitHub)){
                $_SESSION['gitHub'] = $gitHub;
            } else{
                $this->_f3->set('errors["gitHub"]','A valid github address starts with "github.com/"');
            }

            if(empty($this->_f3->get('errors'))){
                $this->_f3->reroute('mailing_list');
            }

        }

        // add data to the hive
        $this->_f3->set('xp',DataLayer::getExp());
        $this->_f3->set('relo',DataLayer::getRelocate());

        //instantiate a view
        $view = new Template();
        echo $view -> render('views/experience.html');
    }

    function mailinglist()
    {

        $this->_f3->set('mailing',DataLayer::getMail());
        $this->_f3->set('vert',DataLayer::getVert());

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['mail'])) {

                $mail = ($_POST['mail']);
                if(Validate::validSelectionsJobs($mail)){
                    //$_SESSION['mail'] = $mail;
                    $_SESSION['mail'] = implode(", ", $mail);
                } else {
                    $this->_f3->set('errors["mail"]', 'Please choose a job from the mailing list');
                }
            }

            if(isset($_POST['vertical'])) {
                $vertical = ($_POST['vertical']);
                if(Validate::validSelectionsVerticals($vertical)){
                    $_SESSION['vertical'] = implode(", ", $vertical);

                } else {
                    $this->_f3->set('errors["vertical"]', 'Please choose a vertical from the list');
                }
            }

            if(empty($this->_f3->get('errors'))){
                $this->_f3->reroute('summary');
            }

            //redirect to summary page
            $this->_f3->reroute('summary');
        }

        //instantiate a view
        $view = new Template();
        echo $view -> render('views/mailing_list.html');
    }

    function summary()
    {
        var_dump($_SESSION['mail']);
        var_dump($_SESSION['vertical']);
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/summary.html');


        //destroy the session
        session_destroy();
    }

}