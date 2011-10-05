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

}