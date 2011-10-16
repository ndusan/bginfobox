<?php

class CmsBginfoController extends Controller
{
    
    public function indexAction($params)
    {
        
        
        parent::set('tabs', $this->db->getStaticPages());
    }
    
    
    public function editStaticAction($params)
    {
        
        if(!empty($params['submit'])){
            
            if($id = $this->db->updateBginfo($params['static'])){
                
                
                parent::redirect ('cms'.DS.'bginfo', 'success');
            }else{
                parent::redirect ('cms'.DS.'bginfo'.DS.'edit'.DS.$params['page_id'].DS.'static', 'error');
            }
        }
        
        parent::set('currentStatic', $this->db->getCurrentStatic($params['page_id']));
        parent::set('static', $this->db->getBginfo($params['page_id']));
        parent::set('tabs', $this->db->getStaticPages());
    }
    
    
    public function addEditionAction($params)
    {
        
        
        parent::set('settings', $this->db->getStaticPageSettings($params['page_id']));
    }
    
    
    public function editEditionAction($params)
    {
        
        
        parent::set('settings', $this->db->getStaticPageSettings($params['page_id']));
    }
    
    
}