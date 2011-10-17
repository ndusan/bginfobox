<?php

class CmsPocketsController extends Controller
{
    
    public function indexAction($params)
    {
        
        
        parent::set('tabs', $this->db->getDynamicPages());
        
    }
    
    
    public function editStaticAction($params)
    {
        if(!empty($params['submit'])){
            
            if($this->db->updatePockets($params['static'])){
                
                
                parent::redirect ('cms'.DS.'pockets', 'success');
            }else{
                parent::redirect ('cms'.DS.'pockets'.DS.'edit'.DS.'static', 'error');
            }
        }
        
        parent::set('static', $this->db->getPockets());
    }


    public function addCityAction($params)
    {
        if(!empty($params['submit'])){
            
            if($this->db->addCity($params['city'])){
                
                
                parent::redirect ('cms'.DS.'pockets', 'success');
            }else{
                parent::redirect ('cms'.DS.'pockets'.DS.'add'.DS.'city', 'error');
            }
        }
        
    }
    
    public function editCityAction($params)
    {
        if(!empty($params['submit'])){
            
            if($this->db->updateCity($params['city'])){
                
                
                parent::redirect ('cms'.DS.'pockets', 'success');
            }else{
                parent::redirect ('cms'.DS.'pockets'.DS.'edit'.DS.$params['id'].DS.'city', 'error');
            }
        }
        
        parent::set('city', $this->db->getCity($params['id']));
    }
    
    
    public function deleteCityAction($params)
    {
        
        if($this->db->deleteCity($params['id'])){

            parent::redirect ('cms'.DS.'pockets', 'success');
        }else{
            parent::redirect ('cms'.DS.'pockets', 'error');
        }
    }
    
    
    public function addEditionAction($params)
    {
        
        parent::set('settings', $this->db->getDymamicPageSettings($params['page_id']));
    }
    
    public function editEditionAction($params)
    {
        
        parent::set('settings', $this->db->getDymamicPageSettings($params['page_id']));
    }
    
    
    
}