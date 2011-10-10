<?php

class HomeModel extends Model
{
    private $tblNews = 'news';

    public function getDynamicPageSettings($params)
    {
        
        return null;
    }
    
    
    public function getFreshNews($params)
    {
        
        $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC LIMIT 0, 2', $this->tblNews);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public function getAllNews()
    {
        
        $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblNews);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    
    public function getNews($id)
    {
        
        $query = sprintf('SELECT * FROM %s WHERE `id`=:id', $this->tblNews);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }
    
}