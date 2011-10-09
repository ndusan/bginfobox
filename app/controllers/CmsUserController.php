<?php

class CmsUserController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('userCollection', $this->db->findAllUsers());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->createUser($params['user'])){
                parent::redirect ('cms'.DS.'users', 'success');
            }else{
                parent::redirect ('cms'.DS.'users'.DS.'add', 'error');
            }
        }
        
        parent::set('params', $params);
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->updateUser($params['user'])){
                parent::redirect ('cms'.DS.'users', 'success');
            }else{
                parent::redirect ('cms'.DS.'users'.DS.'edit'.$params['id'], 'error');
            }
        }
        
        parent::set('params', $params);
        parent::set('user', $this->db->findUser($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        if($this->db->deleteUser($params)){
            parent::redirect ('cms'.DS.'users', 'success');
        }else{
            parent::redirect ('cms'.DS.'users', 'error');
        }
    }
    
}
