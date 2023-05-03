<?php
class subscription{
    public $Id;
    public $Name;

    public function __construct($Id, $Name_subscription){
        $this->Id = $Id;
        $this->Name = $Name_subscription;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.';</br>'.'Name: '.$this->Name.';</br>';
    }

    public function equals($model)
    {
        if(gettype($model) == gettype($this)){
            if(get_class($model) == get_class($this)){
                if($this->Name == $model->Name_subscription)
                {return true;}
                else{return false;}
            }
            else{return false;}
        }
        else{return false;}
    }
}
?>