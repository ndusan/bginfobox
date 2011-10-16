<?php

class CmsHomeModel extends Model
{
    private $tableHome = 'home';
    private $tableConfig = 'config';
    
    protected $langArray = array('sr', 'en');
    
    
    public function updateLanguages($params)
    {

        foreach($this->langArray as $l){
            
            $this->deleteConfigByKey('lang_'.$l);
        }
        
        foreach($params as $key=>$val){
            
            $this->setConfig($key, $val);
        }
        
        return true;
    }
    
    public function findLanguages()
    {
       
        return $this->langArray;
    }
    
    
    public function getConfigByKey($key=null)
    {
        
        try{
            
            $query = sprintf("SELECT * FROM %s WHERE `key`=:key", $this->tableConfig);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':key', $key, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
    
    
    public function setConfig($key, $value)
    {
        
        try{

            $query = sprintf("INSERT INTO %s SET `key`=:key, `value`=:value", $this->tableConfig);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':key', $key, PDO::PARAM_STR);
            $stmt->bindParam(':value', $value, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        }catch(Exception $e){

            return false;
        }
        
    }
    
    public function deleteConfigByKey($key=null)
    {
        
        if(!$this->getConfigByKey($key)){
            
            return false;
        }
        
        try{

            $query = sprintf("DELETE FROM %s WHERE `key`=:key", $this->tableConfig);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':key', $key, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        }catch(Exception $e){

            return false;
        }
        
    }
}