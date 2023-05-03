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

$role_director = new role(1, 'Director');
$role_actor = new role(2, 'Actor');

$particpant_spilberg = new participant(1, 'Spilberg', 1);
$particpant_cruz = new participant(1, 'Tom Cruz', 2);

$particpant_verbinski = new participant( 2, 'Gregor Verbinski',1);
$particpant_jony_depp = new participant( 2, 'Jony Depp',2);

$particpant_cameron = new participant( 3, 'James Cameron',1);
$particpant_worthington = new participant( 3, 'Samuel Worthington',2);
$particpant_dicaprio = new participant( 3, 'Dicaprio',2);

$genre_horror = new ganre(1,'Horror');
$genre_comedy = new ganre(2,'Comedy');
$genre_thriller = new ganre(3,'Thriller');
$genre_fantasy = new ganre(4,'Fantasy');
$genre_drama = new ganre(5,'Drama');

$movie1 = new movie(1, 'Avatar','America', 8,6,4,2009,7.80,2);
$movie2 = new movie(2, 'Titanic','America', 8,7,5,1997,7.70,2);
$movie3 = new movie(3, 'Pirates of the Caribbean','America', 5,2,4,2003,8.10,1);
$movie4 = new movie(4, 'War of the Worlds','America', 1,4,1,2005,6.50,1);

//$db_context->getMovieController()->add($movie1);
//$db_context->getMovieController()->add($movie2);
//$db_context->getMovieController()->add($movie3);
//$db_context->getMovieController()->add($movie4);

$db_context->getMovieController()->selectByFilter('Participant_director_Id=1');
?>