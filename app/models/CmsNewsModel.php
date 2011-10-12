<?php

class CmsNewsModel extends Model
{
    private $tableNews= 'news';
    
    
    public function findAllNews()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findNews($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateNews($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `title_sr`=:titleSr, `heading_sr`=:headingSr, `content_sr`=:contentSr, 
                                            `title_en`=:titleEn, `heading_en`=:headingEn, `content_en`=:contentEn WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':headingSr', $params['heading_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':headingEn', $params['heading_en'], PDO::PARAM_STR);
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
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function createNews($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title_sr`=:titleSr, `heading_sr`=:headingSr, `content_sr`=:contentSr,
                                                 `title_en`=:titleEn, `heading_en`=:headingEn, `content_en`=:contentEn", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':headingSr', $params['heading_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':headingEn', $params['heading_en'], PDO::PARAM_STR);
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
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function deleteNews($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    } 
}