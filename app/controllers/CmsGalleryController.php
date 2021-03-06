<?php

class CmsGalleryController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('galleryCollection', $this->db->findAllGallery());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createGallery($params['gallery'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $info = $this->uploadImage($newImageName, $params['image'], 'gallery');
                    if($info){
                        $this->db->updateImageInfo($id, $info);
                    }
                    //Create thumb
                    $this->createThumbImage($newImageName, 'gallery', 170, 120);
                }
                parent::redirect ('cms'.DS.'gallery', 'success');
            }else{
                parent::redirect ('cms'.DS.'gallery'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateGallery($params['gallery'])){
                //If image uploaded add it
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['gallery']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['gallery']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['gallery']['id'], $newImageName);
                    
                    //Delete thumb
                    $oldThumbImageName = 'thumb-'.$oldImageName;
                    
                    $this->deleteImage($oldThumbImageName, 'gallery');
                    $info = $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'gallery');
                    if($info){
                        $this->db->updateImageInfo($params['gallery']['id'], $info);
                    }
                    //Create thumb
                    $this->createThumbImage($newImageName, 'gallery', 170, 120);
                    
                }
                parent::redirect ('cms'.DS.'gallery', 'success');
            }else{
                parent::redirect ('cms'.DS.'gallery'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        parent::set('gallery', $this->db->findGallery($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteGallery($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'gallery');
                
                //Delete thumb
                $oldThumbImageName = 'thumb-'.$oldImageName;

                $this->deleteImage($oldThumbImageName, 'gallery');
            }
            parent::redirect ('cms'.DS.'gallery', 'success');
        }else{
            parent::redirect ('cms'.DS.'gallery', 'error');
        }
    }
    
}