<?php

class CmsClientsController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('clientCollection', $this->db->findAllClients());
        parent::set('nodeCollection', $this->db->getTree());
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
                    //Create thumb
                    $this->createThumbImage($newImageName, 'clients', 70, 70);
                }
                
                //If image uploaded add it
                if(0 == $params['image2']['error'] && !empty($id)){
                    
                    $newImageName2 = $id.'-paid-'.$params['image2']['name'];
                    $this->db->setPaidImageName($id, $newImageName2);
                    $this->uploadImage($newImageName2, $params['image2'], 'clients');
                    //Create thumb
                    $this->createThumbImage($newImageName2, 'clients', 150, 150);
                }
                
                parent::redirect ('cms'.DS.'clients', 'success', '#fragment-2');
            }else{
                parent::redirect ('cms'.DS.'clients'.DS.'add', 'error', '#fragment-2');
            }
        }
        
        parent::set('tree', $this->db->getFinalTree());
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
                    
                    //Delete thumb
                    $oldThumbImageName = 'thumb-'.$oldImageName;
                    $this->deleteImage($oldThumbImageName, 'clients');
                    //Create thumb
                    $this->createThumbImage($newImageName, 'clients', 70, 70);
                }
                
                
                if(0 == $params['image2']['error']){
                    
                    $data = $this->db->getPaidImageName($params['client']['id']);
                    $oldImageName = $data['paid_image_name'];
                    
                    $newImageName = $params['client']['id'].'-paid-'.$params['image2']['name'];
                    $this->db->setPaidImageName($params['client']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image2'], 'clients');
                    
                    //Delete thumb
                    $oldThumbImageName = 'thumb-'.$oldImageName;
                    $this->deleteImage($oldThumbImageName, 'clients');
                    //Create thumb
                    $this->createThumbImage($newImageName, 'clients', 70, 70);
                }
                
                parent::redirect ('cms'.DS.'clients', 'success', '#fragment-2');
            }else{
                parent::redirect ('cms'.DS.'clients'.DS.'edit'.DS.$params['id'], 'error', '#fragment-2');
            }
        }
        
        parent::set('tree', $this->db->getFinalTree());
        parent::set('staticCollection', $this->db->getAllStatic($params['id']));
        parent::set('dynamicCollection', $this->db->getAllDynamic($params['id']));
        
        parent::set('client', $this->db->findClient($params['id']));
    }
    
    public function deleteAction($params)
    {
        
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        $data2 = $this->db->getPaidImageName($params['id']);
        if($this->db->deleteClient($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'clients');
                
                //Delete thumb
                $oldThumbImageName = 'thumb-'.$oldImageName;
                $this->deleteImage($oldThumbImageName, 'clients');
            }
            
            //If exist delete
            if(!empty($data2)){
                $oldImageName = $data2['paid_image_name'];
                $this->deleteImage($oldImageName, 'clients');
                
                //Delete thumb
                $oldThumbImageName = 'thumb-'.$oldImageName;
                $this->deleteImage($oldThumbImageName, 'clients');
            }
            parent::redirect ('cms'.DS.'clients', 'success', '#fragment-2');
        }else{
            parent::redirect ('cms'.DS.'clients', 'error', '#fragment-2');
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
            
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$data['image_name'];
            $this->deleteImage($oldThumbImageName, 'pockets');
        }
        parent::redirect ('cms'.DS.'clients'.DS.$params['id'].DS.'edit', 'success', '#fragment-2');
    }
    
    
    
    public function deletePaidImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getPaidImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setPaidImageName($params['id'], '');
            $this->deleteImage($data['paid_image_name'], 'clients');
            
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$data['paid_image_name'];
            $this->deleteImage($oldThumbImageName, 'pockets');
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
            //Data submited

            if($this->db->updateNode($params['node'])){
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getNodeImageName($params['node']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = 'node-'.$params['node']['id'].'-'.$params['image']['name'];
                    $this->db->setNodeImageName($params['node']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'clients');
                }
                
                parent::redirect ('cms'.DS.'clients', 'success');
            }else{
                parent::redirect ('cms'.DS.'clients', 'error');
            }
        }

        parent::set('node', $this->db->findNode($params['id']));
        parent::set('tree', $this->db->getTree());
    }
    
    public function deleteNodeAction($params)
    {
        
        parent::setRenderHTML(0);
        
        $data = $this->db->getNodeImageName($params['id']);
        if($this->db->deleteNode($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'clients');
            }
            parent::redirect ('cms'.DS.'clients', 'success');
        }else{
            parent::redirect ('cms'.DS.'clients', 'error');
        }
        
    }
    
    
    
    public function deleteNodeImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getNodeImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setNodeImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'clients');
        }
        parent::redirect ('cms'.DS.'clients'.DS.'node'.DS.$params['id'].DS.'edit', 'success');
    }
}