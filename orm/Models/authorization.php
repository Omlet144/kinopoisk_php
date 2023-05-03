<?php
class authorization{
    public $Id;
    public $login;
    public $password;
    public $subscription;

    public function __construct($Id, $login, $password, $subscription){
        $this->Id = $Id;
        $this->login =$login;
        $this->password=$password;
        $this->subscription=$subscription;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.';</br>'
            .'Login: '.$this->login.';</br>'
            .'Password: '.$this->password.';</br>'
            .'Subscription: '.$this->subscription.';</br>';
    }
}
?>