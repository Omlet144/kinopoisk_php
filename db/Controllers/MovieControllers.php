<link href="../../style.css" rel="stylesheet">
<?php
include_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\Controller.php';
include_once 'C:\xampp\htdocs\kinopoisk_php\db\Models\movie.php';
class MovieControllers extends Controller {
    public function add($model)
    {
        if(!($model instanceof movie))
        {throw new \InvalidArgumentException("Wrong type!");}
        $conn = $this->connection->getConn();
        try
        {
            $name_movie = $model->Name_movie;
            $country = $model->Country;
            $participant_director_Id = $model->Participant_director_Id;
            $participant_actor_Id = $model->Participant_actor_Id;
            $ganreId = $model->GanreId;
            $year = $model->Year;
            $imdb = $model->IMDB;
            $subscriptionId = $model->SubscriptionId;
            $sql_ins = "INSERT INTO `movie` (Name_movie, Country, Participant_director_Id,Participant_actor_Id, GanreId, Year, IMDB, SubscriptionId) VALUES ('$name_movie','$country','$participant_director_Id','$participant_actor_Id','$ganreId','$year','$imdb','$subscriptionId')";
            if($conn->query($sql_ins)) {
                echo '<p>added!</p>';
            }
            else{
                echo '<p>Not added!</p>';
            }
        }
        catch (InvalidArgumentException) {
            echo '<p>Database error</p>';
        }
        finally {$conn?->close();}
    }
    public function removeById($id)
    {
        $conn = $this->connection->getConn();
        try {
            $del = "DELETE FROM `movie` WHERE Id='$id';";
            if($conn->query($del)){
                echo '<p>deleted!</p>';
            }
            else{
                echo '<p>Not deleted!</p>';
            }
        }
        catch (InvalidArgumentException)
        {
            echo '<p>Database error</p>';
        }
        finally {
            $conn->close();
        }
    }
    public function removeByModel($model)
    {
        if(!($model instanceof movie))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $model->Id;
        $this->removeById($id);
    }
    public function updateById($id, $newModel)
    {
        if(!($newModel instanceof movie)) {
            throw new \InvalidArgumentException("Wrong type!");
        }
        $conn = $this->connection->getConn();
        try{
            $name_movie = $newModel->Name_movie;
            $country = $newModel->Country;
            $participant_director_Id = $newModel->Participant_director_Id;
            $participant_actor_Id = $newModel->Participant_actor_Id;
            $ganreId = $newModel->GanreId;
            $year = $newModel->Year;
            $imdb = $newModel->IMDB;
            $subscriptionId = $newModel->SubscriptionId;
            $update = "UPDATE `movie` SET Name_movie='$name_movie',Country='$country',Participant_director_Id='$participant_director_Id',Participant_actor_Id='$participant_actor_Id',GanreId='$ganreId',Year='$year',IMDB='$imdb',SubscriptionId='$subscriptionId' WHERE Id='$id'";
            if($conn->query($update)){
                echo '<p>updated!</p>';
            }
            else{
                echo '<p>Not updated!</p>';
            }
        }
        catch (InvalidArgumentException)
        {
            echo '<p>Database error</p>';
        }
        finally {
            $conn->close();
        }
    }
    public function updateByModel($oldModel, $newModel)
    {
        if(!($oldModel instanceof movie))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $oldModel->Id;
        $this->updateById($id, $newModel);
    }
    public function selectById($id)
    {
        $conn = $this->connection->getConn();

        try {
            $select = "SELECT * FROM `movie` WHERE id='$id'";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name_movie</th>
                        <th>Country</th>
                        <th>Participant_director_Id</th>
                        <th>Participant_actor_Id</th>
                        <th>GanreId</th>
                        <th>Year</th>
                        <th>IMDB</th>
                        <th>SubscriptionId</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['Name_movie'].'</td>'.
                    '<td>'.$iter['Country'].'</td>'.
                    '<td>'.$iter['Participant_director_Id'].'</td>'.
                    '<td>'.$iter['Participant_actor_Id'].'</td>'.
                    '<td>'.$iter['GanreId'].'</td>'.
                    '<td>'.$iter['Year'].'</td>'.
                    '<td>'.$iter['IMDB'].'</td>'.
                    '<td>'.$iter['SubscriptionId'].'</td>'.
                    '</tr>';
            }
            echo    "</table>";
            $res->free();
        }
        catch (InvalidArgumentException)
        {
            echo '<p>Database error</p>';
        }
        finally {
            $conn->close();
        }
    }
    public function selectByFilter($text)
    {
        $conn = $this->connection->getConn();

        try {
            $select = "SELECT * FROM `movie` WHERE $text";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name_movie</th>
                        <th>Country</th>
                        <th>Participant_director_Id</th>
                        <th>Participant_actor_Id</th>
                        <th>GanreId</th>
                        <th>Year</th>
                        <th>IMDB</th>
                        <th>SubscriptionId</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['Name_movie'].'</td>'.
                    '<td>'.$iter['Country'].'</td>'.
                    '<td>'.$iter['Participant_director_Id'].'</td>'.
                    '<td>'.$iter['Participant_actor_Id'].'</td>'.
                    '<td>'.$iter['GanreId'].'</td>'.
                    '<td>'.$iter['Year'].'</td>'.
                    '<td>'.$iter['IMDB'].'</td>'.
                    '<td>'.$iter['SubscriptionId'].'</td>'.
                    '</tr>';
            }
            echo    "</table>";
            $res->free();
        }
        catch (InvalidArgumentException)
        {
            echo '<p>Database error</p>';
        }
        finally {
            $conn->close();
        }
    }
    public function selectTable()
    {
        $conn = $this->connection->getConn();

        try {
            $select = "SELECT * FROM `movie`";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name_movie</th>
                        <th>Country</th>
                        <th>Participant_director_Id</th>
                        <th>Participant_actor_Id</th>
                        <th>GanreId</th>
                        <th>Year</th>
                        <th>IMDB</th>
                        <th>SubscriptionId</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['Name_movie'].'</td>'.
                    '<td>'.$iter['Country'].'</td>'.
                    '<td>'.$iter['Participant_director_Id'].'</td>'.
                    '<td>'.$iter['Participant_actor_Id'].'</td>'.
                    '<td>'.$iter['GanreId'].'</td>'.
                    '<td>'.$iter['Year'].'</td>'.
                    '<td>'.$iter['IMDB'].'</td>'.
                    '<td>'.$iter['SubscriptionId'].'</td>'.
                    '</tr>';
            }
            echo    "</table>";
            $res->free();
        }
        catch (InvalidArgumentException)
        {
            echo '<p>Database error</p>';
        }
        finally {
            $conn->close();
        }
    }
    public function findByParticipantDirectorId($id)
    {
        $conn = $this->connection->getConn();
        try {
            $select = "SELECT * FROM `movie` WHERE Participant_director_Id='$id'";
            $res = $conn->query($select);
            $result = array();
            foreach ($res as $iter) {
                array_push($result, new movie($iter['Id'],$iter['Name_movie'],$iter['Country'],$iter['Participant_director_Id'],$iter['Participant_actor_Id'],$iter['GanreId'],$iter['Year'],$iter['IMDB'],$iter['SubscriptionId']));
            }
            $res->free();
            return $result;
        }
        catch (InvalidArgumentException)
        {
            return '<p>Database error</p>';
        }
        finally {
            $conn->close();
        }
    }
}
?>