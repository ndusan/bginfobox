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
            if($id = $this->db->createClient($params['client'])){
                
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'clients');
                }
                
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
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['client']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['client']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['client']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'clients');
                }
                
                parent::redirect ('cms'.DS.'clients', 'success');
            }else{
                parent::redirect ('cms'.DS.'clients'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        
        parent::set('staticCollection', $this->db->getAllStatic($params['id']));
        parent::set('dynamicCollection', $this->db->getAllDynamic($params['id']));
        
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
    
    
    
    public function deleteImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'clients');
        }
        parent::redirect ('cms'.DS.'clients'.DS.$params['id'].DS.'edit', 'success');
    }
    
    
    
    public function addNodeAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createNode($params['node'])){
                
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = 'node-'.$id.'-'.$params['image']['name'];
                    $this->db->setNodeImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'clients');
                }
                
                parent::redirect ('cms'.DS.'clients', 'success');
            }else{
                parent::redirect ('cms'.DS.'clients', 'error');
            }
        }
        parent::set('tree', $this->db->getTree());
    }
    
    public function editNodeAction($params)
    {
        
        
        if(!empty($params['submit'])){

            
            
        }
    }
    
    public function deleteNodeAction($params)
    {
        
        
    }
}