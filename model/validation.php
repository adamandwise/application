<?php

/**
 * this is my validation layer turned into a class.I use this class extensively to test user submitted information
 * these methods are used to make sure proper data is entered, and if it is not, we send a suggestion
 * to the user on how to fullfill the form properly, as this is the first step in getting data into
 * the applicant class
 */
class Validate
{
    /**
     * this method checks the fname the user submitted to a regex pattern, and is looking for alphabet letters
     * only, no numbers or symbols. it returns either false or an  int value, which i use as the true state
     *
     * @param $fname
     * @return false|int
     */
    static function validFirstName($fname)
    {
        $pattern = '/^[a-zA-Z]+$/';
        return preg_match($pattern, $fname);
        //return strlen($fname) > 2;

    }

    /**
     * this method checks the lname the user submitted to a regex pattern, and is looking for alphabet letters
     * only, no numbers or symbols. it returns either false or an  int value, which i use as the true state
     *
     * @param $lname
     * @return false|int
     */
    static function validLastName($lname)
    {
        $pattern = '/^[a-zA-Z]+$/';
        return preg_match($pattern, $lname);
    }

    /**
     * checks to see if the user submitted a valid github link
     * @param $github
     * @return bool
     */
    static function validGitHub($github)
    {
        if (strpos($github, "github.com/") !== false)
            return true;

        return false;
    }


    /**
     * checks to see if the user selected a displayed value, will stop the user from spoofing the form
     * @param $exp
     * @return bool
     */
    static function validExp($exp)
    {
        if (in_array($exp, DataLayer::getExp())) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * stops the user from spoofing the form by selecting a valid relocate value
     * @param $relocate
     * @return bool
     */
    static function validRelocate($relocate)
    {
        if (in_array($relocate, DataLayer::getRelocate())) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * forces the user to type at least 25 characters into the bio
     * a real pain in the but to test
     * @param $bio
     * @return bool
     */
    static function validBio($bio)
    {
        return strlen($bio) > 25;
    }

    /**
     * forces the user to use the format specified when giving their phone number
     * @param $phone
     * @return bool
     */
    static function validPhone($phone)
    {
        $pattern = '/^\d{3}-\d{3}-\d{4}$/';
        if (preg_match($pattern, $phone))
            return true;

        return false;
    }

    /**
     * basically makes sure that the user is at the very least submitting their email with an @ symbol, could do more here
     * @param $email
     * @return bool
     */
    static function validEmail($email)
    {
        if (strpos($email, "@") !== false)
            return true;

        return false;
    }

    /**
     * forces the user to select values specified in the data layer class get mail array,
     * and stops them from spoofing the form
     * @param $mail
     * @return bool
     */
    static function validSelectionsJobs($mail)
    {

        foreach ($mail as $mail_item) {
            if (!in_array($mail_item, DataLayer::getMail())) {
                return false;
            }

        }
        return true;
    }

    /**
     * forces the user to select values specified in the data layer get vert array and stops
     * them from spoofing the form
     * @param $vertical
     * @return bool
     */
    static function validSelectionsVerticals($vertical)
    {
        foreach ($vertical as $vertical_item) {
            if (!in_array($vertical_item, DataLayer::getVert())) {
                return false;
            }
        }
        return true;
    }

    /**
     * a little check i made to tell the site which applicant class to make, if its selected, and this method
     * returns true, we will make the class the child version of the applicant class, and show the suer
     * the mailing list section
     * @param $signMeUp
     * @return bool|void
     */
    static function validSignMeUp($signMeUp){
        if($signMeUp === "yes"){
            return true;
        }
    }
}