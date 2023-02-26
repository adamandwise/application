<?php
class DataLayer
{


    static function getMail()
    {


        return array("JavaScript", "PHP", "Java", "Python", "HTML", "CSS", "ReactJs", "NodeJs");
    }

    static function getVert()
    {
        return array("SaaS", "Health Tech", "Ag Tech", "HR Tech", "Industrial Tech", "Cyber Security");
    }

    static function getExp()
    {
        return array("0-2", "2-4", "4+");
    }

    static function getRelocate()
    {
        return array("Yes", "No", "Maybe");
    }
}
