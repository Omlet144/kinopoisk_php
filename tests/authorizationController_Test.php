<?php
require_once 'C:\xampp\htdocs\kinopoisk_php\db\db.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\db_context.php';
require_once 'C:\xampp\htdocs\kinopoisk_php\db\Models\authorization.php';
class  authorizationController_Test{
    private $db_context;
    public function __construct()
    {
        $this->db_context = new db_context(new db());
    }
    public function testAddingUser()
    {
        $testUser = new authorization(1,  'admin','admin',1);
        $res = $this->db_context->getAuthorizationController()->add($testUser);
        if($res==true)
        {
            echo 'User added';
        }
        else{echo 'Not added!'; }
    }
    public function testDeletingUserByModel()
    {
        $testUser = new authorization(1,  'admin','admin',1);
        $res = $this->db_context->getAuthorizationController()->removeByModel($testUser);
        if($res==true)
        {
            echo 'User deleted';
        }
        else{
            echo 'Not deleted!';
        }
    }

    public function testDeletingUserById()
    {
        $res = $this->db_context->getAuthorizationController()->removeById(1);
        if($res==true)
        {
            echo 'User deleted';
        }
        else{
            echo 'Not deleted!';
        }
    }

    public function testUpdatingUser()
    {
        $testUser = new authorization(6,  'ADMIN','ADMIN',1);
        $res = $this->db_context->getAuthorizationController()->updateById(6,$testUser);
        if($res==true)
        {
            echo 'User updated';
        }
        else{
            echo 'Not updated!';
        }
    }
    public function testUpdatingUserByModel()
    {
        $testUser = new authorization(6,  'ADMIN','ADMIN',1);
        $newTestUser = new authorization(6,  'NewADMIN','NewADMIN',1);
        $res = $this->db_context->getAuthorizationController()->updateByModel($testUser,$newTestUser);
        if($res==true)
        {
            echo 'User updated';
        }
        else{
            echo 'Not updated!';
        }
    }
}
?>
