<link href="../../style.css" rel="stylesheet">
<?php
include_once 'db/Controllers/Controller.php';
include_once 'db/Models/movie.php';
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
            $participantId = $model->ParticipantId;
            $ganreId = $model->GanreId;
            $year = $model->Year;
            $imdb = $model->IMDB;
            $subscriptionId = $model->SubscriptionId;
            $sql_ins = "INSERT INTO `movie` (Name_movie, Country, ParticipantId, GanreId, Year, IMDB, SubscriptionId) VALUES ('$name_movie','$country','$participantId','$ganreId','$year','$imdb','$subscriptionId')";
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
            $participantId = $newModel->ParticipantId;
            $ganreId = $newModel->GanreId;
            $year = $newModel->Year;
            $imdb = $newModel->IMDB;
            $subscriptionId = $newModel->SubscriptionId;
            $update = "UPDATE `movie` SET Name_movie='$name_movie',Country='$country',ParticipantId='$participantId',GanreId='$ganreId',Year='$year',IMDB='$imdb',SubscriptionId='$subscriptionId' WHERE Id='$id'";
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
                        <th>ParticipantId</th>
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
                    '<td>'.$iter['ParticipantId'].'</td>'.
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
                        <th>ParticipantId</th>
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
                    '<td>'.$iter['ParticipantId'].'</td>'.
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
                        <th>ParticipantId</th>
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
                    '<td>'.$iter['ParticipantId'].'</td>'.
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
}
?>