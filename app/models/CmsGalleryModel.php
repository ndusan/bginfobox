<?php

class CmsGalleryModel extends Model
{
    private $tableGallery= 'gallery';
    
    
    public function findAllGallery()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findGallery($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateGallery($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `title`=:title WHERE `id`=:id", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
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
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function createGallery($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title`=:title", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->execute();
            
            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function deleteGallery($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
    
    
    public function updateImageInfo($id, $array)
    {
        
       try{
            $query = sprintf("UPDATE %s SET `ratio`=:ratio, `size`=:size WHERE `id`=:id", $this->tableGallery);
            $stmt = $this->dbh->prepare($query);
            
            $ratio = $array['width'].'x'.$array['height'];
            $stmt->bindParam(':ratio', $ratio, PDO::PARAM_STR);
            $stmt->bindParam(':size', $array['size'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        } 
    }
}