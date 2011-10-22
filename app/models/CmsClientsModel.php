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
    
    
    
    public function createClient($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title`=:title, `address`=:address, `phone`=:phone, `website`=:website,
                                    `email`=:email, `all_pockets`=:allPockets, `type_client`=:typeClient, `type_distributor`=:typeDistributor", $this->tableClients);
            $stmt = $this->dbh->prepare($query);
            
            echo $allPockets = !empty($params['static']['all_pockets'])?1:0;
            echo $typeClient = !empty($params['purpose']['client'])?1:0;
            echo $typeDistributor = !empty($params['purpose']['distributor'])?1:0;
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':address', $params['address'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $params['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':website', $params['website'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(':allPockets', $allPockets, PDO::PARAM_INT);
            $stmt->bindParam(':typeClient', $typeClient, PDO::PARAM_INT);
            $stmt->bindParam(':typeDistributor', $typeDistributor, PDO::PARAM_INT);
            $stmt->execute();
            
            $id = $this->dbh->lastInsertId();
            
            //Add pages
            if(!empty($params['static'])){
                foreach($params['static'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':pageId', $s, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            //Add pages
            if(!empty($params['dynamic'])){
                foreach($params['dynamic'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':pageId', $s, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
        
            return $id;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateClient($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `title`=:title, `address`=:address, `phone`=:phone, `website`=:website,
                                    `email`=:email, `all_pockets`=:allPockets, `type_client`=:typeClient, `type_distributor`=:typeDistributor WHERE `id`=:id", $this->tableClients);
            $stmt = $this->dbh->prepare($query);
            
            $allPockets = !empty($params['static']['all_pockets'])?1:0;
            $typeClient = !empty($params['purpose']['client'])?1:0;
            $typeDistributor = !empty($params['purpose']['distributor'])?1:0;
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':address', $params['address'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $params['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':website', $params['website'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(':allPockets', $allPockets, PDO::PARAM_INT);
            $stmt->bindParam(':typeClient', $typeClient, PDO::PARAM_INT);
            $stmt->bindParam(':typeDistributor', $typeDistributor, PDO::PARAM_INT);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            //Remove all 
            $this->removeClientPages($params['id']);
            
            //Add pages
            if(!empty($params['static'])){
                foreach($params['static'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $params['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':pageId', $s, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
            
            //Add pages
            if(!empty($params['dynamic'])){
                foreach($params['dynamic'] as $s){
                    $query = sprintf("INSERT INTO %s SET `client_id`=:clientId, `page_id`=:pageId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':clientId', $params['id'], PDO::PARAM_INT);
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
            
            $query = sprintf("SELECT `a`.*, IFNULL(0,0) AS `client_id` FROM %s AS `a` WHERE `a`.`type`='static'", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            $results = $stmt->fetchAll();
            
            if(null !== $clientId){
                foreach($results as $key=>$val){
                    
                    $query = sprintf("SELECT * FROM %s WHERE `page_id`=:pageId AND `client_id`=:clientId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':pageId', $val['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
                    $stmt->execute();
                    
                    $results[$key]['client_id'] = ($stmt->fetch() ? $clientId : 0);
                }
            }
            
            return $results;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllDynamic($clientId=null)
    {
        
        try{
            $query = sprintf("SELECT `a`.*, IFNULL(0,0) AS `client_id` FROM %s AS `a` WHERE `a`.`type`='dynamic'", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            $results = $stmt->fetchAll();
            
            if(null !== $clientId){
                foreach($results as $key=>$val){
                    
                    $query = sprintf("SELECT * FROM %s WHERE `page_id`=:pageId AND `client_id`=:clientId", $this->tableClientPages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':pageId', $val['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
                    $stmt->execute();
                    
                    $results[$key]['client_id'] = ($stmt->fetch() ? $clientId : 0);
                }
            }
            
            return $results;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    private function removeClientPages($clientId)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `client_id`=:clientId", $this->tableClientPages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableClients);
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
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableClients);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
}