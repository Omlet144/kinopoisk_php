<?php
require_once '../../db/db.php';
require_once '../../db/db_context.php';

$db = new db();
$db_context = new db_context($db);
if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(isset($_GET['getByAuthor']))
    {
        $id = $db_context->getParticipantController()->findByName($_GET['getByAuthor']);
        if($id!=null){
            $json = json_encode($db_context->getMovieController()->findByParticipantDirectorId($id));
            echo $json;
        }
        else
            echo '404';
    }
    else
        echo '400';
}
?>