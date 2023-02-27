<?php

/**
 * this is the applicant class. We create this class when the users starts to submit an application
 * and moves to the second page in the process. As the user fills out the form, this class draws
 * the appropriate data into the fields using the getter and setters i created for each field.
 * this is a parent class, and is extended by the applicant_subscribedtolists class.The latter
 * only being used if the user checks a box asking to subscribe to the mailing lists
 */
class Applicant
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_state;
    private $_phone;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    function __construct($fname,$lname,$email,$state,$phone)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_state = $state;
        $this->_phone = $phone;
    }

    /**
     * this method returns the firstname variable from the form
     * @return firstname String
     */
    public function getFName()
    {
        return $this->_fname;
    }

    /**
     * this method sets the firstName variable
     * @param $fname
     * @return void
     */
    public function setFName($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * this method returns the lastname variable
     * @return lastname string
     */
    public function getLName()
    {
        return $this->_lname;
    }

    /**
     * this method sets the last name variable
     * @param $lname
     * @return void
     */
    public function setLName($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * returns the email variabel
     * @return email String
     */
    public function getEMail()
    {
        return $this->_email;
    }

    /**
     * sets the email variable
     * @param $email
     * @return void
     */
    public function setEMail($email)
    {
        $this->_email = $email;
    }

    /**
     * returns the state variable
     * @return state string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * sets the state variable
     * @param $state
     * @return void
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * //returns the phone variable
     * @return phone string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * sets the phone variable
     * @param $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * returns the github variable
     * @return gitHub String
     */
    public function getGitHub()
    {
        return $this->_github;
    }

    /**
     * sets the github variable
     * @param $github
     * @return void
     */
    public function setGitHub($github)
    {
        $this->_github = $github;
    }

    /**
     * returns the experience variable
     * @return experiencce String
     */
    public function getExp()
    {
        return $this->_experience;
    }

    /**
     * sets the experience variable
     * @param $experience
     * @return void
     */
    public function setExp($experience)
    {
        $this->_experience = $experience;
    }

    /**
     * returns the relocate variable
     * @return relocate String
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * sets the relocate varaible
     * @param $relocate
     * @return void
     */
    public function setRelocate($relocate)
    {
        $this->_relocate = $relocate;
    }

    /**
     * returns the bio variable
     * @return bio string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * sets the bio variable
     * @param $bio
     * @return void
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}
