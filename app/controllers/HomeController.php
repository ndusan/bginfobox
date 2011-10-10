<?php

class HomeController extends Controller
{
    
    
    public function indexAction($params)
    {
     
        parent::set('freshNews', $this->db->getFreshNews($params));
        parent::set('calendar', $this->loadCalendarAction($params));
    }
    
    
    private function newsPage($params)
    {
        if(isset($params['news_id'])){
            //Get only one news
            
            parent::set('news', $this->db->getNews($params['news_id']));
        }else{

            parent::set('newsCollection', $this->db->getAllNews());
        }
    }
    
    
    
    public function loadCalendarAction($params)
    {
        parent::set('eventCollection', $this->db->getEventsByTime(isset($params['year'])?$params['year']:date('Y'), isset($params['month'])?$params['month']:date('m')));
        parent::set('currTime', isset($params['currTime'])?$params['currTime']: time());
    }
   
    
    
    public function staticPagesAction($params)
    {

        parent::set('freshNews', $this->db->getFreshNews($params));
        
        switch($params['page']){
            case 'about-us':break;
            case 'our-clients': break;
            case 'archive': break;
            case 'gallery': break;
            case 'ads': break;
            case 'contact': $this->contactPage($params); break;
            case 'news':  $this->newsPage($params); break;
            case 'calendar': break;
            default: //error
        }
        
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
        
        parent::set('freshNews', $this->db->getFreshNews($params));
        
        $settings = $this->db->getDynamicPageSettings($params);

        if(null == $settings){
            //Dynamic page not found
            parent::redirect('404', '');
        }
    }
    
    
    
    public function noPageFoundAction($params)
    {
        
    }
    
    
}