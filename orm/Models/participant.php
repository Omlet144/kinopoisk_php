<?php
class participant{
    public $Id;
    public $Name_participant;
    public $RoleId;

    public function __construct($Id, $Name_participant, $RoleId){
        $this->Id = $Id;
        $this->Name_participant =$Name_participant;
        $this->RoleId=$RoleId;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.';</br>'
            .'Name: '.$this->Name.';</br>';
    }
}
?>