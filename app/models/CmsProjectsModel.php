<?php

class CmsProjectsModel extends Model
{
 
    private $tableProjects = 'projects';
    
    
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
    
    
    public function setProjectImage($id, $imageName, $field) 
    {
        try {
            $query = sprintf("UPDATE %s SET `%s`=:imageName WHERE `id`=:id",
                                $this->tableProjects, $field);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function getImages($id) 
    {
        try {
            $query = sprintf("SELECT `main_image`, `top_image`, `bottom_image` FROM %s WHERE `id`=:id",
                                $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
}