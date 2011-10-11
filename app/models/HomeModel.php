<?php

class HomeModel extends Model
{
    private $tblNews = 'news';
    private $tblEvents = 'events';
    private $tblBanners = 'banners';
    private $tblGallery = 'gallery';
    private $tblCarousel = 'carousel';

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
    
    public function getAllNews($date=null)
    {
        
        if(null == $date){
            $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblNews);
            $stmt = $this->dbh->prepare($query);
        }else{
            $query = sprintf('SELECT * FROM %s WHERE `created` BETWEEN :start AND :end ORDER BY `id` DESC', $this->tblNews);
            $stmt = $this->dbh->prepare($query);
            
            $start = $date.'-01 00:00:00';
            $end = $date.'-31 23:59:59';
            
            $stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $stmt->bindParam(':end', $end, PDO::PARAM_INT);
        }
        
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
    
    
    public function getAllNewsPerMonth()
    {
        $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblNews);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();

        $results = $stmt->fetchAll();
        $output = array(); 
        
        if(!empty($results)){
            foreach($results as $r){
                $all = explode(' ', $r['created']);
                $array = explode('-', $all[0]);
                $output[$array[0].'-'.$array[1]] = array('month'=>$array[1], 'year'=>$array[0]); 
            }
        }
        
        return $output;
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
                $startDate = explode('-', $r['date_start']);
                $output[$startDate[2]][] = $r; 
            }
        }
        
        return $output;
    }
    
    
    public function getCalendarByStartDate($startDate=null)
    {
        
        if(null == $startDate) return false;
        
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
    
    
    
    public function getAllBanners()
    {
        
        $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblBanners);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    
    public function getAllGallery()
    {
        
        $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblGallery);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    
    public function getAllCarousel()
    {
        
        $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblCarousel);
        $stmt = $this->dbh->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
}