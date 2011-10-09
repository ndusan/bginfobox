<?php

class CmsNewsController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('newsCollection', $this->db->findAllNews());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createNews($params['news'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'news');
                }
                parent::redirect ('cms'.DS.'news', 'success');
            }else{
                parent::redirect ('cms'.DS.'news'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateNews($params['news'])){
                //If image uploaded add it
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['news']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['news']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['news']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'news');
                }
                parent::redirect ('cms'.DS.'news', 'success');
            }else{
                parent::redirect ('cms'.DS.'news'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        parent::set('news', $this->db->findNews($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteNews($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'news');
            }
            parent::redirect ('cms'.DS.'news', 'success');
        }else{
            parent::redirect ('cms'.DS.'news', 'error');
        }
    }
    
    public function deleteImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'news');
        }
        parent::redirect ('cms'.DS.'news'.DS.'edit'.DS.$params['id'], 'success');
    }
    
}