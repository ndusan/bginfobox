<?php

class CmsClientsModel extends Model
{
    private $tableClients= 'clients';
    private $tablePages= 'pages';
    private $tableClientPages = 'client_pages';
    
    
    public function findAllClients()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableClients);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findClient($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableClients);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateClient($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `title`=:title WHERE `id`=:id", $this->tableClients);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            //Remove all 
            $this->removeClientPages($params['id']);
            
            //Add pages
            if(!empty($params['static'])){
                foreach($parmas['static'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':pageId', $s, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            //Add pages
            if(!empty($params['dynamic'])){
                foreach($parmas['dynamic'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':pageId', $s, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    public function createClient($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title`=:title, `type_client`=:typeClient, `type_distributor`=:typeDistributor", $this->tableClients);
            $stmt = $this->dbh->prepare($query);
            
            $typeClient = !empty($params['purpose']['client'])?$params['purpose']['client']:'';
            $dynamicClient = !empty($params['purpose']['distributor'])?$params['purpose']['distributor']:'';
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':typeClient', $typeClient, PDO::PARAM_STR);
            $stmt->bindParam(':typeDistributor', $dynamicClient, PDO::PARAM_STR);
            $stmt->execute();
            
            $id = $this->dbh->lastInsertId();
            
            //Add pages
            if(!empty($params['static'])){
                foreach($parmas['static'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':pageId', $s, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            //Add pages
            if(!empty($params['dynamic'])){
                foreach($parmas['dynamic'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':pageId', $s, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    public function deleteClient($params)
    {
        
        try{
            $this->removeClientPages($params['id']);
            
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableClients);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllStatic($clientId=null)
    {
        
        try{
            
            
            if(null !== $clientId){
                
                $query = sprintf("SELECT `a`.*, `b`.`client_id` FROM %s AS `a` LEFT JOIN %s AS `b` ON `b`.`page_id`=`a`.`id`
                                    WHERE `a`.`id`=:clientId", $this->tablePages, $this->tableClientPages);
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll();
            }else{
                $query = sprintf("SELECT `a`.*, IFNULL(0,0) AS `client_id` FROM %s AS `a` WHERE `a`.`type`='static'", $this->tablePages);
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll();
            }
            
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllDynamic($clientId=null)
    {
        
        try{
            if(null !== $clientId){
                
                $query = sprintf("SELECT `a`.*, `b`.`client_id` FROM %s AS `a` LEFT JOIN %s AS `b` ON `b`.`page_id`=`a`.`id`
                                    WHERE `b`.`client_id`=:clientId AND `a`.`type`='dynamic'", $this->tablePages, $this->tableClientPages);
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll();
            }else{
                $query = sprintf("SELECT `a`.*, IFNULL(0,0) AS `client_id` FROM %s AS `a` WHERE `a`.`type`='dynamic'", $this->tablePages);
                $stmt = $this->dbh->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll();
            }
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    private function removeClientPages($clientId)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `client_id`=:clientId", $this->tableClientPages);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
}