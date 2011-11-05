<?php

class CmsInfoModel extends Model
{
    private $tableInfo= 'info';
    private $tableNavigation = 'navigation';
    private $tableNavigationTree = 'navigation_tree';
    
    public function findAllInfo()
    {
        try{
            $query = sprintf("SELECT * FROM %s", $this->tableInfo);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function findInfo($id)
    {
        try{
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableInfo);
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
            $output = array();
            
            $query = sprintf("SELECT `n`.*FROM %s AS `n` WHERE `n`.`id`=:id", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $output = $stmt->fetch();
            
            $query = sprintf("SELECT `nt`.`ancestor` AS `parent` FROM %s AS `n`
                                INNER JOIN %s AS `nt` ON `nt`.`descendant`=`n`.`id`
                                WHERE `n`.`id`=:id AND `nt`.`path_length`='1'", $this->tableNavigation, $this->tableNavigationTree);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $res =  $stmt->fetch();
            $output['parent'] = $res['parent'];
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function createInfo($params)
    {
        
        try{
            
            $query = sprintf("INSERT INTO %s SET `title_sr`=:titleSr, `title_en`=:titleEn, 
                                                 `content_sr`=:contentSr, `content_en`=:contentEn, 
                                                 `navigation_id`=:navigationId", $this->tableInfo);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':navigationId', $params['navigation'], PDO::PARAM_INT);
            $stmt->execute();
            
            $id = $this->dbh->lastInsertId();
            
            return $id;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function updateInfo($params)
    {
        
        try{
            $query = sprintf("UPDATE %s SET  `title_sr`=:titleSr, `title_en`=:titleEn, 
                                             `content_sr`=:contentSr, `content_en`=:contentEn, 
                                             `navigation_id`=:navigationId WHERE `id`=:id", $this->tableInfo);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':navigationId', $params['navigation'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    
    
    public function deleteInfo($params)
    {
        
        try{
            
            $query = sprintf("DELETE FROM %s  WHERE `id`=:id", $this->tableInfo);
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
            $query = sprintf("UPDATE %s SET `image_name`=:imageName WHERE `id`=:id", $this->tableInfo);
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
            $query = sprintf("SELECT `image_name` FROM %s WHERE `id`=:id", $this->tableInfo);
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
            
            $stmt->bindParam(':slug', $text, PDO::PARAM_STR);
            $stmt->execute();
            
            $res = $stmt->fetch();
            
            if(!empty($res)){
                
                //New name 
                $newText = '';
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
                                                 `position`=:position, `type`=:type, `slug`=:slug, `is_root`=:isRoot", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);
            
            $position = time();
            $type = 'info';
            $isRoot = $params['parent']==0 ? 1 : 0;
            $slug = $this->generateSlug($params['title_sr']);
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':position', $position, PDO::PARAM_INT);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->bindParam(':isRoot', $isRoot, PDO::PARAM_INT);
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
                                            `content_sr`=:contentSr, `content_en`=:contentEn, `slug`=:slug, `is_root`=:isRoot
                                            WHERE `id`=:id", $this->tableNavigation);
            $stmt = $this->dbh->prepare($query);
            
            $isRoot = $params['parent']==0 ? 1 : 0;
            $slug = $this->generateSlug($params['title_sr']);
            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':contentSr', $params['content_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':contentEn', $params['content_en'], PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->bindParam(':isRoot', $isRoot, PDO::PARAM_INT);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            //Re-create node tree
            $this->recreateNodeTree($params['parent'], $params['id']);
            
            return true;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    private function recreateNodeTree($parentId, $id, $type = 'info')
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
                                WHERE `n`.`type`='info'
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
}