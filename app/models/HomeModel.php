<?php

class HomeModel extends Model
{
 
    private $tblDownloads = 'downloads';
    private $tblNews = 'news';
    private $tblClients = 'clients';
    private $tblClientImages = 'client_images';
    private $tblHome = 'home';
    private $tblCarousel = 'carousel';
    private $tblQuotes = 'quotes';
    
    public function getAllDownloads()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tblDownloads);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(PDOException $e){
            
            return false;
        }
    }
    
    
    public function getTotalNumOfNews()
    {
        
        try{
            $query = sprintf("SELECT COUNT(*) AS `count` FROM %s", $this->tblNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            $row = $stmt->fetch();
            
            return $row['count'];
        }catch(PDOException $e){
            
            return false;
        }
    }
    
    public function getNewsPerPage($offset, $pageRows)
    {
        
        try{
            $query = sprintf("SELECT * FROM %s LIMIT %d , %d", $this->tblNews, mysql_escape_string($offset), mysql_escape_string($pageRows));
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(PDOException $e){
            
            return false;
        }
    }
    
    
    public function getListOfClients()
    {
       
        try{
            $query = sprintf("SELECT * FROM %s", $this->tblClients);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(PDOException $e){
            
            return false;
        }
    }
    
    
    public function getCurrentClient($id)
    {
       
        try{
            if(null == $id){
                
                $query = sprintf("SELECT * FROM %s ORDER BY `position` DESC LIMIT 0,1", $this->tblClients);
                $stmt = $this->dbh->prepare($query);
            }else{
                
                $query = sprintf("SELECT * FROM %s WHERE `id`=:id ORDER BY `position` DESC", $this->tblClients);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }

            $stmt->execute();

            return $stmt->fetch()?:false;
        }catch(PDOException $e){
            
            return false;
        }
    }
    
    
    public function getClientCarousel($id)
    {
        try{
                
            $query = sprintf("SELECT * FROM %s WHERE `client_id`=:clientId", $this->tblClientImages);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':clientId', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(PDOException $e){
            
            return false;
        }
    }
    
    
    public function getLatestProjects()
    {
        
        try{
            $query = sprintf("SELECT * FROM %s WHERE `status`='1' ORDER BY `position` DESC", $this->tblClients);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getHomePage()
    {
        
        try{
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC LIMIT 0,1", $this->tblHome);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getMainCarousel()
    {
        
        try{
            $query = sprintf("SELECT * FROM %s", $this->tblCarousel);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getQuotes()
    {
        
        try{
            $query = sprintf("SELECT * FROM %s", $this->tblQuotes);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getQuote($id)
    {
        
        try{
            if(null == $id){
                
                $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC LIMIT 0,1", $this->tblQuotes);
                $stmt = $this->dbh->prepare($query);
            }else{
                
                $query = sprintf("SELECT * FROM %s WHERE `id`=:id ORDER BY `id` DESC", $this->tblQuotes);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }

            $stmt->execute();

            return $stmt->fetch()?:false;
        }catch(Exception $e){
            
            return false;
        }
    }
    
}