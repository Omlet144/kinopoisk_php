<?php
include_once 'db/db.php';
include_once 'db/db_context.php';

include_once 'db/Models/subscription.php';
include_once 'db/Models/ganre.php';
include_once 'db/Models/role.php';
include_once 'db/Models/authorization.php';
include_once 'db/Models/movie.php';
include_once 'db/Models/participant.php';

$db = new db();
$db_context = new db_context($db);

$subscription_free = new subscription(1,'Free');
$subscription_premium = new subscription( 2, 'Pramium');

$authorization = new authorization(15,'Sergey', 'asdf', 2);
//$db_context->getAuthorizationController()->add($authorization);
//$db_context->getSubscriptionController()->add($subscription_free);
//$db_context->getSubscriptionController()->add($subscription_premium);
//echo $db_context->getSubscriptionController()->selectById(1);
//$db_context->getAuthorizationController()->removeByModel($authorization);
$db_context->getAuthorizationController()->selectTable();
?>