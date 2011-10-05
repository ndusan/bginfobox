<?php

class LoginModel extends Model
{
    private $userTable = 'users';
    
    public function getUser($params=array())
    {
        
        $query = sprintf("SELECT `id`, `firstname`, `lastname`, `email` FROM %s WHERE `email`=:email AND `password`=PASSWORD(:password)",
                        $this->userTable
                );

        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $params['password'], PDO::PARAM_STR);
        
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
}