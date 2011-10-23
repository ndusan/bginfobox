<?php

class CmsAboutUsController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('aboutusCollection', $this->db->findAllAboutUs());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createAboutUs($params['aboutus'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'aboutus');
                }
                
                //If image uploaded add it
                if(0 == $params['doc']['error'] && !empty($id)){
                    
                    $newDocName = 'doc-'.$id.'-'.$params['doc']['name'];
                    $this->db->setDocName($id, $newDocName);
                    $this->uploadImage($newDocName, $params['doc'], 'aboutus');
                }
                parent::redirect ('cms'.DS.'about-us', 'success');
            }else{
                parent::redirect ('cms'.DS.'about-us'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            
            //Data submited

            if($this->db->updateAboutUs($params['aboutus'])){
                //If image uploaded add it
                
                $data = $this->db->getImageName($params['aboutus']['id']);
                
                if(0 == $params['image']['error']){
                    
                    $oldImageName = $data['image_name'];
                    
                    
                    $newImageName = $params['aboutus']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['aboutus']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'aboutus');
                } 
                
                if(0 == $params['doc']['error']){
                    
                    $oldDocName = $data['doc_name'];
                    
                    $newDocName = 'doc-'.$params['aboutus']['id'].'-'.$params['doc']['name'];
                    $this->db->setDocName($params['aboutus']['id'], $newDocName);
                    $this->reUploadImage($oldDocName, $newDocName, $params['doc'], 'aboutus');
                }
                parent::redirect ('cms'.DS.'about-us', 'success');
            }else{
                parent::redirect ('cms'.DS.'about-us'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        parent::set('aboutus', $this->db->findAboutUs($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteAboutUs($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'aboutus');
            }
            
            //If exist delete
            if(!empty($data)){
                $oldDocName = $data['doc_name'];
                $this->deleteImage($oldDocName, 'aboutus');
            }
            parent::redirect ('cms'.DS.'about-us', 'success');
        }else{
            parent::redirect ('cms'.DS.'about-us', 'error');
        }
    }
    
    public function deleteImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->db->setDocName($params['id'], '');
            $this->deleteImage($data['image_name'], 'aboutus');
            $this->deleteImage($data['doc_name'], 'aboutus');
        }
        parent::redirect ('cms'.DS.'about-us'.DS.'edit'.DS.$params['id'], 'success');
    }
    
    
    public function deleteDocAction($params)
    {
        
        
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        //If exist delete
        if(!empty($data)){
            
            $this->db->setDocName($params['id'], '');
            $this->deleteImage($data['doc_name'], 'aboutus');
        }
        parent::redirect ('cms'.DS.'about-us'.DS.'edit'.DS.$params['id'], 'success');
    }
    
}