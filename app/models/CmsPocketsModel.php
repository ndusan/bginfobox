<?php

class CmsPocketsModel extends Model
{
    
    private $tablePages = 'pages';
    private $tablePageContent = 'page_pocket_content';
    private $tablePageEdition = 'page_pocket_edition';
    private $tablePageEditionImages = 'page_pocket_edition_images';
    private $tablePageInfo = 'page_pocket_info';
    
    public function getDynamicPages()
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `type`='dynamic' ORDER BY `position` DESC", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
            
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getCurrentDynamicPage($pageId)
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `type`='dynamic' AND `id`=:id", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $pageId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
            
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function addCity($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title`=:title, `link`=:link, `num_of_images`=:numOfImages,
                                `has_link`=:hasLink, `has_file_name`=:hasFileName, `position`=:position", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $numOfImages = 3;
            $hasLink = 1;
            $hasFileName = 1;
            $position = time();
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':link', $params['link'], PDO::PARAM_STR);
            $stmt->bindParam(':numOfImages', $numOfImages, PDO::PARAM_INT);
            $stmt->bindParam(':hasLink', $hasLink, PDO::PARAM_INT);
            $stmt->bindParam(':hasFileName', $hasFileName, PDO::PARAM_INT);
            $stmt->bindParam(':position', $position, PDO::PARAM_INT);
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
    
    public function positionCity($params)
    {
        
        try{
            
            $query = sprintf("UPDATE %s AS `city` SET 
                                    `city`.`position`=:start WHERE `id`=:endId", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':start', $params['start'], PDO::PARAM_INT);
            $stmt->bindParam(':endId', $params['end_id'], PDO::PARAM_INT);
            $stmt->execute();

            $query = sprintf("UPDATE %s AS `city` SET 
                                    `city`.`position`=:end WHERE `id`=:startId", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':end', $params['end'], PDO::PARAM_INT);
            $stmt->bindParam(':startId', $params['start_id'], PDO::PARAM_INT);
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
                $query = sprintf("UPDATE %s SET `front_content_sr`=:frontContentSr, `front_content_en`=:frontContentEn, 
                                                `content_sr`=:contentSr, `content_en`=:contentEn 
                                    WHERE `id`=:id", $this->tablePageContent, $this->tablePages);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':frontContentSr', $params['front_content_sr'], PDO::PARAM_STR);
                $stmt->bindParam(':frontContentEn', $params['front_content_en'], PDO::PARAM_STR);
                $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
                $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            }else{
                //Insert
                $query = sprintf("INSERT INTO %s SET `front_content_sr`=:frontContentSr, `front_content_en`=:frontContentEn,
                                                    `content_sr`=:contentSr, `content_en`=:contentEn", $this->tablePageContent);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->bindParam(':frontContentSr', $params['front_content_sr'], PDO::PARAM_STR);
                $stmt->bindParam(':frontContentEn', $params['front_content_en'], PDO::PARAM_STR);
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
    
    
    
    public function createPocketsEdition($pageId)
    {
        
        if(empty($pageId)) return false;
        
        $currStatic = $this->getCurrentDynamicPage($pageId);
        
        try{
            $query = sprintf("INSERT INTO %s SET `title`=:title, `page_id`=:pageId", $this->tablePageEdition);
            $stmt = $this->dbh->prepare($query);

            $genTitle = $currStatic['title'].' EDITION ['.date('Y-m-d H:m:s').']';
            
            $stmt->bindParam(':title', $genTitle, PDO::PARAM_STR);
            $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
            
            $stmt->execute();

            return $this->dbh->lastInsertId();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function createPocketsEditionImage($params)
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
    
    
    public function updatePocketsEditionImage($params)
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
    
    
    
    public function deletePocketsEdition($params)
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
    
    
    public function addInfo($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title_sr`=:titleSr, `title_en`=:titleEn,
                                                    `content_sr`=:contentSr, `content_en`=:contentEn", $this->tablePageInfo);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function updateInfo($params)
    {
        
        try{
            
            $query = sprintf("UPDATE %s SET `title_sr`=:titleSr, `title_en`=:titleEn,
                              `content_sr`=:contentSr, `content_en`=:contentEn WHERE `id`=:id", $this->tablePageInfo);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getInfo($id)
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tablePageInfo);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function deleteInfo($id)
    {
        
        try{
            
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", $this->tablePageInfo);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getAllInfo()
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s", $this->tablePageInfo);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
}