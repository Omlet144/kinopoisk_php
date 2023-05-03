<?php
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(isset($_GET['user']))
        echo $_GET['user'].' on server!';
    else
        echo '400';
}
?>