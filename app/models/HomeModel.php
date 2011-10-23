<?php

class HomeModel extends Model
{
    private $tblNews = 'news';
    private $tblEvents = 'events';
    private $tblBanners = 'banners';
    private $tblGallery = 'gallery';
    private $tblCarousel = 'carousel';
    private $tblConfig = 'config';
    private $tblClients = 'clients';
    private $tblPages = 'pages';
    private $tblClientPages = 'client_pages';
    private $tblPageEditionImages = 'page_edition_images';
    private $tblPagePocketEditionImages = 'page_pocket_edition_images';
    private $tblPagesPocketContent = 'page_pocket_content';
    private $tblPageContent = 'page_content';
    private $tblPagePocketInfo = 'page_pocket_info';

    
    
    public function getFreshNews($params)
    {
        try{
            $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC LIMIT 0, 2', $this->tblNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getAllNews($date=null)
    {
        try{
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
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getNews($id)
    {
        try{
            $query = sprintf('SELECT * FROM %s WHERE `id`=:id', $this->tblNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllNewsPerMonth()
    {
        
        try{
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
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getEventsByTime($year, $month)
    {
        
        try{
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
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getCalendarByStartDate($startDate=null)
    {
        try{
            if(null == $startDate) return false;

            $query = sprintf('SELECT * FROM %s WHERE `date_start`=:startDate ORDER BY `id` DESC', $this->tblEvents);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getCalendar($id)
    {
        try{
            $query = sprintf('SELECT * FROM %s WHERE `id`=:id', $this->tblEvents);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getAllBanners()
    {
        try{
            $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblBanners);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllGallery()
    {
        
        try{
            $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblGallery);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllCarousel()
    {
        
        try{
            $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC', $this->tblCarousel);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    public function getActiveLanguages()
    {
        
        try{
            $output = array();
           
            foreach(array('lang_sr'=>'sr', 'lang_en'=>'en') as $key=>$val){
                $query = sprintf('SELECT * FROM %s WHERE `key`=:key', $this->tblConfig);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':key', $key);
                $stmt->execute();

                $output[$key] = $stmt->fetch();
            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getAllClients()
    {
        
        try{
           
            $query = sprintf("SELECT `a`.*, GROUP_CONCAT(`b`.`page_id`) AS `page_id` FROM %s AS `a` LEFT JOIN %s AS `b` ON `b`.`client_id`=`a`.`id`
                                WHERE `a`.`type_client`='1' GROUP BY `a`.`id`", $this->tblClients, $this->tblClientPages);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllStaticPages()
    {
        
        try{
           
            $query = sprintf('SELECT * FROM %s WHERE `type`=:type', $this->tblPages);
            $stmt = $this->dbh->prepare($query);

            $type = 'static';
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function getAllDynamicPages()
    {
        
        try{
           
            $query = sprintf('SELECT * FROM %s WHERE `type`=:type', $this->tblPages);
            $stmt = $this->dbh->prepare($query);

            $type = 'dynamic';
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getLattestStaticEditions()
    {
        
        $staticPages = $this->getAllStaticPages();
        if(empty($staticPages)) return false;
        
        $output = array();
        
        foreach ($staticPages as $s){
            if($s['id']==4) break;
            $query = sprintf("SELECT `a`.`title`, `b`.* FROM %s AS `a`
                                INNER JOIN %s AS `b` ON `b`.`page_id`=`a`.`id`
                                WHERE `a`.`id`=:id AND `b`.`position`='0' 
                                ORDER BY `b`.`created` DESC LIMIT 0,1", $this->tblPages, $this->tblPageEditionImages);
            
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $s['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch();
            if(!empty($result)) $output[] = $result;
        }
        
        return $output;
    }
    
    
    public function getLattestDynamicEditions()
    {
        
        $dynamicPages = $this->getAllDynamicPages();
        if(empty($dynamicPages)) return false;
        
        $output = array();
        
        foreach ($dynamicPages as $d){
            
            $query = sprintf("SELECT `a`.`title`, `b`.* FROM %s AS `a`
                                INNER JOIN %s AS `b` ON `b`.`page_id`=`a`.`id`
                                WHERE `a`.`id`=:id AND `b`.`position`='0' 
                                ORDER BY `b`.`created` DESC LIMIT 0, 1", $this->tblPages, $this->tblPagePocketEditionImages); 
                
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':id', $d['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch();
            if(!empty($result)) $output[] = $result;
        }
        
        return $output;
    }
    
    
    
    public function getPocketContent()
    {
        
        try{
           
            $query = sprintf('SELECT * FROM %s', $this->tblPagesPocketContent);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function bginfoBoxGallery($pageId)
    {
        
        try{
           
            $query = sprintf('SELECT * FROM %s WHERE `page_id`=:pageId ORDER BY `created` DESC', $this->tblPageEditionImages);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    
    public function bginfoGallery($pageId, $pageEditionId=null)
    {
        
        try{
           
            if(null == $pageEditionId){
                $query = sprintf('SELECT * FROM %s WHERE `page_id`=:pageId ORDER BY `created` DESC LIMIT 0,3', $this->tblPageEditionImages);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
                
            }else{
                
                $query = sprintf('SELECT * FROM %s WHERE `page_id`=:pageId AND `page_edition_id`=:pageEditionId', $this->tblPageEditionImages);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
                $stmt->bindParam(':pageEditionId', $pageEditionId, PDO::PARAM_INT);
            }
            
                $stmt->execute();

                return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function bginfoArchiveGallery($pageId, $numOfEdition=5)
    {
        
        try{
           
            $query = sprintf('SELECT * FROM %s WHERE `page_id`=:pageId AND `position`=0 ORDER BY `created` DESC LIMIT 1,:numOfEdition', $this->tblPageEditionImages);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
            $stmt->bindParam(':numOfEdition', $numOfEdition, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getAllArchive()
    {
        $output = array();
        
        try{
            //Static
            $staticCollection = $this->getAllStaticPages();
            if(!empty($staticCollection)){

                foreach($staticCollection as $sc){
                    if($sc['id'] ==1) continue;

                    $query = sprintf("SELECT * FROM %s WHERE `page_id`=:pageId AND `position`=0 ORDER BY `created` DESC LIMIT 0,3", $this->tblPageEditionImages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':pageId', $sc['id'], PDO::PARAM_INT);
                    $stmt->execute();

                    $results = $stmt->fetchAll();
                    if(!empty($results)){
                        $sc['edition_images'] = $results;
                        $output[] = $sc;
                    }
                }
            }


            //Dynamic
            $dynamicCollection = $this->getAllDynamicPages();
            if(!empty($dynamicCollection)){

                foreach($dynamicCollection as $dc){

                    $query = sprintf("SELECT * FROM %s WHERE `page_id`=:pageId AND `position`=0 ORDER BY `created` DESC LIMIT 0,3", $this->tblPagePocketEditionImages);
                    $stmt = $this->dbh->prepare($query);

                    $stmt->bindParam(':pageId', $dc['id'], PDO::PARAM_INT);
                    $stmt->execute();

                    $results = $stmt->fetchAll();
                    if(!empty($results)){
                        $dc['edition_images'] = $results;
                        $output[] = $dc;
                    }
                }
            }

            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getArchiveById($pageId=null)
    {
        try{
            $output = array();
            
            if(null == $pageId){
                //Pockets
                $query = sprintf("SELECT * FROM %s WHERE `page_id`>4", $this->tblPagePocketEditionImages);
                $stmt = $this->dbh->prepare($query);

                $stmt->execute();

                $results = $stmt->fetchAll();
                if($results){
                    foreach($results as $r){
                        $output[$r['page_edition_id']][] = $r;
                    }
                }

            }else{
                //Rest
                $query = sprintf("SELECT * FROM %s WHERE `page_id`=:pageId", $this->tblPageEditionImages);
                $stmt = $this->dbh->prepare($query);

                $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
                $stmt->execute();

                $results = $stmt->fetchAll();
                if($results){
                    foreach($results as $r){
                        $output[$r['page_edition_id']][] = $r;
                    }
                }

            }
            
            return $output;
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getBginfo($pageId){
        
        try{
           
            $query = sprintf('SELECT * FROM %s WHERE `page_id`=:pageId', $this->tblPageContent);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    
    public function getPocketsInfo()
    {
        try{
           
            $query = sprintf('SELECT * FROM %s ORDER BY `created`', $this->tblPagePocketInfo);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            
            return false;
        }
        
    }
    
    
    
    public function getTreeGuide()
    {
        
        
    }
    
}