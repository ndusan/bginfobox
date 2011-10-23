<?php

class CmsAboutUsModel extends Model
{
    private $tableAboutUs= 'aboutus';
    
    
    public function findAllAboutUs()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableAboutUs);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findAboutUs($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableAboutUs);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateAboutUs($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `content_sr`=:contentSr, `content_en`=:contentEn WHERE `id`=:id", $this->tableAboutUs);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableAboutUs);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function createAboutUs($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `content_sr`=:contentSr, `content_en`=:contentEn", $this->tableAboutUs);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->execute();
            
            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableAboutUs);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function deleteAboutUs($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableAboutUs);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
}