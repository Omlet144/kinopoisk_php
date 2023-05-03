<?php
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\AuthorizationController.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\SubscriptionController.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\GanreController.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\ParticipantController.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\MovieControllers.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Controllers\RoleController.php';
class db_context{
    private $conn;
    private $authorizationController;
    private $ganreController;
    private $movieController;
    private $participantController;
    private $roleController;
    private $subscriptionController;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->authorizationController = new AuthorizationController($this->conn);
        $this->subscriptionController = new SubscriptionController($this->conn);
        $this->ganreController = new GanreController($this->conn);
        $this->movieController = new MovieControllers($this->conn);
        $this->participantController = new ParticipantController($this->conn);
        $this->roleController = new RoleController($this->conn);
    }
    public function getAuthorizationController(): AuthorizationController
    {
        return $this->authorizationController;
    }
    public function getGanreController(): GanreController
    {
        return $this->ganreController;
    }
    public function getMovieController(): MovieControllers
    {
        return $this->movieController;
    }
    public function getParticipantController(): ParticipantController
    {
        return $this->participantController;
    }
    public function getRoleController(): RoleController
    {
        return $this->roleController;
    }
    public function getSubscriptionController(): SubscriptionController
    {
        return $this->subscriptionController;
    }
}
?>
