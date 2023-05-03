<?php
class ganre{
    public $Id;
    public $Name;

    public function __construct($Id, $Name){
        $this->Id = $Id;
        $this->Name =$Name;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.';</br>'
            .'Name genre: '.$this->Name.';</br>';
    }

    public function equals($model)
    {
        if(gettype($model) == gettype($this)){
            if(get_class($model) == get_class($this)){
                if($this->Name == $model->Name){
                    return true;
                }
                else{return false;}
            }
            else{return false;}
        }
        else{return false;}
    }
}
?>