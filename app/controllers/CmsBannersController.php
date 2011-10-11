<?php

class CmsBannersController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('bannerCollection', $this->db->findAllBanners());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createBanner($params['banner'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'banners');
                }
                parent::redirect ('cms'.DS.'banners', 'success');
            }else{
                parent::redirect ('cms'.DS.'banner'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateBanner($params['banner'])){
                //If image uploaded add it
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['banner']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['banner']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['banner']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'banners');
                }
                parent::redirect ('cms'.DS.'banners', 'success');
            }else{
                parent::redirect ('cms'.DS.'banner'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        parent::set('banner', $this->db->findBanner($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteBanner($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'banners');
            }
            parent::redirect ('cms'.DS.'banners', 'success');
        }else{
            parent::redirect ('cms'.DS.'banners', 'error');
        }
    }
    
}