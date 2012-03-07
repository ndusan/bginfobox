<?php
/**
 * Model
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Model
{
        
        protected $dbh;
        
        /**
         * Contructor
         * @return boolean
         */
        function __construct()
        {
            try {
                $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF-8", DB_USER, DB_PASS);
            }catch(PDOException $e){
               // echo $e->getMessage();
            }
        }
    
        /**
         * Password generator
         * @param int $len
         * @return string
         */
        function passwordGenerator($len = 6)
        {
                $r = '';
                for($i=0; $i<$len; $i++){
                    $r .= chr(rand(0, 25) + ord('a'));
                }
                
                return $r;
        }
        
        
        public function postition($params, $tableName)
        {

            $query = sprintf("SELECT `position` FROM %s WHERE `id`=:id", $tableName);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();

            $old = $stmt->fetch();
            if(empty($old)) return false;
            
            switch($params['position']){
                
                case 'up':
                    
                    
                    $query = sprintf("SELECT `id`, `position` FROM %s WHERE `position`>:position", $tableName);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':position', $old['position'], PDO::PARAM_INT);
                    $stmt->execute();
                    
                    $row = $stmt->fetch();
                    if(empty($row)) return false;
                    
                    break;
                case 'down':
                    $query = sprintf("SELECT `id`, `position` FROM %s WHERE `position`<:position", $tableName);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':position', $old['position'], PDO::PARAM_INT);
                    $stmt->execute();
                    
                    $row = $stmt->fetch();echo $row;
                    if(empty($row)) return false;
                    
                    break;
                default: return false; //error
            }
            
            //Switch
            $query = sprintf("UPDATE %s SET `position`=:position WHERE `id`=:id", $tableName, $tableName);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':position', $old['position'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $row['id'], PDO::PARAM_INT);
            $stmt->execute();

            $query = sprintf("UPDATE %s SET `position`=:position WHERE `id`=:id", $tableName);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':position', $row['position'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            $stmt->execute();
            
            return true;
        }
        
        
        
        
        
        
    /*** FRONT ***/
    private $tblNews = 'news';
    private $tblBanners = 'banners';
    private $tblCarousel = 'carousel';
    private $tblConfig = 'config';
    private $tblEvents = 'events';
    private $tblPages = 'pages';
    private $tblNavigation = 'navigation';
        
        
    public function getLattestNews($limit=2)
    {
        try{
            $query = sprintf('SELECT * FROM %s ORDER BY `id` DESC LIMIT 0, '.$limit, $this->tblNews);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(\PDOException $e){
            
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
        }catch(\PDOException $e){
            
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
        }catch(\PDOException $e){
            
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
        }catch(\PDOException $e){
            
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
        }catch(\PDOException $e){
            
            return false;
        }
    }

    
    public function getFooter()
    {
        $output = array();
        try{
            
            $query = sprintf("SELECT * FROM %s ORDER BY `position`", $this->tblPages);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            
            $res = $stmt->fetchAll();
            if(!empty($res)){
                $output['editions'] = $res;
            }
            
            $query = sprintf("SELECT * FROM %s WHERE `is_root`='1' AND `type`='clients'", $this->tblNavigation);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            
            $res = $stmt->fetchAll();
            if(!empty($res)){
                $output['clients'] = $res;
            }
            
            $query = sprintf("SELECT * FROM %s WHERE `is_root`='1' AND `type`='info'", $this->tblNavigation);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();
            
            $res = $stmt->fetchAll();
            if(!empty($res)){
                $output['info'] = $res;
            }
            
            return $output;
        }catch(\PDOException $e){
            
            return false;
        }
    }
}