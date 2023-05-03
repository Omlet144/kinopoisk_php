<?php
class authorization{
    public $Id;
    public $login;
    public $password;
    public $subscriptionId;

    public function __construct($Id, $login, $password, $subscription){
        $this->Id = $Id;
        $this->login =$login;
        $this->password=$password;
        $this->subscriptionId=$subscription;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.';</br>'
            .'Login: '.$this->login.';</br>'
            .'Password: '.$this->password.';</br>'
            .'Subscription: '.$this->subscriptionId.';</br>';
    }

    public function equals($model)
    {
        if(gettype($model) == gettype($this)){
            if(get_class($model) == get_class($this)){
                if($this->login == $model->login && $this->subscriptionId == $model->subscription && $this->password == $model->password){
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