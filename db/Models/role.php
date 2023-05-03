<?php
class role{
    public $Id;
    public $Name_role;

    public function __construct($Id, $Name_role){
        $this->Id = $Id;
        $this->Name_role =$Name_role;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.';</br>'
            .'Name role: '.$this->Name_role.';</br>';
    }

    public function equals($model)
    {
        if(gettype($model) == gettype($this)){
            if(get_class($model) == get_class($this)){
                if($this->Name_role == $model->Name_role)
                {return true;}
                else{return false;}
            }
            else{return false;}
        }
        else{return false;}
    }
}
?>