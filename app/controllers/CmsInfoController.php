<?php

class CmsInfoController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('infoCollection', $this->db->findAllInfo());
        parent::set('nodeCollection', $this->db->getTree());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createInfo($params['info'])){
                
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'info');
                }
                
                parent::redirect ('cms'.DS.'info', 'success');
            }else{
                parent::redirect ('cms'.DS.'info'.DS.'add', 'error');
            }
        }
        
        parent::set('tree', $this->db->getTree());
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateInfo($params['info'])){
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['info']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['info']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['info']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'info');
                }
                
                parent::redirect ('cms'.DS.'info', 'success');
            }else{
                parent::redirect ('cms'.DS.'info'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        
        parent::set('tree', $this->db->getTree());
        
        parent::set('info', $this->db->findInfo($params['id']));
    }
    
    public function deleteAction($params)
    {
        
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteInfo($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'info');
            }
            parent::redirect ('cms'.DS.'info', 'success');
        }else{
            parent::redirect ('cms'.DS.'info', 'error');
        }
    }
    
    
    
    public function deleteImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'info');
        }
        parent::redirect ('cms'.DS.'info'.DS.$params['id'].DS.'edit', 'success');
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
                    $this->uploadImage($newImageName, $params['image'], 'info');
                }
                
                parent::redirect ('cms'.DS.'info', 'success');
            }else{
                parent::redirect ('cms'.DS.'info', 'error');
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
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'info');
                }
                
                parent::redirect ('cms'.DS.'info', 'success');
            }else{
                parent::redirect ('cms'.DS.'info', 'error');
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
                $this->deleteImage($oldImageName, 'info');
            }
            parent::redirect ('cms'.DS.'info', 'success');
        }else{
            parent::redirect ('cms'.DS.'info', 'error');
        }
        
    }
    
    
    
    public function deleteNodeImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getNodeImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setNodeImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'info');
        }
        parent::redirect ('cms'.DS.'info'.DS.'node'.DS.$params['id'].DS.'edit', 'success');
    }
}