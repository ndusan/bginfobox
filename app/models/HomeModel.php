<?php

class HomeModel extends Model
{
    private $tblNews = 'news';
    private $tblEvents = 'events';

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
    
    public function getEventsByTime($year, $month)
    {
        
        $query = sprintf('SELECT * FROM %s WHERE `date_start` BETWEEN :start AND :end', $this->tblEvents);
        $stmt = $this->dbh->prepare($query);
        
        $start = $year.'-'.$month.'-01';
        $end = $year.'-'.$month.'-31';
        
        $stmt->bindParam(':start', $start, PDO::PARAM_STR);
        $stmt->bindParam(':end', $end, PDO::PARAM_STR);
        $stmt->execute();

        $results = $stmt->fetchAll();
        $output = array();
        
        if(!empty($results)){
            foreach($results as $r){
                $array = explode('-', $r['date_start']);
                $output[$array[2]][] = $r; 
            }
        }
        
        return $output;
    }
    
    
    public function getCalendarByStartDate($startDate)
    {
        
        $query = sprintf('SELECT * FROM %s WHERE `date_start`=:startDate ORDER BY `id` DESC', $this->tblEvents);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    
    public function getCalendar($id)
    {
        
        $query = sprintf('SELECT * FROM %s WHERE `id`=:id', $this->tblEvents);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }
    
}