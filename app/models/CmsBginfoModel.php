<?php

class CmsBginfoModel extends Model
{
 
    private $tablePages = 'pages';
    
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
    
    
    public function getNumOfImages($pageId)
    {
        
        try{
            
            $query = sprintf("SELECT `num_of_images` FROM %s WHERE `id`=:pageId", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
            
        }catch(Exception $e){
            
            return false;
        }
    }
}