<?php

class CmsUserModel extends Model
{
    private $tableUser = 'users';
    
    
    public function findAllUsers()
    {
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `created` DESC", $this->tableUser);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findUser($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableUser);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateUser($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `firstname`=:firstname, `lastname`=:lastname, `email`=:email WHERE `id`=:id", $this->tableUser);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':firstname', $params['firstname'], PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $params['lastname'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            if(!empty($params['password'])){
                $query = sprintf("UPDATE %s SET `password`=PASSWORD(:password) WHERE `id`=:id", $this->tableUser);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':password', $params['password'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
                $stmt->execute();
            }

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function createUser($params)
    {
        
        try{
            //Check if there is user with email
            $query = sprintf("SELECT * FROM %s WHERE `email`=:email", $this->tableUser);
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->fetch()){
                //Email in use
                return false;
            }
            
            $query = sprintf("INSERT INTO %s SET `firstname`=:firstname, `lastname`=:lastname, `email`=:email, `password`=PASSWORD(:password)", $this->tableUser);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':firstname', $params['firstname'], PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $params['lastname'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $params['password'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function deleteUser($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableUser);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}
