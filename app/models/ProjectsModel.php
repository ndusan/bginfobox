<?php

class ProjectsModel extends Model 
{
    private $tableProjects = 'projects';
    private $tableProjectEdition = 'project_edition';
    
    public function getProject($id)
    {
        try {
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            
            return false;
        }
    }
    
    public function getEditions($projectId, $limit=1, $cid=null)
    {
        try {
            
            if (null != $cid) {
                $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableProjectEdition);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':id', $cid, PDO::PARAM_INT);
                $stmt->execute();
            } else {
                $query = sprintf("SELECT * FROM %s WHERE `project_id`=:projectId ORDER BY `id` DESC LIMIT 0, %s", $this->tableProjectEdition, $limit);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            
            return false;
        }
        
    }
    
    public function getProjects($id)
    {
        try {
            $output = array();
            
            $query = sprintf("SELECT * FROM %s WHERE `id`=:id", $this->tableProjects);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetch();
            
            $query = sprintf("SELECT * FROM %s WHERE `project_id`=:projectId GROUP BY `main_image`", $this->tableProjectEdition);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':projectId', $results['id'], PDO::PARAM_INT);
            $stmt->execute();

            $results['editions'] = $stmt->fetchAll();

            return $results;
        } catch (\PDOException $e) {
            
            return false;
        }
    }
}