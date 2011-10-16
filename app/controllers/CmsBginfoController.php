<?php

class CmsBginfoController extends Controller
{
    
    public function indexAction($params)
    {
        
        
        parent::set('tabs', $this->db->getStaticPages());
    }
    
    
    public function editStaticAction($params)
    {
        
        
        parent::set('tabs', $this->db->getStaticPages());
    }
    
    
    public function addEditionAction($params)
    {
        
        
        parent::set('total', $this->db->getNumOfImages($params['page_id']));
    }
    
    
    public function editEditionAction($params)
    {
        
        
        parent::set('total', $this->db->getNumOfImages($params['page_id']));
    }
    
}