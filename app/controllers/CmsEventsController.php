<?php

class CmsEventsController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('eventsCollection', $this->db->findAllEvents());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->createEvent($params['event'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'events');
                }
                parent::redirect ('cms'.DS.'events', 'success');
            }else{
                parent::redirect ('cms'.DS.'events'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateEvent($params['event'])){
                //If image uploaded add it
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['event']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['event']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['event']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'events');
                }
                parent::redirect ('cms'.DS.'events', 'success');
            }else{
                parent::redirect ('cms'.DS.'events'.DS.'edit'.DS.$params['id'], 'error');
            }
        }

        parent::set('event', $this->db->findEvent($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteEvent($params)){
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'events');
            }
            parent::redirect ('cms'.DS.'events', 'success');
        }else{
            parent::redirect ('cms'.DS.'events', 'error');
        }
    }
    
    public function deleteImageAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'events');
        }
        parent::redirect ('cms'.DS.'event'.DS.'edit'.DS.$params['id'], 'success');
    }
    
}