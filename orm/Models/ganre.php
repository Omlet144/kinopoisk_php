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
}
?>