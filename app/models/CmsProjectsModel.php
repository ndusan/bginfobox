<?php

class CmsProjectsModel extends Model
{
 
    private $tableProjects = 'projects';
    private $tableProjectEdition = 'project_edition';
    
    
    public function getAllProjects()
    {
        try {
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC", 
                            $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function getProject($id)
    {
        try {
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", 
                            $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function addProject($params)
    {
        try {
            $query = sprintf("INSERT INTO %s SET `title_sr`=:titleSr, `desc_sr`=:descSr,
                                                 `title_en`=:titleEn, `desc_en`=:descEn", 
                            $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':descSr', $params['desc_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':descEn', $params['desc_en'], PDO::PARAM_STR);
            $stmt->execute();

            return $this->dbh->lastInsertId();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function editProject($params)
    {
        try {
            $query = sprintf("UPDATE %s SET `title_sr`=:titleSr, `desc_sr`=:descSr,
                                            `title_en`=:titleEn, `desc_en`=:descEn
                                            WHERE `id`=:id", 
                            $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':titleSr', $params['title_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':titleEn', $params['title_en'], PDO::PARAM_STR);
            $stmt->bindParam(':descSr', $params['desc_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':descEn', $params['desc_en'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function deleteProject($id)
    {
        try {
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", 
                            $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    
    public function setProjectImage($id, $imageName, $field) 
    {
        try {
            $query = sprintf("UPDATE %s SET `%s`=:imageName WHERE `id`=:id",
                                $this->tableProjectEdition, $field);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function getImagesAndFiles($id) 
    {
        try {
            $query = sprintf("SELECT `main_image`, `top_image`, `bottom_image`,
                                     `main_file`, `top_file`, `bottom_file`
                                     FROM %s WHERE `id`=:id",
                                $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    
    public function addEdition($params)
    {
        try {
            $query = sprintf("INSERT INTO %s SET  `desc_sr`=:descSr, `desc_en`=:descEn, `project_id`=:projectId", 
                            $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':descSr', $params['desc_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':descEn', $params['desc_en'], PDO::PARAM_STR);
            $stmt->bindParam(':projectId', $params['project_id'], PDO::PARAM_INT);
            $stmt->execute();

            return $this->dbh->lastInsertId();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    
    public function editEdition($params)
    {
        try {
            $query = sprintf("UPDATE %s SET `desc_sr`=:descSr, `desc_en`=:descEn
                                            WHERE `id`=:id", 
                            $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':descSr', $params['desc_sr'], PDO::PARAM_STR);
            $stmt->bindParam(':descEn', $params['desc_en'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    
    public function getEdition($id)
    {
        try {
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", 
                            $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    
    public function deleteEdition($id)
    {
        try {
            $query = sprintf("DELETE FROM %s WHERE `id`=:id", 
                            $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function getAllProjectEditions()
    {
        try {
            $query = sprintf("SELECT * FROM %s ORDER BY `id` DESC", 
                            $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            $results = $stmt->fetchAll();
            $output = array();
            if (!empty($results)) {
                foreach ($results as $r) {
                    $output[$r['project_id']][] = $r;
                }
            }
            
            return $output;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    
    public function getProjectEditions($id)
    {
        try {
            $query = sprintf("SELECT * FROM %s WHERE `project_id`=:id ORDER BY `id` DESC", 
                            $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
}