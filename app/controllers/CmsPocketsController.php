<?php

class CmsPocketsController extends Controller
{
    
    public function indexAction($params)
    {
        
        
        parent::set('tabs', $this->db->getDynamicPages());
    }
    
    
}