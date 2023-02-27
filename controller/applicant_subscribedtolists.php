<?php

/**
 * This class is a subclass of the Applicant class. it inherits every method and field
 * of the Applicant class.
 * In addition to that class, it has private data fields for two arrays we call jobs and verticals
 * that pertain to a mailing list on an optional page in our application process
 * this class is used if-and-only-if the users selects to sign up for mailing list
 * job openings.
 */
class Applicant_SubscribedToLists extends Applicant

{
    private $_selectionsJobs;
    private $_selectionsVerticals;

    /**
     * returns the getJobs array
     * @return getjobs String Array
     *
     */
    public function getJobs()
    {
        return $this->_selectionsJobs;
    }

    /**
     * sets tehe getJobs array
     * @param $selectionJobs
     * @return void
     */
    public function setJobs($selectionJobs)
    {
        $this->_selectionsJobs = $selectionJobs;
    }

    /**
     * returns the setVerticals array variables
     * @return setVerticals String Array
     */
    public function getVertical()
    {
        return $this->_selectionsVerticals;
    }

    /**
     * sets the set verticals array variables
     * @param $selectionVerticals
     * @return void
     */
    public function setVertical($selectionVerticals)
    {
        $this->_selectionsVerticals = $selectionVerticals;
    }

}