<?php
require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

/**
 * this is the datalayer class, holds any and all array values to be valdiate and stored in the applicant class
 */
class DataLayer

{
    private $_dbh;
    function __construct()
    {
        try{
            //Instantiate a database object
            $this->_dbh = new PDO ( DB_DSN, DB_USERNAME, DB_PASSWORD );
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // these methods are specific to database stuff
    function insertApplicant($applicant)
    {

        //1.define the query
        $sql = "INSERT INTO applicant (fname,lname,email,state,phone,github,
                       experience,relocate,bio,mailing_list_signup,mailing_lists_subscriptions) 
                VALUE(:fname,:lname,:email,:state,:phone,:github,:experience,
                        :relocate,:bio,:mailing_list_signup,:mailing_lists_subscriptions)";

        //2. Prepare the Statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $fname = $applicant->getFName();
        $lname = $applicant->getLName();
        $email = $applicant->getEMail();
        $state = $applicant->getState();
        $phone = $applicant->getPhone();
        $github = $applicant->getGitHub();
        $experience = $applicant->getExp();
        $relocate = $applicant-> getRelocate();
        $bio = $applicant->getBio();
        if($applicant instanceof Applicant_SubscribedToLists){
            $mailing_list_signup = 1;
            $mailing_lists_subscriptions=  $applicant->getJobs().",".$applicant->getVertical();

        }else{
            $mailing_list_signup = 0;
            $mailing_lists_subscriptions = null;

        }
        $statement->bindParam(':fname',$fname);
        $statement->bindParam(':lname',$lname);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':state',$state);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(':github',$github);
        $statement->bindParam(':experience',$experience);
        $statement->bindParam(':relocate',$relocate);
        $statement->bindParam(':bio',$bio);
        $statement->bindParam(':mailing_list_signup',$mailing_list_signup);
        $statement->bindParam(':mailing_lists_subscriptions',$mailing_lists_subscriptions);

        //4.execute the statement
        $statement->execute();

        //5.process the result
        var_dump($statement->errorInfo());
        $id = $this->_dbh->lastInsertId();
        return $id;

    }


    function getApplicants()
    {
        //define the query
        $sql = "SELECT * FROM applicant ORDER BY lname ASC ";
        //2.prepare the statement
        $statement = $this->_dbh -> prepare($sql);
        //3.bind the parameters

        //4.execute the statement
        $statement->execute();

        //5.process the result

         return  $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    function getApplicant($app_id)
    {
        //define the query
        $sql = "SELECT * FROM applicant WHERE applicant_id = :id ORDER BY lname ASC";
        //2.prepare the statement
        $statement = $this->_dbh -> prepare($sql);
        //3.bind the parameters

        $statement->bindParam(':id',$app_id);

        //4.execute the statement
        $statement->execute();

        //5.process the result

        $row =  $statement->fetch(PDO::FETCH_ASSOC);
        echo $row['applicant_id'].', '.$row['fname'].", ".$row['lname'];
    }

    function getSubscriptions($app_id)
    {
        //define the query
        $sql = "SELECT mailing_lists_subscriptions FROM applicant WHERE applicant_id = :id ORDER BY lname ASC";
        //2.prepare the statement
        $statement = $this->_dbh -> prepare($sql);
        //3.bind the parameters

        $statement->bindParam(':id',$app_id);

        //4.execute the statement
        $statement->execute();

        //5.process the result

        $row =  $statement->fetch(PDO::FETCH_ASSOC);
        echo "<br>"."App ID: $app_id subscribes to these mailing lists: ".$row['mailing_lists_subscriptions'];
    }


    //these methods are all related to validation

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
