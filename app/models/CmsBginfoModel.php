<?php

class CmsBginfoModel extends Model
{
 
    private $tablePages = 'pages';
    private $tablePageContent = 'page_content';
    
    public function getStaticPages()
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `type`='static'", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
            
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getCurrentStatic($pageId)
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `type`='static' AND `id`=:id", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $pageId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
            
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getStaticPageSettings($pageId)
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
    
    public function getBginfo($pageId)
    {
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `page_id`=:id", $this->tablePageContent);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $pageId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
        
    }
    
    
    public function updateBginfo($params)
    {
        
        try{
            if(!empty($params['id'])){
                //Update
                $query = sprintf("UPDATE %s SET `content_sr`=:contentSr, `content_en`=:contentEn WHERE `page_id`=:id", $this->tablePageContent);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
                $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            }else{
                //Insert
                $query = sprintf("INSERT INTO %s SET `content_sr`=:contentSr, `content_en`=:contentEn, `page_id`=:pageId", $this->tablePageContent);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
                $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
                $stmt->bindParam(':pageId', $params['page_id'], PDO::PARAM_INT);
            }
            
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}