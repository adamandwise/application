<?php

/**
 * this is my controller class. it defines the routes for my pages
 */
class Controller
{
    private $_f3;

    /**
     * this function instantiates the controller class, with a fatfree object
     * @param $f3
     */
    function __construct($f3){
        $this->_f3 = $f3;
    }

    /**
     * this is the home route
     * @return void
     */
    function home()
    {
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/home.html');
    }

    /**
     *this is the route info for the personal info page
     */
    function personal_info()
    {

        //if form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $signMeUp = $_POST['signMeUp'];
            if(Validate::validSignMeUp($signMeUp))
            {
                //then we will make the applicant class for subscribed
                $newApp = new Applicant_SubscribedToLists($fname, $lname, $email, $state, $phone);

            }else
            {
                $newApp = new Applicant($fname, $lname, $email, $state, $phone);
                $_SESSION['skip'] = 'skip';
            }
            //validation firstname
            $fname = trim($_POST['fname']);
            if(Validate::validFirstName($fname)){
                $newApp->setFName($fname);
               // $_SESSION['fname'] = $fname;
            } else{
                $this->_f3->set('errors["fname"]',
                    'First name cannot contain any numbers.');
            }

            //validation lastname
            $lname = trim($_POST['lname']);
            if(Validate::validFirstName($lname)){
                $newApp->setLName($lname);
               // $_SESSION['lname'] = $lname;
            } else{
                $this->_f3->set('errors["lname"]',
                    'Last name cannot contain any numbers.');
            }

            //validate email
            $email = trim($_POST['email']);
            if(Validate::validEmail($email)){
                $newApp->setEmail($email);
                //$_SESSION['email'] = $email;
            } else{
                $this->_f3->set('errors["email"]',
                    'Email addresses must contain an @ symbol.');
            }

            //validate phone
            $phone = $_POST['phone'];
            if(Validate::validPhone($phone)){
                $newApp->setPhone($phone);
                //$_SESSION['phone'] = $phone;
            } else{
                $this->_f3->set('errors["phone"]','Phone numbers must be in the format of 555-555-5555');
            }

            $state = $_POST['state'];
            $newApp->setState($state);


            //redirect to summary page if the form has been posted
            // if there are no errors we can reroute
            if(empty($this->_f3->get('errors'))){
                $_SESSION['newApp'] = $newApp;
                $this->_f3->reroute('experience');
            }
        }
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/personal_info.html');
    }

    /**this is the route info for the experience page
     * @return void
     */
    function experience()
    {
        if($_SERVER['REQUEST_METHOD'] =='POST'){

            //validation bio
            $bio = trim($_POST['bio']);
            if(Validate::validBio($bio)){
                $_SESSION['newApp']->setBio($bio);
            } else{
                $this->_f3->set('errors["bio"]',
                    'Your Biography must contains more than 25 characters.');
            }

            //validation experience
            $exp = $_POST['exp'];
            if(Validate::validExp($exp)){
                $_SESSION['newApp']->setExp($exp);
            } else{
                $this->_f3->set('errors["exp"]',
                    'You must choose a value specified.');
            }

            //validate relocate
            $relocate = $_POST['relocate'];
            if(Validate::validRelocate($relocate)){
                $_SESSION['newApp'] ->setRelocate($relocate);
            } else{
                $this->_f3->set('errors["relocate"]',
                    'Please choose a specified value.');
            }

            //validate github
            $gitHub = $_POST['gitHub'];
            if(Validate::validGitHub($gitHub)){
                $_SESSION['newApp'] ->setGitHub($gitHub);
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

    /**this is the route info for the optional mailing list page
     * @return void
     */
    function mailinglist()
    {

        $this->_f3->set('mailing',DataLayer::getMail());
        $this->_f3->set('vert',DataLayer::getVert());

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['mail'])) {

                $mail = ($_POST['mail']);
                if(Validate::validSelectionsJobs($mail)){
                    //$_SESSION['mail'] = $mail;
                    $jobsString = implode(", ", $mail);
                    $_SESSION['newApp']->setJobs($jobsString);
                } else {
                    $this->_f3->set('errors["mail"]', 'Please choose a job from the mailing list');
                }
            }

            if(isset($_POST['vertical'])) {
                $vertical = ($_POST['vertical']);
                if(Validate::validSelectionsVerticals($vertical)){
                    $verticalString = implode(", ", $vertical);
                    $_SESSION['newApp'] ->setVertical($verticalString);

                } else {
                    $this->_f3->set('errors["vertical"]', 'Please choose a vertical from the list');
                }
            }

            if(empty($this->_f3->get('errors'))){
                $this->_f3->reroute('summary_');
            }

            //redirect to summary page
            $this->_f3->reroute('summary_');
        }

        //instantiate a view
        $view = new Template();
        echo $view -> render('views/mailing_list.html');
    }

    /**
     * this is the default summary page
     * @return void
     */
    function summary()
    {
        //var_dump($_SESSION['mail']);
        //var_dump($_SESSION['vertical']);
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/summary.html');


        //destroy the session
        session_destroy();
    }

    /**this version of the summary page only displays if the user selects for mailing lists, essentialy the same but it
     * shows the fields for the selections in the applicant class
     * @return void
     */
    function summary_()
    {
        //var_dump($_SESSION['mail']);
        //var_dump($_SESSION['vertical']);
        //instantiate a view
        $view = new Template();
        echo $view -> render('views/summary_.html');


        //destroy the session
        session_destroy();
    }

}