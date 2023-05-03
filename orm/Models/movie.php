<?php
class movie{
    public $Id;
    public $Name_movie;
    public $Country;
    public $ParticipantId;
    public $GanreId;
    public $Year;
    public $IMDB;
    public $SubscriptionId;

    public function __construct($Id, $Name_movie, $Country, $ParticipantId, $GanreId, $Year, $IMDB, $SubscriptionId){
        $this->Id = $Id;
        $this->Name_movie = $Name_movie;
        $this->Country = $Country;
        $this->ParticipantId=$ParticipantId;
        $this->GanreId=$GanreId;
        $this->Year=$Year;
        $this->IMDB=$IMDB;
        $this->SubscriptionId=$SubscriptionId;
    }

    public function __toString()
    {
        return  'Id: '.$this->Id.';</br>'
            .'Name movie: '.$this->Name_movie.';</br>'
            .'Country: '.$this->Country.';</br>'
            .'Participant Id: '.$this->ParticipantId.';</br>'
            .'Ganre Id: '.$this->GanreId.';</br>'
            .'Year: '.$this->Year.';</br>'
            .'IMDB: '.$this->IMDB.';</br>'
            .'Subscription Id'.$this->SubscriptionId.';</br>';
    }

    public function equals($model)
    {
        if(gettype($model) == gettype($this)){
            if(get_class($model) == get_class($this)){
                if(
                    $this->Name_movie == $model->Name_movie &&
                    $this->Country == $model->Country &&
                    $this->ParticipantId == $model->ParticipantId &&
                    $this->GanreId == $model-> GanreId &&
                    $this->Year == $model-> Year &&
                    $this->IMDB == $model-> IMDB &&
                    $this->SubscriptionId == $model->SubscriptionId
                )
                {return true;}
                else{return false;}
            }
            else{return false;}
        }
        else{return false;}
    }
}
?>