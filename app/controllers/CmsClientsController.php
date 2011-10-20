<?php

class CmsClientsController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('clientCollection', $this->db->findAllClients());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->createClient($params['client'])){
                
                parent::redirect ('cms'.DS.'clients', 'success');
            }else{
                parent::redirect ('cms'.DS.'clients'.DS.'add', 'error');
            }
        }
        
        parent::set('staticCollection', $this->db->getAllStatic());
        parent::set('dynamicCollection', $this->db->getAllDynamic());
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateClient($params['client'])){
                
                parent::redirect ('cms'.DS.'clients', 'success');
            }else{
                parent::redirect ('cms'.DS.'clients'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        
        parent::set('staticCollection', $this->db->getAllStatic());
        parent::set('dynamicCollection', $this->db->getAllDynamic());
        
        parent::set('client', $this->db->findClient($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        if($this->db->deleteClient($params)){
            
            parent::redirect ('cms'.DS.'clients', 'success');
        }else{
            parent::redirect ('cms'.DS.'clients', 'error');
        }
    }
    
}