<?php

class CmsBginfoModel extends Model
{
 
    private $tablePages = 'pages';
    private $tablePageContent = 'page_content';
    private $tablePageEdition = 'page_edition';
    private $tablePageEditionImages = 'page_edition_images';
    
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
    
    
    public function getCurrentStaticPage($pageId)
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
    
    
    public function createBginfoEdition($pageId)
    {
        
        if(empty($pageId)) return false;
        
        $currStatic = $this->getCurrentStaticPage($pageId);
        
        try{
            $query = sprintf("INSERT INTO %s SET `title`=:title, `page_id`=:pageId", $this->tablePageEdition);
            $stmt = $this->dbh->prepare($query);

            if($pageId == 1){
                $genTitle = $currStatic['title'].' PANO ['.date('Y-m-d H:m:s').']';
            }else{
                $genTitle = $currStatic['title'].' EDITION ['.date('Y-m-d H:m:s').']';
            }
            
            $stmt->bindParam(':title', $genTitle, PDO::PARAM_STR);
            $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
            
            $stmt->execute();

            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function createBginfoEditionImage($params)
    {
        
        try{
            $query = sprintf("INSERT INTO %s SET `title_sr`=:titleSr, `title_en`=:titleEn, 
                                                 `page_edition_id`=:pageEditionId, `page_id`=:pageId, `position`=:position", $this->tablePageEditionImages);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':pageEditionId', $params['page_edition_id'], PDO::PARAM_INT);
            $stmt->bindParam(':pageId', $params['page_id'], PDO::PARAM_INT);
            $stmt->bindParam(':position', $params['position'], PDO::PARAM_INT);
            
            $stmt->execute();

            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function updateBginfoEditionImage($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `title_sr`=:titleSr, `title_en`=:titleEn, `position`=:position
                               WHERE `id`=:id", $this->tablePageEditionImages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':position', $params['position'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function deleteBginfoEdition($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s  WHERE `page_edition_id`=:pageEditionId", $this->tablePageEditionImages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':pageEditionId', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tablePageEdition);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tablePageEditionImages);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tablePageEditionImages);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getImageNameArray($pageEditionId)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `page_edition_id`=:pageEditionId", $this->tablePageEditionImages);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':pageEditionId', $pageEditionId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    public function setDownload($id, $fileName)
    {
        try{
            $query = sprintf("UPDATE %s SET `file_name`=:fileName WHERE `id`=:id", $this->tablePageEdition);
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getDownload($id)
    {
        try{
            $query = sprintf("SELECT `file_name` FROM %s WHERE `id`=:id", $this->tablePageEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getAllEdition()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tablePageEdition);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getEditionImages($pageEditionId)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `page_edition_id`=:pageEditionId", $this->tablePageEditionImages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':pageEditionId', $pageEditionId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
}