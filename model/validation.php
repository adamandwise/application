<?php

class Validate
{
    // checks to validate the first name of the user
    static function validFirstName($fname)
    {
        $pattern = '/^[a-zA-Z]+$/';
        return preg_match($pattern, $fname);
        //return strlen($fname) > 2;

    }

    //checks to validate the last name of the user
    static function validLastName($lname)
    {
        $pattern = '/^[a-zA-Z]+$/';
        return preg_match($pattern, $lname);
    }

    //checks to validate a github link
    static function validGitHub($github)
    {
        if (strpos($github, "github.com/") !== false)
            return true;

        return false;
    }

    static function validExp($exp)
    {
        if (in_array($exp, DataLayer::getExp())) {
            return true;
        } else {
            return false;
        }
    }

    static function validRelocate($relocate)
    {
        if (in_array($relocate, DataLayer::getRelocate())) {
            return true;
        } else {
            return false;
        }
    }

    //check to validate the users bio
    static function validBio($bio)
    {
        return strlen($bio) > 25;
    }

    // checks to validate the users cell phone number to a specific format
    static function validPhone($phone)
    {
        $pattern = '/^\d{3}-\d{3}-\d{4}$/';
        if (preg_match($pattern, $phone))
            return true;

        return false;
    }

    // checks to validate the users email adress
    static function validEmail($email)
    {
        if (strpos($email, "@") !== false)
            return true;

        return false;
    }

    //checks to validate that the values associated with the mail array are correct
    static function validSelectionsJobs($mail)
    {

        foreach ($mail as $mail_item) {
            if (!in_array($mail_item, DataLayer::getMail())) {
                return false;
            }

        }
        return true;
    }

    //checks to validate that the values assocaited with the mail array are correct
    static function validSelectionsVerticals($vertical)
    {
        foreach ($vertical as $vertical_item) {
            if (!in_array($vertical_item, DataLayer::getVert())) {
                return false;
            }
        }
        return true;
    }
}