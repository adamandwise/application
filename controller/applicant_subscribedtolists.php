<?php

class Applicant_SubscribedToLists extends Applicant

{
    private $_selectionsJobs;
    private $_selectionsVerticals;

    public function getSelectionJobs()
    {
        return $this->_selectionsJobs;
    }

    public function setSelectionsJobs($selectionJobs)
    {
        $this->_selectionsJobs = $selectionJobs;
    }

    public function getSelectionVerticals()
    {
        return $this->_selectionsVerticals;
    }

    public function setSelectionVerticals($selectionVerticals)
    {
        $this->_selectionsVerticals = $selectionVerticals;
    }

}