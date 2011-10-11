<?php

class CmsCarouselController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('carouselCollection', $this->db->findAllCarousel());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createCarousel($params['carousel'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'carousel');
                }
                parent::redirect ('cms'.DS.'carousel', 'success');
            }else{
                parent::redirect ('cms'.DS.'carousel'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateCarousel($params['carousel'])){
                //If image uploaded add it
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['carousel']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['carousel']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['carousel']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'carousel');
                }
                parent::redirect ('cms'.DS.'carousel', 'success');
            }else{
                parent::redirect ('cms'.DS.'carousel'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        parent::set('carousel', $this->db->findCarousel($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteCarousel($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'carousel');
            }
            parent::redirect ('cms'.DS.'carousel', 'success');
        }else{
            parent::redirect ('cms'.DS.'carousel', 'error');
        }
    }
    
}