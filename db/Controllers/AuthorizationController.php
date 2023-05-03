<link href="../../style.css" rel="stylesheet">
<?php
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\Controller.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Models\authorization.php';
class AuthorizationController extends Controller {
    public function add($model){
        if(!($model instanceof authorization))
        {throw new \InvalidArgumentException("Wrong type!");}
        $conn = $this->connection->getConn();
        try
        {
            $login = $model->login;
            $pass = $model->password;
            $subscription = $model->subscriptionId;
            $sql_ins = "INSERT INTO `authorization` (login, password, subscriptionId) VALUES ('$login', '$pass', '$subscription')";
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
            $del = "DELETE FROM `authorization` WHERE Id='$id';";
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
        if(!($model instanceof authorization))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $model->Id;
        $this->removeById($id);
    }
    public function updateById($id, $newModel)
    {
        if(!($newModel instanceof authorization)) {
            throw new \InvalidArgumentException("Wrong type!");
        }
        $conn = $this->connection->getConn();
        try{
            $login = $newModel->login;
            $pass = $newModel->password;
            $subscription = $newModel->subscriptionId;
            $update = "UPDATE `authorization` SET login='$login',password='$pass',$subscription='$subscription' WHERE Id='$id'";
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
        if(!($oldModel instanceof authorization))
            throw new \InvalidArgumentException("Wrong type!");
        $id = $oldModel->Id;
        $this->updateById($id, $newModel);
    }
    public function selectById($id)
    {
        $conn = $this->connection->getConn();

        try {
            $select = "SELECT * FROM `authorization` WHERE id='$id'";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>login</th>
                         <th>password</th>
                          <th>subscription</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['login'].'</td>'.
                    '<td>'.$iter['password'].'</td>'.
                    '<td>'.$iter['subscriptionId'].'</td>'.
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
            $select = "SELECT * FROM `authorization` WHERE $text";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>login</th>
                         <th>password</th>
                          <th>subscription</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['login'].'</td>'.
                    '<td>'.$iter['password'].'</td>'.
                    '<td>'.$iter['subscriptionId'].'</td>'.
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
            $select = "SELECT * FROM `authorization`";
            $res = $conn->query($select);
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>login</th>
                         <th>password</th>
                          <th>subscription</th>
                    </tr>";
            foreach ($res as $iter) {
                echo '<tr>'.
                    '<td>'.$iter['Id'].'</td>'.
                    '<td>'.$iter['login'].'</td>'.
                    '<td>'.$iter['password'].'</td>'.
                    '<td>'.$iter['subscriptionId'].'</td>'.
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