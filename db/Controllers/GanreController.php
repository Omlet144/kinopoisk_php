<link href="../../style.css" rel="stylesheet">
<?php
include_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\Controller.php';
include_once 'C:\xampp\htdocs\kinopoisk_php\db\Models\ganre.php';
class GanreController extends Controller {
    public function add($model)
    {
        if(!($model instanceof ganre))
        {throw new \InvalidArgumentException("Wrong type!");}
        $conn = $this->connection->getConn();
        try
        {
            $name = $model->Name;
            $sql_ins = "INSERT INTO `ganre` (Name) VALUES ('$name')";
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
            $del = "DELETE FROM `ganre` WHERE Id='$id';";
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
        if(!($model instanceof ganre))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $model->Id;
        $this->removeById($id);
    }
    public function updateById($id, $newModel)
    {
        if(!($newModel instanceof ganre)) {
            throw new \InvalidArgumentException("Wrong type!");
        }
        $conn = $this->connection->getConn();
        try{
            $name = $newModel->Name;
            $update = "UPDATE `ganre` SET Name='$name' WHERE Id='$id'";
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
        if(!($oldModel instanceof ganre))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $oldModel->Id;
        $this->updateById($id, $newModel);
    }
    public function selectById($id)
    {
        $conn = $this->connection->getConn();

        try {
            $select = "SELECT * FROM `ganre` WHERE id='$id'";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['Name'].'</td>'.
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
            $select = "SELECT * FROM `ganre` WHERE $text";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['Name'].'</td>'.
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
            $select = "SELECT * FROM `ganre`";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['Name'].'</td>'.
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