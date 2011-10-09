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
        
        if($this->db->deleteEvent($params)){
            parent::redirect ('cms'.DS.'events', 'success');
        }else{
            parent::redirect ('cms'.DS.'events', 'error');
        }
    }
    
}