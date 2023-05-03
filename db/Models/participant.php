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

    public function equals($model)
    {
        if(gettype($model) == gettype($this)){
            if(get_class($model) == get_class($this)){
                if($this->Name_participant == $model->Name_participant && $this->RoleId == $model->RoleId)
                {return true;}
                else{return false;}
            }
            else{return false;}
        }
        else{return false;}
    }
}
?>