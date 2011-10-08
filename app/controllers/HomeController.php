<?php

class HomeController extends Controller
{
    
    
    public function indexAction($params)
    {
     
        parent::set('news', $this->news($params));
        parent::set('calendar', $this->calendar($params));
    }
    
    
    private function news($params)
    {
        
        return null;
    }
    
    private function calendar($params)
    {
        
        return null;
    }
   
    
    
    public function staticPagesAction($params)
    {
        switch($params['page']){
            case 'about-us':break;
            case 'our-clients': break;
            case 'archive': break;
            case 'gallery': break;
            case 'ads': break;
            case 'contact': $this->contactPage($params); break;
            case 'news':  break;
            case 'calendar': break;
            default: //error
        }
        
        parent::set('news', $this->news($params));
        parent::set('calendar', $this->calendar($params));
    }
    
    
    private function contactPage($params)
    {
        
        if(isset($params['submit'])){
            
            //Send
            if(parent::sendMail(MAIL_TO, 'Contact form', $params['form'], MAIL_FROM)){
                parent::set('sent', 'success');
            }else{
                parent::set('sent', 'error');
            }
        }
    }
   
    
    
    public function dynamicPagesAction($params)
    {
        
        $settings = $this->db->getDynamicPageSettings($params);
        if(null == $settings){
            //Dynamic page not found
            parent::redirect('404', '');
        }
        
        parent::set('news', $this->news($params));
        parent::set('calendar', $this->calendar($params));
    }
    
    
    
    public function noPageFoundAction($params)
    {
        
    }
    
    
}