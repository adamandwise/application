<?php
require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

try{
    //Instantiate a database object
    $this->_dbh = new PDO ( DB_DSN, DB_USERNAME, DB_PASSWORD );
}
catch (PDOException $e) {
    echo $e->getMessage();
}

//define the query
$sql = "SELECT * FROM applicant";
//2.prepare the statement
$statement = $this->_dbh -> prepare($sql);
//3.bind the parameters

//4.execute the statement
$statement->execute();

//5.process the result
return $statement->fetchAll(PDO::FETCH_ASSOC);
