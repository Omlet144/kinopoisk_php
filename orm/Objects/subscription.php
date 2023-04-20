<?php
class subscription{
    public $Id;
    public $Name_subscription;

    public function __construct($Id, $Name_subscription){
        $this->Id = $Id;
        $this->Name_subscription = $Name_subscription;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.'; '.'Name: '.$this->Name_subscription.';';
    }
}
?>