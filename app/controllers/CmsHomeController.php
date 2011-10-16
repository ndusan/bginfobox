<?php

class CmsHomeController extends Controller
{
    
    public function indexAction($params)
    {
        
    }
    
    
    public function settingsAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->updateLanguages($params['settings'])){
                //If image uploaded add it
                parent::redirect ('cms'.DS.'settings', 'success');
            }else{
                parent::redirect ('cms'.DS.'settings', 'error');
            }
        }
        
        parent::set('en', $this->db->getConfigByKey('lang_en'));
    }
    
}