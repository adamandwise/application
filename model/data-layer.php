<?php

/**
 * this is the datalayer class, holds any and all array values to be valdiate and stored in the applicant class
 */
class DataLayer
{

    /**this is the mail array,holds jobs for the mailing list
     * @return string[]
     */
    static function getMail()
    {


        return array("JavaScript", "PHP", "Java", "Python", "HTML", "CSS", "ReactJs", "NodeJs");
    }

    /**
     * this is the vert array, holds jobs for industry vertical list
     * @return string[]
     */
    static function getVert()
    {
        return array("SaaS", "Health Tech", "Ag Tech", "HR Tech", "Industrial Tech", "Cyber Security");
    }

    /**
     * this is an array that lets the user tell us how many years exp they have
     * @return string[]
     */
    static function getExp()
    {
        return array("0-2", "2-4", "4+");
    }

    /**this is an array that lets the user tell us if they are willin gto relocate
     * @return string[]
     */
    static function getRelocate()
    {
        return array("Yes", "No", "Maybe");
    }
}
