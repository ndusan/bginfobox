<?php

class CmsNavigationController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('navigationCollection', $this->db->findAllNavigation());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->createNavigation($params['navigation'])){

                parent::redirect ('cms'.DS.'navigation', 'success');
            }else{
                parent::redirect ('cms'.DS.'navigation'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateNavigation($params['navigation'])){
                //If image uploaded add it
                
                parent::redirect ('cms'.DS.'navigation', 'success');
            }else{
                parent::redirect ('cms'.DS.'navigation'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        parent::set('navigation', $this->db->findNavigation($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        if($this->db->deleteNavigation($params)){
            
            parent::redirect ('cms'.DS.'navigation', 'success');
        }else{
            parent::redirect ('cms'.DS.'navigation', 'error');
        }
    }
    
}