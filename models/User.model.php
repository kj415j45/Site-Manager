<?php
include "Model.php";
class User implements Model{//TODO
    private $id;
    private $username;
    private $usergroup;
    
    private $name;
    private $telephone;
    private $qq;
    
    public function __construct(int $id,string $username,string $usergroup){
        $this->$id=$id;
        $this->$username=$username;
        $this->$usergroup=$usergroup;
    }
}
