<link href="../../style.css" rel="stylesheet">
<?php
include_once 'orm/Controllers/Controller.php';
include_once 'orm/Models/participant.php';
class ParticipantController extends Controller {
    public function add($model)
    {
        if(!($model instanceof participant))
        {throw new \InvalidArgumentException("Wrong type!");}
        $conn = $this->connection->getConn();
        try
        {
            $name_participant = $model->Name_participant;
            $roleId = $model->RoleId;
            $sql_ins = "INSERT INTO `participant` (Name_participant, RoleId) VALUES ('$name_participant', '$roleId')";
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
            $del = "DELETE FROM `participant` WHERE Id='$id';";
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
        if(!($model instanceof participant))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $model->Id;
        $this->removeById($id);
    }
    public function updateById($id, $newModel)
    {
        if(!($newModel instanceof participant)) {
            throw new \InvalidArgumentException("Wrong type!");
        }
        $conn = $this->connection->getConn();
        try{
            $name_participant = $newModel->Name_participant;
            $roleId = $newModel->RoleId;
            $update = "UPDATE `participant` SET Name_participant='$name_participant',RoleId='$roleId' WHERE Id='$id'";
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
        if(!($oldModel instanceof participant))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $oldModel->Id;
        $this->updateById($id, $newModel);
    }
    public function selectById($id)
    {
        $conn = $this->connection->getConn();

        try {
            $select = "SELECT * FROM `participant` WHERE id='$id'";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name_participant</th>
                        <th>RoleId</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['RoleId'].'</td>'.
                    '<td>'.$iter['RoleId'].'</td>'.
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
            $select = "SELECT * FROM `participant` WHERE $text";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name_participant</th>
                        <th>RoleId</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['RoleId'].'</td>'.
                    '<td>'.$iter['RoleId'].'</td>'.
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
            $select = "SELECT * FROM `participant`";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name_participant</th>
                        <th>RoleId</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['RoleId'].'</td>'.
                    '<td>'.$iter['RoleId'].'</td>'.
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