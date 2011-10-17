<?php

class CmsPocketsModel extends Model
{
    
    private $tablePages = 'pages';
    private $tablePageContent = 'page_pocket_content';
    
    public function getDynamicPages()
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `type`='dynamic'", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
            
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function addCity($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title`=:title, `link`=:link", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function updateCity($params)
    {
        
        try{
            
            $query = sprintf("UPDATE %s SET `title`=:title, `link`=:link WHERE `id`=:id", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getCity($id)
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function deleteCity($id)
    {
        
        try{
            
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function updatePockets($params)
    {
        
        try{
            if(!empty($params['id'])){
                //Update
                $query = sprintf("UPDATE %s SET `content_sr`=:contentSr, `content_en`=:contentEn 
                                    WHERE `id`=:id", $this->tablePageContent, $this->tablePages);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
                $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            }else{
                //Insert
                $query = sprintf("INSERT INTO %s SET `content_sr`=:contentSr, `content_en`=:contentEn", $this->tablePageContent);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
                $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            }
            
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getPockets()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tablePageContent);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getDymamicPageSettings($pageId)
    {
        
        try{
            
            $query = sprintf("SELECT `id`, `title`, `num_of_images`, `has_file_name` FROM %s WHERE `id`=:pageId", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
            
        }catch(Exception $e){
            
            return false;
        }
    }
    
}