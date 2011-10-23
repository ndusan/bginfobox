<?php

class CmsClientsModel extends Model
{
    private $tableClients= 'clients';
    private $tablePages= 'pages';
    private $tableClientPages = 'client_pages';
    private $tableNavigation = 'navigation';
    private $tableNavigationTree = 'navigation_tree';
    
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
    
    
    
    public function findNode($id)
    {
        try{
            $query = sprintf("SELECT `n`.*, `nt`.`ancestor` AS `parent` FROM %s AS `n`
                                INNER JOIN %s AS `nt` ON `nt`.`descendant`=`n`.`id`
                                WHERE `n`.`id`=:id AND `nt`.`path_length`='1'", $this->tableNavigation, $this->tableNavigationTree);
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
                                    `email`=:email, `all_pockets`=:allPockets, `type_client`=:typeClient, 
                                    `type_distributor`=:typeDistributor, `navigation_id`=:navigationId, 
                                    `paid`=:paid, `date_start`=:dateStart, `date_end`=:dateEnd", $this->tableClients);
            $stmt = $this->dbh->prepare($query);
            
            $allPockets = !empty($params['static']['all_pockets'])?1:0;
            $typeClient = !empty($params['purpose']['client'])?1:0;
            $typeDistributor = !empty($params['purpose']['distributor'])?1:0;
            $paid = !empty($params['paid'])?1:0;
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':address', $params['address'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $params['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':website', $params['website'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(':allPockets', $allPockets, PDO::PARAM_INT);
            $stmt->bindParam(':typeClient', $typeClient, PDO::PARAM_INT);
            $stmt->bindParam(':typeDistributor', $typeDistributor, PDO::PARAM_INT);
            $stmt->bindParam(':navigationId', $params['navigation_id'], PDO::PARAM_INT);
            $stmt->bindParam(':paid', $paid, PDO::PARAM_INT);
            $stmt->bindParam(':dateStart', $this->convertDate($params['date_start']));
            $stmt->bindParam(':dateEnd', $this->convertDate($params['date_end']));
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
                                    `email`=:email, `all_pockets`=:allPockets, `type_client`=:typeClient, 
                                    `type_distributor`=:typeDistributor, `navigation_id`=:navigationId,
                                    `paid`=:paid, `date_start`=:dateStart, `date_end`=:dateEnd WHERE `id`=:id", $this->tableClients);
            $stmt = $this->dbh->prepare($query);
            
            $allPockets = !empty($params['static']['all_pockets'])?1:0;
            $typeClient = !empty($params['purpose']['client'])?1:0;
            $typeDistributor = !empty($params['purpose']['distributor'])?1:0;
            $paid = !empty($params['paid'])?1:0;
            
            $stmt->bindParam(':title', $params['title'], PDO::PARAM_STR);
            $stmt->bindParam(':address', $params['address'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $params['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':website', $params['website'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['email'], PDO::PARAM_STR);
            $stmt->bindParam(':allPockets', $allPockets, PDO::PARAM_INT);
            $stmt->bindParam(':typeClient', $typeClient, PDO::PARAM_INT);
            $stmt->bindParam(':typeDistributor', $typeDistributor, PDO::PARAM_INT);
            $stmt->bindParam(':navigationId', $params['navigation_id'], PDO::PARAM_INT);
            $stmt->bindParam(':paid', $paid, PDO::PARAM_INT);
            $stmt->bindParam(':dateStart', $this->convertDate($params['date_start']));
            $stmt->bindParam(':dateEnd', $this->convertDate($params['date_end']));
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
    
    
    public function setNodeImageName($id, $imageName)
    {
        try{
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableNavigation);
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
    
    
    public function getNodeImageName($id)
    {
        
        try{
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    private function generateSlug($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)){
            return false;
        }
        
        //Check if slug already exists
        $text = $this->checkSlugInDb($text);
        
        return $text;
    }
    
    
    private function checkSlugInDb($text)
    {
        
        try{
            
            $query = sprintf("SELECT `slug` FROM %s WHERE `slug`=:slug", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->execute();
            
            $res = $stmt->fetch();
            
            if(!empty($res)){
                
                //New name 
                $newText.= $text.'-'.time();
                $text = $this->checkSlugInDb($newText);
            }
            
            return $text;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function createNode($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title_sr`=:titleSr, `title_en`=:titleEn, 
                                                 `content_sr`=:contentSr, `content_en`=:contentEn, 
                                                 `position`=:position, `type`=:type, `slug`=:slug", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);
            
            $position = time();
            $type = 'clients';
            $slug = $this->generateSlug($params['title_sr']);
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':position', $position, PDO::PARAM_INT);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->execute();

            $id = $this->dbh->lastInsertId();
            
            $this->recreateNodeTree($params['parent'], $id);
            
            return $id;
        }catch(Exception $e){
            
            return false;
        }
        
    }
    
    
    
    
    public function updateNode($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET `title_sr`=:titleSr, `title_en`=:titleEn, 
                                            `content_sr`=:contentSr, `content_en`=:contentEn, `slug`=:slug WHERE `id`=:id", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);
            
            $slug = $this->generateSlug($params['title_sr']);
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            //Re-create node tree
            $this->recreateNodeTree($params['parent'], $params['id']);
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    private function recreateNodeTree($parentId, $id, $type = 'clients')
    {
        try{
        
            $navigationPath = array();
            if (!empty($parentId)) {
                $navigationPath = $this->getParentNodeArray($parentId);
            }

            $query = sprintf("DELETE FROM %s WHERE `descendant`=:descendant", $this->tableNavigationTree);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':descendant', $id, PDO::PARAM_INT);
            $stmt->execute();

            $query = sprintf("INSERT INTO %s SET `ancestor`=:ancestor, `descendant`=:descendant, 
                                                 `path_length`=:pathLength, `type`=:type", $this->tableNavigationTree);
            $stmt = $this->dbh->prepare($query);


            $pl = 0;
            $stmt->bindParam(':ancestor', $id, PDO::PARAM_INT);
            $stmt->bindParam(':descendant', $id, PDO::PARAM_INT);
            $stmt->bindParam(':pathLength', $pl, PDO::PARAM_INT);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();

            $pl = count($navigationPath);
            foreach ($navigationPath as $pathItem) {
                if (null == $pathItem['id']) {
                    $pathItem['id'] = 0;
                }
                $stmt->bindValue(':ancestor', $pathItem['id']);
                $stmt->bindParam(':descendant', $id, PDO::PARAM_INT);
                $stmt->bindValue(':pathLength', $pl);
                $stmt->bindParam(':type', $type, PDO::PARAM_STR);
                $stmt->execute();

                $pl--;
            }

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    private function getParentNodeArray($id)
    {
        
        $query = sprintf("SELECT `n`.`id`, `n`.`title_sr`
                            FROM %s AS `n` 
                            JOIN %s AS `nt` ON `nt`.`ancestor`=`n`.`id`
                            WHERE `nt`.`descendant`=:id ORDER BY `n`.`position`", $this->tableNavigation, $this->tableNavigationTree);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
        
    }
    
    
    public function getTree()
    {
        
        $query = sprintf("SELECT `n`.`id`, `n`.`title_sr`, `n`.`type`, `n`.`created`,
                                COUNT(`nt`.`ancestor`)-1 AS `path_length`,
                                (SELECT GROUP_CONCAT(`n2`.`title_sr` ORDER BY `nt3`.`path_length` DESC SEPARATOR ' > ') 
                                    FROM `navigation` AS `n2` 
                                    INNER JOIN `navigation_tree` AS `nt3` ON `n2`.`id`=`nt3`.`ancestor` 
                                    WHERE `nt3`.`descendant`=`n`.`id`) AS `breadcrumb`
                                FROM %s AS `nt`
                                STRAIGHT_JOIN %s AS `n` ON (`n`.`id`=`nt`.`descendant`)
                                WHERE `n`.`type`='clients'
                                GROUP BY `n`.`id`", $this->tableNavigationTree, $this->tableNavigation);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    
    public function getFinalTree()
    {
        
        $query = sprintf("SELECT `n`.`id`, `n`.`title_sr`, `n`.`type`, `n`.`created`,
                                COUNT(`nt`.`ancestor`)-1 AS `path_length`,
                                (SELECT GROUP_CONCAT(`n2`.`title_sr` ORDER BY `nt3`.`path_length` DESC SEPARATOR ' > ') 
                                    FROM `navigation` AS `n2` 
                                    INNER JOIN `navigation_tree` AS `nt3` ON `n2`.`id`=`nt3`.`ancestor` 
                                    WHERE `nt3`.`descendant`=`n`.`id`) AS `breadcrumb`
                                FROM %s AS `nt`
                                STRAIGHT_JOIN %s AS `n` ON (`n`.`id`=`nt`.`descendant`)
                                WHERE `nt`.`path_length`=2 AND `n`.`type`='clients'
                                GROUP BY `n`.`id`", $this->tableNavigationTree, $this->tableNavigation);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    
    
    public function deleteNode($params)
    {
        
        try{
            $query = sprintf("DELETE FROM %s WHERE `descendant`=:descendant", $this->tableNavigationTree);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':descendant', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            
            
            
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    private function convertDate($date)
    {
        $oldDate = explode('-', $date);
        
        return $oldDate[2].'-'.$oldDate[1].'-'.$oldDate[0];
    }
}
