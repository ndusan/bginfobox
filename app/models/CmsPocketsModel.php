<?php

class CmsPocketsModel extends Model
{
    
    private $tablePages = 'pages';
    
    public function getDynamicPages()
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `type`='dynamic'", $this->tablePages);
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
            
        }catch(Exception $e){
            
            return false;
        }
    }
}